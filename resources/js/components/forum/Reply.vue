<template>
    <div>
        <v-card color="teal darken-3">
            <v-card-title>
                <v-card
            style="position: relative">
              <v-layout>
                <v-flex>
                  <v-card-title primary-title>
                    <div>
                        <v-layout mb-2>
                      <div>{{reply.body}}</div>
                        </v-layout>
                      <v-divider></v-divider>
                      <v-layout mt-2 fill-height>
                          <v-card-actions  v-if="own">
                <v-btn icon small>
                    <v-icon color="black">edit</v-icon>
                </v-btn>
                 <v-btn icon small>
                    <v-icon color="red">delete</v-icon>
                </v-btn>
            </v-card-actions>
            <v-spacer></v-spacer>
                      <div class="grey--text">{{reply.user}} said {{reply.created_at}}</div>
                      </v-layout>
                    </div>
                  </v-card-title>
                </v-flex>
              </v-layout>
              
            </v-card>
            </v-card-title>
        </v-card>
    </div>
</template>

<script>
export default {
    props:['reply'],
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

}
</script>

<style>

</style>
