import Vue from 'vue'
import Vuex from "vuex"
import Visitor from './modules/visitor'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        Visitor
    }
})
