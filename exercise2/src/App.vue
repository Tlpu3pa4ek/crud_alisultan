<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <RouterLink :to="'/'" class="nav-link">Home</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink :to="'/clients'" class="nav-link">Clients</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink :to="'/products'" class="nav-link">Products</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink :to="'/categories'" class="nav-link">Categories</RouterLink>
          </li>
          <li class="nav-item">
            <RouterLink :to="'/orders'" class="nav-link">Orders</RouterLink>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--  <img alt="Vue logo" src="./assets/logo.png">-->
  <!--  <HelloWorld msg="Welcome Nurkhan! How are you?" text="Let's make new code"/>-->
  <!--  <PostsData/>-->
  <router-view/>
<!--  <img alt="Vue logo" src="./assets/logo.png">-->
<!--  <ClientList/>-->
</template>

<script>
// import ClientList from "@/views/ClientList";

export default {
  name: 'App',
  components: {
    // ClientList
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
