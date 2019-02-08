<template>
    <div>
        <v-btn icon small class="mr-1" @click="like">
                    <v-icon :color="color">thumb_up_alt</v-icon>
                </v-btn>
          <span class="subheading mr-2 black--text">{{count}}</span>
    </div>
</template>

<script>
export default {
    props:['data'],
    data(){
        return{
            liked:this.data.liked,
            count:this.data.like_count,
            u_id: User.id(),
            form:{
                user_id: User.id()
            }
        }
    },
    computed:{
        color(){
            return this.liked ? 'red' : 'grey';}
    },
    methods:{
        like(){
            if(User.loggedIn()){
                this.liked ? this.decrement() : this.increment()
                this.liked = !this.liked
            }
        },
        increment(){
            axios.post('/api/like/'+this.data.id, this.form)
            .then(this.count ++)
        },
        decrement(){
            axios.delete('/api/like/'+this.data.id+'?user_id='+this.u_id)
            .then(this.count --)
        }
    }

}
</script>

<style>

</style>
