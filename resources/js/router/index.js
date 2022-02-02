// Tempat routing

// Hapus window.vue = require('vue'); karena kita bisa pakai import
import Vue from 'vue';


import VueRouter from 'vue-router';
Vue.use(VueRouter);

// Tambahkan default untuk default views dalam bentuk vue
// Karena kita ada di router/index.js, maka tambahin tanda ../pages/Home untuk lari ke pages/Home
// Kalau cuma ./pages/Home, akan error karena kita tidak ada di folder pages, tapi folder router. Jadi tanda .. untuk bawa kita keluar dari folder
const home = require('../pages/Home.vue').default;
const about = require('../pages/About.vue').default;

// const notFound = require('./pages/notFound').default;
import notFound from '../pages/notFound.vue';
import user from '../pages/User.vue';
import profile from '../pages/Profile.vue';
import register from '../pages/Register.vue';
import editUser from '../pages/Edit.vue';
import uploadPhoto from '../pages/UploadFoto.vue';

const routes =[
	{
		name:'Home',
		path:'/home',
		component:home
	},
	{
		name:'About',
		path:'/about',
		component:about
	},
    {
        // Tampilkan daftar user dari segi nama. Tapi jangan lupa atur di router juga
        // Tanda tanya di path untuk render daftar user atau profile pribadi
		name:'User',
        path:'/user',
        component: user,
    },
	{
		name:'Register',
		path:'/user/create',
		component:register
	},
	{
		name:'Profile',
        path:'/user/:id',
        component: profile,
		props:true
    },
	{
		name:'Upload',
        path:'/user/:id/photo',
        component: uploadPhoto,
		props:true
    },
	{
		name:'Edit',
        path:'/user/:id/edit',
        component: editUser,
		props:true
    },
	{
		path:'*',
		component: notFound
	}
];

// Kalau tidak pakai mode:'history', nanti tidak akan jalan krna tanda # menempel
// Disini juga kita bisa tambahin class. Ntar diatur di sass/app.scss
const router = new VueRouter({
	linkActiveClass: 'activeLink',
	mode:'history',
	routes
});

export default router;