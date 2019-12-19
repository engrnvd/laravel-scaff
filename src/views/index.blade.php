<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Scaffolder by Naveed</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    @include('naveed.scaff::styles')
</head>
<body>
<div id="my-app">
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" app>
            <v-list dense>
                <router-link to="/bar">
                    <v-list-item link>
                        <v-list-item-action>
                            <v-icon>mdi-home</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>Go to Bar</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </router-link>
                <router-link to="/foo">
                    <v-list-item link>
                        <v-list-item-action>
                            <v-icon>mdi-home</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>Go to Foo</v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </router-link>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar app color="indigo" dark>
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>Laravel Scaffolder by Naveed</v-toolbar-title>
        </v-app-bar>

        <v-content>
            <v-container class="fill-height" fluid>
                <v-row align="center" justify="center">
                    <v-col class="text-center">
                        <router-view></router-view>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
        <v-footer color="indigo" app>
            <span class="white--text">The AppMakers &copy; 2019</span>
        </v-footer>
    </v-app>
</div>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>

@foreach (app('vueAssets') as $file)
    @include('naveed.scaff::vue.shared.' . str_replace('.blade.php', '', $file->getFilename()))
@endforeach

<script>
    var app = new Vue({
        el: '#my-app',
        vuetify: new Vuetify(),
        router: scaffRouter,
        data: {
            drawer: true,
            form: {},
            fieldTypes: [
                @foreach(app("fieldTypes") as $type) '{{$type}}', @endforeach
            ]
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
    })
</script>
</body>
</html>
