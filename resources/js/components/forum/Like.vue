<template>
    <div>
        <v-btn icon small class="mr-1" @click="like">
                    <v-icon color="grey">thumb_up_alt</v-icon>
                </v-btn>
          <span class="subheading mr-2 black--text">0</span>
    </div>
</template>

<script>
export default {
    data(){
        return{
            liked:false
        }
    },
    methods:{
        like(){
            
        }
    }

}
</script>

<style>

</style>
