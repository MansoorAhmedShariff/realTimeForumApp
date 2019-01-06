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
            }
        }
    },
    props:['questionID'],
    methods:{
        submit(){
            axios.post('/api/question/'+this.questionID+'/reply', this.form)
            .then(res => {
                console.log(res.data.reply)
                this.form.body=''
                EventBus.$emit('newReply', res.data.reply)
            })
            
        }
    }
}
</script>

<style>

</style>
