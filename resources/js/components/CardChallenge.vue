<template>
    <div
        class="bg-gray-500 text-white rounded p-3 flex gap-3 items-center md:w-[30rem] cursor-pointer hover:bg-gray-400">
        <div class="w-16 h-16">
            <TrophyIcon />
        </div>
        <div class="flex-1">
            <div>NAME OF CHALLENGE</div>
            <div class="text-xs text-gray-300">01/01/08-02/02/08</div>
        </div>
        <div class="text-xl font-bold">
            <span class="text-green-500">1</span>
            |
            <span class="text-red-500">6</span>
        </div>


    </div>
</template>

<script setup>
import { TrophyIcon } from '@heroicons/vue/24/outline'
</script>

<script >
export default {
    name: 'CardChallenge',
}
</script>