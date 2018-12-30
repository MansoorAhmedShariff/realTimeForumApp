<template>
<v-container fluid>
<div>
    <toolbar></toolbar>
    <router-view></router-view>
</div>
    <app-footer bottom absolute></app-footer>
</v-container>
</template>


<script>
import Toolbar from './Toolbar'
import AppFooter from './AppFooter'

export default {
        components:{Toolbar, AppFooter}
    }
</script>

<style>

</style>
