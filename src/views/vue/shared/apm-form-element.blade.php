<script>
    Vue.component('apm-form-element', {
        template: '<div class="form-group" :class="{\'has-error\': errors}">' +
            '        <slot></slot>' +
            '        <span class="help-block text-danger" v-if="errors" v-for="msg in errors">@{{msg}}</span>' +
            '    </div>',
        props: {
            model: Object,
            field: String
        },
        computed: {
            errors() {
                if (this.model && this.model.$errors && this.model.$errors.hasOwnProperty([this.field]))
                    return this.model.$errors[this.field];
                return "";
            }
        }
    });
</script>
