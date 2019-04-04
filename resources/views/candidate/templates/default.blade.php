<!DOCTYPE html>
<html lang="pt-br">
    <head>
        @include('candidate.includes.head')
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        
        @include('candidate.includes.header')


        @yield('content')

        @include('candidate.includes.modals')
        
        @include('candidate.includes.footer')
        
    </body>

</html>