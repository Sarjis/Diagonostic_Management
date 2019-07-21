<template>
    <div>
        <div class="col-lg-6">
            <form @submit.prevent="testTypeInfo" class="form-horizontal">
                <div class="form-group">
                    <label class="col-lg-2 control-label">Type Name</label>
                    <div class="col-lg-4">
                        <input v-model="form.type_name" type="text" class="form-control" id="type_name"
                               placeholder="Enter a Test Type Name" :class="{ 'is-invalid': form.errors.has('type_name') }">
                        <has-error :form="form" field="type_name"></has-error>
                    </div>
                    {{form.type_name}}
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label"></label>
                    <div class="col-lg-4">
                        <input v-if="form.type_name.length<5" disabled type="button" class="btn btn-success pull-right"
                               value="Save">
                        <input v-else="form.type_name" type="submit" class="btn btn-success pull-right" value="Save">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <table class="table table-bordered table-hover table-responsive">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#SL</th>
                    <th scope="col">Type Name</th>

                </tr>
                </thead>
                <tbody>
                <tr v-for="(types,i) in typeNames">
                    <th scope="row">{{++i}}</th>
                    <td>{{types.type_name}}</td>
                </tr>
                </tbody>
            </table>
        </div>


    </div>
</template>

<script>
    import Vue from 'vue'
    import Swal from 'sweetalert2'
    import {Form, HasError, AlertError} from 'vform'
    export default {
        name: "TestType",
        data() {
            return {
                form: new Form({
                    type_name: ''
                })
            }
        },
        methods: {
            testTypeInfo() {
                let self = this
                this.form.post('/test-type-info').then(function (res) {
                    Swal.fire({
                        title: 'Country name Saved Successfully!',
                        animation: false,
                        customClass: {
                            popup: 'animated tada'
                        }
                    })

                    self.$router.push('/')
                }).catch(function (err) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Please follow proper Naming Convention!',
                        type: 'error',
                        confirmButtonText: 'Cool'
                    });
                })
            }
        },
        mounted() {
            this.$store.dispatch('fetchTypeName')
        },
        computed: {
            typeNames() {
                return this.$store.getters.getTypeName
            }
        },
        updated(){
            //this.$store.dispatch('fetchTypeName')
        },
        created(){
            this.typeNames()
        }
    }
</script>

<style scoped>

</style>