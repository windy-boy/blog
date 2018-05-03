<template>
<div class="topic-wrapper">
  <div class="topic-scroll">
    <div class="ts-content" v-for="(hotTopic,index) in hotTopic" :key="index">
      <div class="c-top">
        <div class="topic-avatar"><img :src="hotTopic.avatar"/></div>
        <div class="ct-text">
          <div class="t-left">
            <span class="l-nickname">{{ hotTopic.nick_name }}</span>
            <span class="l-info">5级</span>
          </div>
          <div class="t-right">关注</div>
        </div>
      </div>
      <div class="c-center">
        <div class="cc-text"><pre>{{ hotTopic.context }}</pre></div>
        <ul v-show="true" class="cc-ul">
          <li v-for="(img, index) in hotTopic.image_urls" :key="index"><img :src="img"/></li>
        </ul>
      </div>
      <div class="c-bottom">
        <div class="supportCount">{{ hotTopic.support_count }}</div>
        <ul v-show="true" class="cb-ul">
          <li v-for="(support, index) in hotTopic.support_img" :key="index"><img :src="support.avatar"/></li>
        </ul>
        <div class="replyCount">{{ hotTopic.reply_count }}</div>
      </div>
    </div>
  </div>
</div>
</template>

<script type="text/ecmascript-6">
const OK = 0
const debug = process.env.NODE_ENV !== 'production'
export default {
  data () {
    return {
      hotTopic: {type: Number}
    }
  },
  created () {
    const url = debug ? '/api/hotTopic' : 'https://raw.githubusercontent.com/windy-boy/chenjiancong/master/hotTopic.json'
    this.$http.get(url)
      .then((response) => {
        response = response.body
        if (response.result === OK) {
          this.hotTopic = response.data
        }
      })
  }
}
</script>

<style lang="stylus">
.topic-wrapper
  width: 100%;
  .topic-scroll
    width: 100%;
    .ts-content
      width: 100%;
      .c-top
        height: 40px;
        width: 100%;
        line-height: 40px;
        border-top: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        margin: 10px 0;
        .topic-avatar
          width: 30px;
          height: 30px;
          border-radius: 50%;
          float: left;
          margin-top: 4px;
          img
            width: 100%;
            height: 100%;
            border-radius: 50%;
        .ct-text
          height: 100%;
          &:after
            content: ''
            display: block
            clear: both
          .t-left
            float:left
            font-size: 0;
            width: 60%;
            height: 100%;
            .l-nickname
              display: block
              font-size: 14px;
              height: 20px;
              line-height: 20px;
              padding-left: 5px;
            .l-info
              display: block;
              font-size: 12px;
              color: #ccc;
              height: 20px;
              line-height: 20px;
              padding-left: 5px;
          .t-right
            float: right
            font-size: 14px;
            color: #7AD1D8;
            margin-right: 5%;
      .c-center
        width: 85%;
        margin: 0 5% 0 10%;
        .cc-text
          font-size: 14px;
          line-height: 1.2;
          pre
            white-space: pre-wrap;
        .cc-ul
          width: 100%;
          height: 100%;
          margin: 10px 0;
          &:after
            content: '';
            display: block;
            clear: both;
          li
            float: left;
            width: 32%;
            height: 145px;
            margin-right: 2%;
            margin-bottom: 5px;
            img
              width: 100%;
              height: 100%;
            &:nth-of-type(3n)
              margin-right: 0;
      .c-bottom
        width: 85%;
        margin: 0 5% 0 10%;
        height: 40px;
        .supportCount
          float: left
          font-size: 14px;
        .cb-ul
          width: 60%;
          margin-left: 10px;
          float: left;
          li
            width: 20px;
            height: 20px;
            float: left;
            margin-right: 5px;
            &:last-child
              margin-right: 0;
            img
              width: 100%;
              height: 100%;
              border-radius: 50%;
        .replyCount
          float: right;
          font-size: 14px;
</style>
