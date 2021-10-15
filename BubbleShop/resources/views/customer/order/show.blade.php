@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-users me-1"></i>
                    <a href="{{ route('customer.orders.index') }}">Orders</a>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ request()->session()->pull('message') }}
                        </div>
                    @endif

                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ request()->session()->pull('error') }}
                        </div>
                    @endif

                    <div class="text-start">Order Details</div>
                    <div class="text-end">Order Date: {{ $order->created_at }}, Status: {{ $order->status ? order_status_key_to_name($order->status) : 'Yet to process' }}</div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th>Item Name</th>
                                    <th>Order Type</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Notes</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $sl = 1; ?>
                                @foreach ($order->orderDetails as $detail)
                                    <tr>
                                        <td>{{ $sl }}</td>
                                        <td>{{ $detail->item->name }}</td>
                                        <td>{{ $detail->order_type }}</td>
                                        <td>{{ $detail->item->unit_price }}</td>
                                        <td>{{ $detail->quantity }}</td>
                                        <td>{{ $detail->item->unit_price * $detail->quantity }}</td>
                                        <td>{{ $detail->notes }}</td>
                                    </tr>
                                    <?php $sl++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
