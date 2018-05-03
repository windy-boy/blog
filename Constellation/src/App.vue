<template>
  <div id="app">
    <div class="tab">
      <div class="tab-item">
        <router-link to="/test">
          <span class="txt">星测试</span>
          <span class="txt">星测试</span>
        </router-link>
      </div>
      <div class="tab-item">
        <router-link to="/friends">
          <span class="txt">星友圈</span>
          <span class="txt">星友圈</span>
        </router-link>
      </div>
      <div class="tab-item">
        <router-link to="/wall">
          <span class="txt">祈愿墙</span>
          <span class="txt">祈愿墙</span>
        </router-link>
      </div>
      <div class="tab-item">
        <router-link to="/mine">
          <span class="txt">我</span>
          <span class="txt">我</span>
        </router-link>
      </div>
    </div>
    <router-view/>
  </div>
</template>

<script type="text/ecmascript-6">
export default {

}
</script>

<style lang="stylus">
.tab
  display: flex
  width: 100%
  height: 70px
  position: fixed
  bottom: 0
  left: 0
  background: #fff
  border: 1px solid #ccc
  z-index: 99
  .tab-item
    flex:1
    text-align: center
    & > a
      display: flex
      flex-direction: column
      text-decoration: none
      color: #ccc
      &.active
        color: #7AD1D8
      .txt
        display: inline-block
        width: 100%
        height:35px
        line-height: 35px
        font-size:10px
</style>
