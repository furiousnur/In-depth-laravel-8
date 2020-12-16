<template>
    <div>
        <app-header />
        <div class="min-h-screen"></div>
        <app-footer />
    </div>
    <!--<div class="p-3">
        <h2 class="text-white text-xl text-center">This is Main Component.</h2>
    </div>-->
</template>

<script>
import AppHeader from "./components/layout/Header";
import AppFooter from "./components/layout/Footer";
export default {
    components: {AppHeader, AppFooter},
    name: 'Index'
};
</script>
