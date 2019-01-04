<template>
    <v-container fluid>
        <v-form @submit.prevent="add">
            <v-text-field
                v-model="form.name"
                label="Name"
                required
            ></v-text-field>

             <v-btn
             v-if="editID"
                color="blue"
                type="submit"
                class="white--text"
            >Update
            </v-btn>
             <v-btn
             v-else
                color="green"
                type="submit"
                class="white--text"
            >Create
            </v-btn>
        </v-form>
<v-card>
    <v-toolbar color="teal darken-3"
        class="white--text">
            <v-toolbar-title>
                Categories
            </v-toolbar-title>
        </v-toolbar>
        <v-list>
            <div v-for="(category, index) in categories" :key="category.id">
                <v-list-tile>
                    <v-list-tile-action>
                        <v-btn icon small>
                            <v-icon color="black" @click="edit(index)">
                                edit
                            </v-icon>
                        </v-btn>
                    </v-list-tile-action>

                        <v-list-tile-content>
                            <v-list-tile-title class="black--text">
                                {{category.name}}
                            </v-list-tile-title>
                        </v-list-tile-content>

                    <v-list-tile-action>
                        <v-btn icon small @click="destroy(category.id, index)">
                            <v-icon color="red">
                                delete
                            </v-icon>
                        </v-btn>
                    </v-list-tile-action>


                </v-list-tile>
            </div>
        </v-list>
</v-card>
    </v-container>
</template>

<script>
export default {
    data(){
        return{
            form:{
                name:null
            },
            categories:{},
            editID: null
        }
    },
    created(){
        if(!User.admin){
            this.$router.push('/forum')
        }
         axios.get('api/category')
        .then(res => this.categories = res.data.Categories)
    },
    methods:{
        add(){
            this.editID ? this.update() : this.create()
        },
        create(){
            axios.post('/api/category', this.form)
            .then(res =>  {
                this.categories.unshift(res.data)
                this.form.name = null
                this.editID = null
            })
        },
        update(){
            axios.patch('/api/category/'+this.editID, this.form)
            .then(res =>  {
                this.categories.unshift(res.data)
                location.reload();
            })
        },
        destroy(id, index){
            axios.delete('api/category/'+id)
            .then(res => this.categories.splice(index, 1))
        },
        edit(index){
            this.form.name = this.categories[index].name
            this.editID = this.categories[index].id
            this.categories.splice(index, 1)

        }
    }

}
</script>

<style>

</style>
