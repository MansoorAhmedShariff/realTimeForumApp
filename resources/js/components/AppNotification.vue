<template>
    <div class="text-xs-center">
        <v-menu
      bottom
      origin="center center"
      transition="scale-transition"
    >

      <v-btn icon class="mr-1"  slot="activator">
                    <v-icon :color="color" class="white--text">notification_important</v-icon> {{unread_count}}
                </v-btn>


        <v-list v-if="unread_count>0 || read_count>0">
            <v-list-tile color="red" v-if="unread_count>0">
            <v-list-tile-title>Unread ({{unread_count}})</v-list-tile-title>
        </v-list-tile> 
        <v-divider></v-divider>
        <v-card class="d-inline-block elevation-12">
        <v-list dense>
          <v-list-tile v-for="item in unread" :key="item.id" v-if="unread_count>0" >
              <div>
            <router-link :to="item.path">
                    <v-list-tile-title @click="markAsRead(item)">{{ item.data.substring(0, 30) }}...</v-list-tile-title>
        </router-link>
        <v-list-tile-sub-title class="text--primary">said {{ item.name }}</v-list-tile-sub-title>
        <v-divider></v-divider>
        </div>
          </v-list-tile>
        </v-list>
    </v-card>

        <v-divider></v-divider>

        <v-list-tile color="green" v-if="read_count>0">
            <v-list-tile-title>Read ({{read_count}})</v-list-tile-title>
        </v-list-tile> 
        <v-divider></v-divider>
        <v-card class="d-inline-block elevation-12">
        <v-list dense>
          <v-list-tile v-for="item in read" :key="item.id" v-if="read_count>0" >
              <div>
            <router-link :to="item.path">
                    <v-list-tile-title>{{ item.data.substring(0, 30) }}...</v-list-tile-title>
        </router-link>
        <v-list-tile-sub-title class="text--primary">said {{ item.name }}</v-list-tile-sub-title>
        <v-divider></v-divider>
        </div>
          </v-list-tile>
        </v-list>
    </v-card>
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
            read_count : 0,
            User_Id : User.id(),
            data : null,
            form :{
            read_at : "1"}
        }
    },
    created(){
        if(User.loggedIn()){
            this.getNotifications();
        }

        Echo.channel('NotifChannel')
        .listen('NotifEvent', (e) => {
            //console.log(e, "Notification Check");
            //console.log(e.reply.question_owner_id, e.reply.user_id);

            if(this.User_Id == e.notif.user_id){
                    console.log("Checking Notifs");
                    this.getNotifications()
                }
        });
    },
    methods:{
        getNotifications(){
            axios.get('/api/notif/'+this.User_Id)
            .then(res => {
                console.log("Getting Notifications");
                
                this.read = res.data.Read.reverse();
                this.read_count = res.data.Read.length;
                this.unread = res.data.Unread.reverse();
                this.unread_count = res.data.Unread.length;
            })
        },
        markAsRead(notification){
            console.log('/api/notifyupdate/'+notification.id)
            axios.post('/api/notifyupdate/'+notification.id, this.form)
            .then(res => {
                this.unread.splice(notification,1)
                this.read.push(notification)
                this.unread_count--
            })
        }
    },
    computed:{
        color(){
            return this.unread_count > 0 ? 'teal lighten-2' : 'white' 
        }
    }

}
</script>

<style>

</style>
