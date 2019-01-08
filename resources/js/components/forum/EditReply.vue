<template>
    <div>
        <markdown-editor preview-class="markdown-body" v-model="reply.body"></markdown-editor>
        <v-card-actions>
                <v-btn icon small @click="cancel">
                    <v-icon color="red">cancel</v-icon>
                </v-btn>
                 <v-btn icon small @click="save">
                    <v-icon color="light-blue darken-1">save</v-icon>
                </v-btn>
        </v-card-actions>
        
    </div>
</template>

<script>
export default {
    props:['reply'],
    methods:{
        save(){
            //console.log('/api/question/'+this.reply.question_id+'/reply/'+this.reply.id);
            //console.log({body:this.reply.body});
            
            axios.patch('/api/question/'+this.reply.question_id+'/reply/'+this.reply.id, {body:this.reply.body})
             .then(res => this.cancel())
        },
        cancel(){
            EventBus.$emit('cancelEditing')
        }
    }

}
</script>

<style>

</style>
