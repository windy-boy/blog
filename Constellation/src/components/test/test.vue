<template>
  <div>
    <div class="t-title">
      <div class="name">
        <span class="logo"></span>
        <span class="text">星座运势大全</span>
      </div>
      <div class="text">星运每一天，找到属于自己的幸福</div>
    </div>
    <div class="alert-hook" ref="alert">刷新成功</div>
    <div class="t-container" ref="Tcontainer">
      <div class="tc-scroll">
        <div class="topTips">
          <span class="refresh-hook" ref="topTips">下拉刷新</span>
        </div>
        <div class="banner">
          <wc-swiper :pagination="false">
            <wc-slide v-for="(item, index) in bannerData" :key="index">
              <img :src="item.img_url"/>
            </wc-slide>
          </wc-swiper>
        </div>
        <div class="tool">
          <div class="_top">
            <ul>
              <li>
                <span class="picture"></span>
                <span class="txt">星座专区</span>
              </li>
              <li>
                <span class="picture"></span>
                <span  class="txt">生肖血型</span>
              </li>
              <li>
                <span class="picture"></span>
                <span class="txt">民俗测算</span>
              </li>
              <li>
                <span class="picture"></span>
                <span class="txt">心理测试</span>
              </li>
            </ul>
          </div>
          <div class="_bottom">
            <ul>
              <li>
                <span class="picture"></span>
                <span class="txt">周公解梦</span>
              </li>
              <li>
                <span class="picture"></span>
                <span class="txt">恋爱婚姻</span>
              </li>
              <li>
                <span class="picture"></span>
                <span class="txt">事业财富</span>
              </li>
              <li>
                <span class="picture"></span>
                <span class="txt">命运人生</span>
              </li>
            </ul>
          </div>
        </div>
        <split></split>
        <div class="notice">
          <span class="notice-span1">最新公告</span>
          <span class="notice-span2">【星友圈全新改版】新增星友靓照，最新动态...</span>
        </div>
        <split></split>
        <div class="constellation">
          <div class="conste-top">
            <span class="ct-title">白羊座运势</span>
            <span class="ct-change">切换</span>
          </div>
          <div class="conste-center">
            <div class="cc-title">
              <slidebar></slidebar>
            </div>
          </div>
          <div class="conste-bottom">
            <span class="cb-icon icon-down-arrow"></span>
          </div>
        </div>
        <div class="recommend"></div>
      </div>
    </div>
  </div>
</template>
<script type="text/ecmascript-6">
import BScroll from 'better-scroll'
import split from 'components/split/split'
import slidebar from 'components/test/slidebar'
const ERR_OK = 0
export default {
  data () {
    return {
      bannerData: []
    }
  },
  methods: {
    refreshAlert (text = '操作成功') {
      this.$refs.alert.innerHtml = text
      this.$refs.alert.style.display = 'block'
      setTimeout(function () {
        alert.style.display = 'none'
      }, 1000)
    }
  },
  created () {
    this.$nextTick(() => {
      if (!this.scroll) {
        this.scroll = new BScroll(this.$refs.Tcontainer, {click: true, probeType: 3})
      }
      this.scroll.refresh()
      this.scroll.on('scroll', (position) => {
        // console.log(position)
        if (position.y > 40) {
          this.$refs.topTips.innerText = '释放立即刷新'
        }
      })
      this.scroll.on('touchEnd', (position) => {
        let topTips = this.$refs.topTips
        if (position.y > 40) {
          console.log(position.y)
          setTimeout(function () {
            topTips.innerText = '下拉刷新'
            // this.refreshAlert('刷新成功')
            this.$refs.alert.innerHtml = '刷新成功'
            this.$refs.style.display = 'block'
            this.scroll.refresh()
          }, 1000)
        }
      })
    })
    this.$http.get('https://raw.githubusercontent.com/windy-boy/chenjiancong/master/banner.json')
      .then((response) => {
        response = response.body
        if (response.result === ERR_OK) {
          this.bannerData = response.banner
        }
      })
  },
  components: {
    split,
    slidebar
  }
}
</script>

<style lang="stylus">
.t-title
  width: 100%;
  height: 50px;
  background: #fff;
  .name
    width: 100%;
    height: 29px;
    line-height: 29px;
    .logo
      width: 30px;
      height: 30px;
      border-radius: 10px;
      border: 1px solid #ccc;
    .text
      color: #7AD1D8
      font-size: 12px;
      vertical-align: bottom;
  .text
    width: 100%;
    height: 16px;
    line-height: 16px;
    color: #000;
    font-size: 9px;
.alert-hook
  width: 100%
  height: 30px;
  line-height: 30px;
  text-align: center;
  position: fixed;
  top: 50px;
  display: none;
.t-container
  width: 100%;
  height: 80%;
  position: absolute;
  top: 60px;
  left: 0;
  overflow: hidden;
  .topTips
    width: 100%;
    text-align: center;
    position: absolute;
    top: -20px;
  .banner
    width: 100%;
    img
      width: 100%;
      height: 100%;
  .tool
    margin-top: 15px;
    width: 100%;
    ._bottom
      margin-top: 15px;
    ._top,._bottom
      width: 100%;
      height: 80px;
      ul
        width: 90%;
        margin: 0 5%;
        display: flex;
        li
          width: 25%;
          /*float: left;*/
          text-align: center;
          flex: 1;
          font-size: 0;
          .picture
            display: inline-block;
            width: 45px;
            height: 45px;
            /*border: 1px solid #000;*/
            border-radius: 50%;
            background: url("./smile1.jpg")
          .txt
            display: inline-block;
            font-size: 12px;
            margin-top: 15px;
            letter-spacing: 1px;
  .notice
    width: 90%;
    margin: 0 5%
    height: 50px;
    line-height: 50px;
    font-size: 0;
    overflow: hidden;
    .notice-span1
      font-size: 12px;
      color: #7AD1D8
    .notice-span2
      font-size: 12px;
  .constellation
    width: 90%
    margin: 0 5%
    font-size: 0;
    .conste-top
      width: 100%;
      height: 50px;
      line-height: 50px;
      .ct-title
        font-size: 12px;
        color: #7AD1D8;
      .ct-change
        font-size: 12px;
        color: #7AD1D8;
        float: right;
    .conste-center
      width: 100%;
      height: 150px;
      border-top: 1px solid #ccc;
      .cc-title
        width: 100%;
        height: 30px;
    .conste-bottom
      width: 100%;
      height: 40px;
      line-height: 40px;
      text-align: center;
      border-top: 1px solid #ccc;
      .cb-icon
        display: inline-block;
        font-size: 14px;
        margin-top: 15px;
        color: #7AD1D8;
  .recommend
    width: 100%;
    height: 150px;
    border: 1px solid #000;
</style>
