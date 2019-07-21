<template>
    <div>
        <div class="col-lg-7">
            <form @submit.prevent="saveTestInfo" class="form-horizontal">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Test Name</label>
                    <div class="col-lg-4">
                        <input v-model="form.test_name" type="text" class="form-control" id="test_name"
                               placeholder="Enter a Test Name"
                               :class="{ 'is-invalid': form.errors.has('test_name') }">
                        <has-error :form="form" field="test_name"></has-error>
                    </div>
                    {{form.test_name}}
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Fee</label>
                    <div class="col-lg-4">
                        <input v-model="form.fee" type="number" class="form-control" id="fee"
                               placeholder="Enter a Test Type Name"
                               :class="{ 'is-invalid': form.errors.has('fee') }">
                        <has-error :form="form" field="fee"></has-error>
                    </div>
                    {{form.fee}}
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Test Type</label>
                    <div class="col-lg-4">
                        <select v-model="form.test_type_id" class="form-control custom-select" id="test_type_id"
                                :class="{ 'is-invalid': form.errors.has('test_type_id') }">
                            <option disabled selected>Choose</option>
                            <option :value="types.id" v-for="(types,i) in typeNames">{{types.type_name}}</option>


                        </select>
                        {{form.test_type_id}}

                        <has-error :form="form" field="test_type_id"></has-error>
                    </div>
                    {{form.test_type_id}}
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label"></label>
                    <div class="col-lg-4">
                        <input v-if="form.test_name.length<5" disabled type="button" class="btn btn-success pull-right"
                               value="Save">
                        <input v-else="form.test_name" type="submit" class="btn btn-success pull-right" value="Save">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-5">
            <table class="table table-bordered table-hover table-responsive">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#SL</th>
                    <th scope="col">Test Name</th>
                    <th scope="col">Fee</th>
                    <th scope="col">Type</th>

                </tr>
                </thead>
                <tbody>
                <tr v-for="(test,i) in  tests">
                    <th scope="row">{{++i}}</th>
                    <td>{{test.test_name}}</td>
                    <td>{{test.fee}}</td>
                    <td v-if="test.type">{{test.type.type_name}}</td>

                </tr>
                </tbody>
            </table>
        </div>


    </div>
</template>

<script>
    import {Form, HasError, AlertError} from 'vform'
    import Swal from 'sweetalert2'

    export default {
        name: "Test",
        data() {
            return {
                form: new Form({
                    test_name: '',
                    fee: '',
                    test_type_id: '',
                })
            }
        },
        methods: {
            saveTestInfo() {
                let self = this
                this.form.post('/test-info').then(function (res) {
                    Swal.fire({
                        title: 'Country name Saved Successfully!',
                        animation: false,
                        customClass: {
                            popup: 'animated tada'
                        }
                    })
                    self.$router.push('/test')
                }).catch(function (err) {
                    alert('Not')
                })
            }
        },
        mounted() {
            this.$store.dispatch('fetchTypeName')
            this.$store.dispatch('fetchTestName')
        },
        computed: {
            typeNames() {
                return this.$store.getters.getTypeName
            },
            tests() {
                return this.$store.getters.getTestName
            },
        },
        updated() {
            //this.$store.dispatch('fetchTestName')
        }

    }
</script>

<style scoped>

</style>