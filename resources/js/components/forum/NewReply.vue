<template>
    <div class="mt-4">
        <markdown-editor preview-class="markdown-body" v-model="form.body"></markdown-editor>

            <v-btn
                color="green"
                class="white--text"
                @click="submit"
            >Reply
            </v-btn>
    </div>
</template>

<script>
export default {
    data(){
        return{
            form:{
                body:null,
                user_id: User.id(),
                question_id:this.questionID
            },
            notitfys:{
                type: "App\\Notifications\\NewReply",
                notifiable_type: "App\\User",
                user_id: this.userID,
                data: null
            }
        }
    },
    props:['questionID', 'userID'],
    methods:{
        submit(){
            this.notitfys.data = '{"replyBy":"'+User.name()+'","question":"'+this.form.body+'","path":"'+this.questionID+'"}';
            axios.post('/api/question/'+this.questionID+'/reply', this.form)
            .then(res => {
                console.log(res.data.reply);
                this.form.body='';
                EventBus.$emit('newReply', res.data.reply);

                this.notify()
            })
            /* console.log(this.form) console.log(this.notitfys); */
        },
        notify(){
                axios.post('/api/notify', this.notitfys)
                .then(res => {
                    console.log(res);
                })
        }
    },
    watch: {
    questionID (n, o) {
      //console.log(n,o) // n is the new value, o is the old value.
      //console.log(n.user_id);
      this.form.question_id = n;
      this.notitfys.data.path = n;
    },
    userID(n,o){
        this.notitfys.user_id = n;
    }
  }
}
</script>

<style>

</style>
