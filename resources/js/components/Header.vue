<template>
<nav class="navbar navbar-expand-lg navbar-light bg-light headerNav">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <router-link v-bind:to="{name:'Home'}" class="nav-link">Home</router-link>
      </li>
      <li class="nav-item">
       <router-link v-bind:to="{name:'About'}" class="nav-link">About</router-link>
      </li>
      <li class="nav-item">
       <router-link v-bind:to="{name:'User'}" class="nav-link">User</router-link>
      </li>
    </ul>
 
  </div>
</nav>
</template>
