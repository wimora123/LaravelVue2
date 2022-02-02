<template>

<div class="container-fluid">
    <form @submit.prevent="handleSubmit">
    <div class="form-group">
        <label>Name</label>
        <input type="text" v-model="form.name" class="form-control">  
         <!--Saat dicheck di console, properti errors berbentuk array, jadi tambahkan [0]  -->
         <div class="error text-danger" v-if="errors.name">{{ errors.name[0] }}</div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" v-model="form.email" class="form-control">   
         <!--Saat dicheck di console, properti errors berbentuk array, jadi tambahkan [0]  -->
         <div class="error text-danger" v-if="errors.email">{{ errors.email[0] }}</div>
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" v-model="form.password" class="form-control">
         <!--Saat dicheck di console, properti errors berbentuk array, jadi tambahkan [0]  -->
         <div class="error text-danger" v-if="errors.password">{{ errors.password[0] }}</div>   
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
    
</template>

<script>
export default{
    data(){
        return {
            form:{
                name:'',
                email:'',
                password:''
            },
            errors:{

            }
        }
    },
    methods:{
       handleSubmit(){
           axios.post('/api/users', this.form).then((response)=>{
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
       }
   }
}
</script>

<style>
    .form-group{
        margin-bottom:5px;
    }
</style>