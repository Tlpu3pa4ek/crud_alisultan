<template>
  <!-- Modal -->
  <div  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" >
          <form>
            <div class="md-3">
              <label for="lastName" class="col-form-label">Product Title</label>
              <input type="text" class="form-control" v-model="last_name_doc" :placeholder="choosenClient.last_name_doc" id="lastName">
            </div>
            <div class="mb-3">
              <label for="firstName" class="col-form-label">Product price</label>
              <input type="text" min="1" class="form-control" v-model="first_name_doc" :placeholder="choosenClient.first_name_doc" id="firstName">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="updateInfo">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "UpdateModal",
  props: {
    choosenClient: Object
  },
  data() {
    return {
      last_name_doc: '',
      first_name_doc: ''
    }
  },
  methods: {
    async putData() {
      const idToUpdate = this.choosenClient.id; // Пример идентификатора для обновления
      const dataToUpdate = {
        last_name_doc: this.last_name_doc,
        first_name_doc: this.first_name_doc,
      };

      try {
        await this.$store.dispatch('putData', { id: idToUpdate, dataToUpdate });
        // Обработка успешного выполнения запроса
      } catch (error) {
        // Обработка ошибки
      }
    },
    updateInfo(){
      this.$emit('change_user', {'last_name_doc' : this.last_name_doc, 'firstName' : this.firstName, 'id': this.choosenClient.id})
      axios.put(`http://127.0.0.1:8000/api/clients/update-clients/${this.choosenClient.id}`, { last_name_doc: this.last_name_doc,
        first_name_doc: this.first_name_doc,});
    }

  }

}
</script>
<style scoped>

</style>