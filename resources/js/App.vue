<template>
  <div>
      <Header />
      <div class="container">
          <main>
            <div class="card-container">
                <Card v-for="post in posts"
                :key='post.id'
                :post='post'/>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
          </main>
      </div>
      <Footer />
  </div>
</template>

<script>

    import Header from './components/partials/Header';
    import Footer from './components/partials/Footer';
    import Card from './components/partials/Card';

export default {
    name:'App',
    components : {
        Header,
        Footer,
        Card,
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
.card-container{
    display: flex;
    flex-wrap: wrap;
}
</style>