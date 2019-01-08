<template>
<v-container>
    <v-card
    class="mx-auto"
    color="white"
  >

    <edit-reply :reply=reply v-if="editing"></edit-reply>
    <v-card-text v-else class="title black--text">
      {{reply.body}}
    </v-card-text>

    <v-card-title class="black--text">
      <span>{{reply.user}} said {{reply.created_at}}</span>
    </v-card-title>

    <v-card-actions v-if="!editing">
      <v-list-tile class="grow">

        <v-card-actions  v-if="own">
                <v-btn icon small @click="update">
                    <v-icon color="black">edit</v-icon>
                </v-btn>
                 <v-btn icon small @click="destroy">
                    <v-icon color="red">delete</v-icon>
                </v-btn>
            </v-card-actions>

        <v-layout
          align-center
          justify-end
        >
          <like v-if="!own"></like>
        </v-layout>
      </v-list-tile>
    </v-card-actions>
  </v-card>
  </v-container>
</template>

<script>
import EditReply from './EditReply'
import Like from './Like'
export default {
    props:['reply', 'index'],
    data(){
        return{
            own : User.own(this.reply.user_id),
            editing:false
        }
    },
    components:{EditReply, Like},
    watch: {
    reply (n, o) {
      //console.log(n,o) // n is the new value, o is the old value.
      //console.log(n.user_id);
      this.own = User.own(n.user_id);
    }
  },
  created(){
      this.listen()
  },
  methods:{
      destroy(){
          EventBus.$emit('deleteReply', this.index)
      },
      update(){
          this.editing = true
          //EventBus.$emit('editReply', this.index)
      },
      listen(){
        EventBus.$on('cancelEditing', ()=>{
            this.editing = false
        })
      }
  }

}
</script>

<style>

</style>
