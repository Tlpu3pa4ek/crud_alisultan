<template>
  <table class="table">
    <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Client Id</th>
      <th scope="col">Lastname</th>
      <th scope="col">Firstname</th>
      <th scope="col"><button type="button" class="btn btn-success" :data-bs-toggle="modal1" data-bs-target="#addModal"
                                                      @click="addElement">Добавить</button></th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="item in allClients" :key="item.id">
      <input class="form-check-input" type="checkbox" :value="index" v-model="checkedProducts"
             :disabled="inputDisabled" :id="item.id">
      <th scope="col"></th>
      <td>{{ item.id }}</td>
      <td>{{ item.last_name_doc }}</td>
      <td>{{ item.first_name_doc }}</td>
      <td class="btntd"><button type="button" class="btn btn-warning" :data-bs-toggle="modal2" data-bs-target="#exampleModal"
                  @click="addElement2(item)" >Редактировать</button></td>
      <td class="btntd"><button type="button" class="btn btn-danger" @click="changedelete(item)">Удалить</button></td>
      <!-- Вывод других данных -->
    </tr>
    </tbody>
  </table>
  <AddModal/>
  <UpdateModal :choosenClient="choosenClient"/>
</template>

<script>
import AddModal from "@/components/AddModal";
import UpdateModal from "@/components/UpdateModal";
import axios from "axios";
import {mapGetters} from 'vuex';


export default {
  name: "ClientList",
  components: {
    AddModal,
    UpdateModal
  },
  data() {
    return {
      modal1: null,
      modal2: null,
      inputDisabled: false,
      isOpened: false,
      choosenClient: {},
      deleteClient: {},
      checkedClient:[],
    }
  },

  methods: {
    changeUserData(newUsersData) {
      let index = this.usersArray.findIndex(i => i.id === newUsersData['id'])
      this.usersArray[index] = newUsersData
    },

    addElement(){
      this.modal1 = "modal"
      this.isOpened = true
    },
    addElement2(item){
      this.modal2 = "modal"
      this.isOpened = true
      this.choosenClient = item
    },
    changedelete(item){
      this.deleteClient = item;
      axios.delete(`http://127.0.0.1:8000/api/clients/delete-clients/${this.deleteClient.id}`);
    }
  },
  computed:{
      ...mapGetters(["allClients"]),

  },

  async mounted() {
    this.$store.dispatch('fetchClients')
  }

}

</script>



<style scoped>
.btntd{
  width: 150px;
}
</style>