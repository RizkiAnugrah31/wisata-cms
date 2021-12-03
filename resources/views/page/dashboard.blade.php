<!doctype html>
<html lang="en">
    @include('layouts.partials.htmlheader')
    <body class="skin-blue sidebar-mini">
        @php($auth = Session::get('auth'))
        <div class="wrapper">

            @include('layouts.mainheader')

            @include('layouts.partials.sidebar')

            <div class="content-wrapper">

                @include('layouts.partials.contentheader')

                <section class="content">
                    @yield('main-content')
                </section>
            </div>

            {{--@include('layouts.partials.controlsidebar')--}}

            @include('layouts.partials.footer')
        </div>
        @include('layouts.partials.script')
    </body>
</html>