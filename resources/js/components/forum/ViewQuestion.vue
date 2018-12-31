<template>
    <show-question
    :question = questions
    ></show-question>
</template>

<script>
import ShowQuestion from './ShowQuestion'
export default {
    components:{ShowQuestion},
    data(){
        return{
            questions:{}
        }
    },
    created(){
        axios.get('/api/question/'+this.$route.params.id)
        .then(res => this.questions = res.data.Question)
        .catch(error => console.log(error.response.data))
    }
    

}
</script>

<style>

</style>
