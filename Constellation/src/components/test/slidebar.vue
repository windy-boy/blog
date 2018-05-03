<template>
  <div>
    <ul class="slideTitle">
      <li @click="changeMove(1)">今日</li>
      <li @click="changeMove(2)">明日</li>
      <li @click="changeMove(3)">本周</li>
      <li @click="changeMove(4)">本月</li>
      <li @click="changeMove(5)">本年</li>
      <li @click="changeMove(6)">爱情</li>
      <div class="itemBar" :class="change"></div>
    </ul>
  </div>

</template>

<script type="text/ecmascript-6">
export default {
  data () {
    return {
      change: 'move1'
    }
  },
  methods: {
    changeMove (type) {
      console.log(type)
      switch (type) {
        case 1: this.change = 'move1'
          break
        case 2: this.change = 'move2'
          break
        case 3: this.change = 'move3'
          break
        case 4: this.change = 'move4'
          break
        case 5: this.change = 'move5'
          break
        case 6: this.change = 'move6'
          break
      }
    }
  }
}
</script>

<style lang="stylus">
.slideTitle
  width: 90%;
  margin: 0 5%;
  height: 30px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 10px;
  position: relative;
  li
    flex: 1;
    float: left;
    font-size: 14px;
    height: 100%;
    width: auto;
  .itemBar
    position: absolute;
    left: 0;
    bottom: 0;
    width: 10%;
    height: 1px;
    background: #7AD1D8;
    transition: all 0.2s linear;
    &.move1
      transform: translateX(0%);
    &.move2
      transform: translateX(150%)
    &.move3
      transform: translateX(330%)
    &.move4
      transform: translateX(500%)
    &.move5
      transform: translateX(650%)
    &.move6
      transform: translateX(830%)
</style>
