<template>
  <v-toolbar color="red" class="white--text">
    <!-- <v-toolbar-side-icon></v-toolbar-side-icon> -->
    <v-toolbar-title>RealTime Forum</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <router-link
      class="red--text"
      v-for="item in items"
      :key="item.title"
      :to="item.to"
      v-if="item.show">
        <v-btn flat class="white--text">{{item.title}}</v-btn>
      </router-link>
    </div>
    <app-notification v-if="loggedIn"></app-notification>
  </v-toolbar>
</template>

<script>
import AppNotification from './AppNotification'
export default {
  components:{
    AppNotification
  },
  data(){
    return{
      loggedIn: User.loggedIn(),
      items:[
        {title : 'Forum', to: '/forum', show: true},
        {title : 'Ask Question', to: '/ask', show: User.loggedIn()},
        {title : 'Category', to: '/category', show: User.admin()},
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
