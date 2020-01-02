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
     * Namespace to of the parent model which the generated model will extend
     * */

    'parent-model-namespace' => "Jenssegers\Mongodb\Eloquent\Model",

    /*
     * Namespace to generate the controllers in
     * the directory will dynamically determined using the namespace
     * */

    'controller-namespace' => "App\Http\Controllers",

    /*
     * Fields that should be skipped on the listing page
     * */

    'skipped-fields' => ['created_at', 'updated_at', 'password', 'token', 'remember_token'],

    /*
     * All the crud routes will be inserted in a separate file called crud-routes.php
     * and the file will be included in the following file
     * */

    'routes-file' => base_path('routes') . "/web.php",

    /*
     * Where to store the views
     * */
    'views-directory' => app_path('frontend/src/views/app/'),

    /*
     * What views to generate
     * */
    'views' => ['index', 'create'],

    /*
     * View Files extension
     * */
    'view-files-extension' => 'vue',
];
