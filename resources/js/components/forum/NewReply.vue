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
                data: null,
                name: User.name(),
                path: '/question/'+this.questionID
            },
            question_user_id : this.userID
        }
    },
    props:['questionID', 'userID'],
    methods:{
        submit(){
            axios.post('/api/question/'+this.questionID+'/reply', this.form)
            .then(res => {
                console.log(res.data.reply);
                this.notitfys.data = this.form.body;
                this.form.body='';
                EventBus.$emit('newReply', res.data.reply);

                this.notify()
            })
            /* console.log(this.form) console.log(this.notitfys); */
        },
        notify(){
            if(this.question_user_id != User.id()){
                axios.post('/api/notify', this.notitfys)
                .then(res => {
                    console.log(res);
                })
            }
        }
    },
    watch: {
    questionID (n, o) {
      //console.log(n,o) // n is the new value, o is the old value.
      //console.log(n.user_id);
      this.form.question_id = n;
      this.notitfys.path = '/question/'+n;
    },
    userID(n,o){
        this.notitfys.user_id = n;
        this.question_user_id = n;
    }
  }
}
</script>

<style>

</style>
