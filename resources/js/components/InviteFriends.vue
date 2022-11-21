<template>
    <div class="flex flex-col gap-2">
        
        <div class="w-full "  v-for="friend in friends_to_invite">
            <label class="text-gray-400" for="email" >email</label>
            <input class="w-full py-2 rounded"  type="email" v-model="friend.email">
        </div>

        <div
            class="bg-gray-200 flex gap-10 items-center justify-center px-8 h-12 rounded text-xl
        hover:bg-gray-300 cursor-pointer active:bg-gray-400 active:shadow-inner active:drop-shadow-md select-none" @click="add_friend">
            <div class="text-gray-800"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                </svg>
            </div>
            <div class="flex gap-4">
                <span>Add Friends</span>
                <span>+</span>
            </div>
        </div>
    </div>

    <button type="submit" class="bg-blue-700 rounded py-2 px-6 mt-4 text-white text-xl">
        Invite
    </button>
    

    <div class="w-full "  v-for="friend in friends_to_invite" :value="friends_to_invite.email">
        test - 
        {{friend.email}}
    </div>
</template>

<script>
export default {
    data(){
        return {
            friends_to_invite: [{email: ''}]
        }
    },
    methods: {
        add_friend(){
            this.friends_to_invite.push({email: ""})
        }
    }
}
</script>
<style lang="">
</style>