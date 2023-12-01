<template>
  <table class="table">
    <thead>
    <tr>
      <th scope="col">Product Id</th>
      <th scope="col">Product Title</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Category</th>
      <th scope="col"><button type="button" class="btn btn-success" :data-bs-toggle="modal2" data-bs-target="#addModal"
                              @click="addElement">Добавить</button></th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="(item, index) in items" :key="index">
      <td>{{ item.id }}</td>
      <td>{{ item.name }}</td>
      <td>{{ item.quantity }}</td>
      <td>{{ item.price }}</td>
      <td>{{ item.category_name }}</td>
      <td class="btntd"><button type="button" class="btn btn-warning" :data-bs-toggle="modal1" data-bs-target="#exampleModal"
                                @click="openModalEdit">Редактировать</button></td>
      <td class="btntd"><button type="button" class="btn btn-danger" @click="changedelete">Удалить</button></td>
      <!-- Вывод других данных -->
    </tr>
    </tbody>
  </table>
</template>

<script>
import axios from "axios";

export default {
  name: "ProductList",
  data() {
    return {
      items: [],
      apiUrl: 'http://127.0.0.1:8000/api/products/getInfo'
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