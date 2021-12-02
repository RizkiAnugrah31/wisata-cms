<!doctype html>
<html lang="en">
@include('layouts.partials.htmlheader')
@yield('content')
</html>

@extends('layouts.auth')
@section('title','login')

@section('content')
    <body class="hold-transition login-page">
    <div class="login-box"..>
    
        @include('layouts.partials.script')
        <script>
            $(function (){
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseAre: '20%' 
                });
            });
        </script>
        </body>
    @endsection