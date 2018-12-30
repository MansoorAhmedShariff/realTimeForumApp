<template>
  <v-toolbar color="red darken-1" class="white--text">
    <!-- <v-toolbar-side-icon></v-toolbar-side-icon> -->
    <v-toolbar-title>RealTime Forum</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <router-link 
      class="white--text"
      v-for="item in items"
      :key="item.title"
      :to="item.to"
      v-if="item.show">
        <v-btn flat>{{item.title}}</v-btn>
      </router-link>
    </div>
  </v-toolbar>
</template>

<script>
export default {
  data(){
    return{
      items:[
        {title : 'Forum', to: '/forum', show: true},
        {title : 'Ask Question', to: '/ask', show: User.loggedIn()},
        {title : 'Category', to: '/category', show: User.loggedIn()},
        {title : 'Login', to: '/login', show: !User.loggedIn()},
        {title : 'Logout', to: '/logout', show: User.loggedIn()}
      ]
    }
  },
  created(){
    EventBus.$on('logout', () => {
      User.logout()
    })
  }
}
</script>

<style>

</style>
