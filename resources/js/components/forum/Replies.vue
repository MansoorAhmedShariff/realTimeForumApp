<template>
<div>
        <v-toolbar color="red"
        class="white--text">
            <v-toolbar-title>
                Replies
            </v-toolbar-title>
        </v-toolbar>
        <reply
        v-for="reply in replies" 
        :key="reply.id" 
        v-if="replies"
        :reply="reply"></reply>
        </div>
</template>

<script>
import Reply from './Reply'
export default {
    props:['replies'],
    components:{Reply}

}
</script>

<style>

</style>
