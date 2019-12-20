<script>
    Vue.component('home-page', {
        template: `
            @include('naveed.scaff::pages.home-page-template')
        `,
        data() {
            return {
                name: 'naveed'
            }
        }
    });
</script>
