<template>
  <div class="card">
      <h3> Titolo: {{post.title}} </h3>
      <h4> Autore: {{post.author}} </h4>
      <p> {{post.content}} </p>
      <router-link :to="{name: 'single-post', params: {slug:post.slug}}">More</router-link>
  </div>
</template>

<script>
export default {
    name:'Card',
    props:{
        post: Object
    }
};
</script>

<style>
.card{
    width: 600px;
    margin: 10px;
    border: 1px solid red;
}
</style>