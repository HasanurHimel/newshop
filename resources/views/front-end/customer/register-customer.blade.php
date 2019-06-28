@extends('front-end.master');
@section('title')
    shopping cart
@endsection

@section('content')

    <div class="content">
        <div class="cart-items">
            <div class="container">
                <div class="col-md-12  well">
                    <h2 align="center">You have to Register for any service from us</h2>
                </div>

                <div class="col-md-9 col-sm-offset-2 well">
                    <h2> Registration this from for stay with us</h2>
                    {!! Form::open(['route'=>'customer-new-register', 'method'=>'post']) !!}
                    <div class="form-group">
                        <input type="text" name="first_name" class="form-control" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="last_name" class="form-control" placeholder="Last name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="number" name="mobile" class="form-control" placeholder="Mobile no">
                    </div>
                    <div class="form-group">
                        <textarea name="address" class="form-control" placeholder="Address"></textarea>
                    </div>
                    {{--<div class="form-group">--}}
                    {{--<h5><input type="checkbox" > yes i agree with your condition</h5>--}}
                    {{--</div>--}}
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="btn" class="" value="Register">
                    </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
        <!-- checkout -->
    </div>
@endsection