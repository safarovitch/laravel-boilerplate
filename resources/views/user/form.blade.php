@section('css')
@prepend('css')
@endsection
<x-app-layout>
	<x-slot name="title">
		<h1 class="page-header-title">@lang('user.title')</h1>
	</x-slot>
	<form action="@isset($user){{route('user.update', $user)}}@else{{route('user.store')}}@endisset" method="POST"
		data-type="ajax">
		@isset($user)
		@method('PUT')
		@endisset
		@csrf
		<div class="row">
			<div class="col-lg-3">
				<!-- Navbar -->
				<div class="navbar-expand-lg navbar-vertical mb-3 mb-lg-5">
					<!-- Navbar Toggle -->
					<!-- Navbar Toggle -->
					<div class="d-grid">
						<button type="button" class="navbar-toggler btn btn-white mb-3" data-bs-toggle="collapse"
							data-bs-target="#navbarVerticalNavMenu" aria-label="Toggle navigation" aria-expanded="false"
							aria-controls="navbarVerticalNavMenu">
							<span class="d-flex justify-content-between align-items-center">
								<span class="text-dark">Menu</span>

								<span class="navbar-toggler-default">
									<i class="bi-list"></i>
								</span>

								<span class="navbar-toggler-toggled">
									<i class="bi-x"></i>
								</span>
							</span>
						</button>
					</div>
					<!-- End Navbar Toggle -->
					<!-- End Navbar Toggle -->

					<!-- Navbar Collapse -->
					<div id="navbarVerticalNavMenu" class="collapse navbar-collapse">
						<ul id="navbarSettings"
							class="js-sticky-block js-scrollspy card card-navbar-nav nav nav-tabs nav-lg nav-vertical"
							data-hs-sticky-block-options="{
						 &quot;parentSelector&quot;: &quot;#navbarVerticalNavMenu&quot;,
						 &quot;targetSelector&quot;: &quot;#header&quot;,
						 &quot;breakpoint&quot;: &quot;lg&quot;,
						 &quot;startPoint&quot;: &quot;#navbarVerticalNavMenu&quot;,
						 &quot;endPoint&quot;: &quot;#stickyBlockEndPoint&quot;,
						 &quot;stickyOffsetTop&quot;: 20
					   }">
							<li class="nav-item">
								<a class="nav-link active" href="#content">
									<i class="bi-person nav-icon"></i> Basic information
								</a>
							</li>
							{{-- <li class="nav-item">
								<a class="nav-link" href="#preferencesSection">
									<i class="bi-gear nav-icon"></i> Preferences
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#recentDevicesSection">
									<i class="bi-phone nav-icon"></i> Recent devices
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#notificationsSection">
									<i class="bi-bell nav-icon"></i> Notifications
								</a>
							</li> --}}
							<li class="nav-item">
								<a class="nav-link" href="#apiTokens">
									<i class="bi-key nav-icon"></i> Api Tokens
								</a>
							</li>
							{{-- <li class="nav-item">
								<a class="nav-link" href="#connectedAccountsSection">
									<i class="bi-diagram-3 nav-icon"></i> Connected accounts
								</a>
							</li> --}}
							<li class="nav-item">
								<a class="nav-link" href="#deleteAccountSection">
									<i class="bi-trash nav-icon"></i> Delete account
								</a>
							</li>
						</ul>
					</div>
					<!-- End Navbar Collapse -->
				</div>
				<!-- End Navbar -->
			</div>

			<div class="col-lg-9">
				<div class="d-grid gap-3 gap-lg-5">
					<!-- Card -->
					<div class="card">
						<!-- Profile Cover -->
						<div class="profile-cover">
							<div class="profile-cover-img-wrapper">
								<img id="profileCoverImg" class="profile-cover-img"
									src="{{ asset('img/1920x400/img2.jpg')}}" alt="Image Description">

								<!-- Custom File Cover -->
								<div class="profile-cover-content profile-cover-uploader p-3">
									<input type="file" class="js-file-attach profile-cover-uploader-input"
										id="profileCoverUplaoder" data-hs-file-attach-options="{
									&quot;textTarget&quot;: &quot;#profileCoverImg&quot;,
									&quot;mode&quot;: &quot;image&quot;,
									&quot;targetAttr&quot;: &quot;src&quot;,
									&quot;allowTypes&quot;: [&quot;.png&quot;, &quot;.jpeg&quot;, &quot;.jpg&quot;]
								 }">
									<label class="profile-cover-uploader-label btn btn-sm btn-white"
										for="profileCoverUplaoder">
										<i class="bi-camera-fill"></i>
										<span class="d-none d-sm-inline-block ms-1">Upload header</span>
									</label>
								</div>
								<!-- End Custom File Cover -->
							</div>
						</div>
						<!-- End Profile Cover -->

						<!-- Avatar -->
						<label class="avatar avatar-xxl avatar-circle avatar-uploader profile-cover-avatar"
							for="editAvatarUploaderModal">
							<img id="editAvatarImgModal" class="avatar-img" src="{{$user->image}}"
								alt="Image Description">

							<input type="file" class="js-file-attach avatar-uploader-input" id="editAvatarUploaderModal"
								data-hs-file-attach-options="{
								&quot;textTarget&quot;: &quot;#editAvatarImgModal&quot;,
								&quot;mode&quot;: &quot;image&quot;,
								&quot;targetAttr&quot;: &quot;src&quot;,
								&quot;allowTypes&quot;: [&quot;.png&quot;, &quot;.jpeg&quot;, &quot;.jpg&quot;]
							 }">

							<span class="avatar-uploader-trigger">
								<i class="bi-pencil-fill avatar-uploader-icon shadow-sm"></i>
							</span>
						</label>
						<!-- End Avatar -->

						<!-- Body -->
						<div class="card-body">
							<div class="row">
								<div class="col-sm-5">
									<span class="d-block fs-5 mb-2">Status</span>

									<!-- Select -->
									<div class="tom-select-custom">
										<div class="tom-select-custom">
											<select class="js-select form-select" data-hs-tom-select-options='{
													  "searchInDropdown": false,
													  "dropdownWidth": "auto"
													}'>
												@foreach(\App\Enums\Status::getInstances() as $status)
												<option value="{{ $status->value }}"
													data-option-template='<div class="d-flex align-items-start"><div class="flex-shrink-0"><i class="bi-globe"></i></div><div class="flex-grow-1 ms-2"><span class="d-block fw-semi-bold">{{$status->value}}</span><span class="tom-select-custom-hide small">{{$status->description}}</span></div></div>'>
													{{ucfirst($status->value)}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<!-- End Select -->
							</div>
							<!-- End Col -->
						</div>
						<!-- End Body -->
					</div>
					<!-- End Card -->

					<!-- Card -->
					<div class="card">
						<div class="card-header">
							<h2 class="card-title h4">Basic information</h2>
						</div>

						<!-- Body -->
						<div class="card-body">
							<!-- Form -->
							<form>
								<!-- Form -->
								<div class="row mb-4">
									<label for="name" class="col-sm-3 col-form-label form-label">Full name</label>

									<div class="col-sm-9">
										<div class="input-group input-group-sm-vertical">
											<input type="text" class="form-control" name="name" id="name"
												value="{{old('name', $user->name)}}">
										</div>
									</div>
								</div>
								<!-- End Form -->

								<!-- Form -->
								<div class="row mb-4">
									<label for="email" class="col-sm-3 col-form-label form-label">Email</label>

									<div class="col-sm-9">
										<input type="email" class="form-control" name="email" id="email"
											value="{{old('email', $user->email)}}">
									</div>
								</div>
								<!-- End Form -->

								<!-- Form -->
								<div class="row mb-4">
									<label for="phoneLabel" class="col-sm-3 col-form-label form-label">Phone <span
											class="form-label-secondary">(Optional)</span></label>

									<div class="col-sm-9">
										<input type="text" class="js-input-mask form-control" name="phone"
											id="phoneLabel" value="{{old('phone', $user->phone)}}">
									</div>
								</div>
								<!-- End Form -->

								<div class="d-flex justify-content-end">
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
							<!-- End Form -->
						</div>
						<!-- End Body -->
					</div>
					<!-- End Card -->


					<!-- Card -->
					<div id="preferencesSection" class="card d-none">
						<div class="card-header">
							<h4 class="card-title">Preferences</h4>
						</div>

						<!-- Body -->
						<div class="card-body">
							<!-- Form -->
							<form>
								<!-- Form -->
								<div class="row mb-4">
									<label for="languageLabel-tomselected" class="col-sm-3 col-form-label form-label"
										id="languageLabel-ts-label">Language</label>

									<div class="col-sm-9">
										<!-- Select -->
										<div class="tom-select-custom">
											<select class="js-select form-select tomselected" id="languageLabel"
												data-hs-tom-select-options="{
									  &quot;searchInDropdown&quot;: false
									}" tabindex="-1" hidden="hidden">
												<option value="language2"
													data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle me-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/gb.svg&quot; alt=&quot;Image description&quot; width=&quot;16&quot;/><span>English (UK)</span></span>"
													selected="true">English (UK)</option>
												<option label="empty"></option>
												<option value="language1"
													data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle me-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/us.svg&quot; alt=&quot;Image description&quot; width=&quot;16&quot;/><span>English (US)</span></span>">
													English (US)</option>

												<option value="language3"
													data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle me-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/de.svg&quot; alt=&quot;Image description&quot; width=&quot;16&quot;/><span>Deutsch</span></span>">
													Deutsch</option>
												<option value="language4"
													data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle me-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/dk.svg&quot; alt=&quot;Image description&quot; width=&quot;16&quot;/><span>Dansk</span></span>">
													Dansk</option>
												<option value="language5"
													data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle me-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/es.svg&quot; alt=&quot;Image description&quot; width=&quot;16&quot;/><span>Español</span></span>">
													Español</option>
												<option value="language6"
													data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle me-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/nl.svg&quot; alt=&quot;Image description&quot; width=&quot;16&quot;/><span>Nederlands</span></span>">
													Nederlands</option>
												<option value="language7"
													data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle me-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/it.svg&quot; alt=&quot;Image description&quot; width=&quot;16&quot;/><span>Italiano</span></span>">
													Italiano</option>
												<option value="language8"
													data-option-template="<span class=&quot;d-flex align-items-center&quot;><img class=&quot;avatar avatar-xss avatar-circle me-2&quot; src=&quot;./assets/vendor/flag-icon-css/flags/1x1/cn.svg&quot; alt=&quot;Image description&quot; width=&quot;16&quot;/><span>中文 (繁體)</span></span>">
													中文 (繁體)</option>
											</select>
											<div
												class="ts-control js-select form-select single plugin-change_listener plugin-hs_smart_position input-hidden">
												<div class="items ts-input full has-items"><span
														class="d-flex align-items-center item"
														data-value="language2"><img
															class="avatar avatar-xss avatar-circle me-2"
															src="./assets/vendor/flag-icon-css/flags/1x1/gb.svg"
															alt="Image description" width="16"><span>English
															(UK)</span></span><input type="select-one"
														autocomplete="off" size="1" tabindex="0" role="combobox"
														haspopup="listbox" aria-expanded="false"
														aria-controls="languageLabel-ts-dropdown"
														id="languageLabel-tomselected"></div>
												<div class="tom-select-custom">
													<div class="ts-dropdown single js-select form-select plugin-change_listener plugin-hs_smart_position"
														style="display: none;">
														<div role="listbox" id="languageLabel-ts-dropdown" tabindex="-1"
															class="ts-dropdown-content"
															aria-labelledby="languageLabel-ts-label"></div>
													</div>
												</div>
											</div>
										</div>
										<!-- End Select -->
									</div>
								</div>
								<!-- End Form -->

								<!-- Form -->
								<div class="row mb-4">
									<label for="timeZoneLabel" class="col-sm-3 col-form-label form-label">Time
										zone</label>

									<div class="col-sm-9">
										<input type="text" class="form-control" name="currentPassword"
											id="timeZoneLabel" placeholder="Your time zone" aria-label="Your time zone"
											value="GMT+01:00" readonly="">
									</div>
								</div>
								<!-- End Form -->

								<!-- Form Switch -->
								<label class="row form-check form-switch mb-4" for="accounrSettingsPreferencesSwitch1">
									<span class="col-8 col-sm-9 ms-0">
										<span class="d-block text-dark">Early release</span>
										<span class="d-block fs-5">Get included on early releases for new Front
											features.</span>
									</span>
									<span class="col-4 col-sm-3 text-end">
										<input type="checkbox" class="form-check-input"
											id="accounrSettingsPreferencesSwitch1">
									</span>
								</label>
								<!-- End Form Switch -->

								<!-- Form Switch -->
								<label class="row form-check form-switch mb-4" for="accounrSettingsPreferencesSwitch2">
									<span class="col-8 col-sm-9 ms-0">
										<span class="d-block text-dark mb-1">See info about people who view my
											profile</span>
										<span class="d-block fs-5 text-muted"><a class="link" href="#">More about viewer
												info</a>.</span>
									</span>
									<span class="col-4 col-sm-3 text-end">
										<input type="checkbox" class="form-check-input"
											id="accounrSettingsPreferencesSwitch2" checked="">
									</span>
								</label>
								<!-- End Form Switch -->

								<div class="d-flex justify-content-end">
									<button type="submit" class="btn btn-primary">Save Changes</button>
								</div>
							</form>
							<!-- End Form -->
						</div>
						<!-- End Body -->
					</div>
					<!-- End Card -->

					<!-- Card -->
					<div id="recentDevicesSection" class="card d-none">
						<div class="card-header">
							<h4 class="card-title">Recent devices</h4>
						</div>

						<!-- Body -->
						<div class="card-body">
							<p class="card-text">View and manage devices where you're currently logged in.</p>
						</div>
						<!-- End Body -->

						<!-- Table -->
						<div class="table-responsive">
							<table class="table table-thead-bordered table-nowrap table-align-middle card-table">
								<thead class="thead-light">
									<tr>
										<th>Browser</th>
										<th>Device</th>
										<th>Location</th>
										<th>Most recent activity</th>
									</tr>
								</thead>

								<tbody>
									<tr>
										<td class="align-items-center">
											<img class="avatar avatar-xss me-2"
												src="{{asset('svg/brands/chrome-icon.svg')}}" alt="Image Description">
											Chrome on Windows
										</td>
										<td><i class="bi-laptop fs-3 me-2"></i> Dell XPS 15 <span
												class="badge bg-soft-success text-success ms-1">Current</span></td>
										<td>London, UK</td>
										<td>Now</td>
									</tr>

									<tr>
										<td class="align-items-center">
											<img class="avatar avatar-xss me-2"
												src="{{asset('svg/brands/chrome-icon.svg')}}" alt="Image Description">
											Chrome on Android
										</td>
										<td><i class="bi-phone fs-3 me-2"></i> Google Pixel 3a</td>
										<td>London, UK</td>
										<td>15, August 2020 15:08</td>
									</tr>

									<tr>
										<td class="align-items-center">
											<img class="avatar avatar-xss me-2"
												src="{{asset('svg/brands/chrome-icon.svg')}}" alt="Image Description">
											Chrome on Windows
										</td>
										<td><i class="bi-display fs-3 me-2"></i> Microsoft Studio 2</td>
										<td>London, UK</td>
										<td>12, August 2020 20:07</td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- End Table -->
					</div>
					<!-- End Card -->

					<!-- Card -->
					<div id="notificationsSection" class="card d-none">
						<div class="card-header">
							<h4 class="card-title">Notifications</h4>
						</div>

						<!-- Alert -->
						<div class="alert alert-soft-dark card-alert text-center" role="alert">
							We need permission from your browser to show notifications. <a class="alert-link"
								href="#">Request permission</a>
						</div>
						<!-- End Alert -->

						<form>
							<!-- Table -->
							<div class="table-responsive datatable-custom">
								<table
									class="table table-thead-bordered table-nowrap table-align-middle table-first-col-px-0">
									<thead class="thead-light">
										<tr>
											<th>Type</th>
											<th class="text-center">
												<div class="mb-1">
													<img class="avatar avatar-xs"
														src="{{asset('svg/illustrations/oc-email-at.svg')}}"
														alt="Image Description" data-hs-theme-appearance="default">
													<img class="avatar avatar-xs"
														src="{{asset('svg/illustrations-light/oc-email-at.svg')}}"
														alt="Image Description" data-hs-theme-appearance="dark">
												</div>
												Email
											</th>
											<th class="text-center">
												<div class="mb-1">
													<img class="avatar avatar-xs"
														src="{{asset('svg/illustrations/oc-globe.svg')}}"
														alt="Image Description" data-hs-theme-appearance="default">
													<img class="avatar avatar-xs"
														src="{{asset('svg/illustrations-light/oc-globe.svg')}}"
														alt="Image Description" data-hs-theme-appearance="dark">
												</div>
												Browser
											</th>
											<th class="text-center">
												<div class="mb-1">
													<img class="avatar avatar-xs"
														src="{{asset('svg/illustrations/oc-phone.svg')}}"
														alt="Image Description" data-hs-theme-appearance="default">
													<img class="avatar avatar-xs"
														src="{{asset('svg/illustrations-light/oc-phone.svg')}}"
														alt="Image Description" data-hs-theme-appearance="dark">
												</div>
												SMS
											</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td>New for you</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox1">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox1"></label>
												</div>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox2">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox2"></label>
												</div>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox3">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox3"></label>
												</div>
											</td>
										</tr>

										<tr>
											<td>Account activity <i class="bi-question-circle text-body ms-1"
													data-bs-toggle="tooltip" data-bs-placement="top" title=""
													data-bs-original-title="Get important notifications about you or activity you've missed"
													aria-label="Get important notifications about you or activity you've missed"></i>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox4">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox4"></label>
												</div>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox5" checked="">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox5"></label>
												</div>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox6" checked="">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox6"></label>
												</div>
											</td>
										</tr>

										<tr>
											<td>A new browser used to sign in</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox7" checked="">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox7"></label>
												</div>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox8" checked="">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox8"></label>
												</div>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox9" checked="">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox9"></label>
												</div>
											</td>
										</tr>

										<tr>
											<td>A new device is linked</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox10">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox10"></label>
												</div>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox11" checked="">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox11"></label>
												</div>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox12">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox12"></label>
												</div>
											</td>
										</tr>

										<tr>
											<td>A new device connected <i class="bi-question-circle text-body ms-1"
													data-bs-toggle="tooltip" data-bs-placement="top" title=""
													data-bs-original-title="Email me when a new device connected"
													aria-label="Email me when a new device connected"></i></td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox13">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox13"></label>
												</div>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox14" checked="">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox14"></label>
												</div>
											</td>
											<td class="text-center">
												<div class="form-check form-check-inline">
													<input class="form-check-input" type="checkbox" value=""
														id="editUserModalAlertsCheckbox15" checked="">
													<label class="form-check-label"
														for="editUserModalAlertsCheckbox15"></label>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- End Table -->
						</form>

						<hr>

						<!-- Body -->
						<div class="card-body">
							<div class="row">
								<div class="col-sm">
									<!-- Form -->
									<div class="mb-4">
										<p class="card-text">When should we send you notifications?</p>

										<!-- Select -->
										<div class="tom-select-custom">
											<select class="js-select form-select tomselected" autocomplete="off"
												data-hs-tom-select-options="{
										&quot;searchInDropdown&quot;: false,
										&quot;width&quot;: &quot;15rem&quot;,
										&quot;hideSearch&quot;: true
									  }" id="tomselect-4" tabindex="-1" hidden="hidden">
												<option value="whenToSendNotification1" selected="true">Always</option>

												<option value="whenToSendNotification2">Only when I'm online</option>
											</select>
											<div class="ts-control js-select form-select single plugin-change_listener plugin-hs_smart_position input-hidden"
												style="width: 15rem;">
												<div class="items ts-input full has-items">
													<div data-value="whenToSendNotification1" class="item">Always</div>
												</div>
												<div class="tom-select-custom">
													<div class="ts-dropdown single js-select form-select plugin-change_listener plugin-hs_smart_position"
														style="display: none;">
														<div role="listbox" id="tomselect-4-ts-dropdown" tabindex="-1"
															class="ts-dropdown-content"></div>
													</div>
												</div>
											</div>
										</div>
										<!-- End Select -->
									</div>
									<!-- End Form -->
								</div>
								<!-- End Col -->

								<div class="col-sm">
									<!-- Form -->
									<div class="mb-4">
										<p class="card-text">Send me a daily summary ("Daily Digest") of task activity.
										</p>

										<div class="row">
											<div class="col-auto mb-2">
												<!-- Select -->
												<div class="tom-select-custom">
													<select class="js-select form-select tomselected" autocomplete="off"
														data-hs-tom-select-options="{
										  &quot;searchInDropdown&quot;: false,
										  &quot;hideSearch&quot;: true,
										  &quot;dropdownWidth&quot;: &quot;10rem&quot;
										}" id="tomselect-5" tabindex="-1" hidden="hidden">
														<option value="weekdays" selected="true">Weekdays</option>
														<option value="EveryDay">Every day</option>

														<option value="Never">Never</option>
													</select>
													<div
														class="ts-control js-select form-select single plugin-change_listener plugin-hs_smart_position input-hidden">
														<div class="items ts-input full has-items">
															<div data-value="weekdays" class="item">Weekdays</div>
														</div>
														<div class="tom-select-custom">
															<div class="ts-dropdown single js-select form-select plugin-change_listener plugin-hs_smart_position"
																style="display: none;">
																<div role="listbox" id="tomselect-5-ts-dropdown"
																	tabindex="-1" class="ts-dropdown-content"></div>
															</div>
														</div>
													</div>
												</div>
												<!-- End Select -->
											</div>
											<!-- End Col -->

											<div class="col-auto mb-2">
												<!-- Select -->
												<div class="tom-select-custom">
													<select class="js-select form-select tomselected" autocomplete="off"
														data-hs-tom-select-options="{
										  &quot;searchInDropdown&quot;: false,
										  &quot;hideSearch&quot;: true,
										  &quot;dropdownWidth&quot;: &quot;10rem&quot;
										}" id="tomselect-6" tabindex="-1" hidden="hidden">
														<option value="9" selected="true">at 9 AM</option>
														<option value="0">at 12 AM</option>
														<option value="1">at 1 AM</option>
														<option value="2">at 2 AM</option>
														<option value="3">at 3 AM</option>
														<option value="4">at 4 AM</option>
														<option value="5">at 5 AM</option>
														<option value="6">at 6 AM</option>
														<option value="7">at 7 AM</option>
														<option value="8">at 8 AM</option>

														<option value="10">at 10 AM</option>
														<option value="11">at 11 AM</option>
														<option value="12">at 12 PM</option>
														<option value="13">at 1 PM</option>
														<option value="14">at 2 PM</option>
														<option value="15">at 3 PM</option>
														<option value="16">at 4 PM</option>
														<option value="17">at 5 PM</option>
														<option value="18">at 6 PM</option>
														<option value="19">at 7 PM</option>
														<option value="20">at 8 PM</option>
														<option value="21">at 9 PM</option>
														<option value="22">at 10 PM</option>
														<option value="23">at 11 PM</option>
													</select>
													<div
														class="ts-control js-select form-select single plugin-change_listener plugin-hs_smart_position input-hidden">
														<div class="items ts-input full has-items">
															<div data-value="9" class="item">at 9 AM</div>
														</div>
														<div class="tom-select-custom">
															<div class="ts-dropdown single js-select form-select plugin-change_listener plugin-hs_smart_position"
																style="display: none;">
																<div role="listbox" id="tomselect-6-ts-dropdown"
																	tabindex="-1" class="ts-dropdown-content"></div>
															</div>
														</div>
													</div>
												</div>
												<!-- End Select -->
											</div>
											<!-- End Col -->
										</div>
										<!-- End Row -->
									</div>
									<!-- End Form -->
								</div>
								<!-- End Col -->
							</div>
							<!-- End Row -->

							<p class="card-text">In order to cut back on noise, email notifications are grouped together
								and only sent when you're idle or offline.</p>

							<div class="d-flex justify-content-end">
								<button type="submit" class="btn btn-primary">Save changes</button>
							</div>
						</div>
						<!-- End Body -->
					</div>
					<!-- End Card -->

					<!-- Card -->
					<div id="apiTokens" class="card">
						<div class="card-header">
							<div class="d-flex justify-content-between">
								<h4 class="card-title">API Tokens</h4>
								<div class="btn-group">
									<button class="btn btn-sm btn-outline-primary" type="button" data-type="ajax"
										data-route="{{ route('user.generate-token', $user) }}">Generate New
										Token</button>
								</div>
							</div>
						</div>

						<!-- Body -->
						<div class="card-body">
							<p class="card-text">Api Tokens generated by user</p>
						</div>
						<!-- End Body -->

						<!-- Table -->
						<div class="table-responsive">
							<table class="table table-thead-bordered table-nowrap table-align-middle card-table">
								<thead class="thead-light">
									<tr>
										<th>Token Name</th>
										<th>Token</th>
										<th>Abilities</th>
										<th>Created At</th>
									</tr>
								</thead>

								<tbody>
									@forelse($user->tokens as $token)
									<tr>
										<td class="">
											{{ $token->name }}
										</td>
										<td>
											<div class="input-group input-group-sm input-group-merge table-input-group">
												<input id="copyable{{$loop->index}}" type="text" class="form-control" readonly
													value="{{ $token->plain_text_token }}">
												<a class="js-clipboard input-group-append input-group-text"
													href="#!" data-bs-toggle="tooltip"
													title="Copy to clipboard" data-hs-clipboard-options='{
													"type": "tooltip",
													"successText": "Copied!",
													"contentTarget": "#copyable{{$loop->index}}",
													"classChangeTarget": "#copyable{{$loop->index}}Icon",
													"defaultClass": "bi-clipboard",
													"successClass": "bi-check"
													}'>
													<i id="copyable{{$loop->index}}Icon" class="bi-clipboard"></i>
												</a>
											</div>
										</td>
										<td>
											{{ implode(',', $token->abilities) }}
										</td>
										<td>
											{{ $token->created_at->format('m/d/Y') }}
										</td>
									</tr>
									@empty
									<tr>
										<td colspan="4" class="text-center">
											<p class="text-muted">No Api Tokens Found</p>
										</td>
									</tr>
									@endforelse
								</tbody>
							</table>
						</div>
						<!-- End Table -->
					</div>
					<!-- End Card -->

					<!-- Card -->
					<div id="connectedAccountsSection" class="card d-none">
						<div class="card-header">
							<h4 class="card-title">Connected accounts</h4>
						</div>

						<!-- Body -->
						<div class="card-body">
							<p class="card-text">Integrated features from these accounts make it easier to collaborate
								with people you know on Front Dashboard.</p>

							<!-- Form -->
							<form>
								<div class="list-group list-group-lg list-group-flush list-group-no-gutters">
									<!-- List Item -->
									<div class="list-group-item">
										<div class="d-flex">
											<div class="flex-shrink-0">
												<img class="avatar avatar-xs"
													src="{{asset('svg/brands/google-icon.svg')}}"
													alt="Image Description">
											</div>

											<div class="flex-grow-1 ms-3">
												<div class="row align-items-center">
													<div class="col">
														<h4 class="mb-0">Google</h4>
														<p class="fs-5 text-body mb-0">Calendar and contacts</p>
													</div>
													<!-- End Col -->

													<div class="col-auto">
														<!-- Form Switch -->
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox"
																id="connectedAccounts1">
															<label class="form-check-label"
																for="connectedAccounts1"></label>
														</div>
														<!-- End Form Switch -->
													</div>
													<!-- End Col -->
												</div>
												<!-- End Row -->
											</div>
										</div>
									</div>
									<!-- End List Item -->

									<!-- List Item -->
									<div class="list-group-item">
										<div class="d-flex">
											<div class="flex-shrink-0">
												<img class="avatar avatar-xs"
													src="{{asset('svg/brands/spec-icon.svg')}}" alt="Image Description">
											</div>

											<div class="flex-grow-1 ms-3">
												<div class="row align-items-center">
													<div class="col">
														<h4 class="mb-0">Spec</h4>
														<p class="fs-5 text-body mb-0">Project management</p>
													</div>
													<!-- End Col -->

													<div class="col-auto">
														<!-- Form Switch -->
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox"
																id="connectedAccounts2">
															<label class="form-check-label"
																for="connectedAccounts2"></label>
														</div>
														<!-- End Form Switch -->
													</div>
													<!-- End Col -->
												</div>
												<!-- End Row -->
											</div>
										</div>
									</div>
									<!-- End List Item -->

									<!-- List Item -->
									<div class="list-group-item">
										<div class="d-flex">
											<div class="flex-shrink-0">
												<img class="avatar avatar-xs"
													src="{{asset('svg/brands/slack-icon.svg')}}"
													alt="Image Description">
											</div>

											<div class="flex-grow-1 ms-3">
												<div class="row align-items-center">
													<div class="col">
														<h4 class="mb-0">Slack</h4>
														<p class="fs-5 text-body mb-0">Communication <a class="link"
																href="#">Learn more</a></p>
													</div>
													<!-- End Col -->

													<div class="col-auto">
														<!-- Form Switch -->
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox"
																id="connectedAccounts3" checked="">
															<label class="form-check-label"
																for="connectedAccounts3"></label>
														</div>
														<!-- End Form Switch -->
													</div>
													<!-- End Col -->
												</div>
												<!-- End Row -->
											</div>
										</div>
									</div>
									<!-- End List Item -->

									<!-- List Item -->
									<div class="list-group-item">
										<div class="d-flex">
											<div class="flex-shrink-0">
												<img class="avatar avatar-xs"
													src="{{asset('svg/brands/mailchimp-icon.svg')}}"
													alt="Image Description">
											</div>

											<div class="flex-grow-1 ms-3">
												<div class="row align-items-center">
													<div class="col">
														<h4 class="mb-0">Mailchimp</h4>
														<p class="fs-5 text-body mb-0">Email marketing service</p>
													</div>
													<!-- End Col -->

													<div class="col-auto">
														<!-- Form Switch -->
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox"
																id="connectedAccounts4" checked="">
															<label class="form-check-label"
																for="connectedAccounts4"></label>
														</div>
														<!-- End Form Switch -->
													</div>
													<!-- End Col -->
												</div>
												<!-- End Row -->
											</div>
										</div>
									</div>
									<!-- End List Item -->

									<!-- List Item -->
									<div class="list-group-item">
										<div class="d-flex">
											<div class="flex-shrink-0">
												<img class="avatar avatar-xs"
													src="{{asset('svg/brands/google-webdev-icon.svg')}}"
													alt="Image Description">
											</div>

											<div class="flex-grow-1 ms-3">
												<div class="row align-items-center">
													<div class="col">
														<h4 class="mb-0">Google Webdev</h4>
														<p class="fs-5 text-body mb-0">Tools for Web Developers <a
																class="link" href="#">Learn more</a></p>
													</div>
													<!-- End Col -->

													<div class="col-auto">
														<!-- Form Switch -->
														<div class="form-check form-switch">
															<input class="form-check-input" type="checkbox"
																id="connectedAccounts5">
															<label class="form-check-label"
																for="connectedAccounts5"></label>
														</div>
														<!-- End Form Switch -->
													</div>
													<!-- End Col -->
												</div>
												<!-- End Row -->
											</div>
										</div>
									</div>
									<!-- End List Item -->
								</div>
							</form>
							<!-- End Form -->
						</div>
						<!-- End Body -->
					</div>
					<!-- End Card -->

					<!-- Card -->
					<div id="deleteAccountSection" class="card">
						<div class="card-header">
							<h4 class="card-title">Delete account</h4>
						</div>

						<!-- Body -->
						<div class="card-body">
							<p class="card-text">When you delete your account, you lose access to Front account
								services, and we permanently delete your personal data. You can cancel the deletion for
								14 days.</p>

							<div class="mb-4">
								<!-- Form Check -->
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="deleteAccountCheckbox">
									<label class="form-check-label" for="deleteAccountCheckbox">
										Confirm that I want to delete my account.
									</label>
								</div>
								<!-- End Form Check -->
							</div>

							<div class="d-flex justify-content-end gap-3">
								<a class="btn btn-white" href="#">Learn more</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
						<!-- End Body -->
					</div>
					<!-- End Card -->
				</div>

				<!-- Sticky Block End Point -->
				<div id="stickyBlockEndPoint"></div>
			</div>
		</div>
	</form>
	@section('js')
	<script>
		$(document).ready(function () {
			// INITIALIZATION OF CLIPBOARD
			// =======================================================
			HSCore.components.HSClipboard.init('.js-clipboard')
			// INITIALIZATION OF SELECT
			// =======================================================
			HSCore.components.HSTomSelect.init('.js-select')
		});
	</script>
	@endsection
</x-app-layout>