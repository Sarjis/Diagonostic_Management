import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        type_name: [],
        tests: [],
        fee: [],
        amount: '',
        bills: []
    },
    getters: {
        getTypeName(state) {
            return state.type_name
        },

        getTestName(state) {
            return state.tests
        },
        getFee(state) {
            return state.fee
        },
        getAmount(state) {
            return state.amount
        },
        getBills(state) {
            return state.bills
        }

    },

    mutations: {
        searchByCityName(state, payload) {
            return state.city = payload
        },
        fetchTypeName(state, data) {
            return state.type_name = data
        },
        fetchTestName(state, data) {
            return state.tests = data
        },
        extractFee(state, data) {
            return state.fee = data
        },
        searchForPayment(state, data) {
            return state.amount = data
        },
        showUnpaidBill(state, data) {
            return state.bills = data
        }
    },
    actions: {

        searchByCityName(context, searchItem) {
            axios.get('/search-city?s=' + searchItem).then(function (res) {
                console.log(res.data.cities)
                context.commit('searchByCityName', res.data.cities)
            }).catch(function (err) {
                alert('Not possible from actions in store')
            })
        },
        fetchTypeName(context) {
            axios.get('/fetch-test-type').then(function (res) {
                context.commit('fetchTypeName', res.data.types)
            }).catch(function (err) {
                alert('Not Possible from Store')
            })
        },

        fetchTestName(context) {
            axios.get('/fetch-test-info').then(function (res) {
                //console.log(res.data.tests)
                context.commit('fetchTestName', res.data.tests)
            }).catch(function (err) {
                alert('Not Possible from Store')
            })
        },
        extractFee(context, id) {
            axios.get('/extract-fee/' + id).then(function (res) {
                //console.log(res.data)
                context.commit('extractFee', res.data.fee)
            }).catch(function (err) {
                alert('not fee')
            })
        },
        searchForPaymentByBill(context, billNo) {
            axios.get('/search-by-bill?s=' + billNo).then(function (res) {
                console.log(res.data.amount)
                context.commit('searchForPayment', res.data.amount)
            }).catch(function (err) {
                alert('Not')
            })
        },
        searchForPaymentByMobile(context, mobile) {
            axios.get('/search-by-mobile?s=' + mobile).then(function (res) {
                console.log(res.data.amount)
                context.commit('searchForPayment', res.data.amount)
            }).catch(function (err) {
                alert('Not')
            })
        },
        showUnpaidBill(context, from, to) {
            axios.get('/unpaid-bill/' + from + '/' + to).then(function (res) {
                console.log(res.data.bills)
                context.commit('showUnpaidBill', res.data.bills)
            }).catch(function (err) {
                alert('no')
            })
        }

    }
});

export default store;