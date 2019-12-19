@extends('naveed.scaff::layouts.main-layout')

@section('content')
    <main id="main">
        <h2 class="text-center">Generate Crud</h2>
        <apm-form action="/naveed/scaff/gen-crud" v-model="form">
            <apm-form-element field="tableName" :model="form">
                <label>
                    Table Name
                    <input class="form-control" v-model="form.tableName">
                </label>
            </apm-form-element>
            <table class="table text-center">
                <thead>
                <tr>
                    <th>Field Name</th>
                    <th>Type</th>
                    <th>Length / Values</th>
                    <th>Default</th>
                    <th>Required</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="field in form.fields">
                    <td>
                        <apm-form-element field="name" :model="form">
                            <input class="form-control" v-model="field.name">
                        </apm-form-element>
                    </td>
                    <td>
                        <apm-form-element field="type" :model="form">
                            <input class="form-control" v-model="field.type">
                        </apm-form-element>
                    </td>
                    <td>
                        <apm-form-element field="length" :model="form">
                            <input class="form-control" v-model="field.length">
                        </apm-form-element>
                    </td>
                    <td>
                        <apm-form-element field="default" :model="form">
                            <input class="form-control" v-model="field.default">
                        </apm-form-element>
                    </td>
                    <td>
                        <apm-form-element field="required" :model="form">
                            <apm-switch v-model="field.required"></apm-switch>
                        </apm-form-element>
                    </td>
                    <td>
                        <i class="mdi mdi-plus-circle add-button"></i>&nbsp;&nbsp;
                        <i class="mdi mdi-minus-circle remove-button"></i>&nbsp;&nbsp;
                    </td>
                </tr>
                </tbody>
            </table>
        </apm-form>
    </main>
@endsection

@push('scripts')
    <script>
        var app = new Vue({
            el: '#main',
            data: {
                form: {
                    fields: [
                        {
                            name: 'id',
                            type: 'integer',
                            length: 11,
                            default: '',
                            required: true
                        }
                    ]
                },
            }
        })
    </script>
@endpush
