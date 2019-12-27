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
        },
        mounted() {
            this.resetForm();
        }
    });
</script>
