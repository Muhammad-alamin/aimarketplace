<!DOCTYPE html>
<html lang="en">


@include('front.layouts._head')

<body>
    {{-- <script>
        // Disable right-click
            document.addEventListener('contextmenu', (e) => e.preventDefault());

            function ctrlShiftKey(e, keyCode) {
            return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
            }

            document.onkeydown = (e) => {
            // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
            if (
                event.keyCode === 123 ||
                ctrlShiftKey(e, 'I') ||
                ctrlShiftKey(e, 'J') ||
                ctrlShiftKey(e, 'C') ||
                (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
            )
                return false;
            };
    </script> --}}
    <div class="preloader"><span></span></div><!-- /.preloader -->
    <div class="page-wrapper">
        @include('front.layouts._topnav')
            @yield('content')
        @include('front.layouts._footer')
    </div><!-- /.page-wrapper -->
    @include('front.layouts._aside')
    @include('front.layouts._js')
</body>


<!-- Mirrored from st.ourhtmldemo.com/new/egypt/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Feb 2023 18:59:19 GMT -->
</html>
