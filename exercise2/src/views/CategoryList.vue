<template>
  <table class="table">
    <thead>
    <tr>
      <th scope="col">Category Id</th>
      <th scope="col">Category name</th>
      <th scope="col"><button type="button" class="btn btn-success" :data-bs-toggle="modal2" data-bs-target="#addModal"
                              @click="addElement">Добавить</button> </th>
      <th scope="col"> </th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="(item, index) in items" :key="index">
      <td>{{ item.id }}</td>
      <td>{{ item.name }}</td>
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
  name: "CategoryList",


  data() {
    return {
      items: [], // Инициализация свойства items
      apiUrl: 'http://127.0.0.1:8000/api/categories/getInfo'
    };
  },
  methods:{
    openModalEdit() {
      if (this.checkedProducts.length !== 1){
        this.modal1 = null
        alert("Выберете одного пользователя")
      }
      else{
        this.isOpened = true
        this.choosenProduct = this.items[this.checkedProducts[0]]
      }
    },
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