<template>
<div>
    <h3 class="text-center">Upload Image</h3>
    <img :src="previewImage">
    <div class="input-group">
        <input type="file" name="photo" @change="upload">
    </div>
    <button class="btn btn-info mt-2">Upload</button>
</div>
</template>

<script>
export default{
    props:['id'],
    data(){
        return{
            previewImage: null
        }
    },
    methods:{
        upload(e){
            let files = e.target.files[0];
            this.previewImage = URL.createObjectURL(files);
            console.info(files);
        }
    }
}
</script>