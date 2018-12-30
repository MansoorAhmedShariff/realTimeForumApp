<template>
    <v-container fluid grid-list--md>
        <v-layout row wrap>
            <v-flex xs8>
                <question
                class="mb-4"
                v-for="question in questions"
                :key="question.id"
                :question=question></question>
                <v-spacer></v-spacer>
            </v-flex>
            <v-flex xs1>
            </v-flex>
                Sidebar Here
        </v-layout>
    </v-container>
</template>

<script>

import question from './Question'
export default {
    data(){
        return{
            questions:{}
        }
    },
    components:{question},
    created(){
        axios.get('api/question')
        .then(res => this.questions = res.data.Questions)
        .catch(error => console.log(error.response.data))
    }

}
</script>

<style>

</style>
