<script>
    Vue.component('apm-switch', {
        template: '<span @click="toggle()"' +
            '          class="apm-switch"' +
            '          :class="{\'apm-checked\': value}">' +
            '    <span class="apm-switch-inner"></span></span>',
        props: {
            value: Boolean
        },
        methods: {
            toggle() {
                this.$emit('input', !this.value);
            }
        }
    });
</script>
