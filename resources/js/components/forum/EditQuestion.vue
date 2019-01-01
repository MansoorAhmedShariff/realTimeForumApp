<template>
<v-container fluid>
    
        <v-spacer></v-spacer>
<v-card color="white"
            class="white--text"
            style="position: relative">
    <v-container fluid>
        <v-form @submit.prevent="update">
            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
            ></v-text-field>

            <markdown-editor preview-class="markdown-body" v-model="form.body"></markdown-editor>
        
        <v-card-actions>
                <v-btn icon small @click="cancel">
                    <v-icon color="red">cancel</v-icon>
                </v-btn>
                 <v-btn icon small type="submit">
                    <v-icon color="light-blue darken-1">save</v-icon>
                </v-btn>
            </v-card-actions>
        </v-form>
        
    </v-container>
</v-card>
</v-container>
</template>

<script>
export default {
    props:['question'],
    data(){
        return{
            form:{
                title: null,
                body: null
            }
        }
    },
    methods:{
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch('/api/question/'+this.question.id, this.form)
            .then(res => this.cancel())
        } 
    },
    created(){
        this.form = this.question
        //this.form.title = this.question.title
        //this.form.body = this.question.body
    }
}
</script>

<style>

</style>
