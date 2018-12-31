<template>
    <v-container fluid>
        <v-form @submit.prevent="ask">
            <v-text-field
                v-model="form.title"
                label="Title"
                type="text"
                required
            ></v-text-field>

            <v-autocomplete
        v-model="form.category_id"
        :items="categories"
        :readonly="false"
        :label="`Select Category`"
        item-text="name"
        item-value="id"
        persistent-hint
        autocomplete
      >
      </v-autocomplete>

      <markdown-editor preview-class="markdown-body" v-model="form.body"></markdown-editor>

            <v-btn
                color="green"
                type="Ask"
                class="white--text"
            >Create
            </v-btn>
        </v-form>
    </v-container>
</template>

<script>
export default {
    data(){
        return{
            form :{
                title:null,
                category_id:null,
                body:null,
                user_id:User.id()
            },
            categories:{},
            errors:{}
        }
    },
    created(){
        axios.get('/api/category')
        .then(res => this.categories = res.data.Categories)
    },
    methods:{
        ask(){
            axios.post('/api/question', this.form)
            .then(res =>  this.$router.push(res.data.path))
            .catch(error => this.errors = error.response.data.errors)
        }
    }

}
</script>

<style>

</style>
