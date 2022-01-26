<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div>
                    <!-- Ada nilai? Ini sudah diwakili props -->
                    <section v-if="username">
                        <!-- Untuk tangkap nama dengan $router.params.name -->
                        <h1>Hello, {{ username }}</h1>
                        <router-link :to="{name:'User'}">Back</router-link>
                    </section>
                    <!-- Gak cocok? Perlihatkan semua usernya -->
                    <section v-else>
                        <h1>Daftar nama</h1>
                        <ul>
                            <li v-for="user in users">
                                <!-- Mirip function parameter di profile_url(user.name) -->
                                <!-- Di bawahnya ada methods untuk mengisi parameter profile_url(name) -->
                              <!-- <router-link :to="profile_url(user.name)">{{user.name}}</router-link> -->

                              <!-- Coba pakai router push -->
                              <a href="" @click="lihatUser(user.name)">{{ user.name }}</a>
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
   props: ['username'],
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
        axios
        .get('/api/users')
        .then((response)=>{
            this.users = response.data;
            console.info(response);
        })
    },
    methods:{
       profile_url(name){
           return '/user/'+name.toLowerCase()
       },
    //    Push router
       lihatUser(name){
        //   router.push('/user/'+name.toLowerCase());
        this.$router.push({
            name:'User',
            params: {username:name}
        })
       }
   }
}
</script>


