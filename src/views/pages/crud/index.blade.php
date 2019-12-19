@extends('naveed.scaff::layouts.main-layout')

@section('content')
    <main id="main">
        <h2>Generate Crud</h2>
        <apm-form action="/naveed/scaff/gen-crud" v-model="form">
            <apm-form-element field="name" :model="form">
                <input type="text" class="form-control" v-model="form.name">
            </apm-form-element>
            <div class="from-group">
                <apm-switch v-model="form.flag"></apm-switch>
            </div>
            <div class="from-group">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </apm-form>
    </main>
@endsection

@push('scripts')
    <script>
        var app = new Vue({
            el: '#main',
            data: {
                form: {},
            }
        })
    </script>
@endpush
