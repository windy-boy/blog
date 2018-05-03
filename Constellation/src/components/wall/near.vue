<template>
  <div class="nearWrapper">
    <div class="n-title">
      <router-link class="icon-left icon-arrow-left" to="/wall"></router-link >
      附近祈愿
    </div>
    <div class="n-scroll" ref="scroll">
      <ul>
        <li v-for="(item, index) in Data" :key="index">
          <div class="container">
            <div class="wall-header">
              <div class="avatar"><img :src="item.avatar" alt="" /></div>
              <div class="right">
                <div class="nick-name">{{ item.nick_name }}</div>
                <div class="time-address">
                  <span class="dateline">{{ item.dateline | formatDate}}</span>
                  <span class="address" v-show="item.address">在{{item.address}}祈愿</span>
                </div>
              </div>
            </div>
            <div class="content">
             <div class="type1">{{item.context}}</div>
             <div class="type2" v-show="item.type == 2">
               <div class="t-light"></div>
               <div class="t-content">{{ item.context }}</div>
             </div>
             <div class="type3" v-show="item.type == 3">
               <div class="t-light"></div>
               <div class="t-content">
                 <div class="top"></div>
                 <div class="bottom"></div>
               </div>
             </div>
            </div>
            <div class="footer">
              <div class="left">
                <div class="f-title" v-show="!item.benediction">祝福TA人，美好自己</div>
                <div class="benediction" v-show="item.benediction">
                  <ul class="bened-list">
                    <li v-for="(item,index) in item.benediction" :key="index"><img :src="item.avatar"/></li>
                  </ul>
                  <span class="text">{{ item.benediction_count }}</span>
                </div>
              </div>
              <div class="f-btn">送祝福</div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
import {formatDate} from 'common/js/date'
import BScroll from 'better-scroll'
const debug = process.env.NODE_ENV !== 'production'
const OK = 0
export default {
  data () {
    return {
      Data: []
    }
  },
  filters: {
    formatDate (time) {
      time = Number(time) * 1000
      let date = new Date(time)
      return formatDate(date, 'yyyy-MM-dd hh:mm')
    }
  },
  created () {
    if (this.$store.state.data === 2) {
      var url = debug ? '/api/wallData' : 'https://raw.githubusercontent.com/windy-boy/chenjiancong/master/supplication.json'
    } else if (this.$store.state.data === 1) {
      url = debug ? '/api/hots' : 'https://raw.githubusercontent.com/windy-boy/chenjiancong/master/hots.json'
    }
    this.$http.get(url)
      .then((response) => {
        response = response.body
        if (response.result === OK) {
          this.Data = this.$store.state.data === 2 ? response.data : response.data.list
        }
      })
    this.$nextTick(() => {
      if (!this.scroll) {
        this.scroll = new BScroll(this.$refs.scroll, {})
      }
    })
  },
  computed: {
    /* dddd () {
      return this.$store.state.data
    } */
  }
}
</script>

<style lang="stylus">
.nearWrapper
  z-index: 100;
  background: #ccc;
  width: 100%;
  &:after
    content: ' ';
    display: block;
    clear: both;
  .n-title
    width: 100%;
    height: 40px;
    line-height: 40px;
    background: #7AD1D8;
    color: #fff;
    text-align: center;
    position: fixed;
    top: 0;
    left: 0;
    .icon-left
      float: left
      color: #fff
      display: inline-block
      width: 30px
      height: 100%;
      text-align: center;
      line-height: 40px;
  .n-scroll
    position: absolute;
    top:40px;
    left: 0;
    z-index: 999;
    width: 100%;
    height: 97%;
    background-color: #fff;
    overflow: hidden;
    ul
      li
        margin-top: 15px;
        .container
          width: 89%;
          margin:0 22px;
          border: 1px solid #7AD1D8;
          border-radius: 10px;
          .wall-header
            width: 100%;
            margin-top: 16px;
            .avatar
              float: left;
              width: 54px;
              height: 54px;
              border-radius: 50%;
              margin-right: 16px;
              img
                width: 100%;
                height: 100%;
                border-radius: 50%;
            .right
              display: flex;
              flex-direction: column;
              .nick-name
                width: 100%
                height: 33px;
                line-height: 33px;
                text-align: center;
                text-align:left;
                font-weight: 700;
                font-size: 14px;
              .time-address
                width: 100%;
                .dateline,.address
                  color: #ccc
          .content
            width: 100%;
            margin-top: 20px;
            font-size: 14px;
          .footer
            width: 100%;
            height: 65px;
            margin: 5px 0;
            position: relative
            .f-btn
              width: 57px;
              height: 38px;
              line-height: 38px;
              border-radius: 10px;
              text-align: center;
              background: #86CFD4;
              color: #fff;
              font-size: 14px;
              position: absolute;
              right: 10px;
              top:16px;
            .left
              .f-title
                color: #86CFD4;
              .benediction
                 width: 80%
                 height: 46px
                 line-height: 46px
                 position: absolute
                 top: 16px
                 .bened-list
                   list-style: none
                   float:left
                   li
                     width: 30px
                     height: 30px
                     margin-left: 3px
                     float: left
                     img
                       width: 100%;
                       height: 100%;
                       border-radius: 50%;
                 .text
                   display: inline-block;
                   width: 65px
                   color: #000
                   font-size: 9px;
                   overflow: hidden
</style>
