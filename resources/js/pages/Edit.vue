<template>

<div class="container-fluid">
    <h3 class="text-center">Edit Data</h3>
    <form @submit.prevent="handleUpdate">
    <div class="form-group">
        <label>Name</label>
        <input type="text" v-model="user.name" class="form-control">  
         <!--Saat dicheck di console, properti errors berbentuk array, jadi tambahkan [0]  -->
         <div class="error text-danger" v-if="errors.name">{{ errors.name[0] }}</div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" v-model="user.email" class="form-control">   
         <!--Saat dicheck di console, properti errors berbentuk array, jadi tambahkan [0]  -->
         <div class="error text-danger" v-if="errors.email">{{ errors.email[0] }}</div>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
    <router-link :to="{name:'User'}" class="btn btn-warning">Back</router-link>
    </form>
</div>
    
</template>

<script>
export default{
    props:["id"],
    data(){
        return {
            user:{
                name:'',
                email:''
            },
            errors:{

            }
        }
    },
    methods:{
       handleUpdate(){
           axios.put('/api/users/'+this.id, this.user).then((response)=>{
               if(response.data.status){
                   console.info(response);
                   this.$noty.success(response.data.message);

                    this.$router.push({
                        name:'User'
                    });
               }
           }).catch((err)=>{
            console.info('Status:' +err.response.status);
            console.info(err.response.data);
            console.info(err.response.data.message);  
            
            if(err.response.status == 403){
                this.errors = err.response.data.message;
            }
               
           })
       },
       getUser(){
           axios.get('/api/users/'+this.id).then((response)=>{
               console.info('ID:' + this.id);
               this.user={
                   name: response.data.name,
                   email: response.data.email
               };
           })
       }
   },
   mounted(){
       this.getUser();
   }
}
</script>

<style>
    .form-group{
        margin-bottom:5px;
    }
</style>