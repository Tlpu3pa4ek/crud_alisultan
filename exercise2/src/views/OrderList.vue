<template>
  <div>
    <h2>Список заказов</h2>
    <table class="table">
      <thead>
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Client Lastname</th>
        <th scope="col">Client Firstname</th>
        <th scope="col">Product Name</th>
        <th scope="col">Date of Purchase</th>
        <th scope="col"><button type="button" class="btn btn-success" :data-bs-toggle="modal2" data-bs-target="#addModal"
                                @click="addElement">Добавить</button></th>
        <th scope="col"></th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="order in items.orders" :key="order">
        <td>{{ order.order_id }}</td>
        <td>{{ order.client.client_lastname }}</td>
        <td>{{ order.client.client_firstname }}</td>
        <td>{{ order.product.product_name }}</td>
        <td>{{ order.order_date }}</td>
        <td class="btntd"><button type="button" class="btn btn-warning" :data-bs-toggle="modal1" data-bs-target="#exampleModal"
                                  @click="openModalEdit">Редактировать</button></td>
        <td class="btntd"><button type="button" class="btn btn-danger" @click="changedelete">Удалить</button></td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "OrderList",
  data() {
    return {
      items: [],
      apiUrl: 'http://127.0.0.1:8000/api/orders/getInfo'
    };
  },


  mounted() {
    // Ваш GET-запрос для получения данных
    axios.get(this.apiUrl)
        .then(response => {
          this.items = response.data; // Назначение данных для свойства items
        })
        .catch(error => {
          console.error('Ошибка получения данных:', error);
        });
  }
}
</script>

<style scoped>
.btntd{
  width: 150px;
}
</style>