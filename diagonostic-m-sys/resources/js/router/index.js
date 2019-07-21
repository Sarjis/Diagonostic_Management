import Vue from 'vue'
import Router from 'vue-router'
import TestType from '../components/front-end/TestType'
import Test from '../components/front-end/Test'
import TestRequest from '../components/front-end/TestRequest'
import Payment from '../components/front-end/Payment'
import UnpaidBillReport from '../components/front-end/UnpaidBillReport'


Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: 'TestType',
            component: TestType
        },
        {
            path: '/test',
            name: 'Test',
            component: Test
        },
        {
            path: '/test-request',
            name: 'TestRequest',
            component: TestRequest
        },
        {
            path: '/payment',
            name: 'Payment',
            component: Payment
        }, {
            path: '/unpaid-bill',
            name: 'UnpaidBillReport',
            component: UnpaidBillReport
        },

    ],
    mode: 'hash'

});