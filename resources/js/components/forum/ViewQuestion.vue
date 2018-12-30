<template>
    <show-question
    :question = question
    ></show-question>
</template>

<script>
import ShowQuestion from './ShowQuestion'
export default {
    components:{ShowQuestion},
    data(){
        return{
            question:{}
        }
    },
    created(){
        console.log('/api/question/'+this.$route.params.id)
        axios.get('/api/question/'+this.$route.params.id)
        .then(res => this.question = res.data.Question)
        .catch(error => console.log(error.response.data))
    }

}
</script>

<style>

</style>
