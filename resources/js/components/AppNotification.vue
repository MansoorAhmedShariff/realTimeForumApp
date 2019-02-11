<template>
    <div class="text-xs-center">
        <v-menu
      bottom
      origin="center center"
      transition="scale-transition"
    >

      <v-btn icon class="mr-1"  slot="activator">
                    <v-icon color="white" class="white--text">notification_important</v-icon> {{unread_count}}
                </v-btn>

      <v-list>
        <v-list-tile v-for="item in unread" :key="item.id">
          <v-list-tile-title>{{item.data.question}}</v-list-tile-title>
        </v-list-tile>
        <v-divider></v-divider>
        <v-list-tile v-for="item in read" :key="item.id">
          <v-list-tile-title>{{item.data.question}}</v-list-tile-title>
        </v-list-tile>
      </v-list>
    </v-menu>
    </div>
</template>

<script>
export default {
    data(){
        return{
            read : {},
            unread : {},
            unread_count : 0,
            User_Id : User.id()
        }
    },
    created(){
        if(User.loggedIn()){
            this.getNotifications();
        }
    },
    methods:{
        getNotifications(){
            axios.get('/api/notif/'+this.User_Id)
            .then(res => {
                this.read = res.data.Read;
                this.unread = res.data.Unread;
                this.unread_count = res.data.Unread.length
            })
        }
    }

}
</script>

<style>

</style>
