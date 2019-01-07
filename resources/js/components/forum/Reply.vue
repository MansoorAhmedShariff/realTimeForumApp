<template>
<v-container>
    <v-card
    class="mx-auto"
    color="white"
  >

    <v-card-text class="title black--text">
      {{reply.body}}
    </v-card-text>

    <v-card-title class="black--text">
      <span>{{reply.user}} said {{reply.created_at}}</span>
    </v-card-title>

    <v-card-actions>
      <v-list-tile class="grow">

        <v-card-actions  v-if="own">
                <v-btn icon small>
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
          <v-btn icon small class="mr-1">
                    <v-icon color="grey">thumb_up_alt</v-icon>
                </v-btn>
          <span class="subheading mr-2 black--text">0</span>
        </v-layout>
      </v-list-tile>
    </v-card-actions>
  </v-card>
  </v-container>
</template>

<script>
export default {
    props:['reply', 'index'],
    data(){
        return{
            own : User.own(this.reply.user_id)
        }
    },
    computed:{
    },
    watch: {
    reply (n, o) {
      //console.log(n,o) // n is the new value, o is the old value.
      //console.log(n.user_id);
      this.own = User.own(n.user_id);
    }
  },
  methods:{
      destroy(){
          EventBus.$emit('deleteReply', this.index)
      }
  }

}
</script>

<style>

</style>
