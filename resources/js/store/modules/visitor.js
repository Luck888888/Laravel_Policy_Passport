import router from "../../router";

const state = {
    person: null,
    people: null,
}

const getters = {
    person: () => state.person,
    people: () => state.people,
}

const actions = {
    getVisitor({state, commit, dispatch}, id) {
        axios.get(`/api/people/${id}`)
            .then(res => {
                commit('setVisitor', res.data.data)
            })
    },
    getPeople({commit}) {
        axios.get('api/people')
            .then(res => {
                commit('setPeople', res.data.data)
            })
    },

    deleteVisitor({dispatch}, id) {
        axios.delete(`/api/people/${id}`)
            .then(res => {
                dispatch('getPeople')
            })
    },

    update({}, data) {
        axios.patch(`/api/people/${data.id}`, {name: data.name, age: data.age, job: data.job})
            .then(res => {
                router.push({name: 'visitor.show', params: {id: data.id}})
            })
    },

    store({}, data) {
        axios.post('/api/people', {name: data.name, age: data.age, job: data.job})
            .then(res => {
                router.push({name: 'visitor.index'})
            })
    },

}

const mutations = {
    setVisitor(state, person) {
        state.person = person
    },
    setPeople(state, people) {
        state.people = people
    }
}


export default {
    state, mutations, getters, actions
}
