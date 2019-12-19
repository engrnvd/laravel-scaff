<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Scaffolder by Naveed</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.materialdesignicons.com/4.5.95/css/materialdesignicons.min.css" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @include('naveed.scaff::styles')
    @stack('styles')
</head>
<body>
<div class="container">
    <header class="text-center">
        <h1>Laravel Scaffolder by Naveed</h1>
    </header>

    @yield('content')

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    @foreach (app('vueAssets') as $file)
        @include('naveed.scaff::vue.shared.' . str_replace('.blade.php', '', $file->getFilename()))
    @endforeach

    @stack('scripts')
</div>
</body>
</html>
