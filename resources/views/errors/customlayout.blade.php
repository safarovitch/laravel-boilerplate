<x-guest-layout>
    <div class="content container-fluid">
        <div class="row justify-content-center align-items-sm-center py-sm-10">
            <div class="col-9 col-sm-6 col-lg-4">
                <div class="text-center text-sm-end me-sm-4 mb-5 mb-sm-0">
                    <img class="img-fluid" src="{{asset('/svg/illustrations/oc-thinking.svg')}}" alt=""
                        data-hs-theme-appearance="default">
                    <img class="img-fluid" src="{{asset('/svg/illustrations-light/oc-thinking.svg')}}"
                        alt="" data-hs-theme-appearance="dark">
                </div>
            </div>
            <!-- End Col -->

            <div class="col-sm-6 col-lg-4 text-center text-sm-start">
                <h1 class="display-1 mb-0">@yield('code')</h1>
                <p class="lead">@yield('message')</p>
                <a class="btn btn-primary" href="{{ url('/') }}">{{__('Go back to the App')}}</a>
            </div>
            <!-- End Col -->
        </div>
        <!-- End Row -->
    </div>
</x-guest-layout>