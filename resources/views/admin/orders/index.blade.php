@extends('layouts.admin')

@section('title', 'My Orders')

@section('content')

<div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
            <div class="card">
                <div class="card-header">
                    <h3>My Orders</h3>
                </div>
                <div class="card-body">

                    <form action="" method="GET">

                        <div class="row">
                            <div class="col-md-3">
                                <label>Filter by Date</label>
                                <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d')}}" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Filter by Status</label>
                                <select name="status" class="form-select">
                                    <option value="">Select All Status</option>
                                    <option value="in Progress" {{ Request::get('status') == 'in progress' ? 'selected':'' }}>In Progress</option>
                                    <option value="completed" {{ Request::get('status') == 'completed' ? 'selected':'' }}>Completed</option>
                                    <option value="pending" {{ Request::get('status') == 'pending' ? 'selected':'' }}>Pending</option>
                                    <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected':''}}>Cancelled</option>
                                    <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected':'' }}>Out for delivery</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <br/>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>

                            <div class="col-md-2">
                                <br/>
                                <a href="{{ url('admin/orders1') }}" class="btn btn-sm btn-warning float-end">Export Excel</a>
                            </div>

                            <div class="col-md-2">
                                <br/>
                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Reset Order Records
                                  </button>
                                {{-- <a href="{{ url('admin/orders2') }}"  onclick="return confirm('Are you sure you want to clear all order records? This action is irreversible!')" class="btn btn-sm btn-danger float-end">Export and Clear Records</a> --}}
                            </div>
                        </div>
                        

                          
                        <div class="modal" id="exampleModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title fs-3"><i class="bi bi-exclamation-triangle-fill"></i>Warning!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <p><div class="fw-bold">You are about to reset all order records.</div> <br> Before proceeding, make sure you have downloaded the excel file of the order records. This action is irreversible!</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="{{ url('admin/orders1') }}" class="btn btn-warning">Download Records</a>
                                <a href="{{ url('admin/orders2') }}" class="btn btn-danger">Reset Order Records</a>
                                </div>
                            </div>
                            </div>
                        </div>

                    </form>
                    <hr>

                        <div class="table-responsive">
                            <table class="table table-bordered table-stripped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Tracking No</th>
                                        <th>Username</th>
                                        <th>Payment Mode</th>
                                        <th>Ordered Date</th>
                                        <th>Status Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->tracking_no }}</td>
                                            <td>{{ $item->fullname }}</td>
                                            <td>{{ $item->payment_mode }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->status_message }}</td>
                                            <td><a href="{{ url('admin/orders/'.$item->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a href="{{ url('admin/orders/'.$item->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-danger btn-sm">Delete</a></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No Orders Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div>
                                {{ $orders->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection