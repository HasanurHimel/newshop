@extends('front-end.master');
@section('title')
    shopping cart
@endsection

@section('content')

    <div class="content">
        <div class="cart-items">
            <div class="container">

                <div class="col-md-9 col-md-offset-2 well" >
                    <h2 class="text-success text-center">Login for stay with us</h2>
                    <h4 class="text-danger text-center">{{ Session::get('message') }}</h4>
                    {!! Form::open(['route'=>'new-customer-login-check', 'method'=>'post']) !!}
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="btn" class="" value="Login">
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- checkout -->
    </div>
@endsection