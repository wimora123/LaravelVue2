<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <!-- Gak cocok? Perlihatkan semua usernya -->
                    <section>
                        <h1>Daftar nama</h1>
                        <router-link class="btn btn-info mb-2" to="/user/create">Register</router-link>
                        <ul>
                            <li v-for="user in users">
                                <!-- Mirip function parameter di profile_url(user.name) -->
                                <!-- Di bawahnya ada methods untuk mengisi parameter profile_url(name) -->
                              <!-- <router-link :to="profile_url(user.name)">{{user.name}}</router-link> -->

                              <!-- Coba pakai router push -->
                              <a href="" @click.prevent="lihatUser(user.id)">{{ user.name }}</a>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default{
    // Nama url parameter untuk ketersediaan data props
   data(){
       return {
           users:[
            //    { id:1, name:'Wimora'},
            //    { id:2, name:'Debra'},
            //    { id:3, name:'Hilda'}
           ]
       }
   },
    // Axios untuk API
    mounted(){
        this.getUsers();
    },
    methods:{
        getUsers(){
            axios
            .get('/api/users')
            .then((response)=>{
            this.users = response.data;
            console.info(response);
        })
       },
       profile_url(name){
           return '/user/'+name.toLowerCase()
       },
        // Push router
       lihatUser(id){
        //   router.push('/user/'+name.toLowerCase());
        this.$router.push({
            name:'Profile',
            params: {id}
        })
       }
   }
}
</script>


