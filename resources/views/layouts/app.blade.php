@include('layouts.parts.header')

<body class="has-navbar-vertical-aside navbar-vertical-aside-show-xl footer-offset">

    <script src="{{ asset('js/hs.theme-appearance.js')}}"></script>

    <script src="{{asset('/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside-mini-cache.js')}}"></script>

    <!-- ========== HEADER ========== -->

    <header id="header"
        class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
        <div class="navbar-nav-wrap">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('dashboard') }}" aria-label="{{ setting('app_name') }}">
                <img class="navbar-brand-logo" src="{{ setting('logo_dark') }}" alt="{{ setting('app_name') }}"
                    data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="{{ setting('logo_light') }}" alt="{{ setting('app_name') }}"
                    data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini" src="{{ setting('logo_dark') }}" alt="{{ setting('app_name') }}"
                    data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="{{ setting('logo_light') }}" alt="{{ setting('app_name') }}"
                    data-hs-theme-appearance="dark">
            </a>
            <!-- End Logo -->

            <div class="navbar-nav-wrap-content-start">
                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                    <i class="bi-arrow-bar-left navbar-toggler-short-align"
                        data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                    <i class="bi-arrow-bar-right navbar-toggler-full-align"
                        data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                        data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
                </button>

                <!-- End Navbar Vertical Toggle -->

                <!-- Search Form -->
                {{-- <div class="dropdown ms-2">
                    <!-- Input Group -->
                    <div class="d-none d-lg-block">
                        <div
                            class="input-group input-group-merge input-group-borderless input-group-hover-light navbar-input-group">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>

                            <input type="search" class="js-form-search form-control" placeholder="Search"
                                aria-label="Search" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                            <a class="input-group-append input-group-text" href="javascript:;">
                                <i id="clearSearchResultsIcon" class="bi-x-lg" style="display: none;"></i>
                            </a>
                        </div>
                    </div>

                    <button
                        class="js-form-search js-form-search-mobile-toggle btn btn-ghost-secondary btn-icon rounded-circle d-lg-none"
                        type="button" data-hs-form-search-options='{
                       "clearIcon": "#clearSearchResultsIcon",
                       "dropMenuElement": "#searchDropdownMenu",
                       "dropMenuOffset": 20,
                       "toggleIconOnFocus": true,
                       "activeClass": "focus"
                     }'>
                        <i class="bi-search"></i>
                    </button>
                    <!-- End Input Group -->

                    <!-- Card Search Content -->
                    <div id="searchDropdownMenu"
                        class="hs-form-search-menu-content dropdown-menu dropdown-menu-form-search navbar-dropdown-menu-borderless">
                        <!-- Body -->
                        <div class="card-body-height">
                            <div class="d-lg-none">
                                <div class="input-group input-group-merge navbar-input-group mb-5">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>

                                    <input type="search" class="form-control" placeholder="Search"
                                        aria-label="Search">
                                    <a class="input-group-append input-group-text" href="javascript:;">
                                        <i class="bi-x-lg"></i>
                                    </a>
                                </div>
                            </div>

                            <span class="dropdown-header">Recent searches</span>

                            <div class="dropdown-item bg-transparent text-wrap">
                                <a class="btn btn-soft-dark btn-xs rounded-pill" href="./index.html">
                                    Gulp <i class="bi-search ms-1"></i>
                                </a>
                                <a class="btn btn-soft-dark btn-xs rounded-pill" href="./index.html">
                                    Notification panel <i class="bi-search ms-1"></i>
                                </a>
                            </div>

                            <div class="dropdown-divider"></div>

                            <span class="dropdown-header">Tutorials</span>

                            <a class="dropdown-item" href="./index.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <span class="icon icon-soft-dark icon-xs icon-circle">
                                            <i class="bi-sliders"></i>
                                        </span>
                                    </div>

                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <span>How to set up Gulp?</span>
                                    </div>
                                </div>
                            </a>

                            <a class="dropdown-item" href="./index.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <span class="icon icon-soft-dark icon-xs icon-circle">
                                            <i class="bi-paint-bucket"></i>
                                        </span>
                                    </div>

                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <span>How to change theme color?</span>
                                    </div>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>

                            <span class="dropdown-header">Members</span>

                            <a class="dropdown-item" href="./index.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="avatar avatar-xs avatar-circle"
                                            src="{{ asset('img/160x160/img10.jpg')}}" alt="Image Description">
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <span>Amanda Harvey <i class="tio-verified text-primary" data-toggle="tooltip"
                                                data-placement="top" title="Top endorsed"></i></span>
                                    </div>
                                </div>
                            </a>

                            <a class="dropdown-item" href="./index.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img class="avatar avatar-xs avatar-circle" src="./assets/img/160x160/img3.jpg"
                                            alt="Image Description">
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <span>David Harrison</span>
                                    </div>
                                </div>
                            </a>

                            <a class="dropdown-item" href="./index.html">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-xs avatar-soft-info avatar-circle">
                                            <span class="avatar-initials">A</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <span>Anne Richard</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- End Body -->

                        <!-- Footer -->
                        <a class="card-footer text-center" href="./index.html">
                            See all results <i class="bi-chevron-right small"></i>
                        </a>
                        <!-- End Footer -->
                    </div>
                    <!-- End Card Search Content -->

                </div> --}}

                <!-- End Search Form -->
            </div>

            <div class="navbar-nav-wrap-content-end">
                <!-- Navbar -->
                <ul class="navbar-nav">
                    <li class="nav-item d-none d-sm-inline-block">
                        <!-- Notification -->
                        <div class="dropdown">
                            <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                                id="navbarNotificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                data-bs-auto-close="outside" data-bs-dropdown-animation>
                                <i class="bi-bell"></i>
                                <span class="btn-status btn-sm-status btn-status-danger"></span>
                            </button>

                            <div class="dropdown-menu dropdown-menu-end dropdown-card navbar-dropdown-menu navbar-dropdown-menu-borderless"
                                aria-labelledby="navbarNotificationsDropdown" style="width: 25rem;">
                                <!-- Header -->
                                <div class="card-header card-header-content-between">
                                    <h4 class="card-title mb-0">Notifications</h4>

                                    <!-- Unfold -->
                                    <div class="dropdown">
                                        <button type="button"
                                            class="btn btn-icon btn-sm btn-ghost-secondary rounded-circle"
                                            id="navbarNotificationsDropdownSettings" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="bi-three-dots-vertical"></i>
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless"
                                            aria-labelledby="navbarNotificationsDropdownSettings">
                                            <span class="dropdown-header">Settings</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-archive dropdown-item-icon"></i> Archive all
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-check2-all dropdown-item-icon"></i> Mark all as read
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-toggle-off dropdown-item-icon"></i> Disable notifications
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-gift dropdown-item-icon"></i> What's new?
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <span class="dropdown-header">Feedback</span>
                                            <a class="dropdown-item" href="#">
                                                <i class="bi-chat-left-dots dropdown-item-icon"></i> Report
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Unfold -->
                                </div>
                                <!-- End Header -->

                                <!-- Nav -->
                                <ul class="nav nav-tabs nav-justified" id="notificationTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#notificationNavOne"
                                            id="notificationNavOne-tab" data-bs-toggle="tab"
                                            data-bs-target="#notificationNavOne" role="tab"
                                            aria-controls="notificationNavOne" aria-selected="true">Messages (3)</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#notificationNavTwo" id="notificationNavTwo-tab"
                                            data-bs-toggle="tab" data-bs-target="#notificationNavTwo" role="tab"
                                            aria-controls="notificationNavTwo" aria-selected="false">Archived</a>
                                    </li>
                                </ul>
                                <!-- End Nav -->

                                <!-- Body -->
                                <div class="card-body-height">
                                    <!-- Tab Content -->
                                    <div class="tab-content" id="notificationTabContent">
                                        <div class="tab-pane fade show active" id="notificationNavOne" role="tabpanel"
                                            aria-labelledby="notificationNavOne-tab">
                                            <!-- List Group -->
                                            <ul class="list-group list-group-flush navbar-card-list-group">
                                                <!-- Item -->
                                                {{-- <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck1" checked>
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck1"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <img class="avatar avatar-sm avatar-circle"
                                                                    src="{{asset('img/160x160/img3.jpg')}}"
                                                                    alt="Image Description">
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Brian Warner</h5>
                                                            <p class="text-body fs-5">changed an issue from "In
                                                                Progress" to <span
                                                                    class="badge bg-success">Review</span></p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">2hr</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck2" checked>
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck2"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div
                                                                    class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                                                    <span class="avatar-initials">K</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Klara Hampton</h5>
                                                            <p class="text-body fs-5">mentioned you in a comment</p>
                                                            <blockquote class="blockquote blockquote-sm">
                                                                Nice work, love! You really nailed it. Keep it up!
                                                            </blockquote>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">10hr</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck3" checked>
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck3"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img"
                                                                        src="{{asset('img/160x160/img10.jpg')}}"
                                                                        alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Ruby Walter</h5>
                                                            <p class="text-body fs-5">joined the Slack group HS Team</p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">3dy</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck4">
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck4"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img"
                                                                        src="{{asset('svg/brands/google-icon.svg')}}"
                                                                        alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">from Google</h5>
                                                            <p class="text-body fs-5">Start using forms to capture the
                                                                information of prospects visiting your Google website
                                                            </p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">17dy</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck5">
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck5"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img"
                                                                        src="{{asset('img/160x160/img7.jpg')}}"
                                                                        alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Sara Villar</h5>
                                                            <p class="text-body fs-5">completed <i
                                                                    class="bi-journal-bookmark-fill text-primary"></i>
                                                                FD-7 task</p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">2mn</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li> --}}
                                                <!-- End Item -->
                                            </ul>
                                            <!-- End List Group -->
                                        </div>

                                        <div class="tab-pane fade" id="notificationNavTwo" role="tabpanel"
                                            aria-labelledby="notificationNavTwo-tab">
                                            <!-- List Group -->
                                            <ul class="list-group list-group-flush navbar-card-list-group">
                                                <!-- Item -->
                                                {{-- <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck6">
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck6"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div
                                                                    class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                                                    <span class="avatar-initials">A</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Anne Richard</h5>
                                                            <p class="text-body fs-5">accepted your invitation to join
                                                                Notion</p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">1dy</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck7">
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck7"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img"
                                                                        src="{{asset('img/160x160/img5.jpg')}}"
                                                                        alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Finch Hoot</h5>
                                                            <p class="text-body fs-5">left Slack group HS projects</p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">1dy</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck8">
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck8"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-dark avatar-circle">
                                                                    <span class="avatar-initials">HS</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Htmlstream</h5>
                                                            <p class="text-body fs-5">you earned a "Top endorsed" <i
                                                                    class="bi-patch-check-fill text-primary"></i> badge
                                                            </p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">6dy</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck9">
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck9"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div class="avatar avatar-sm avatar-circle">
                                                                    <img class="avatar-img"
                                                                        src="{{asset('img/160x160/img8.jpg')}}"
                                                                        alt="Image Description">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Linda Bates</h5>
                                                            <p class="text-body fs-5">Accepted your connection</p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">17dy</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li>
                                                <!-- End Item -->

                                                <!-- Item -->
                                                <li class="list-group-item form-check-select">
                                                    <div class="row">
                                                        <div class="col-auto">
                                                            <div class="d-flex align-items-center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        value="" id="notificationCheck10">
                                                                    <label class="form-check-label"
                                                                        for="notificationCheck10"></label>
                                                                    <span class="form-check-stretched-bg"></span>
                                                                </div>
                                                                <div
                                                                    class="avatar avatar-sm avatar-soft-dark avatar-circle">
                                                                    <span class="avatar-initials">L</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Col -->

                                                        <div class="col ms-n2">
                                                            <h5 class="mb-1">Lewis Clarke</h5>
                                                            <p class="text-body fs-5">completed <i
                                                                    class="bi-journal-bookmark-fill text-primary"></i>
                                                                FD-134 task</p>
                                                        </div>
                                                        <!-- End Col -->

                                                        <small class="col-auto text-muted text-cap">2mts</small>
                                                        <!-- End Col -->
                                                    </div>
                                                    <!-- End Row -->

                                                    <a class="stretched-link" href="#"></a>
                                                </li> --}}
                                                <!-- End Item -->
                                            </ul>
                                            <!-- End List Group -->
                                        </div>
                                    </div>
                                    <!-- End Tab Content -->
                                </div>
                                <!-- End Body -->

                                <!-- Card Footer -->
                                <a class="card-footer text-center" href="#">
                                    View all notifications <i class="bi-chevron-right"></i>
                                </a>
                                <!-- End Card Footer -->
                            </div>
                        </div>
                        <!-- End Notification -->
                    </li>

                    <li class="nav-item">
                        <!-- Account -->
                        <div class="dropdown">
                            <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"
                                data-bs-dropdown-animation>
                                <div class="avatar avatar-sm avatar-circle">
                                    <img class="avatar-img" src="{{ auth()->user()->image }}"
                                        alt="Image Description">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account"
                                aria-labelledby="accountNavbarDropdown">
                                <div class="dropdown-item-text">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm avatar-circle">
                                            <img class="avatar-img" src="{{ auth()->user()->image }}">
                                        </div>
                                        <div class="flex-grow-1 ms-2">
                                            <h5 class="mb-0">{{ auth()->user()->name }}</h5>
                                            <p class="card-text text-body">{{auth()->user()->email}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="dropdown-divider"></div>


                                {{-- <a class="dropdown-item" href="#">Profile &amp; account</a>
                                <a class="dropdown-item" href="#">Settings</a> --}}

                                <div class="dropdown-divider"></div>
                                <form action="{{route("logout")}}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Sign out</button>
                                </form>

                            </div>
                        </div>
                        <!-- End Account -->
                    </li>
                </ul>
                <!-- End Navbar -->
            </div>
        </div>
    </header>

    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    @include('layouts.navigation')

    <main id="content" role="main" class="main">
        <!-- Content -->
        <div class="content container-fluid">
            <!-- Page Header -->
            @isset($title)
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-sm mb-2 mb-sm-0">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-no-gutter">
                                <x-breadcrumbs framework="bootstrap5" />
                            </ol>
                        </nav>
                        {{ $title }}
                    </div>
                    @isset($buttons)
                    <div class="col-sm-auto">
                        {{ $buttons }}
                    </div>
                    @endisset
                </div>
            </div>
            @endisset

            <!-- End Page Header -->
            {{ $slot }}

            @include('layouts.parts.footer')
            @include('layouts.parts.offcanvas')
            @include('layouts.parts.toast')
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->
    @livewireScripts

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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- JS Front -->
    <script src="{{ asset('js/theme.min.js') }}"></script>
    <script src="{{ asset('/js/hs.theme-appearance-charts.js')}}"></script>

    <script src="{{ asset('/vendor/quill/dist/quill.min.js')}}"></script>

    <script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>

    <script src="{{ asset('/vendor/hs-navbar-vertical-aside/dist/hs-navbar-vertical-aside.min.js')}}"></script>
    <script src="{{ asset('/vendor/hs-form-search/dist/hs-form-search.min.js')}}"></script>

    <script src="{{ asset('/vendor/hs-file-attach/dist/hs-file-attach.min.js')}}"></script>
    <script src="{{ asset('/vendor/hs-sticky-block/dist/hs-sticky-block.min.js')}}"></script>
    <script src="{{ asset('/vendor/hs-scrollspy/dist/hs-scrollspy.min.js')}}"></script>
    <script src="{{ asset('/vendor/imask/dist/imask.min.js')}}"></script>
    <script src="{{ asset('/vendor/tom-select/dist/js/tom-select.complete.min.js')}}"></script>


    <script src="{{ asset('/vendor/hs-quantity-counter/dist/hs-quantity-counter.min.js')}}"></script>
    <script src="{{ asset('/vendor/hs-add-field/dist/hs-add-field.min.js')}}"></script>
    <script src="{{ asset('/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>

    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <script>
        @if(app()->isLocal())
            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;
        @endif

        var pusher = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {
            cluster: '{{config('broadcasting.connections.pusher.options.cluster')}}'
        });

        var channel = pusher.subscribe('notification');
        channel.bind('notification-event', function(data) {

            toast('Notification',data.message);

            if(!data.silent)
                playSound('{{asset('audio/ringtone-1-46486.mp3')}}');

        });

        function playSound(url) {
            const audio = new Audio(url);
            audio.addEventListener("canplaythrough", () => {
                audio.play().catch(e => {
                    window.addEventListener('click', () => {
                        audio.play()
                    }, { once: true })
                })
            });
        }
    </script>

    @stack("js")
    @yield('js')

    <script>
        (function() {
          window.onload = function () {
            
            // // INITIALIZATION OF ADD FIELD
            // // =======================================================
         new HSAddField('.js-add-field', {
             addedField: field => {
                HSCore.components.HSTomSelect.init(field.querySelector('.js-select-dynamic'))
               }
            })
          }

        // INITIALIZATION OF STICKY BLOCKS
        // =======================================================
        new HSStickyBlock('.js-sticky-block', {
          targetSelector: document.getElementById('header').classList.contains('navbar-fixed') ? '#header' : null
        })


        // SCROLLSPY
        // =======================================================
        new bootstrap.ScrollSpy(document.body, {
          target: '#navbarSettings',
          offset: 100
        })

        new HSScrollspy('#navbarVerticalNavMenu', {
          breakpoint: 'lg',
          scrollOffset: -20
        })
      }
    )()
    </script>

    <!-- JS Plugins Init. -->
    <script>
        (function() {
            window.onload = function () {
                

                // INITIALIZATION OF NAVBAR VERTICAL ASIDE
                // =======================================================
                new HSSideNav('.js-navbar-vertical-aside').init()


                // INITIALIZATION OF FORM SEARCH
                // =======================================================
                const HSFormSearchInstance = new HSFormSearch('.js-form-search')

                if (HSFormSearchInstance.collection.length) {
                HSFormSearchInstance.getItem(1).on('close', function (el) {
                    el.classList.remove('top-0')
                })

                document.querySelector('.js-form-search-mobile-toggle').addEventListener('click', e => {
                    let dataOptions = JSON.parse(e.currentTarget.getAttribute('data-hs-form-search-options')),
                    $menu = document.querySelector(dataOptions.dropMenuElement)

                    $menu.classList.add('top-0')
                    $menu.style.left = 0
                })
                }
            }
        })()
    </script>

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



      $(document).ready(function(){
        $('button[data-type="ajax"]').on('click', function(e){
            e.preventDefault();
            e.stopPropagation();

            text = $(this).html();
            $button = $(this);

            url = $(this).data('route');

            $.ajax({
                url: url,
                type: "POST",
                dataType : "json",
                data : {
                    "_token": "{{ csrf_token() }}",
                },
                beforeSend:function(){
                    $button.html("");
                    $button.addClass('spinner-grow');
                },
                complete: function(response, status){
                    json = response.responseJSON;
                    $button.html(text);
                    $button.removeClass('spinner-grow');

                    if(json.reload) location.reload();

                    if(json.redirect) location.href = json.redirect;
                }
            });
        });
      });


      $(document).delegate('form[data-type="ajax"]', 'submit', function(e) {
        e.stopPropagation();
        e.preventDefault();

        form = $(this);
        formdata = $(this).serialize();
        url = $(this).attr('action');
        method = $(this).attr('method');

        formName = $(this).data('name');

        successCallback = $(this).data('success-callback');
        errorCallback = $(this).data('error-callback');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            url: url,
            type: method,
            data: formdata,
            dataType: 'json',
            beforeSend: function() {
                $(form).find('button[type="submit"]').attr('disabled', 'disabled');
                $(form).find('.alert-danger').remove();
                $(form).find('.is-invalid').removeClass('is-invalid');
                $(form).find('.accordion-item').removeClass('border-danger');
            },
            success: function(data) {
                // $(form).find('input,textarea').val('');
                if (data.message)
                    toast(data.title ? data.title : 'İşlem başarılı', data.message, 'success');

                if (formName == 'el-commentar') {
                    $('.comment_write_hidden').trigger('click');
                }

                if (successCallback) {
                    a = successCallback.split(';');
                    for (i = 0; i < a.length; i++) {
                        eval(a[i]);
                    };
                }

                if (data.redirect) {
                    setTimeout(() => {
                        window.location.href = data.redirect;
                    }, 2000);
                }
            },
            error: function(data) {
                $(form).find('button[type="submit"]').removeProp('disabled').removeAttr('disabled');
                if (data.responseJSON.errors) {
                    $.each(data.responseJSON.errors, function(key, value) {
                        if (key == 'g-recaptcha-response')
                            $(form).find('[name="' + key + '"]').parent().css('height', 'auto');
                        // create bracket notation string from dot notation string
                        var bracketNotation = key.replace(/\./g, '[');
                        bracketNotation = bracketNotation.replace(/\[/g, '][');
                        // if string has [ then remove first occurence of ] and add ] at the end
                        if (bracketNotation.indexOf('][') > -1) {
                            bracketNotation = bracketNotation.replace(']', '');
                            bracketNotation += ']';
                        }
                        // TODO: support for multi language
                        $input = $(form).find('[name="' + bracketNotation + '[{{app()->getLocale()}}]"]');
                        if( $input.attr('type') == 'radio' ){
                            $input.addClass('is-invalid').last().parent().parent().append('<div class="alert alert-danger invalid-feedback d-block px-2">' + value + '</div>');
                        }else{
                            $input.addClass('is-invalid').parent().append('<div class="alert alert-danger invalid-feedback px-2">' + value + '</div>');
                        }
                        if($input.parents('.accordion-item').length){
                            $input.parents('.accordion-item').addClass('border-danger');
                        }
                    });
                }
                if (data.responseJSON.message)
                    toast(data.responseJSON.title, data.responseJSON.message, 'error');
                if (data.message)
                    toast(data.responseJSON.title, data.message, 'error');

                if (errorCallback) {
                    a = errorCallback.split(';');
                    for (i = 0; i < a.length; i++) {
                        console.log(a[i])
                        eval(a[i]);
                    };
                }
            },
            complete: function(data) {
                $(form).find('button[type="submit"]').removeProp('disabled').removeAttr('disabled');
                if(data.responseJSON.redirect)
                    location.href = data.responseJSON.redirect
                console.log(data.responseJSON)
            }
        });

    });

    function toast(title, message, status, autohide = true) {
        const toastView = document.querySelector('#liveToast').cloneNode(true);
        toastViewId = Date.now();
        toastView.setAttribute( 'id', toastViewId );

        liveToast = new bootstrap.Toast(toastView, {
            autohide: autohide
        });

        toastView.addEventListener('show.bs.toast', function(el){
            $(toastView).find('.toast-body').html(message)
        });

        document.querySelector('.toast-container').appendChild(toastView);

        liveToast.show();
    }
    </script>



    <!-- End Style Switcher JS -->
</body>

</html>