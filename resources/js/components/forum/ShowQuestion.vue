<template>
<v-container fluid>
<v-card color="teal darken-3"
            class="white--text"
            style="position: relative">
              <v-layout>
                <v-flex>
                  <v-card-title primary-title>
                    <div>
                      <div class="headline">{{question.title}}</div>
                      <div class="grey--text">{{question.user}} said {{question.created_at}}</div>
                    </div>
                  </v-card-title>
                  <v-card-text v-html="question.body">                 </v-card-text>
                </v-flex>
              <v-btn dark color="red darken-1"
                absolute
                bottom
                right
                class="mb-1">
                  {{question.replies_count}} Replies
            </v-btn>
              </v-layout>
              
            </v-card>

            <v-card-actions v-if="own">
                <v-btn icon small @click="edit">
                    <v-icon color="black">edit</v-icon>
                </v-btn>
                 <v-btn icon small @click="destroy">
                    <v-icon color="red">delete</v-icon>
                </v-btn>
            </v-card-actions>
    </v-container>
</template>

<script>
export default {
    props:['question'],
    data(){
        return{
                own : User.own(this.question.id)
        }
    },
    watch: {
    question (n, o) {
      //console.log(n,o) // n is the new value, o is the old value.
      //console.log(n.user_id);
      this.own = User.own(n.user_id);
      
    }
  },
    created(){
        //console.log(this.own);
        
        //console.log(this.own)
        //console.log(this.question.body)
    },
    methods:{
        destroy(){
        axios.delete('/api/question/'+this.question.id)
        .then(res => this.$router.push('/forum'))
        .catch(error => console.log(error.response.data))
        },
        edit(){
            EventBus.$emit('startEditing')
        }
    },
    computed:{
        body(){
            return md.parse(this.question.body)
        }
    }
}
</script>

<style>

</style>
