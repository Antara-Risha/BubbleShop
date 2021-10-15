@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="float-start">
                        <i class="fas fa-list"></i> Order Invoice
                    </div>
                    <div class="float-end">
                        <i class="fas fa-download"></i> PDF
                    </div>
                </div>
                <div class="card-body">
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
                                <?php $sl = 1; $gtotal = 0; ?>
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
                                    <?php $sl++; $gtotal += $detail->item->unit_price * $detail->quantity; ?>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $gtotal }}
                    </div><!-- /.table-responsive -->
                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
