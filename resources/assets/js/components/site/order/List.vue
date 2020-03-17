<template>
    <div class="container">
        <h3>Нажмите на заказ для редактирования</h3>
        <pagination :data="ordersList" :limit="1" @pagination-change-page="getOrdersList"></pagination>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Партнер</th>
                <th scope="col">Стоимость</th>
                <th scope="col">Состав заказа</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="order in ordersList.data">
                <th scope="row">{{ order.id }}</th>
                <td>{{ order.partner.name }}</td>
                <td>{{ getSumOfProducts(order.product) }}</td>
                <td>
                    <p v-for="product in order.product">{{ product.name }}</p>
                </td>
                <td>{{ order.status_title }}</td>
            </tr>
            </tbody>
        </table>
        <pagination :data="ordersList" :limit="1" @pagination-change-page="getOrdersList"></pagination>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getOrdersList();
        },
        data() {
            return {
                ordersList: {},
            }
        },
        methods: {
            getOrdersList(page = 1) {
                this.axios.get(`/order/list?page=${page}`)
                    .then(response => {
                        console.log(response.data);
                        this.ordersList = response.data;
                    });
            },
            getSumOfProducts(products) {
                let sum = 0;
                for (let i = 0; i < products.length; i++) {
                    sum += products[i].price;
                }
                return sum;
            }
        }
    }
</script>
