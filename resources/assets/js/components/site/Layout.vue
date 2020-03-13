<template>
    <div>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
            <h5 class="my-0 mr-md-auto font-weight-normal">Super App</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <router-link class="p-2 text-dark" :to="{ name: 'site.home' }">Главная</router-link>
                <router-link class="p-2 text-dark" :to="{ name: 'site.weather' }">Погода в Брянске</router-link>
            </nav>
        </div>
        <div class="container">
            <router-view></router-view>
        </div>
        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">&copy; Super App</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Навигация</h5>
                    <ul class="list-unstyled text-small">
                        <router-link class="text-muted" :to="{ name: 'site.home' }">Главная</router-link>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</template>
<script>
    export default {
        mounted() {
            console.log('Component Main mounted');
        }
    }
</script>
