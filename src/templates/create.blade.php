<?php
/* @var $table \Naveed\Scaff\Helpers\Table */
/* @var $gen \Naveed\Scaff\Generators\ModelGenerator */
?>

<template>
    <b-modal id="createUserModal"
             ref="createUserModal"
             title="Add New User"
             hide-footer
             modal-class="modal-right">
        <apm-form action="/users" v-model="form">
            <apm-form-element field="first_name" label="First Name" :model="form">
                <b-form-input v-model="form.first_name"/>
            </apm-form-element>
            <apm-form-element field="last_name" label="Last Name" :model="form">
                <b-form-input v-model="form.last_name"/>
            </apm-form-element>
            <apm-form-element field="email" label="Email" :model="form">
                <b-form-input type="email" v-model="form.email"/>
            </apm-form-element>
            <apm-form-element label="Gender" field="gender" :model="form">
                <v-select :options="['Male', 'Female']" v-model="form.gender"/>
            </apm-form-element>
            <apm-form-element label="Description" field="description" :model="form">
                <b-textarea v-flex-height v-model="form.description" :rows="2" :max-rows="2"/>
            </apm-form-element>
            <apm-form-element label="Status" field="status" :model="form">
                <b-form-radio-group stacked class="pt-2" :options="['Active', 'Inactive']" v-model="form.status"/>
            </apm-form-element>
            <b-button variant="outline-secondary" @click="$refs.createUserModal.hide()" class="mr-2">Cancel</b-button>
            <b-button variant="primary" type="submit" class="mr-1">Submit</b-button>
        </apm-form>
    </b-modal>
</template>

<script>
    export default {
        name: "CreateUserModal",
        props: {},
        data() {
            return {
                form: {
                    title: '',
                    description: '',
                    status: 'Active'
                }
            }
        },
        methods: {}
    }
</script>

<style scoped>

</style>

