<template>
    <div class="container">
        <h2>Редактирование заказа {{ orderId }}</h2>
        <div v-if="isUpdateSuccess" class="alert alert-success" role="alert">
            Данные обновлены успешно!
        </div>
        <div v-if="hasUpdateErrors" class="alert alert-danger" role="alert">
            Не удалось обновить данные!
        </div>
        <form>
            <div class="form-group">
                <label for="email">Email клиента</label>
                <input type="email" required class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email"
                       v-model="clientEmail">
            </div>
            <div class="form-group">
                <label for="partner">Партнер</label>
                <select class="form-control" id="partner" v-model="ordersPartnerId">
                    <option v-for="partner in partnersList" :selected="isOrdersPartner(partner.id)" v-bind:value="partner.id">
                        {{ partner.name }}
                    </option>
                </select>
            </div>
            <div v-if="productsList" class="form-group">
                <p>Продукты</p>
                <ul>
                    <li v-for="product in productsList">
                        {{ product.name }} кол-во: {{ product.pivot.quantity }}
                    </li>
                </ul>
            </div>
            <div class="form-group">
                <label for="status">Статус заказа</label>
                <select class="form-control" id="status" v-model="ordersStatusId">
                    <option v-for="status in statusesList" v-bind:selected="isOrdersStatus(status.id)" v-bind:value="status.id">
                        {{ status.title }}
                    </option>
                </select>
            </div>
            <div v-if="productsList" class="form-group">
                <p>Стоимость заказа: {{ getSumOfProducts(productsList) }}</p>
            </div>
            <button v-on:click.prevent="sendData" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.orderId = this.$route.params.id;
            this.getOrderData(this.orderId);
            this.getPartnersList();
            this.getStatusesList();
        },
        data() {
            return {
                orderId: null,
                clientEmail: null,
                partnersList: [],
                ordersPartnerId: null,
                productsList: null,
                ordersStatusId: null,
                statusesList: null,

                isUpdateSuccess: false,
                hasUpdateErrors: false
            }
        },
        methods: {
            sendData() {
                this.isUpdateSuccess = false;
                this.hasUpdateErrors = false;
                this.axios.put('/admin/user/update/' + this.userId, {
                    email: this.userEmail,
                    role_id: this.userRoleId,
                })
                    .then(response => {
                        this.getUserData(this.userId);
                        this.isUpdateSuccess = true;
                        console.log(response);
                    })
                    .catch(error => {
                        this.hasUpdateErrors = true;
                        console.log(error);
                    });
            },
            getPartnersList() {
                this.axios.get('/partner/list')
                    .then(response => {
                        this.partnersList = response.data;
                        console.log(response.data);
                    });
            },
            getStatusesList() {
                this.axios.get('/order/statuses-list')
                    .then(response => {
                        this.statusesList = response.data;
                        console.log(response.data);
                    });
            },
            getOrderData(id) {
                this.axios.get('/order/' + id)
                    .then(response => {
                        this.clientEmail = response.data.client_email;
                        this.ordersPartnerId = response.data.partner_id;
                        this.ordersStatusId = response.data.status;
                        this.productsList = response.data.product;
                    });
            },
            isOrdersPartner(partnerId) {
                return partnerId === this.ordersPartnerId;
            },
            isOrdersStatus(statusId) {
                return statusId === this.ordersStatusId;
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
