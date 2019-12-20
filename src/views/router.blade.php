<script>
    const routes = [
        {path: '/crud', component: Vue.component('crud-page')},
        {path: '/', component: Vue.component('home-page')},
        {path: '*', redirect: '/'},
    ]

    scaffRouter = new VueRouter({routes});
</script>
