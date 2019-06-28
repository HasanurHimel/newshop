@extends('front-end.master');
@section('title')
    shipping
@endsection

@section('content')

    <div class="content">
        <div class="cart-items">
            <div class="container">
                <div class="col-md-12  well">
                    <h2 align="center">Dear {{ Session::get('customerName') }} , you have to give us product shipping info to your valuable order</h2>
                </div>

                <div class="col-md-9 col-sm-offset-2 well">
                    <h2> Shipping info goes here</h2>
                    {!! Form::open(['route'=>'new-shipping', 'method'=>'post']) !!}
                    <div class="form-group">
                        <input type="text" value="{{ $customer->first_name.' '.$customer->last_name }}" name="full_name" class="form-control" placeholder="Full name">
                    </div>
                    <div class="form-group">
                        <input type="email" value="{{ $customer->email }}" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="number" value="{{ $customer->mobile }}" name="mobile" class="form-control" placeholder="Mobile no">
                    </div>
                    <div class="form-group">
                        <textarea name="address" class="form-control" placeholder="Address">{{ $customer->address }}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="btn" class="" value="Save Shipping">
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
        <!-- checkout -->
    </div>
@endsection