<template>
  <div  class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" >
          <form @submit.prevent="submit">
            <div class="md-3">
              <label class="col-form-label">Client Lastname</label>
              <input type="text" class="form-control" placeholder="Enter the Lastname">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Client Firstname</label>
              <input type="text" class="form-control" placeholder="Enter the Firstname">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" @click="postData">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapMutations } from "vuex";
export default {
  name: "AddModal",
  methods: {
    ...mapMutations(["createPost"]),
    submit() {
      this.createClient({
        last_name_doc: this.last_name_doc,
        firstt_name_doc: this.firstt_name_doc,
      });
      this.last_name_doc = this.firstt_name_doc = "";
    },
    async postData() {
      try {
        await this.$store.dispatch('postData',
            {
              first_name_doc: this.firstt_name_doc,
              last_name_doc: this.last_name_doc
            });
      } catch (error) {
        //
      }
    },
    async updateData() {
      const idToUpdate = 123; // Пример идентификатора для обновления
      const dataToUpdate = { /* данные для обновления */ };

      try {
        await this.$store.dispatch('putDataById', { id: idToUpdate, dataToUpdate });
        // Обработка успешного выполнения запроса
      } catch (error) {
        // Обработка ошибки
      }
    }
  }

}


</script>

<style scoped>

</style>