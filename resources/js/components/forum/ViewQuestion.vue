<template>
<div>
    <edit-question v-if="editing"
    :question = question>
    </edit-question>
    <div v-else>
    <show-question
        :question = question
    ></show-question>
    <v-container>
    <replies :replies="question.replies"
    :QID="question.id"></replies>
    <new-reply v-if="loggedIn" :questionID="question.id" :userID="question.user_id"></new-reply>
    <div class="mt-4" v-else>
        <router-link to="/login">Please Login To Reply</router-link>
    </div>
    </v-container>
    </div>
</div>
</template>

<script>
import EditQuestion from './EditQuestion'
import ShowQuestion from './ShowQuestion'
import Replies from './Replies'
import NewReply from './NewReply'
export default {
    components:{ShowQuestion, EditQuestion, Replies, NewReply},
    data(){
        return{
            question:{},
            editing:false
        }
    },
    created(){
        this.editListen()
        this.getQuestion()
    },
    computed:{
        loggedIn(){
            return User.loggedIn()
        }
    },
    methods:{
        editListen(){
            EventBus.$on('startEditing', ()=>{
                this.editing = true
            })
            EventBus.$on('cancelEditing', ()=>{
                this.editing = false
            })
        },
        getQuestion(){
            axios.get('/api/question/'+this.$route.params.id)
            .then(res => this.question = res.data.Question)
            .catch(error => console.log(error.response.data))
        }
    }
    

}
</script>

<style>

</style>
