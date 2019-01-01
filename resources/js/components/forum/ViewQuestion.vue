<template>
<div>
    <edit-question v-if="editing"
    :question = questions>
    </edit-question>
    <div v-else>
    <show-question
        :question = questions
    ></show-question>
    </div>
</div>
</template>

<script>
import EditQuestion from './EditQuestion'
import ShowQuestion from './ShowQuestion'
export default {
    components:{ShowQuestion, EditQuestion},
    data(){
        return{
            questions:{},
            editing:false
        }
    },
    created(){
        this.editListen()
        this.getQuestion()
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
            .then(res => this.questions = res.data.Question)
            .catch(error => console.log(error.response.data))
        }
    }
    

}
</script>

<style>

</style>
