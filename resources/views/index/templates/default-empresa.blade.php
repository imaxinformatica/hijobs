<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('index.includes.head')
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        
        @include('index.includes.header-empresa')


        @yield('content')

        @include('index.includes.modals')
        
        @include('index.includes.footer')
        
    </body>

</html>