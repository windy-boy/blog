<template>
<div class="wall-wrapper" ref="wc">
  <div class="wall">
    <div class="header"></div>
    <div class="link">
      <div class="link-item">
        <router-link to="/near"  @click.native="emitData(1)">
          <span class="txt">莲花祈愿</span>
          <span class="num">4082人</span>
        </router-link>
      </div>
       <div class="link-item">
        <router-link to="/near" @click.native="emitData(2)">
          <span class="txt">附近祈愿</span>
          <span class="num">2106人</span>
        </router-link>
      </div>
       <div class="link-item">
        <router-link to="/near"  @click.native="emitData(3)">
          <span class="txt">祈愿活动</span>
          <span class="num">11人</span>
        </router-link>
      </div>
    </div>
    <div class="wall-tab">
      <div class="tab-item">
        <span @click="changeNews" style="display: inline-block; width: 60px; height: 100%;">最新</span>
      </div>
      <div class="tab-item">
        <span @click="changeHots" style="display: inline-block; width: 60px; height: 100%;">热门</span>
      </div>
    </div>
    <ul class="wall-content" v-show="type == true">
      <li v-for="(item,index) in wallData"
        :key="index" class="wall-list">
        <news :item="item"></news>
      </li>
    </ul>
    <ul class="wall-content" v-show="type == false">
      <li v-for="(item,index) in hotsData.list"
        :key="index" class="wall-list">
        <hots :item="item"></hots>
      </li>
    </ul>
  </div>
  <div class="show" :class="{'active' : showFn == true}">祈愿墙</div>
</div>
</template>

<script type="text/ecmascript-6">
import BScroll from 'better-scroll'
import news from 'components/supplication/news'
import hots from 'components/supplication/hots'
const ERR_OK = 0
const debug = process.env.NODE_ENV !== 'production'
export default {
  data () {
    return {
      wallData: [],
      hotsData: {type: Number},
      showType: false,
      posev: 0,
      type: true
    }
  },
  created () {
    this.$nextTick(() => {
      // let screenY = window.outerHeight - 70
      // this.$refs.wc.style.height = screenY + 'px'
      if (!this.scroll) {
        this.scroll = new BScroll(this.$refs.wc, {click: true, probeType: 3})
      } else {
        this.scroll.refresh()
      }
      this.scroll.on('scroll', (pos) => {
        this.scrollY = Math.round(pos.y)
        this.posev = this.scrollY
      })
    })
    // this.$http.get('/api/wallData')
    const url = debug ? 'api/wallData' : 'https://raw.githubusercontent.com/windy-boy/chenjiancong/master/supplication.json'
    this.$http.get(url)
      .then((response) => {
        response = response.body
        if (response.result === ERR_OK) {
          this.wallData = response.data
        }
      })
    // this.$http.get('/api/hots')
    const hotsUrl = debug ? 'api/hots' : 'https://raw.githubusercontent.com/windy-boy/chenjiancong/master/hots.json'
    this.$http.get(hotsUrl)
      .then((response) => {
        response = response.body
        if (response.result === ERR_OK) {
          this.hotsData = response.data
        }
      })
  },
  computed: {
    showFn () {
      if (this.posev < -45) {
        return true
      } else {
        return false
      }
    }
  },
  methods: {
    changeNews () {
      this.type = true
    },
    changeHots () {
      this.type = false
    },
    emitData (data) {
      this.$store.commit('changeFN', data)
    }
  },
  components: {
    news,
    hots
  }
}
</script>

<style lang="stylus">
.header
  width: 100%;
  height: 170px;
  background: #7AD1D8;
  z-index: 100;
&.wall
  width: 100%;
  height: auto;
&.wall-wrapper
  width: 100%;
  height: 92%;
  position: absolute;
  bottom: 8%;
  left: 0;
  .show
    &.active
      width: 100%;
      height: 40px;
      line-height: 40px;
      text-align: center;
      background: #7AD1D8;
      color: #fff
      position: fixed;
      top: 0;
      left: 0;
      /*opacity: 1
    &.fade-enter-active,&.fade-leave-active
      transition: all 1s linear
      opacity: 0.5
    &.fade-enter,&.fade-leave-active
      opacity: 0*/
.link
  width: 100%;
  height: 56px;
  margin-top: 18px;
  display: flex;
  .link-item
    flex: 1;
    text-decoration: none;
    text-align: center;
    & > a
      display: flex;
      flex-direction: column
      .txt
        color: #000;
        display:inline-block;
        width: 100%;
        height: 28px;
        line-height: 28px;
      .num
        color: #ccc
        display: inline-block
        width: 100%;
        height: 28px;
        line-height: 28px;
.wall-tab
  width: 100%;
  height: 47px;
  line-height: 47px;
  margin-top: 38px;
  display: flex;
  .tab-item
    flex: 1;
    text-align:center
    & > span
      color:#ccc;
.wall-content
  width: 100%;

</style>
