<x-app-layout>
    <x-slot name="title">
        <div class="d-sm-flex align-items-sm-center">
            <h1 class="page-header-title">Order #{{$order->id}}</h1>
            {!! getStatusHtml($order->status) !!}
            <span class="ms-2 ms-sm-3">
                <i class="bi-calendar-week"></i> {{ $order->created_at->format("D M Y H:i (T)") }}
            </span>
        </div>
    </x-slot>

    <x-slot name="buttons">
        <div class="mt-2">
            <div class="d-flex gap-2">
                {{-- <a class="text-body me-3" href="javascript:;" onclick="printOrder()">
                    <i class="bi-printer me-1"></i> Print order
                </a> --}}

                <!-- Dropdown -->
                <div class="dropdown">
                    <a class="text-body" href="javascript:;" id="moreOptionsDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Options <i class="bi-chevron-down"></i>
                    </a>

                    <div class="dropdown-menu mt-1" aria-labelledby="moreOptionsDropdown">
                        <a class="dropdown-item" href="#">
                            <i class="bi-x dropdown-item-icon"></i> Cancel order
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="bi-archive dropdown-item-icon"></i> Archive
                        </a>
                    </div>
                </div>
                <!-- End Dropdown -->
            </div>
        </div>
    </x-slot>

    <div class="row" id="printable">
        <div class="col-lg-8 mb-3 mb-lg-0">
            <!-- Card -->
            <div class="card mb-3 mb-lg-5">
                <!-- Header -->
                <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">Order details <span
                            class="badge bg-soft-dark text-dark rounded-circle ms-1">{{$order->items()->count()}}</span></h4>
                    <a class="link" href="javascript:;">Edit</a>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <!-- Order item -->
                    @foreach ($order->items as $item)
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <div class="avatar avatar-xl">
                                <img class="img-fluid" src="{{$item->product->featuredImage}}" alt="Image Description">
                            </div>
                        </div>

                        <div class="flex-grow-1 ms-3">
                            <div class="row">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <a class="h5 d-block" href="{{route('product.show', $item->product)}}">{{$item->name ?? $item->product->title}}</a>

                                    <div class="fs-6 text-body">
                                        <span>Gender:</span>
                                        <span class="fw-semi-bold">Women</span>
                                    </div>
                                    <div class="fs-6 text-body">
                                        <span>Color:</span>
                                        <span class="fw-semi-bold">Green</span>
                                    </div>
                                    <div class="fs-6 text-body">
                                        <span>Size:</span>
                                        <span class="fw-semi-bold">UK 7</span>
                                    </div>
                                </div>
                                <!-- End Col -->

                                <div class="col col-md-2 align-self-center">
                                    <h5>$21.00</h5>
                                </div>
                                <!-- End Col -->

                                <div class="col col-md-2 align-self-center">
                                    <h5>2</h5>
                                </div>
                                <!-- End Col -->

                                <div class="col col-md-2 align-self-center text-end">
                                    <h5>$42.00</h5>
                                </div>
                                <!-- End Col -->
                            </div>
                            <!-- End Row -->
                        </div>
                    </div>    
                    <hr>
                    @endforeach
                    <!-- Order item -->

                    <div class="row justify-content-md-end mb-3">
                        <div class="col-md-8 col-lg-7">
                            <dl class="row text-sm-end">
                                <dt class="col-sm-6">Subtotal:</dt>
                                <dd class="col-sm-6">{{$order->sub_total}}</dd>
                                <dt class="col-sm-6">Shipping fee:</dt>
                                <dd class="col-sm-6">{{$order->shipping_total}}</dd>
                                <dt class="col-sm-6">Tax:</dt>
                                <dd class="col-sm-6">{{$order->tax_total}}</dd>
                                <dt class="col-sm-6">Total:</dt>
                                <dd class="col-sm-6">{{$order->total}}</dd>
                            </dl>
                            <!-- End Row -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->

            <!-- Card -->
            <div class="card">
                <!-- Header -->
                <div class="card-header card-header-content-between">
                    <h4 class="card-header-title">
                        Fulfillment activity
                    </h4>
                    <a class="link" href="javascript:;" data-bs-toggle="modal" data-bs-target="#statusModal">Update Status</a>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <!-- Step -->
                    <ul class="step step-icon-xs">
                        @forelse ($order->activity()->orderBy('created_at', 'DESC')->get()->groupBy(function ($val) {
                            return \Carbon\Carbon::parse($val->created_at)->format('d');
                        }) as $activityGroup)
                            <!-- Step Item -->
                            <li class="step-item">
                                <div class="step-content-wrapper">
                                    <span class="step-divider">{{$activityGroup->first()->created_at->format("l, d F")}}</span>
                                </div>
                            </li>
                            <!-- End Step Item -->
                            @foreach ($activityGroup as $activity)
                                <!-- Step Item -->
                                <li class="step-item">
                                    <div class="step-content-wrapper">
                                        <span class="step-icon step-icon-soft-dark step-icon-pseudo"></span>

                                        <div class="step-content">
                                            <h5 class="mb-1">
                                                <a class="text-dark" href="#">{{ucfirst($activity->status)}}</a>
                                            </h5>
                                            <p class="fs-6 mb-0">{{$activity->description}}</p>
                                            <p class="fs-6 mb-0">{{$activity->created_at->format("h:m A")}}</p>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Step Item -->
                            @endforeach
                        @empty
                            
                        @endforelse
                    </ul>
                    <!-- End Step -->

                    <span class="small">Times are shown in {{date_default_timezone_get()}}.</span>
                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->
        </div>

        <div class="col-lg-4">
            <!-- Card -->
            <div class="card">
                <!-- Header -->
                <div class="card-header">
                    <h4 class="card-header-title">Customer</h4>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="card-body">
                    <!-- List Group -->
                    <ul class="list-group list-group-flush list-group-no-gutters">
                        <li class="list-group-item">
                            <a class="d-flex align-items-center" href="{{route('customer.show', $order->customer)}}">
                                <div class="avatar avatar-circle">
                                    <img class="avatar-img" src="{{$order->customer->image}}"
                                        alt="Image Description">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span class="text-body text-inherit">{{$order->customer->name}}</span>
                                </div>
                                <div class="flex-grow-1 text-end">
                                    <i class="bi-chevron-right text-body"></i>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a class="d-flex align-items-center" href="{{route('customer.show', $order->customer)}}">
                                <div class="icon icon-soft-info icon-circle">
                                    <i class="bi-basket"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span class="text-body text-inherit">{{$order->customer->orders()->count()}} orders</span>
                                </div>
                                <div class="flex-grow-1 text-end">
                                    <i class="bi-chevron-right text-body"></i>
                                </div>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Contact info</h5>
                                <a class="link" href="javascript:;">Edit</a>
                            </div>

                            <ul class="list-unstyled list-py-2 text-body">
                                <li><i class="bi-at me-2"></i>{{$order->customer->email}}</li>
                                <li><i class="bi-phone me-2"></i>{{$order->customer->phone}}</li>
                            </ul>
                        </li>

                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Shipping address</h5>
                                <a class="link" href="javascript:;">Edit</a>
                            </div>

                            <span class="d-block text-body">
                                {{$order->shipping_address}}
                                45 Roker Terrace<br>
                                Latheronwheel<br>
                                KW5 8NW, London<br>
                                UK <img class="avatar avatar-xss avatar-circle ms-1"
                                    src="{{asset('vendor/flag-icon-css/flags/1x1/gb.svg')}}" alt="Great Britain Flag">
                            </span>
                        </li>

                        <li class="list-group-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Billing address</h5>
                                <a class="link" href="javascript:;">Edit</a>
                            </div>

                            <span class="d-block text-body">
                                {{$order->billing_address}}
                                45 Roker Terrace<br>
                                Latheronwheel<br>
                                KW5 8NW, London<br>
                                UK <img class="avatar avatar-xss avatar-circle ms-1"
                                    src="{{asset('vendor/flag-icon-css/flags/1x1/gb.svg')}}" alt="Great Britain Flag">
                            </span>

                            <div class="mt-3">
                                <h5 class="mb-0">Mastercard</h5>
                                <span class="d-block text-body">Card Number: ************4291</span>
                            </div>
                        </li>
                    </ul>
                    <!-- End List Group -->
                </div>
                <!-- End Body -->
            </div>
            <!-- End Card -->
        </div>
    </div>
    <!-- End Row -->

    <!-- Modal -->
    <div id="statusModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="statusModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="statusModalTitle">Changing order fulfillment status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('order.updateStatus', $order)}}" data-type="ajax" method="post" id="statusForm" data-success-callback="$('#statusModal').modal('hide')">
                        @csrf
                        {{method_field("put")}}
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value=""></option>
                                @foreach (\App\Enums\OrderStatus::asArray() as $statusT => $status)
                                    <option value="{{$status}}">{{str_replace('_', ' ', ucfirst(strtolower($statusT)))}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="statusForm">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal -->

    @push('js')
        <script>
        function printOrder() 
        {

            var divToPrint=document.getElementById('printable');

            var newWin=window.open('','Print-Window');

            newWin.document.open();

            newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

            newWin.document.close();

            setTimeout(function(){newWin.close();},5);

            return false;
        }
        </script>
    @endpush
</x-app-layout>