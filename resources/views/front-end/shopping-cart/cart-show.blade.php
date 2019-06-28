@extends('front-end.master');
@section('title')
    shopping cart
@endsection

@section('content')

<div class="content">
    <div class="cart-items">
        <div class="container">
            <h1 align="center">My Shopping Bag</h1>

            @if(!$cart_elemenets->isEmpty())

            <br/>
            <div class="cart-header">

                <h2 class="text-danger" align="center">{{ Session::get('message') }}</h2>
                <table class="table table-bordered ">
                    <tr class="bg-secondary">
                        <th>Sl: </th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price(Tk. )</th>
                        <th>Quantity</th>
                        <th>Total(Tk. )</th>
                        <th>Action</th>
                    </tr>


                    @php($i=1)
                    <?php $sum=0 ?>
                    <?php $num=0 ?>
                    @foreach($cart_elemenets as $cart_element)
                    <tr>

                      <td>{{ $i++ }}</td>
                      <td>{{ $cart_element->name }}</td>
                      <td>{{ $cart_element->image }}</td>
                      <td>{{ $cart_element->price }}</td>
                        <td>
                            {!! Form::open(['route'=>'qty-update', 'method'=>'post']) !!}
                            <input name="qty" type="number" min="1" value="{{ $ser=$cart_element->qty }}">
                            <input name="rowId" type="hidden"  value="{{ $cart_element->rowId }}">
                            <input name="btn" value="Update" type="submit">
                        {!! Form::close() !!}
                        </td>

                      <td>{{ $total=$cart_element->price*$cart_element->qty }}</td>
                      <td>
                         <a href="{{ route('cart-delete', ['id'=>$cart_element->rowId]) }}" class="btn btn-danger"><span >
                                 <i class="fa fa-times"></i>
                             </span></a>
                              {{--<input type="hidden" name="_method" value="{{ $cart_element->rowId }}">--}}
                              {{--<button onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-times"></i></button>--}}
                          {{--</form>--}}

                      </td>

                    </tr>
                        <?php $total_price=$sum+=$total;  ?>
                        <?php $product_number=$num+=$ser  ?>
                        <?php Session::put('product_number', $product_number) ?>


                        @endforeach
                </table >
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th>Product price (Tk. )</th>
                        <th>Vat (Tk. )</th>
                        <th>Delivery Charge </th>
                        <th>Grand Total (Tk. )</th>
                    </tr>
                    <tr>
                        <td>{{ $total_price }} .Tk</td>
                        <td>{{ $vat=0 }} .Tk</td>
                        <td>{{ $parcel=90 }} .Tk</td>
                        <td>{{ $orderTotal=$total_price+$vat+$parcel }} .Tk</td>
                       <?php Session::put('orderTotal', $orderTotal) ?>
                    </tr>
                </table>
                @if(Session::get('customerId') && Session::get('shippingId'))
                    <a href="{{ route('checkout-payment') }}" class="btn btn-success pull-right">Checkout <span class="glyphicon glyphicon-arrow-right"></span></a>
                    @elseif(Session::get('customerId'))
                    <a href="{{ route('checkout-shipping') }}" class="btn btn-success pull-right">Checkout <span class="glyphicon glyphicon-arrow-right"></span></a>
                    @else()
                    <a href="{{ route('checkout') }}" class="btn btn-success pull-right">Checkout <span class="glyphicon glyphicon-arrow-right"></span></a>
                    @endif



                <a href="{{ route('/') }}" class="btn btn-danger">Continue shopping</a>




            </div>

                @else
           <h2> Empty cart</h2>
                @endif
        </div>
    </div>
    <!-- checkout -->
</div>
@endsection