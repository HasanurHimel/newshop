@extends('front-end.master');
@section('title')
    shipping
@endsection

@section('content')

    <div class="content">
        <div class="cart-items">
            <div class="container">
                <div class="col-md-12  well">
                    <h2 align="center">Dear {{ Session::get('customerName') }} , you have to choose your payment method ..</h2>
                </div>

                <div class="col-md-9 col-sm-offset-2 well">
                    <h2> Choose your payment method</h2>
                    {!! Form::open(['route'=>'new-order', 'method'=>'post']) !!}
                   <table class="table table-bordered">
                       <tr>
                           <th>Cash in delivery</th>
                           <td><input required type="radio" value="cash" name="payment_method"> Cash in delivery</td>
                       </tr>
                      <tr>
                          <th>Paypal</th>
                          <td><input required type="radio" value="paypal" name="payment_method"> Paypal</td>
                      </tr>
                       <tr>
                           <th>Bkash</th>
                           <td><input required type="radio" value="bkash" name="payment_method"> Bkash</td>
                       </tr>
                   </table>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="btn" class="" value="Confirm order">
                    </div>

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
        <!-- checkout -->
    </div>
@endsection