@extends('dashboard.master');
@section('title')
    tables
@endsection

@section('element')

    <div id="page-wrapper">
        <div class="row">
            <br/>
            <div class="col-lg-12">
                <h1 class="page-header text-center">Customer Order Detail</h1>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                       <h3> Customer for this order</h3>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered " >
                            <thead>
                            <tr>
                                <th>Customer name</th>
                                <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                            </tr><tr>
                                <th>Phone number</th>
                                <td>{{ $customer->mobile }}</td>
                            </tr><tr>
                                <th>Email address</th>
                                <td>{{ $customer->email }}</td>
                            </tr><tr>
                                <th>Address</th>
                                <td>{{ $customer->address }}</td>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                       <h3> Customer Shipping info for this order</h3>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered " >
                            <thead>
                            <tr>
                                <th>Full name</th>
                                <td>{{ $shipping->full_name }}</td>
                            </tr><tr>
                                <th>Phone number</th>
                                <td>{{ $shipping->mobile }}</td>
                            </tr><tr>
                                <th>Email address</th>
                                <td>{{ $shipping->email }}</td>
                            </tr><tr>
                                <th>Address</th>
                                <td>{{ $shipping->address }}</td>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Payment info for this order</h3>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered " >
                            <thead>
                            <tr>
                                <th>Payment type</th>
                                <td>{{ $payment->payment_type }}</td>
                            </tr><tr>
                                <th>Payment status</th>
                                <td class="text-danger">{{ $payment->payment_status }}...</td>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h3>Product info for this order</h3>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered " >
                            <thead>
                            <tr>
                                <th>Sl: </th>
                                <th>Product id</th>
                                <th>Product name</th>
                                <th>Product price</th>
                                <th>Product Quantity</th>
                                <th>Total price</th>


                            </tr>
                            @php($i=1)
                            <?php $sum=0 ?>
                            @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $orderDetail->product_id }}</td>
                                <td>{{ $orderDetail->product_name }}</td>
                                <td>{{ $orderDetail->product_price }}</td>
                                <td>{{ $orderDetail->product_quantity}}</td>
                                <td>{{ $total=$orderDetail->product_price*$orderDetail->product_quantity }}</td>


                            </tr>
                            <?php $grandTotal=$sum+=$total ?>
                                @endforeach

                            <tr><h4 class="text-center text-success">Total price = {{ $grandTotal }} Tk.</h4></tr>

                            </thead>

                        </table>
                    </div>

                </div>
            </div>
        </div>




    </div>

@endsection