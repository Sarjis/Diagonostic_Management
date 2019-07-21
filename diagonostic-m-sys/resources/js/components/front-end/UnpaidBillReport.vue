<template>
    <div>
        <div class="col-lg-6">
            <form>
                <table class="table table-bordered">
                    <tr>
                        <th>
                            From Date
                        </th>
                        <td>
                            <input v-model="from_date" type="date">{{from_date}}
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <th>
                            To Date
                        </th>
                        <td>
                            <input v-model="to_date" type="date">{{to_date}}
                        </td>
                        <td>
                            <input v-if="from_date.length>5 && to_date.length>5" type="button" @click="showUnpaidBill"
                                   value="Show" class="btn btn-block btn-info">
                            <input v-else type="button" @click="wrong" value="Show" class="btn btn-block btn-info">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div ref="printMe" class="col-lg-12">
            <h3 class="text text-center">Unpaid Bill Report</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#SL</th>
                    <th scope="col">Bill Number</th>
                    <th scope="col">Contact Number</th>
                    <th scope="col">Patient name</th>
                    <th scope="col">Bill Amount</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(bill,i) in bills">
                    <th scope="row">{{++i}}</th>
                    <td>{{bill.billNo}}</td>
                    <td>{{bill.mobile_no}}</td>
                    <td>{{bill.patient_name}}</td>
                    <td>{{bill.totalPayment}}</td>
                </tr>
                <tr>
                    <th></th>
                    <td></td>
                    <td></td>
                    <td @click="generateFromHTML" class="btn btn-danger">
                        PDF
                    </td>
                    <td class="text-primary">Total:{{total}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "UnpaidBillReport",
        data() {
            return {
                from_date: '',
                to_date: '',
            }
        },
        methods: {
            showUnpaidBill() {
                this.$store.dispatch('showUnpaidBill', this.from_date, this.to_date)
            },

            generateFromHTML() {
                var today = new Date();
                var time = today.getHours() + "" + today.getMinutes() + "" + today.getSeconds() + today.getMilliseconds();
                //var dateTime = date + time;

                const el = this.$refs.printMe;
                let doc = new jsPDF();
                //doc.heading('Hello', 40,10)
                doc.fromHTML(el, 25, 20);


                doc.save(time + ".pdf");
            },
            wrong() {
                this.bills = 0
            }
        },
        computed: {
            bills() {
                return this.$store.getters.getBills
            },
            total() {
                let sum = 0
                this.bills.forEach(function (bill) {
                    sum += bill.totalPayment
                })
                return sum
            }
        }
    }
</script>

<style scoped>

</style>