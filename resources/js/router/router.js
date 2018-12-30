import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Login from '../components/login/Login'
import SignUp from '../components/login/SignUp'
import Forum from '../components/forum/Forum'
import ViewQuestion from '../components/forum/ViewQuestion'
import Logout from '../components/login/Logout'

const routes = [
    { path: '/login', component: Login },
    { path: '/logout', component: Logout },
    { path: '/signup', component: SignUp },
    { path: '/forum', component: Forum, name: 'forum' },
    { path: '/question/:id', component: ViewQuestion, name: 'viewQuestion' }
  ]
  

  const router = new VueRouter({
    routes,
    hashbang : false,
    mode : 'history'
  })

  export default router