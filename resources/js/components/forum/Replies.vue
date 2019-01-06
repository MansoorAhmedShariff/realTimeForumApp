<template>
<div>
        <v-toolbar color="red"
        class="white--text">
            <v-toolbar-title>
                Replies
            </v-toolbar-title>
        </v-toolbar>
        <v-card color="teal darken-3">
        <reply
        v-for="reply in replies" 
        :key="reply.id" 
        v-if="replies"
        :reply="reply"></reply>
        </v-card>
        </div>
</template>

<script>
import Reply from './Reply'
export default {
    props:['replies'],
    components:{Reply},
    data(){
        return{
            content:this.replies
        }
    },
    watch: {
    replies (n, o) {
      //console.log(n,o) // n is the new value, o is the old value.
      //console.log(n.user_id);
      this.content = n;
      
    }
  },
    created(){
        this.listen()
    },
    methods:{
        listen(){
            EventBus.$on('newReply', (reply) =>{
                this.replies.push(reply)
            })
        }
    }

}
</script>

<style>

</style>
