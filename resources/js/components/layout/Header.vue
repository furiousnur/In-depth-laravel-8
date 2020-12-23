<template>
    <nav class="bg-teal-600 p-4 flex justify-between sticky">
        <h1 class="text-white text-xl">
            <router-link to="/" class="text-xl text-white px-3">
                Home
            </router-link>
        </h1>
        <div>
            <a href="#" class="text-xl text-white">Dashboard</a>
            <router-link to="/signin" class="text-xl text-white px-3">
                Login
            </router-link>
            <router-link to="/signup" class="text-xl text-white px-3">
                Register
            </router-link>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'Layout'
    };
</script>
