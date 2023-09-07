@include('layouts.parts.header')
<body class="footer-offset">

    <script src="{{ asset('js/hs.theme-appearance.js')}}"></script>

    <script src="{{asset('/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js')}}"></script>

    <main id="guest-content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            {{ $slot }}

            @include('layouts.parts.footer')
        </div>
    </main>

    <!-- JS Global Compulsory  -->
    <script src="{{ asset('/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('/vendor/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
    <script src="{{ asset('/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    <!-- JS Impleenting Plugins -->
    <script src="{{ asset('/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js')}}"></script>
    <script src="{{ asset('/vendor/hs-form-search/dist/hs-form-search.min.js')}}"></script>

    <script src="{{ asset('/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{ asset('/vendor/chartjs-chart-matrix/dist/chartjs-chart-matrix.min.js')}}"></script>
    <script src="{{ asset('/vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js')}}"></script>
    <script src="{{ asset('/vendor/daterangepicker/moment.min.js')}}"></script>
    <script src="{{ asset('/vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('/vendor/tom-select/dist/js/tom-select.complete.min.js')}}"></script>
    <script src="{{ asset('/vendor/clipboard/dist/clipboard.min.js')}}"></script>
    <script src="{{ asset('/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/vendor/datatables.net.extensions/select/select.min.js')}}"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- JS Front -->
    <script src="{{ asset('js/theme.min.js') }}"></script>
    <script src="{{ asset('/js/hs.theme-appearance-charts.js')}}"></script>

    <!-- Style Switcher JS -->

    <script>
        (function () {
         // STYLE SWITCHER
         // =======================================================
         const $dropdownBtn = document.getElementById('selectThemeDropdown') // Dropdowon trigger
         const $variants = document.querySelectorAll(`[aria-labelledby="selectThemeDropdown"] [data-icon]`) // All items of the dropdown
 
         // Function to set active style in the dorpdown menu and set icon for dropdown trigger
         const setActiveStyle = function () {
           $variants.forEach($item => {
             if ($item.getAttribute('data-value') === HSThemeAppearance.getOriginalAppearance()) {
               $dropdownBtn.innerHTML = `<i class="${$item.getAttribute('data-icon')}" />`
               return $item.classList.add('active')
             }
 
             $item.classList.remove('active')
           })
         }
 
         // Add a click event to all items of the dropdown to set the style
         $variants.forEach(function ($item) {
           $item.addEventListener('click', function () {
             HSThemeAppearance.setAppearance($item.getAttribute('data-value'))
           })
         })
 
         // Call the setActiveStyle on load page
         setActiveStyle()
 
         // Add event listener on change style to call the setActiveStyle function
         window.addEventListener('on-hs-appearance-change', function () {
           setActiveStyle()
         })
       })()
    </script>

    <!-- End Style Switcher JS -->
</body>

</html>