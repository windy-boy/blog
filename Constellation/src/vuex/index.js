import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const state = {
  data: 1
}
const mutations = {
  changeFN (state, a) {
    state.data = a
  }
}
const actions = {

}

export default new Vuex.Store({
  state,
  mutations,
  actions
})
