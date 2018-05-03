import Vue from 'vue'
import Router from 'vue-router'
import wcSwiper from 'wc-swiper'
import 'wc-swiper/style.css'
import test from 'components/test/test'
import wall from 'components/wall/wall'
import friends from 'components/friends/friends'
import mine from 'components/mine/mine'
import near from 'components/wall/near'
import lotus from 'components/wall/lotus'
import activity from 'components/wall/activity'

Vue.use(Router)
Vue.use(wcSwiper)

export default new Router({
  linkActiveClass: 'active',
  routes: [
    {
      path: '/',
      redirect: '/test'
    },
    {
      path: '/test',
      component: test
    },
    {
      path: '/friends',
      component: friends
    },
    {
      path: '/wall',
      component: wall
    },
    {
      path: '/mine',
      component: mine
    },
    {
      path: '/near',
      component: near
    },
    {
      path: '/lotus',
      component: lotus
    },
    {
      path: '/activity',
      component: activity
    }
  ]
})
