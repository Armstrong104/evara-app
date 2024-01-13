@extends('admin.master')

@section('title', 'Manage Order')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Order</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->
    <div class="row row-sm">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Manage Order Table</h3>
                </div>
                <div class="card-body">
                    <span class="text-center">@include('notify')</span>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="example3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Order Total</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Order Status</th>
                                    <th scope="col">Customer Info</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->order_total }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>{{ isset($order->customer->name) || isset($order->customer->mobile) ? $order->customer->name.'('.$order->customer->mobile.')' : ''}}</td>
                                        <td>
                                            <div class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('order.show', $order->id) }}"
                                                    class="btn btn-sm btn-outline-info" title="View Order Detail"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('order.edit', $order->id) }}"
                                                    class="btn btn-sm btn-outline-success {{ $order->order_status == 'Complete' ? 'disabled' : ''}}" title="Order Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('order.invoice-show',['id' => $order->id]) }}"
                                                    class="btn btn-sm btn-outline-primary" title="View Order Invoice"><i
                                                        class="fa fa-info"></i></a>
                                                <a href="{{ route('order.invoice-download',$order->id) }}"
                                                    class="btn btn-sm btn-outline-warning" target="_blank" title="Download Order Invoice"><i
                                                        class="fa fa-download"></i></a>
                                                <form action="{{ route('order.destroy', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger {{ $order->order_status == 'Complete' ? 'disabled' : ''}}"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
