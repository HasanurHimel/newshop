@extends('dashboard.master');
@section('title')
    tables
@endsection

@section('element')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Customer Order</h1>
                <br/>
                <h3 class="text-danger text-center">{{ Session::get('message') }}</h3>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Manage your customer order
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" >
                            <thead>
                            <tr>
                                <th>Sl: </th>
                                <th>Customer name</th>
                                <th>Order Total</th>
                                <th>Order Date</th>
                                <th>Order status</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($orders as $order)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $order->first_name.' '.$order->last_name }}</td>
                                <td>{{ $order->oreder_total }}</td>
                                <td class="center">{{ $order->created_at }}</td>
                                <td class="center">{{ $order->oreder_status }}</td>
                                <td class="center">{{ $order->payment_type }}</td>
                                <td class="center">{{ $order->payment_status }}</td>
                                <td class="center">
                                    <a href="{{ route('order-detail', ['id'=>$order->id]) }}" class="btn btn-info btn-xs" title="View order detail">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    <a href="{{ route('order-invoice',['id'=>$order->id]) }}" class="btn btn-warning btn-xs" title="View order invoice">
                                        <span class="glyphicon glyphicon-zoom-out"></span>
                                    </a>
                                    <a href="{{ route('invoice-download', ['id'=>$order->id]) }}" class="btn btn-info btn-xs" title="Invoice download">
                                        <span class="glyphicon glyphicon-download"></span>
                                    </a>
                                    <a href="" class="btn btn-danger btn-xs" title="Invoice download">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    {{--<a href="{{ route('order-delete', ['id'=>$order->id]) }}" class="btn btn-danger btn-xs" title="Invoice delete">--}}
                                        {{--<span class="glyphicon glyphicon-trash"></span>--}}
                                    {{--</a>--}}
                                    {{ Form::open(['route'=>'order-delete', 'method'=>'post' ])}}
                                    <input type="hidden" name="_method" value="{{ $order->id }}">

                                   <button> <i class="btn btn-danger fa fa-times"></i></button>

                                    {{ Form::close() }}
                                </td>
                            </tr>
                                @endforeach

                            </tbody>
                        </table>
                        <!-- /.table-responsive -->

    <!-- /#page-wrapper -->

    </div>
                </div>
            </div>
        </div>
    </div>

@endsection