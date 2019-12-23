<script>
    Vue.component('apm-form', {
        template: '<form name="apmForm" @submit.prevent.stop="saveForm" novalidate method="post">' +
            '        <loader v-if="loading"></loader>' +
            '        <slot></slot>' +
            '        <div v-if="errorResponse" class="alert alert-danger error-message">@{{errorResponse}}</div>' +
            '    </form>',
        props: {
            action: String,
            value: Object,
            retainValues: {
                type: Boolean,
                default: false
            },
            beforeSend: Function,
        },
        data() {
            return {
                loading: false,
                errorResponse: ''
            }
        },
        methods: {
            saveForm() {
                this.loading = true;
                this.errorResponse = "";

                // get data to post
                let data = null;
                if (this.beforeSend) {
                    data = this.beforeSend();
                }
                if (!data) data = this.value;

                return http.post(this.action, data).then(response => {
                    console.log('success', response);
                    if (!this.retainValues) this.$emit('input', {});
                    this.$emit('on-success', response);
                }).catch(response => {
                    console.log('error', response);
                    let data = response.data;
                    if (typeof data == 'string') {
                        this.errorResponse = data;
                    } else {
                        let value = {...this.value};
                        value.$errors = data.errors || data;
                        this.$emit('input', value);
                    }

                    this.$emit('on-error', response);
                }).then(response => {
                    this.loading = false;
                });
            }
        }
    });
</script>
