<!DOCTYPE html>
<html lang="en">
@include('theme.web.head')
<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            @include('theme.web.aside')
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include('theme.web.header')
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    {{$slot}}
                </div>
                @include('theme.web.footer')
            </div>
        </div>
    </div>
    @include('theme.web.js')
    @yield('custom_js')
</body>
</html>