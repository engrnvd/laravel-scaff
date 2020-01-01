<script>
    Vue.component('crud-page', {
        template: `
            @include('naveed.scaff::pages.crud-page-template')
        `,
        data() {
            return {
                form: {},
                response: "",
                fieldTypes: [
                    @foreach($fieldTypes as $type) '{{$type}}', @endforeach
                ]
            }
        },
        methods: {
            resetForm() {
                this.form = {
                    tableName: '',
                    idField: 'id',
                    timestamps: true,
                    fields: [this.fieldTemplate()]
                };
            },
            beforeSend() {
                this.response = '';
            },
            onSuccess(res) {
                this.resetForm();
                this.response = res.data;
            },
            fieldTemplate() {
                return {
                    name: '',
                    type: '',
                    length: '',
                    default: '',
                    required: true,
                    index: false,
                    unique: false,
                    enumValues: [],
                };
            },
            loadTableDefinition() {
                http.get(`/naveed/scaff/load-definition?tableName=${this.form.tableName}`).then(res => {
                    if (res.data) {
                        this.form = res.data;
                    } else {
                        this.resetForm();
                    }
                });
            }
        },
        mounted() {
            let data = localStorage.getItem('apm-form-crud');
            if (data) {
                this.form = JSON.parse(data);
            } else {
                this.resetForm();
            }
            this.$watch('form', {
                handler(val) {
                    localStorage.setItem('apm-form-crud', JSON.stringify(val));
                },
                deep: true,
            });
        }
    });
</script>
