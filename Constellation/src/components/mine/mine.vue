<template>
  <div>
    <div class="mine-top">会员中心</div>
    <div class="mine-container" ref="mineCont">
      <div class="mine-scroll">
        <div class="m-login">
          <div class="ml-left">
            <span class="mll-pic"></span>
            <span class="mll-txt">未登录</span>
          </div>
          <div class="ml-right"><span class="mlr-ico icon-arrow-left"></span></div>
        </div>
        <split></split>
        <div class="m-nav">
          <ul class="mn-ul">
            <li>
              <span class="mn-ico icon-home"></span>
              <span class="mn-mine">我的主页</span>
            </li>
            <li>
              <span class="mn-ico icon-pen"></span>
              <span class="mn-mine">修改资料</span>
            </li>
            <li>
              <span class="mn-ico icon-home"></span>
              <span class="mn-mine">我的测算</span>
            </li>
            <li>
              <span class="mn-ico icon-database-3"></span>
              <span class="mn-mine">账户充值</span>
            </li>
          </ul>
        </div>
        <split></split>
        <div class="m-process">
          <ul class="mp-ul">
            <li>
              <span class="mp-ico1 icon-shoppingbag-o"></span>
              <span class="mp-txt">开运物商城</span>
            </li>
            <li>
              <span class="mp-ico2 icon-eglass-order"></span>
              <span class="mp-txt">开运物订单</span>
            </li>
          </ul>
        </div>
        <split></split>
        <div class="m-content">
          <ul class="mc-ul">
            <li v-for="(ctext,index) in texts" :key="index">
              <span class="mc-left" :class="icons[index]"></span>
              <span class="mc-right">
                <span class="mcr-txt">{{ ctext }}</span>
                <span class="mcr-icon icon-arrow-left"></span>
              </span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/ecmascript-6">
import BScroll from 'better-scroll'
import split from 'components/split/split'
export default {
  data () {
    return {
      texts: ['我的红包', '分享领红包', '会员福利', '联系客服', '给软件好评，谢谢亲支持！', '关注微信公众号', '应用版本', '系统设置'],
      icons: ['icon-gift', 'icon-share', 'icon-gift', 'icon-qrcode', 'icon-flower_2e', 'icon-qrcode', 'icon-qrcode', 'icon-cog']
    }
  },
  created () {
    this.$nextTick(() => {
      if (!this.scroll) {
        this.scroll = new BScroll(this.$refs.mineCont, {})
      }
      this.scroll.refresh()
    })
  },
  components: {
    split
  }
}
</script>

<style lang="stylus">
.mine-top
  width: 100%;
  height: 50px;
  line-height: 50px;
  text-align: center;
  color: #fff;
  background: #7AD1D8;
.mine-container
  width: 100%;
  height: 82%;
  overflow: hidden;
  position: absolute;
  top: 50px;
  left: 0;
  .m-login
    width: 90%;
    margin: 0 5%;
    height: 100px;
    line-height: 100px;
    .ml-left
      float: left;
      font-size: 0;
      .mll-pic
        display: inline-block;
        float: left
        width: 50px;
        height: 50px;
        margin-top: 20px;
        border-radius: 50%;
        border: 1px solid #000;
      .mll-txt
        display: inline-block;
        font-size: 14px;
        color: #000000;
        margin-left: 20px;
    .ml-right
      float: right;
      .mlr-ico
        display: inline-block
        color: #ccc
        transform: rotate(180deg)
        font-size: 20px;
  .m-nav
    width: 90%
    margin: 0 5%
    height: 100px;
    .mn-ul
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      li
        flex: 1;
        text-align: center;
        &:nth-of-type(1)
          .mn-ico
            color: #95D58E;
            font-size: 20px;
        &:nth-of-type(2)
          .mn-ico
            color: #6382C2;
            font-size: 20px;
        &:nth-of-type(3)
          .mn-ico
            color: #BC8D66;
            font-size: 20px;
        &:nth-of-type(4)
          .mn-ico
            color: #FE7B60;
            font-size: 20px;
        .mn-ico
          display: block
        .mn-mine
          display: inline-block
          margin-top: 10px;
          font-size: 14px;
  .m-process
    width: 90%;
    margin: 0 5%;
    height: 50px;
    .mp-ul
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      li
        flex: 1;
        text-align: center;
        font-size: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        &:nth-of-type(1)
          border-right: 1px solid rgba(0,0,0,0.1)
        .mp-ico1,.mp-ico2
          display: inline-block;
          color: #85D6DB;
        .mp-ico1
          font-size: 25px;
        .mp-ico2
          font-size: 20px;
        .mp-txt
          display: inline-block;
          font-size: 14px;
          margin-left: 10px;
  .m-content
    width: 90%;
    margin: 0 5%;
    .mc-ul
      width: 100%;
      li
        width: 100%;
        height: 50px;
        line-height: 50px;
        font-size: 0;
        .mc-left
          font-size: 20px;
          display: inline-block;
          width: 10%;
          font-size: 16px;
          color: #7CD2D8;
        .mc-right
          font-size: 20px;
          display: inline-block
          width: 90%;
          height: 100%;
          border-bottom: 1px solid rgba(0,0,0,0.1);
          .mcr-txt
            font-size: 14px;
          .mcr-icon
            float: right
            transform: rotate(180deg)
            margin-top: 15px;
            color: #ccc
</style>
