@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-users me-1"></i> Orders
                    <a href="{{ route('customer.orders.create') }}">Add</a>
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

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @php
                            $sl = 1;
                        @endphp
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $sl }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        @if ($item->status)
                                            {{ order_status_key_to_name($item->status ) }}
                                        @else
                                            Yet to Process
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('customer.orders.show', $item) }}" class="btn btn-sm btn-primary">View</a>
                                        @if ($item->status == NULL)
                                            <div style="float: left;" class="mr-2">
                                                <form action="{{ route('customer.orders.destroy', $item) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger" type="submit"> <span class="fa fa-trash"></span> Delete </button>
                                                </form>
                                            </div>
                                        @endif
                                        <a href="{{ route('customer.order-invoice', $item) }}" class="btn btn-sm btn-warning">Invoice</a>
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
