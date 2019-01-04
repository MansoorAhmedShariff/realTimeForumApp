<template>
    <v-card>
        <v-toolbar color="teal darken-3"
        class="white--text">
            <v-toolbar-title>
                Categories
            </v-toolbar-title>
        </v-toolbar>

        <v-list>
            <v-list-tile v-for="category in categories" :key="category.id">
                <v-list-tile-content>
                   <v-container fluid> <v-card color="red" class="white--text" ripple @click="test" > 
                       <div style="text-align:center" class="headline"> {{category.name}} </div>
                    
                    <div><v-divider></v-divider><v-spacer></v-spacer></div> </v-card> </v-container>
                </v-list-tile-content>
            </v-list-tile>
            
        </v-list>
    </v-card>
    
</template>

<script>
export default {
    data(){
        return{
            categories:{},
            color:this.randomColor
        }
    },
    created(){
        axios.get('api/category')
        .then(res => this.categories = res.data.Categories)
    },
    methods: {
        test(){

        }
  }

}
</script>

<style>

</style>
