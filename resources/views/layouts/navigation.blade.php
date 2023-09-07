<!-- Navbar Vertical -->

<aside
    class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-light bg-light">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <!-- Logo -->

            <a class="navbar-brand" href="{{ route('dashboard') }}" aria-label="{{ setting('app_name') }}">
                <img class="navbar-brand-logo" src="{{ setting('logo_dark') }}" alt="{{ setting('app_name') }}" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo" src="{{ setting('logo_light') }}" alt="{{ setting('app_name') }}" data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini" src="{{ setting('logo_dark') }}" alt="{{ setting('app_name') }}" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini" src="{{ setting('logo_light') }}" alt="{{ setting('app_name') }}" data-hs-theme-appearance="dark">
            </a>

            <!-- End Logo -->

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

            <!-- Content -->
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                    {{-- Navigation menu is generated in app\Helper\Global.php --}}
                    {!! adminNavigation() !!}
                </div>
                <!-- End Collapse -->
            </div>
        </div>
        <!-- End Content -->

        <!-- Footer -->
        <div class="navbar-vertical-footer">
            <ul class="navbar-vertical-footer-list">
                <li class="navbar-vertical-footer-list-item">
                    <!-- Style Switcher -->
                    <div class="dropdown dropup">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                            id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                            data-bs-dropdown-animation>

                        </button>

                        <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless"
                            aria-labelledby="selectThemeDropdown">
                            <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                                <i class="bi-moon-stars me-2"></i>
                                <span class="text-truncate"
                                    title="@lang('system.theme.style.auto')">@lang('system.theme.style.auto')</span>
                            </a>
                            <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                                <i class="bi-brightness-high me-2"></i>
                                <span class="text-truncate"
                                    title="@lang('system.theme.style.light')">@lang('system.theme.style.light')</span>
                            </a>
                            <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                                <i class="bi-moon me-2"></i>
                                <span class="text-truncate"
                                    title="@lang('system.theme.style.dark')">@lang('system.theme.style.dark')</span>
                            </a>
                        </div>
                    </div>

                    <!-- End Style Switcher -->
                </li>

                {{-- <li class="navbar-vertical-footer-list-item">
                    <!-- Other Links -->
                    <div class="dropdown dropup">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                            id="otherLinksDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                            data-bs-dropdown-animation>
                            <i class="bi-info-circle"></i>
                        </button>

                        <div class="dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="otherLinksDropdown">
                            <span class="dropdown-header">Help</span>
                            <a class="dropdown-item" href="#">
                                <i class="bi-journals dropdown-item-icon"></i>
                                <span class="text-truncate" title="Resources &amp; tutorials">Resources &amp;
                                    tutorials</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="bi-command dropdown-item-icon"></i>
                                <span class="text-truncate" title="Keyboard shortcuts">Keyboard shortcuts</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="bi-alt dropdown-item-icon"></i>
                                <span class="text-truncate" title="Connect other apps">Connect other apps</span>
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="bi-gift dropdown-item-icon"></i>
                                <span class="text-truncate" title="What's new?">What's new?</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-header">Contacts</span>
                            <a class="dropdown-item" href="#">
                                <i class="bi-chat-left-dots dropdown-item-icon"></i>
                                <span class="text-truncate" title="Contact support">Contact support</span>
                            </a>
                        </div>
                    </div>
                    <!-- End Other Links -->
                </li> --}}

                @if( count(config('app.site_locales')) > 1 )
                <li class="navbar-vertical-footer-list-item">
                    <!-- Language -->
                    <div class="dropdown dropup">
                        <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle"
                            id="selectLanguageDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                            data-bs-dropdown-animation>
                            <img class="avatar avatar-xss avatar-circle"
                                src="{{asset(config('app.site_locales')[app()->getLocale()]['flag'])}}"
                                alt="United States Flag">
                        </button>

                        <div class="dropdown-menu navbar-dropdown-menu-borderless"
                            aria-labelledby="selectLanguageDropdown">
                            <span class="dropdown-header">@lang('main.language_menu.title')</span>
                            @foreach ( config('app.site_locales') as $code => $locale)
                            <a class="dropdown-item" href="{{route('system.set.locale', $code)}}">
                                <img class="avatar avatar-xss avatar-circle me-2" src="{{asset($locale['flag'])}}"
                                    alt="Flag">
                                <span class="text-truncate" title="{{$locale['label']}}">{{$locale['label']}}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- End Language -->
                </li>
                @endif
            </ul>
        </div>
        <!-- End Footer -->
    </div>
</aside>

<!-- End Navbar Vertical -->