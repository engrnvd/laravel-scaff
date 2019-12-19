@extends('naveed.scaff::layouts.main-layout')

@section('content')
    <main id="main">
        <v-app>
        <h2 class="text-center">Generate CRUD</h2>
        <apm-form action="/naveed/scaff/gen-crud" v-model="form" @on-success="resetForm()">
            <table class="table text-center">
                <tbody>
                <tr>
                    <td>
                        <apm-form-element field="tableName" :model="form">
                            <v-text-field v-model="form.tableName" label="Table / Collection Name" autofocus />
                        </apm-form-element>
                    </td>
                    <td>
                        <apm-form-element field="idField" :model="form">
                            <v-text-field label="ID Field" v-model="form.idField" placeholder="e.g. id" />
                        </apm-form-element>
                    </td>
                    <td>
                        <apm-form-element field="timestamps" :model="form">
                            <v-switch label="Timestamps" v-model="form.timestamps" />
                        </apm-form-element>
                    </td>
                </tr>
                </tbody>
            </table>

            <table class="table text-center">
                <thead>
                <tr>
                    <th>Field Name</th>
                    <th>Type</th>
                    <th>Length / Values</th>
                    <th>Default</th>
                    <th>Required</th>
                    <th style="min-width: 110px">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="field in form.fields">
                    <td>
                        <apm-form-element field="name" :model="form">
                            <v-text-field v-model="field.name" />
                        </apm-form-element>
                    </td>
                    <td>
                        <apm-form-element field="type" :model="form">
                            <v-autocomplete
                                :items="fieldTypes"
                                v-model="field.type"
                            ></v-autocomplete>
                        </apm-form-element>
                    </td>
                    <td>
                        <apm-form-element field="length" :model="form">
                            <v-text-field v-model="field.length"/>
                        </apm-form-element>
                    </td>
                    <td>
                        <apm-form-element field="default" :model="form">
                            <v-text-field v-model="field.default" />
                        </apm-form-element>
                    </td>
                    <td>
                        <apm-form-element field="required" :model="form">
                            <v-switch v-model="field.required" />
                        </apm-form-element>
                    </td>
                    <td>
                        <v-btn class="mx-2" fab dark small color="success">
                            <v-icon dark>mdi-plus</v-icon>
                        </v-btn>
{{--                        <i class="mdi mdi-plus-circle add-button"></i>&nbsp;&nbsp;--}}
{{--                        <i class="mdi mdi-minus-circle remove-button"></i>&nbsp;&nbsp;--}}
                    </td>
                </tr>
                <tr>
                    <td>
                        <v-btn type="submit" color="primary">Generate</v-btn>
                    </td>
                </tr>
                </tbody>
            </table>
        </apm-form>
        </v-app>
    </main>
@endsection

@push('scripts')
    <script>
        var app = new Vue({
            el: '#main',
            vuetify: new Vuetify(),
            data: {
                form: {},
                fieldTypes: [
                    @foreach(app("fieldTypes") as $type) '{{$type}}', @endforeach
                ]
            },
            methods: {
                resetForm() {
                    this.form = {
                        tableName: '',
                        idField: '',
                        timestamps: true,
                        fields: [this.fieldTemplate()]
                    };
                },
                fieldTemplate() {
                    return {
                        name: '',
                        type: '',
                        length: '',
                        default: '',
                        required: true
                    };
                },
            },
            mounted() {
                this.resetForm();
            }
        })
    </script>
@endpush
