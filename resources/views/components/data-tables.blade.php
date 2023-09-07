<div>
  @push('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" />
  @endpush

  <div class="row">
      <div class="col-sm-12">
          <div class="card card-table">
            @isset($header)
              <div class="card-header">
                  <div class="d-flex justify-content-between">
                      {{ $header }}
                  </div>
              </div>
              @endisset
              <div class="card-body">
                  <table class="table table-striped table-hover table-fw-widget align-middle" id="table">
                      <thead>
                          <tr>
                              @foreach($dataTables as $dataTable)
                              <th>{{ $dataTable['title'] }}</th>
                              @endforeach
                          </tr>
                      </thead>
                      <tbody>

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>

@push('js')
  <script src="{{ asset('vendor/datatables/datatables.net/js/jquery.dataTables.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/datatables.net-buttons/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/datatables.net-buttons/js/buttons.flash.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/jszip/jszip.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/pdfmake/pdfmake.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/pdfmake/vfs_fonts.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/datatables.net-buttons/js/buttons.colVis.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/datatables.net-buttons/js/buttons.print.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/datatables.net-buttons/js/buttons.html5.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/datatables.net-responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('/vendor/datatables.net.extensions/select/select.min.js')}}"></script>
  <script type="text/javascript">
      var dataTable = null;
      $(function() {
          dataTable = $('#table').DataTable({
              language : {
                  url: "https://cdn.datatables.net/plug-ins/1.10.18/i18n/{{$locale}}.json"
              },
              lengthMenu: [
                  [10, 25, 50, 100, -1],
                  [10, 25, 50, 100, "All"]
              ],
              dom: "<'row be-datatable-header'<'col-sm-2'l><'col-sm-2'f><'col-sm-8 text-end'B>><'row be-datatable-body'<'col-sm-12'tr>><'row be-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>",
              buttons: [
                  'excel', 'pdf', 'csv',
                  {
                    text: 'Refresh',
                    action: function ( e, dt, node, config ) {
                        dt.ajax.reload()
                    }
                }
              ],
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
          });

      });
  </script>
  @endpush
</div>