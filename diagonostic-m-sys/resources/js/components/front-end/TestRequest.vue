<template>
    <div ref="printMe">
        <div class="col-lg-7">
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Patient name</label>
                    <div class="col-lg-4">
                        <input v-model="form.patient_name" type="text" class="form-control" id="patient_name"
                               placeholder="Enter a Test Name"
                               :class="{ 'is-invalid': form.errors.has('patient_name') }">
                        <has-error :form="form" field="test_name"></has-error>
                    </div>
                    {{form.patient_name}}
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Birth Date</label>
                    <div class="col-lg-4">
                        <input v-model="form.birth_date" type="date" class="form-control" id="birth_date"
                               placeholder="Enter a Test Type Name"
                               :class="{ 'is-invalid': form.errors.has('birth_date') }">
                        <has-error :form="form" field="birth_date"></has-error>
                    </div>
                    {{form.birth_date}}
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Mobile No</label>
                    <div class="col-lg-4">
                        <input v-model="form.mobile_no" type="number" class="form-control" id="mobile_no"
                               placeholder="Enter a Test Type Name"
                               :class="{ 'is-invalid': form.errors.has('mobile_no') }">
                        <has-error :form="form" field="mobile_no"></has-error>
                    </div>
                    {{form.mobile_no}}
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Test Name</label>
                    <div class="col-lg-4">
                        <select @change="getFee" v-model="form.test_id" class="form-control custom-select" id="test_id"
                                :class="{ 'is-invalid': form.errors.has('test_id') }">
                            <option disabled selected>Choose</option>
                            <option :value="name.test_name" v-for="(name,i) in testNames">{{name.test_name}}</option>

                        </select>
                        {{form.test_id}}

                        <has-error :form="form" field="test_id"></has-error>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Fee</label>
                    <div class="col-lg-4">
                        <input :value="getFeesByGetters" disabled type="number" class="form-control">

                    </div>

                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-4">
                        <!--<input v-if="form.mobile_no.length<5" disabled type="button" class="btn btn-success pull-right"-->
                        <!--value="Add">-->
                        <input @click="addToTable(getFeesByGetters,form.test_id)" type="button"
                               class="btn btn-success pull-right" value="Add">
                    </div>
                </div>
                {{form.totalPayment}}


            </form>
        </div>
        <div class="col-lg-5">
            <h1 class="text text-danger"><b>Chevron Diagnostic Center</b></h1>
            <form @submit.prevent="testRequestInfo" class="form-horizontal">
                <table class="table table-bordered table-hover table-responsive">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#SL</th>
                        <th scope="col">Test</th>
                        <th scope="col">Fee</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="item.test_name" v-for="(item,i) in items" :key="i">
                        <td>{{i++}}</td>
                        <td>{{item.test_name}}</td>
                        <td>{{item.fee}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Total</td>
                        <td>{{total}}</td>
                    </tr>
                    <tr>
                        <td>{{form.billNo}}</td>
                        <td>
                        </td>
                        <td>
                            <input @click="generateFromHTML" type="submit" class="btn btn-success" value="Save">
                        </td>
                    </tr>
                    <!--<tr v-for="(test,i) in  tests">-->
                    <!--<th scope="row">{{++i}}</th>-->
                    <!--<td>{{test.test_name}}</td>-->
                    <!--<td>{{test.fee}}</td>-->
                    <!--<td v-if="test.type">{{test.type.type_name}}</td>-->

                    <!--</tr>-->
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</template>

<script>
    import Swal from 'sweetalert2'
    import {Form, HasError, AlertError} from 'vform'

    export default {
        name: "TestRequest",
        data() {
            return {
                form: new Form({
                    patient_name: '',
                    birth_date: '',
                    mobile_no: '',
                    test_id: '',
                    totalPayment: '',
                    billNo: ''
                }),
                items: [
                    {fee: 0, test_name: ''},
                ],
            }
        },
        methods: {
            testRequestInfo() {
                this.form.post('/test-request-info').then(function (res) {
                    alert('yes')
                }).catch(function (err) {
                    alert('no')
                })
            },
            getFee() {
                this.$store.dispatch('extractFee', this.form.test_id)
            },
            getTableTestNameById() {
                this.$store.dispatch('getTableTestNameById', this.form.test_id)
            },
            addToTable(fees, id) {
                //alert(fees)
                //this.form.totalPayment = this.total
                this.items.push({
                    fee: fees,
                    test_name: id

                })
            },

            generateFromHTML() {
                var today = new Date();
                var date = today.getFullYear() + '' + (today.getMonth() + 1) + '' + today.getDate();
                var time = today.getHours() + "" + today.getMinutes() + "" + today.getSeconds() + today.getMilliseconds();
                var dateTime = date + time;

                const el = this.$refs.printMe;
                let doc = new jsPDF();
                doc.fromHTML(el);
                this.form.billNo = dateTime;
                doc.save(this.form.billNo + ".pdf");
            }
        },
        mounted() {
            this.$store.dispatch('fetchTestName')
        },
        computed: {
            testNames() {
                return this.$store.getters.getTestName
            },
            getFeesByGetters() {
                return this.$store.getters.getFee
            },
            total() {
                let sum = 0;
                this.items.forEach(function (item) {
                    sum += parseFloat(item.fee)

                });
                this.form.totalPayment = sum.toFixed(2)
                return sum.toFixed(2)
            }

        }
    }
</script>

<style scoped>

</style>