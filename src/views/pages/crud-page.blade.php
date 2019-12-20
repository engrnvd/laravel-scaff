<script>
    Vue.component('crud-page', {
        template: `
            @include('naveed.scaff::pages.crud-page-template')
        `,
        data() {
            return {
                form: {},
                fieldTypes: [
                    @foreach($fieldTypes as $type) '{{$type}}', @endforeach
                ]
            }
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
    });
</script>
