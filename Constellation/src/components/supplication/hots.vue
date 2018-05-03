<template>
  <div>
    <div class="wall-box">
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
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
import {formatDate} from 'common/js/date'

export default {
  props: {
    item: {
      type: Object
    }
  },
  data () {
    return {
      // scroll: false
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

  }
}
</script>

<style lang="stylus">
.wall-box
  width: 89%;
  border: 1px solid #7AD1D8;
  border-radius: 10px;
  margin: 10px 22px;
  z-index: -1;
  .container
    width: 89%;
    margin:0 22px;
    .wall-header
      width: 100%;
      height: 65px;
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
            font-size: 14px;
    .content
      width: 100%;
      margin-top: 30px;
      font-size: 14px;
    .footer
      width: 100%;
      height: 75px;
      margin: 16px 0;
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
        right: 0;
        top:16px;
      .left
        .f-title
          color: #86CFD4;
        .benediction
           width: 80%
           height: 46px
           line-height: 46px
           margin-right: 21px
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

</style>
