<div>
    @push('css')
    @endpush
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <!-- Header -->
                <div class="card-header">
                    <div class="row justify-content-between align-items-center flex-grow-1">
                        <div class="col-12 col-md">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-header-title">{{ $title }}</h5>
                            </div>
                        </div>

                        <div class="col-auto">
                            <!-- Filter -->
                            <form>
                                <!-- Search -->
                                <div class="input-group input-group-merge input-group-flush">
                                    <div class="input-group-prepend input-group-text">
                                        <i class="bi-search"></i>
                                    </div>
                                    <input id="datatableWithSearchInput" type="search" class="form-control"
                                        placeholder="Search" aria-label="Search">
                                </div>
                                <!-- End Search -->
                            </form>
                            <!-- End Filter -->
                        </div>
                    </div>
                </div>
                <!-- End Header -->

                <!-- Table -->
                <div class="table-responsive datatable-custom card-body">
                    <table id="table"
                        class="js-datatable table table-borderless table-thead-bordered table-nowrap table-align-middle card-table"
                        data-hs-datatables-options='{
                   "order": [],
                   "search": "#datatableWithSearchInput",
                   "isResponsive": false,
                   "isShowPaging": false,
                   "pagination": "datatableWithSearchPagination"
                 }'>
                        <thead class="thead-light">
                            <tr>
                                @foreach($dataTables as $dataTable)
                                <th>{{$dataTable['title']}}</th>
                                @endforeach
                            </tr>
                        </thead>

                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- End Table -->

                <!-- Footer -->
                <div class="card-footer">
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center justify-content-sm-end">
                        <nav id="datatableWithPaginationPagination" aria-label="Activity pagination"></nav>
                    </div>
                    <!-- End Pagination -->
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </div>

    @push('js')
    <script src="{{ asset('/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript">
        var dataTable = null;
        $(function() {           
            HSCore.components.HSDatatables.init('#table', {
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                // dom: "<'row be-datatable-header'<'col-sm-2'l><'col-sm-2'f><'col-sm-8 text-right'B>><'row be-datatable-body'<'col-sm-12'tr>><'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>",
                processing: true,
                serverSide: false,
                @isset($dataOrder) order: {!!$dataOrder!!},
                @endisset
                ajax: "{{ request()->url() }}",
                columns: [
                    @foreach($dataTables as $dataTable) {
                        data: '{{$dataTable["data"] ?? ""}}',
                        name: '{{$dataTable["name"] ?? ""}}',
                        class: '{{$dataTable["class"] ?? ""}}',
                        orderable: {{$dataTable["orderable"] ?? true}},
                        searchable: {{$dataTable["searchable"] ?? true}},
                        @if(isset($dataTable['render']))
                        render: function(data, type, row, meta) {
                            return {!!$dataTable['render'] !!}
                        },
                        @endif
                    },
                    @endforeach
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.18/i18n/{{$locale}}.json"
                },
            })

        });
    </script>
    @endpush
</div>