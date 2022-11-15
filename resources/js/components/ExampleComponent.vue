<template>
    <div class="w-full bg-blue-700 text-white p-5 rounded min-h-[50vh] flex flex-col">
        <div class="">
            <div class="">
                <div class="">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example {{test}}!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['test'],
        data(){
            hey: 0
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>