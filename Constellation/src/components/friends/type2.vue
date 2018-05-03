<template>
<div class="type2-container" ref="type2">
  <div class="t2c-scroll">
    <div class="tcs-header">
      <div class="tcsh-top">
        <span class="top-icon">签到领红包（今日<span style="color: #F8BEC0;">{{ qiandao.sign_in_total }}</span>人已签）</span>
        <span class="top-txt">查看榜单</span>
      </div>
      <div class="tcsh-center">
        <ul class="tc-ul">
          <li v-for="(photos,index) in qiandao.sign_in_photos" :key="index"><img :src="photos.avatar"/></li>
        </ul>
        <span class="register">签到</span>
      </div>
      <div class="tcsh-bottom">
        <div class="btn1">
          <span>星友靓照</span>
          <span>{{ qiandao.startek_photo_total }}人</span>
        </div>
        <div class="btn2">
          <span>最新动态</span>
          <span>{{ qiandao.dynamic_total }}条</span>
        </div>
      </div>
    </div>
    <split></split>
    <div class="topic">
      <div class="t-title">星座话题</div>
      <ul class="tt-ul">
        <li v-for="(topic,index) in topics" :key="index">{{ topic }}</li>
      </ul>
    </div>
    <div class="community">
      <div class="c-title">
        <span class="span1">星友社区</span>
        <span class="span2">发帖</span>
      </div>
      <ul class="c-ul">
        <li v-for="(community,index) in communitys" :key="index">{{ community }}</li>
      </ul>
    </div>
    <div class="wonderful">
      <div class="w-title">
        <span>精彩话题</span>
        <span class="w-icon icon-arrow-left">更多</span>
      </div>
      <ul class="w-ul">
        <li>#每逢佳节胖三斤</li>
        <li>#假期最后一天的你</li>
        <li>#如果郑爽和熊辛淇组</li>
        <li>#你觉得多少水可以不</li>
      </ul>
    </div>
    <split></split>
    <div class="note">
      <div class="n-title">
        <span>热门帖子</span>
        <span>最新帖子</span>
      </div>
    </div>
    <topic></topic>
  </div>
</div>
</template>

<script type="text/ecmascript-6">
import BScroll from 'better-scroll'
import split from 'components/split/split'
import topic from 'components/friends/topic'
const OK = 0
const debug = process.env.NODE_ENV !== 'production'
export default {
  data () {
    return {
      qiandao: {type: Number},
      topics: ['白羊', '金牛', '双子', '巨蟹', '狮子', '处女', '天秤', '天蝎', '射手', '摩羯', '水瓶', '双鱼'],
      communitys: ['自拍', '恋爱', '校园', '美食', '生活', '娱乐', '明星', '杂谈']
    }
  },
  created () {
    // this.$http.get('/api/qiandao')
    const url = debug ? '/api/qiandao' : 'https://raw.githubusercontent.com/windy-boy/chenjiancong/master/qiandao.json'
    this.$http.get(url)
      .then((response) => {
        response = response.body
        if (response.result === OK) {
          this.qiandao = response.data
        }
      })
    this.$nextTick(() => {
      if (!this.scroll) {
        this.scroll = new BScroll(this.$refs.type2, {})
      }
      this.scroll.refresh()
    })
  },
  components: {
    split,
    topic
  }
}
</script>

<style lang="stylus">
.type2-container
  width: 100%;
  position: absolute;
  top: 60;
  height: 80%;
  overflow: hidden;
  .t2c-scroll
    width: 100%;
    .tcs-header
      width: 90%;
      margin: 0 5%
      height: 130px;
      .tcsh-top
        height: 30px;
        line-height: 30px;
        font-size: 0;
        .top-icon
          font-size: 14px;
        .top-txt
          font-size: 14px;
          float: right;
          color: #7AD1D8;
      .tcsh-center
        width: 100%;
        margin: 10px 0;
        &:after
          content: '';
          display: block;
          clear: both;
        .tc-ul
          width: 80%;
          float: left
          li
            width: 30px;
            height: 30px;
            float: left;
            margin-right: 5px;
            img
              width: 100%;
              height: 100%;
              border-radius: 50%;
        .register
          display: inline-block;
          width: 50px;
          height: 30px;
          background: #7AD1D8;
          text-align: center;
          line-height: 30px;
          float: right;
          font-size: 14px;
          border-radius: 5px;
          color: #fff;
      .tcsh-bottom
        width: 100%;
        height: 40px;
        display: flex;
        justify-content: center;
        .btn1,.btn2
          width: 45%;
          height: 100%;
          border-radius: 5px;
          display: flex;
          align-items: center;
          flex-wrap: wrap;
          text-align: center;
          color: #fff;
          span
            width: 100%;
            display: block;
            font-size: 14px;
        .btn1
          background: #FAA4A3;
          margin-right: 10px;
        .btn2
          background: #7AD1D8
    .topic
      width: 90%;
      margin: 0 5%;
      .t-title
        width: 100%;
        text-align: left;
        height: 30px;
        line-height: 30px;
        color: #000;
        font-size: 14px;
      .tt-ul
        width: 100%;
        &:after
          content: '';
          display: block;
          clear: both;
        li
          float: left;
          width: 23%;
          margin-right: 2%;
          margin-top: 6px;
          height: 30px;
          line-height: 30px;
          text-align: center;
          font-size: 14px;
          background: #FEFAED;
          &:nth-of-type(4),&:nth-of-type(8),&:nth-of-type(12)
            margin-right: 0;
    .community
      width: 90%;
      margin: 0 5%;
      margin-top: 10px;
      .c-title
        width: 100%;
        height: 30px;
        line-height: 30px;
        .span1
          display: inline-block;
          float: left;
          font-size: 14px;
        .span2
          display: inline-block;
          float: right;
          color: #7AD1D8;
          font-size: 14px;
      .c-ul
        width: 100%;
        &:after
          content: '';
          display: block;
          clear: both;
        li
          float: left;
          width: 23%;
          text-align: center;
          height: 20px;
          margin-top: 6px;
          font-size: 14px;
    .wonderful
      width: 90%;
      margin: 10px 5%;
      .w-title
        width: 100%;
        height: 30px;
        line-height: 30px;
        font-size: 0;
        span
          &:nth-of-type(1)
            font-size: 14px;
          &:nth-of-type(2)
            font-size: 14px;
            color: #7AD1D8;
            float: right;
        .w-icon
          transform: rotate(180deg);
          float: right;
      .w-ul
        width: 100%;
        &:after
          content: '';
          display: block;
          clear: both;
        li
          float: left;
          width: 47%;
          height: 30px;
          line-height: 30px
          margin-right: 3%;
          border-radius: 3px;
          text-align: ccenter;
          font-size: 14px;
          background: rgba(0,0,0,0.1);
          margin-top: 6px;
          &:nth-of-type(2),&:nth-of-type(4)
            margin-right: 0;
    .note
      width: 100%;
      .n-title
        width: 100%;
        height: 30px;
        line-height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        span
          width: 50%;
          text-align: center;
          font-size: 14px;
          color: rgba(0,0,0,0.8);
</style>
