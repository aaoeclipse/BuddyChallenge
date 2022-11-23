<template lang="">
    <div v-if="pChallenges">
        <h1 class="text-xl font-bold">Pending Challenges:</h1>
            <div v-for="challenge in challenges" class="grid grid-cols-4 items-center 
            h-16 pl-4 border ">
            <h2 class="col-span-2 text-lg  cursor-pointer ">
                {{challenge.title}}
            </h2>
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
            console.log(results.data)
            if (results.data.length > 0) {
                this.challenges = results.data;
                this.pChallenges = true;
            }
        })
    },
    methods: {

    }
}
</script>
