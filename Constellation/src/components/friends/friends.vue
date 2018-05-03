<template>
<div style="height: 100%;">
  <div class="nav">
    <ul ref="ul">
      <li v-for="(item,index) in title"
        @click="changeFn(index)"
        :key="index">
        <span :class="{'active' : type === index+1}">{{ item }}</span>
      </li>
    </ul>
  </div>
  <div class="content" style="height: 80%;">
    <type1 v-show="type === 1"></type1>
    <type2 v-show="type === 2"></type2>
  </div>
</div>
</template>

<script type="text/ecmascript-6">
import type1 from 'components/friends/type1'
import type2 from 'components/friends/type2'
export default {
  data () {
    return {
      type: 2,
      title: ['星文', '星友圈', '关注', '消息']
    }
  },
  methods: {
    changeFn (index) {
      this.type = index + 1
    }
  },
  components: {
    type1,
    type2
  }
}

</script>

<style lang="stylus">
.nav
  width: 100%;
  height: 60px;
  line-height: 60px;
  ul
    height: 100%;
    margin: 0 37px;
    display: flex;
    li
      flex: 1;
      width: 45px;
      text-align: center;
      &:nth-of-type(2)
        span
          width: 55px;
      span
        display: inline-block;
        width: 35px;
        color: #B5B5B5;
        &.active
          color: #7AD1D8;
          border-bottom: 1px solid #7AD1D8;
</style>
