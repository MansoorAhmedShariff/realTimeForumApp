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
        v-for="(reply,index) in replies" 
        :key="reply.id" 
        v-if="replies"
        :index=index
        :reply="reply"></reply>
        </v-card>
        </div>
</template>

<script>
import Reply from './Reply'
export default {
    props:['replies', 'QID'],
    components:{Reply},
    data(){
        return{
            content:this.replies,
            QuestionID:this.QID
        }
    },
    watch: {
    replies (n, o) {
      //console.log(n,o) // n is the new value, o is the old value.
      //console.log(n.user_id);
      this.content = n;
    },
    QID(n,o){
        this.QuestionID = n;
    }
  },
    created(){
        this.listen()

        Echo.channel('ReplyChannel')
        .listen('ReplyEvent', (e) => {
            console.log(e);
            if(e.type == 1){
                if(this.QuestionID == e.reply.question_id){
                    this.replies.push(e.reply)
                }
            }
            else if(e.type == 0){
                for(let index = 0; index<this.content.length; index++){
                    if(this.content[index].id == e.reply){
                        this.content.splice(index, 1)
                    }
                }
            }
        });
    },
    methods:{
        listen(){
            EventBus.$on('newReply', (reply) =>{
                this.replies.push(reply)
            })

            EventBus.$on('deleteReply', (index) =>{
                //console.log('/api/question/'+this.QuestionID+'/reply/'+this.replies[index].id);
                axios.delete('/api/question/'+this.QuestionID+'/reply/'+this.replies[index].id)
                .then(res => {
                    this.replies.splice(index, 1)
                })
            })
        }
    }

}
</script>

<style>

</style>
