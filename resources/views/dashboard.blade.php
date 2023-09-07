<x-app-layout>
	<!-- Stats -->
	<div class="row col-lg-divider mb-5">
		<div class="col-lg-4">
			<!-- Card -->
			<div class="text-center bg-light py-4">
				{{-- <img class="avatar avatar-xl avatar-4x3 mb-4" src="{{asset('/svg/illustrations/')}}"
					alt="Image Description" data-hs-theme-appearance="default" style="min-height: 6rem;">
				<img class="avatar avatar-xl avatar-4x3 mb-4"
					src="{{asset('/svg/illustrations-light/oc-megaphone.svg')}}" alt="Image Description"
					data-hs-theme-appearance="dark" style="min-height: 6rem;"> --}}
				<i class="avatar avatar-xl avatar-4x3 mb-4 bi bi-pip bg-transparent" style="font-size:60px"
					data-hs-theme-appearance="default"></i>
				<span class="text-cap text-body">Total Page Views</span>
				<span class="d-block display-4 text-dark mb-2">{{$stats->totalPageViews ?? 0}}</span>

				<div class="row col-divider">
					<div class="col text-end">
						<span class="d-block fw-semi-bold text-success">
							<i class="bi-graph-up"></i> 0
						</span>
						<span class="d-block">change</span>
					</div>
					<!-- End Col -->

					<div class="col text-start">
						<span class="d-block fw-semi-bold text-dark">0</span>
						<span class="d-block">last week</span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</div>
			<!-- End Card -->
		</div>

		<div class="col-lg-4">
			<!-- Card -->
			<div class="text-center bg-light py-4">
				{{-- <img class="avatar avatar-xl avatar-4x3 mb-4"
					src="{{asset('/svg/illustrations/oc-money-profits.svg')}}" alt="Image Description"
					data-hs-theme-appearance="default" style="min-height: 6rem;">
				<img class="avatar avatar-xl avatar-4x3 mb-4"
					src="{{asset('/svg/illustrations-light/oc-money-profits.svg')}}" alt="Image Description"
					data-hs-theme-appearance="dark" style="min-height: 6rem;"> --}}
				<i class="avatar avatar-xl avatar-4x3 mb-4 bi bi-people bg-transparent" style="font-size:60px"
					data-hs-theme-appearance="default"></i>
				<span class="text-cap text-body">Total Visitors</span>
				<span class="d-block display-4 text-dark mb-2">{{$stats->totalVisitors ?? 0}}</span>

				<div class="row col-divider">
					<div class="col text-end">
						<span class="d-block fw-semi-bold text-success">
							<i class="bi-graph-up"></i> 0%
						</span>
						<span class="d-block">change</span>
					</div>
					<!-- End Col -->

					<div class="col text-start">
						<span class="d-block fw-semi-bold text-dark">0</span>
						<span class="d-block">last week</span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</div>
			<!-- End Card -->
		</div>

		<div class="col-lg-4">
			<!-- Card -->
			<div class="text-center bg-light py-4">
				{{-- <img class="avatar avatar-xl avatar-4x3 mb-4" src="{{asset('/svg/illustrations/oc-growing.svg')}}"
					alt="Image Description" data-hs-theme-appearance="default" style="min-height: 6rem;">
				<img class="avatar avatar-xl avatar-4x3 mb-4" src="{{asset('/svg/illustrations-light/oc-growing.svg')}}"
					alt="Image Description" data-hs-theme-appearance="dark" style="min-height: 6rem;"> --}}
				<i class="avatar avatar-xl avatar-4x3 mb-4 bi bi-arrow-return-right bg-transparent"
					style="font-size:60px" data-hs-theme-appearance="default"></i>
				<span class="text-cap text-body">Bounce Rate</span>
				<span class="d-block display-4 text-dark mb-2">% {{$stats->bounceRateAnalytics ?? 0}}</span>

				<div class="row col-divider">
					<div class="col text-end">
						<span class="d-block fw-semi-bold text-danger">
							<i class="bi-graph-down"></i> 0%
						</span>
						<span class="d-block">change</span>
					</div>
					<!-- End Col -->

					<div class="col text-start">
						<span class="d-block fw-semi-bold text-dark">0</span>
						<span class="d-block">last week</span>
					</div>
					<!-- End Col -->
				</div>
				<!-- End Row -->
			</div>
			<!-- End Card -->
		</div>
	</div>
	<!-- End Stats -->

	<div class="row">
		<div class="col-lg-12 order-2 mb-3 mb-lg-0">
			<!-- Card -->
			<div class="card h-100">
				<!-- Header -->
				<div class="card-header card-header-content-between">
					<h4 class="card-header-title">Latest Bids</h4>

					<!-- Daterangepicker -->
					{{-- <button id="js-daterangepicker-predefined"
						class="btn btn-ghost-secondary btn-sm dropdown-toggle">
						<i class="bi-calendar-week"></i>
						<span class="js-daterangepicker-predefined-preview ms-1"></span>
					</button> --}}
					<!-- End Daterangepicker -->
				</div>
				<!-- End Header -->

				<!-- Body -->
				<div class="card-body card-body-height p-0">

					<div class="table-responsive">
						<table
							class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table">
							<thead class="thead-light">
								<tr>
									<th scope="col">Customer</th>
									<th scope="col">Order #</th>
									<th scope="col">Price</th>
									<th scope="col">Status</th>
								</tr>
							</thead>

							<tbody>
								@forelse ($stats->orders ?? [] as $order)
								<tr>
									<td>
										<!-- Media -->
										<a class="d-flex align-items-center" href="{{route('order.show', $order)}}">
											<div class="flex-shrink-0">
												<img class="avatar" src="{{ $order->customer->image }}"
													alt="Image Description">
											</div>

											<div class="flex-grow-1 ms-3">
												<h5 class="text-inherit mb-0">{{ $order->customer->name }}</h5>
												<span class="text-muted">{{ $order->customer->email }}</span>
											</div>
										</a>
										<!-- End Media -->
									</td>
									<td>{{ $order->id }}</td>
									<td>{{ formatOrderPrice($order) }}</td>
									<td>
										{!! getStatusHtml($order->status) !!}
									</td>
								</tr>
								@empty

								@endforelse
							</tbody>
						</table>
					</div>
				</div>
				<!-- End Body -->
			</div>
			<!-- End Card -->
		</div>

		<div class="col-lg-12 order-1 mb-3">
			<!-- Card -->
			<div class="card h-100">
				<!-- Header -->
				<div class="card-header card-header-content-between">
					<h4 class="card-header-title">Sales overview</h4>

					<div>
						<!-- Nav -->
						<ul class="nav nav-segment" id="projectsTab" role="tablist">
							<li class="nav-item" data-toggle="chart" data-datasets="0" data-trigger="click"
								data-action="toggle">
								<a class="nav-link active" href="javascript:;" data-bs-toggle="tab">
									<span class="legend-indicator bg-primary"></span> This week
								</a>
							</li>
							<li class="nav-item" data-toggle="chart" data-datasets="1" data-trigger="click"
								data-action="toggle">
								<a class="nav-link" href="javascript:;" data-bs-toggle="tab">
									<span class="legend-indicator bg-info"></span> Last week
								</a>
							</li>
						</ul>
						<!-- End Nav -->
						<!-- Daterangepicker -->
						{{-- <button id="js-daterangepicker-predefined"
							class="btn btn-ghost-secondary btn-sm dropdown-toggle">
							<i class="bi-calendar-week"></i>
							<span class="js-daterangepicker-predefined-preview ms-1"></span>
						</button> --}}
						<!-- End Daterangepicker -->
					</div>
				</div>

				<div class="card-body">
					<!-- Chart -->
					<div class="row align-items-sm-center mb-4">
						<div class="col-sm mb-3 mb-sm-0">
							<div class="d-flex align-items-center">
								<span class="h1 mb-0">0</span>
							</div>
						</div>

						<div class="col-sm-auto">

						</div>
					</div>
					<!-- End Row -->

					<!-- Line Chart -->
					<div class="chartjs-custom" style="height: 18rem;">
						<canvas id="updatingLineChart" data-hs-chartjs-options='{
							"type": "line",
							"data": {
								"labels": ["Feb","Jan","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
								"datasets": [{
									"backgroundColor": ["rgba(55, 125, 255, .5)", "rgba(255, 255, 255, .2)"],
									"borderColor": "#377dff",
									"borderWidth": 2,
									"pointRadius": 0,
									"hoverBorderColor": "#377dff",
									"pointBackgroundColor": "#377dff",
									"pointBorderColor": "#fff",
									"pointHoverRadius": 0
								},
								{
									"backgroundColor": ["rgba(0, 201, 219, .5)", "rgba(255, 255, 255, .2)"],
									"borderColor": "#00c9db",
									"borderWidth": 2,
									"pointRadius": 0,
									"hoverBorderColor": "#00c9db",
									"pointBackgroundColor": "#00c9db",
									"pointBorderColor": "#fff",
									"pointHoverRadius": 0
								}]
							},
							"options": {
								"gradientPosition": {"y1": 200},
								"scales": {
									"yAxes": [{
									"gridLines": {
										"color": "#e7eaf3",
										"drawBorder": false,
										"zeroLineColor": "#e7eaf3"
									},
									"ticks": {
										"min": 0,
										"max": 100,
										"stepSize": 20,
										"fontColor": "#97a4af",
										"fontFamily": "Open Sans, sans-serif",
										"padding": 10,
										"postfix": "k"
									}
									}],
									"xAxes": [{
									"gridLines": {
										"display": false,
										"drawBorder": false
									},
									"ticks": {
										"fontSize": 12,
										"fontColor": "#97a4af",
										"fontFamily": "Open Sans, sans-serif",
										"padding": 5
									}
									}]
								},
								"tooltips": {
									"prefix": "$",
									"postfix": "k",
									"hasIndicator": true,
									"mode": "index",
									"intersect": false,
									"lineMode": true,
									"lineWithLineColor": "rgba(19, 33, 68, 0.075)"
								},
								"hover": {
									"mode": "nearest",
									"intersect": true
								}
							}
							}'>
						</canvas>
					</div>
					<!-- End Line Chart -->
				</div>
			</div>
			<!-- End Card -->
		</div>
	</div>


	<!-- End Row -->
	@section('js')
	<script>
		(function () {
    // INITIALIZATION OF UPDATING CHARTJS
    // =======================================================
    const updatingChartDatasets = [
      [
        [0,0,0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0,0,0]
      ],
      [
        [0,0,0,0,0,0,0,0,0,0,0,0],
        [0,0,0,0,0,0,0,0,0,0,0,0]
      ]
    ]

    HSCore.components.HSChartJS.init('.js-chart')

    HSCore.components.HSChartJS.init(document.querySelector('#updatingLineChart'), {
      data: {
        datasets: [
          {
            data: updatingChartDatasets[0][0]
          },
          {
            data: updatingChartDatasets[0][1]
          }
        ]
      }
    });

    const updatingLineChart = HSCore.components.HSChartJS.getItem('updatingLineChart')

    // Call when tab is clicked
    document.querySelectorAll('[data-toggle="chart"]').forEach(item => {
      item.addEventListener('click', e => {
        let keyDataset = e.currentTarget.getAttribute('data-datasets')

        // Update datasets for chart
        updatingLineChart.data.datasets.forEach(function(dataset, key) {
          dataset.data = updatingChartDatasets[keyDataset][key];
        })
        updatingLineChart.update()
      })
    })

    HSCore.components.HSChartJS.init('#updatingBarChart')
        const updatingBarChart = HSCore.components.HSChartJS.getItem('updatingBarChart')

        // Call when tab is clicked
        document.querySelectorAll('[data-bs-toggle="chart-bar"]').forEach(item => {
          item.addEventListener('click', e => {
            let keyDataset = e.currentTarget.getAttribute('data-datasets')

            const styles = HSCore.components.HSChartJS.getTheme('updatingBarChart', HSThemeAppearance.getAppearance())

            if (keyDataset === 'lastWeek') {
              updatingBarChart.data.labels = ["Apr 22", "Apr 23", "Apr 24", "Apr 25", "Apr 26", "Apr 27", "Apr 28", "Apr 29", "Apr 30", "Apr 31"];
              updatingBarChart.data.datasets = [
                {
                  "data": [120, 250, 300, 200, 300, 290, 350, 100, 125, 320],
                  "backgroundColor": styles.data.datasets[0].backgroundColor,
                  "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                  "borderColor": styles.data.datasets[0].borderColor
                },
                {
                  "data": [250, 130, 322, 144, 129, 300, 260, 120, 260, 245, 110],
                  "backgroundColor": styles.data.datasets[1].backgroundColor,
                  "borderColor": styles.data.datasets[1].borderColor
                }
              ];
              updatingBarChart.update();
            } else {
              updatingBarChart.data.labels = ["May 1", "May 2", "May 3", "May 4", "May 5", "May 6", "May 7", "May 8", "May 9", "May 10"];
              updatingBarChart.data.datasets = [
                {
                  "data": [200, 300, 290, 350, 150, 350, 300, 100, 125, 220],
                  "backgroundColor": styles.data.datasets[0].backgroundColor,
                  "hoverBackgroundColor": styles.data.datasets[0].hoverBackgroundColor,
                  "borderColor": styles.data.datasets[0].borderColor
                },
                {
                  "data": [150, 230, 382, 204, 169, 290, 300, 100, 300, 225, 120],
                  "backgroundColor": styles.data.datasets[1].backgroundColor,
                  "borderColor": styles.data.datasets[1].borderColor
                }
              ]
              updatingBarChart.update();
            }
          })
        })
  })()
	</script>
	@endsection
</x-app-layout>