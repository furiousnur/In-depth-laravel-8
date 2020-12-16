<template>
    <div>
        <div class="mt-5 text-center">
            <h2 class="text-2xl">Shorten Your Big Url</h2>
            <div class="flex flex-wrap -mx-2 overflow-hidden">
                <div class="my-2 px-2 w-full overflow-hidden sm:w-full md:w-1/3 lg:w-1/3 xl:w-1/3"></div>
                <div class="my-2 px-2 w-full overflow-hidden sm:w-full md:w-1/3 lg:w-1/3 xl:w-1/3 shadow p-5">
                    <form action="" @submit.prevent="submit">
                        <input type="text" class="p-2 border rounded-md shadow-md w-64" placeholder="Paste your big url">
                        <i @click="submit" class="fas fa-paper-plane text-orange-600 px-3 cursor-pointer"></i>
                    </form>
                </div>
                <div class="my-2 px-2 w-full overflow-hidden sm:w-full md:w-1/3 lg:w-1/3 xl:w-1/3"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Index',
        methods: {
            submit(){

            }
        }
    };
</script>
