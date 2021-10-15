@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10 col-xxl-10">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-list"></i> Submitted Orders
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

                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Ordered By</th>
                                <th>Ordered Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                            $sl = 1;
                        @endphp
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $sl }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>
                                        @if ($order->status)
                                            {{ order_status_key_to_name($order->status ) }}
                                        @else
                                            Yet to Process
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.show-order', $order) }}" class="btn btn-sm btn-primary">View</a>
                                        <a href="{{ route('admin.order-update-form', $order) }}" class="btn btn-sm btn-success">Update</a>

                                        @if ($order->status == NULL)
                                            <div style="float: left;" class="mr-2">
                                                <form action="{{ route('customer.orders.destroy', $order) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit"> <span class="fa fa-trash"></span> Delete </button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $sl++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection
