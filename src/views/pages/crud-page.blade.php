<script>
    Vue.component('crud-page', {
        template: `
            @include('naveed.scaff::pages.crud-page-template')
        `,
        data() {
            return {
                form: {},
                response: [],
                fieldTypes: [
                    @foreach($fieldTypes as $type) '{{$type}}', @endforeach
                ]
            }
        },
        methods: {
            resetForm() {
                this.form = {
                    tableName: 'expenses',
                    idField: 'id',
                    timestamps: true,
                    fields: [this.fieldTemplate()]
                };
            },
            onSuccess(res) {
                this.resetForm();
                this.response = res.data;
            },
            fieldTemplate() {
                return {
                    name: 'title',
                    type: 'string',
                    length: '191',
                    default: 'def-val',
                    required: true,
                    index: false,
                    unique: false,
                };
            },
        },
        mounted() {
            this.resetForm();
        }
    });
</script>
