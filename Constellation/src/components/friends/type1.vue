<template>
<transition>
<div style="background: #F5F5F5;height: 100%">
  <div class="wrapper">
    <div class="title">
      <ul>
        <li v-for="(title,key) in title"
          :key="key"
          @click="changeFn(key)">
          <span :class="{'active' : ind === key+1}">{{ title }}</span>
        </li>
      </ul>
    </div>
  </div>
  <div class="scroll-wrapper"
    v-show="ind === 1" ref="scroll">
    <div class="scroll">
      <div class="container"
        v-for="(content, index) in category.list"
        :key="index">
        <div class="content">
          <div class="left clearfix">
            <h1>{{ content.title }}</h1>
            <div class="text">{{ content.ext5 }}</div>
            <div class="time">{{ content.createtime | formatDate}}</div>
          </div>
          <div class="pic"><img :src="content.img"/></div>
        </div>
      </div>
    </div>
  </div>
  <div class="qiushi" v-show="ind == 2">
    <object type="text/x-scriptlet" width="100%" height="1000" data="https://www.qiushibaike.com/"></object>
  </div>
  <div class="kuaikan" v-show="ind == 3">
    <object type="text/x-scriptlet" width="100%" height="1000" data="http://m.kuaikanmanhua.com/"></object>
  </div>
</div>
</transition>
</template>

<script type="text/ecmascript-6">
import BScroll from 'better-scroll'
import { formatDate } from 'common/js/date'
const ERR_OK = 0
const debug = process.env.NODE_ENV !== 'production'
export default {
  data () {
    return {
      title: ['星座文章', '笑话段子', '漫画大全', '专家运势'],
      ind: 1,
      category: {
        type: Object
      }
    }
  },
  created () {
    this.$nextTick(() => {
      // var screenY = window.outerHeight - 218
      // this.$refs.scroll.style.height = screenY + 'px'
      if (!this.scroll) {
        this.scroll = new BScroll(this.$refs.scroll, {})
      }
      this.scroll.refresh()
    })
    // this.$http.get('/api/category')
    const url = debug ? '/api/category' : 'https://raw.githubusercontent.com/windy-boy/chenjiancong/master/category.json'
    this.$http.get(url)
      .then((response) => {
        response = response.body
        if (response.result === ERR_OK) {
          this.category = response.data
        }
      })
  },
  methods: {
    changeFn (key) {
      this.ind = key + 1
    }
  },
  filters: {
    formatDate (time) {
      time = Number(time) * 1000
      let date = new Date(time)
      return formatDate(date, 'yyyy-MM-dd hh:mm')
    }
  },
  components: {
  }
}
</script>

<style lang="stylus">
.cate-list
  li
    list-style: none

.wrapper
  width: 100%;
  margin-top: 5px;
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  .title
    width: 80%;
    line-height: 80px;
    ul
      display: flex;
      height: 100%;
      width: 100%;
      li
        width: 25%;
        text-align: center;
        flex: 1;
        span
          display: inline-block;
          width: 80%;
          height: 35px;
          line-height: 35px;
          text-align: center;
          border-radius: 10px;
          background: #fff;
          color: #000;
          font-size: 10px;
          &.active
           background: #7AD1D8;
           color: #fff;
.scroll-wrapper
  height: 70%;
  position: absolute;
  top: 140px;
  left: 0;
  overflow: hidden;
  .scroll
    .container
      width: 100%;
      margin-bottom: 10px;
      .content
        width: 90%;
        margin: 0 auto
        &:after
          content: '';
          display: block;
          clear: both;
        .left
          float: left;
          width: 68%;
          h1
            color: #000;
            font-size: 12px;
        .text,.time
          color: #A0A0A0
        .text
          width: 100%;
          height: 30px;
          padding-top: 5px;
          font-size: 10px;
          line-height: 1.3;
          display: -webkit-box;
          -webkit-box-orient: vertical;
          -webkit-line-clamp: 2;
          overflow: hidden;
        .time
          padding-top: 10px;
      .pic
        width: 30%
        float: right;
        img
          width: 100%;
          height: 100%;

</style>
