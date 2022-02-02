<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <!-- Ada nilai? Ini sudah diwakili props -->
                    <section v-if="id">
                        <!-- Untuk tangkap nama dengan $router.params.name -->
                        <h1>Hello, {{ detailUser.name }}</h1>
                        <h3>Email: <strong>{{ detailUser.email }}</strong></h3>
                        <router-link :to="{name:'User'}" class="btn btn-warning">Back</router-link>
                        <router-link :to="{name:'Upload', params:{ id:detailUser.id }}" class="btn btn-secondary">Upload</router-link>
                        <a href="" class="btn btn-danger" @click.prevent="handlingDelete">Delete</a>
                        <a href="" class="btn btn-success" @click.prevent="handlingEdit">Edit</a>
                        <!-- <router-link :to="{name:'Edit'}" class="btn btn-secondary">Edit</router-link> -->
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    // Nama url parameter untuk ketersediaan data props
   props: ['id'],
   data(){
       return {
           detailUser:{

           }
       }
   },
    // Axios untuk API
    mounted(){
        this.getUser();
    },
    methods:{
        getUser(){
            axios
            .get('/api/users/'+this.id)
            .then((response)=>{
            this.detailUser = response.data;
        })
       },
       handlingDelete(){
           if(confirm('Mau delete data?')){
                 axios
                .delete('/api/users/'+this.id)
                .then((response) => {
                    if(response.data.status){
                        this.$noty.success(response.data.message);
                        this.$router.push({
                                name:'User'
                        });
                    }
                })
           }
           else{
               return false;
           }
       },
       handlingEdit(id){
           this.$router.push({
               name:'Edit',
               params:{
                   id: this.id
                }
           })
       }
   }
}
</script>


