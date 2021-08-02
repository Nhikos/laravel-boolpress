<template>
  <div>
      <Card
      :post ="post"
      v-for="post in posts"
      :key="post.id"
      />
  </div>
</template>

<script>

import Card from '../components/partials/Card.vue';

export default {
    name: 'Blog',
    components: {
        Card
    },

data(){
        return{
            posts: []
        }
    },

    methods:{
        getPosts(){
            axios
                .get('http://127.0.0.1:8000/api/posts')
                .then(res=>(this.posts = res.data.data))
                .catch(err=>(err))
        }
    },
    created() {
        this.getPosts();
    }
}


</script>

<style>

</style>