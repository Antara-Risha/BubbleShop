@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 col-xxl-8">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-list me-1"></i>
                    <a href="{{ route('admin.orders') }}">Orders</a>
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

                    <form method="post" action="{{ route('admin.order-update', $order) }}" class="form-horizontal" role="form">
                        @csrf

                        <div class="card-body">
                            <div class="mb-3">
                                <label for="inputSubmitBy" class="form-label">Submitted By</label>
                                <input type="text" name="user_id" value="{{ $order->user->name }}" class="form-control" id="inputSubmitBy" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="inputSubmitDate" class="form-label">Submit Date</label>
                                <input type="text" name="created_at" value="{{ $order->created_at }}" class="form-control" id="inputSubmitDate" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="inputUpdateStatus" class="form-label">Update Status</label>

                                <select name="status" class="form-select @error('status') is-invalid @enderror" id="inputUpdateStatus">
                                    <option value="">Select Type</option>
                                    @foreach (order_status() as $key => $status)
                                        <option value="{{ $key }}" {{ $order->status == $key ? 'selected' : '' }} >{{ $status }}</option>
                                    @endforeach
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-warning mb-2"><i class="fa fa-save"></i> Update </button>
                        </div><!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
@endsection
