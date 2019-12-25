<?php

return [

    /*
     * Directory containing the templates
     * If you want to use your custom templates, specify them here
     * */

    'templates' => 'vendor.naveed.scaff',

    /*
     * Namespace to generate the models in
     * the directory will dynamically determined using the namespace
     * */

    'model-namespace' => "App",

    /*
     * Namespace to generate the controllers in
     * the directory will dynamically determined using the namespace
     * */

    'controller-namespace' => "App\Http\Controllers",

    /*
     * Fields that should be skipped on the listing page
     * */

    'skipped-fields' => ['id', 'created_at', 'updated_at', 'password', 'token', 'remember_token'],

];
