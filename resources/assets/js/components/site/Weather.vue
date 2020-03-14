<template>
    <div class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Погода в Брянске в реальном времени</h1>
            <p class="lead">
                Тестовый параграф
            </p>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getUsersList();
        },
        data() {
            return {
                usersList: {},
            }
        },
        methods: {
            getUsersList(page = 1) {
                this.axios.get('/' + page)
                    .then(response => {
                        console.log(response.data);
                        this.usersList = response.data;
                    });
            }
        }
    }
</script>

