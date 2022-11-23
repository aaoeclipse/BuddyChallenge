<template lang="">
    <div v-if="pChallenges">
        <h1 class="text-xl font-bold">Pending Challenges:</h1>
            <div v-for="challenge in challenges" class="grid grid-cols-4 items-center 
            h-16 pl-4 border ">
            <h2 class="col-span-2 text-lg  cursor-pointer ">
                {{challenge.title}}
            </h2>
            <div class="col-span-2 flex justify-center gap-4 mr-16">
                <button @click="butonPress('accept',challenge.id)" class="px-4 py-2 rounded outline outline-2 outline-green-500 text-green-500 hover:bg-green-500 hover:text-white">Accept</button>
                <button @click="butonPress('reject',challenge.id)" class="px-4 py-2 rounded outline outline-2 outline-red-700 text-red-700 hover:bg-red-700 hover:text-white">Reject</button>
            </div>
            </div>
    </div>
    <div v-else>
        <h1 class="text-xl font-bold">No challenges pending</h1>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    props: [],
    data() {
        return {
            pChallenges: false,
            challenges: []
        }
    },
    mounted() {
        axios.get('/pending_challenge').then((results) => {
            if (results.data.length > 0) {
                this.challenges = results.data;
                this.pChallenges = true;
            }
        })
    },
    methods: {
        butonPress(button, challengeId) {
            if (button === "accept") {
                axios.post('/respond_challenge/', { id: challengeId, accept: true })
                    .then(async (response) => {
                        axios.get('/pending_challenge').then((results) => {
                            console.log(results.data)
                            if (results.data.length > 0) {
                                this.challenges = results.data;
                                this.pChallenges = true;
                            }
                        })
                    }).catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });
            } else if (button === "reject") {
                axios.post('/respond_challenge/', { id: challengeId, accept: false })
                    .then(async (response) => {
                        console.log('rejected success');
                        axios.get('/pending_challenge').then((results) => {
                            if (results.data.length > 0) {
                                this.challenges = results.data;
                                this.pChallenges = true;
                            }
                        })
                    }).catch(error => {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors || {};
                        }
                    });

            }
        }
    }
}
</script>
