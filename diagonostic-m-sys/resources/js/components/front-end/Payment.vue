<template>
    <div class="col-lg-6">
        <form>
            <table class="table table-bordered">
                <tr>
                    <th>
                        Bill No
                    </th>
                    <td>
                        <input v-model="form.billNo" type="text" placeholder="Place Bill Number Here">
                    </td>
                    <td>Or</td>
                </tr>
                <tr>
                    <th>Mobile No</th>
                    <td>
                        <input v-model="form.mobile_no" type="text" placeholder="Place Mobile Number Here">
                    </td>
                    <td>
                        <input type="button" @click="searchForPayment" value="Search" class="btn btn-block btn-info">
                    </td>
                </tr>
            </table>
        </form>

        <form>
            <table class="table table-bordered">
                <tr>
                    <th>
                        Amount to Pay
                    </th>
                    <td v-if="amounts.totalPayment && form.mobile_no.length>1 ">
                        {{amounts.totalPayment}}
                    </td>
                    <td v-else-if="amounts.totalPayment && form.billNo.length>1 ">
                        {{amounts.totalPayment}}
                    </td>
                    <td v-else>
                        Nothing Found
                    </td>

                    <td>20196823197994</td>
                </tr>

                <tr>
                    <th>Due Date</th>
                    <td>
                        {{amounts.updated_at}}
                    </td>
                    <td>
                        <input type="button" v-if="amounts.id" @click="confirmation(amounts.id)" value="Pay" class="btn btn-block btn-danger">
                        <input type="button" v-else @click="confirmationWithoutId" value="Pay" class="btn btn-block btn-danger">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</template>

<script>
    import {Form, HasError, AlertError} from 'vform'
    import Swal from 'sweetalert2'
    import axios from 'axios'

    export default {
        name: "Payment",
        data() {
            return {
                form: new Form({
                    billNo: '',
                    mobile_no: '',
                })
            }
        },
        methods: {
            searchForPayment() {
                if (this.form.billNo.length > 1) {
                    this.$store.dispatch('searchForPaymentByBill', this.form.billNo)
                } else if (this.form.mobile_no.length > 1) {
                    this.$store.dispatch('searchForPaymentByMobile', this.form.mobile_no)
                }

            },
            confirmation(id) {
                Swal.fire({
                    title: 'Are You Sure to Pay Bill?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, pay it!'
                }).then((result) => {
                    if (result.value) {
                        axios.get('/pay-bill/'+id).then(function (res) {
                            Swal.fire(
                                'Payed!',
                                'Your request has been accepted.',
                                'success'
                            )
                        }).catch(function () {
                            alert("Not Payed")
                        })

                    }
                })
            },
            confirmationWithoutId(){
                alert('Search the Payment Due by Placing Bill Number or Mobile Number for Paying Bill')
            }
        },
        computed: {
            amounts() {
                return this.$store.getters.getAmount
            }
        }
    }
</script>

<style scoped>

</style>