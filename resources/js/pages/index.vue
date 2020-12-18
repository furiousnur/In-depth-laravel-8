<template>
    <div>
        <div class="mt-5 text-center">
            <h2 class="text-2xl">Shorten Your Big Url</h2>
            <div class="flex flex-wrap -mx-2 overflow-hidden">
                <div class="my-2 px-2 w-full overflow-hidden sm:w-full md:w-1/3 lg:w-1/3 xl:w-1/3"></div>
                <div class="my-2 px-2 w-full overflow-hidden sm:w-full md:w-1/3 lg:w-1/3 xl:w-1/3 shadow p-5">
                    <form action="" @submit.prevent="submit">
                        <span class="text-xs text-red-500" v-if="!original_url">
                            {{ original_url_error }}
                        </span>
                        <input type="text" class="p-2 border rounded-md shadow-md w-64" v-model="original_url" required
                               placeholder="Paste your big url">
                        <i @click="submit" class="fas fa-paper-plane text-orange-600 px-3 cursor-pointer"></i>
                    </form>
                </div>
                <div class="my-2 px-2 w-full overflow-hidden sm:w-full md:w-1/3 lg:w-1/3 xl:w-1/3"></div>
            </div>
        </div>
        <section class="mt-5">
            <div v-for="item in items" :key="item.id">
                {{ item.original_url }}
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            original_url: "",
            original_url_error: "",
            errors: "",
            items: [],
        }
    },
    methods: {
        submit() {
            this.original_url_error = "";
            if(this.original_url==""){
                this.original_url_error = "original url field is required";
            }else{
                axios.post("api-url-store", {original_url: this.original_url}).then(res => {
                    // console.log(res.data.original_url);
                    this.original_url="";
                    this.items.push(res.data);
                }).catch((e) => {
                    // console.log(e.response.data.errors);
                    this.errors = e.response.data.errors;
                })
            }
        }
    }
};
</script>
