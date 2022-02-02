<template>
<div>
    <h3 class="text-center">Upload Image</h3>
    <img :src="previewImage" width="100">
    <div class="input-group">
        <input type="file" name="photo" @change="upload">
    </div>
    <!-- Tambahin colom dengan perintah php artisan make:migration add_column_photo_to_user_table --table=users -->
    <button @click="submit" class="btn btn-info mt-2" >Upload</button>
</div>
</template>

<script>
export default{
    props:['id'],
    data(){
        return{
            previewImage: null,
            photo:null
        }
    },
    methods:{
        upload(e){
            let files = e.target.files[0];
            this.previewImage = URL.createObjectURL(files);
            this.photo = files;
        },
          submit(){
            let formData = new FormData();
            formData.append('photo', this.photo);

            axios.post('/api/users/photo/'+this.id, formData)
            .then((response)=>{
                if(response.data.status){
                    this.$noty.success(response.data.message);
                    this.$router.push({
                        // Di name profilenya punya props id
                        name:'Profile',
                        params:{id:this.id}
                    })
                }
            });
        }
    }
}
</script>