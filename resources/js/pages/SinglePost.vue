<template>
  <div class="container" v-if="post">
      <h2>Post Singolo</h2>
      <h1>titolo: {{post.title}}</h1>
      <p>{{post.content}}</p>
      <small v-if="post.category">Categoria: {{post.category.name}}</small>
  </div>
  <div v-else>
      <h2>Loading</h2>
  </div>
</template>

<script>
export default {
    name: 'SinglePost',

    data(){
        return{
            post: null
        }
    },
 
    methods:{
        getPosts(slug){
        axios
            .get(`http://127.0.0.1:8000/api/posts/${slug}`)
            .then (
                result => {
                    this.post = result.data;
                }
            )
        }
    },
    created() {
        this.getPosts(this.$route.params.slug);
    }
}

</script>

<style>

</style>