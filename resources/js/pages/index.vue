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
                        <span class="text-xs text-red-500" v-if="success_message">
                            {{ success_message }}
                        </span>
                        <input type="text" class="p-2 border rounded-md shadow-md w-64" v-model="original_url" required
                               placeholder="Paste your big url">
                        <i @click="submit" class="fas fa-paper-plane text-orange-600 px-3 cursor-pointer"></i>
                    </form>
                </div>
                <div class="my-2 px-2 w-full overflow-hidden sm:w-full md:w-1/3 lg:w-1/3 xl:w-1/3"></div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-1 overflow-hidden">
            <div class="my-1 px-1 w-full overflow-hidden md:w-1/3 lg:w-1/3 xl:w-1/3">
                <!-- Column Content -->
            </div>
            <div class="my-1 px-1 w-full overflow-hidden md:w-1/3 lg:w-1/3 xl:w-1/3">
                <section class="mt-5">
                    <div class="border rounded-md p-4">
                        <table>
                            <thead>
                                <tr>
                                    <th>Origianl Url</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in items" :key="item.id">
                                    <td class="rounded p-4 border text-sm">{{ item.original_url }}</td>
                                    <td class="rounded p-4 border text-sm">{{ item.created_at }}</td>
                                    <td class="rounded p-4 border text-sm text-red-300 hover:text-red-700 cursor-pointer">
                                        <i @click="destroy(item)" class="fas fa-times"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <div class="my-1 px-1 w-full overflow-hidden md:w-1/3 lg:w-1/3 xl:w-1/3">
                <!-- Column Content -->
            </div>
        </div>
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
            success_message:"",
        }
    },
    mounted(){
        this.fetchData();
    },
    methods: {
        submit() {
            this.original_url_error = "";
            this.success_message="";
            if(this.original_url==""){
                this.original_url_error = "original url field is required";
            }else{
                axios.post("api-url-store", {original_url: this.original_url}).then(res => {
                    this.original_url="";
                    // this.items.push(res.data);
                    if (this.items.unshift(res.data)){
                        this.$notify({message: "Bridge Notification is Awesome"});
                        this.success_message = "Data store successfully";
                    }
                }).catch((e) => {
                    // console.log(e.response.data.errors);
                    this.errors = e.response.data.errors;
                })
            }
        },
        fetchData(){
            axios.get("api-url-get-all").then(res=>{
                this.items = res.data;
            }).catch((e) => {
                // console.log(e.response.data.errors);
                this.errors = e.response.data.errors;
            })
        },
        destroy(item){
            // console.log(item);
            axios.delete(`api-url-delete/${item.id}`).then(res=>{
                this.items = this.items.filter(i => i.id != item.id);
            });
        }
    }
};
</script>
