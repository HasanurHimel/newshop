@extends('front-end.master');
@section('title')
    shopping cart
@endsection

@section('content')

    <div class="content">
        <div class="cart-items">
            <div class="container">
                <div class="col-md-12  well">
                <h2 align="center">You have to login to complete your valuable order. If you are not registered so, register first</h2>
                </div>

                <div class="col-md-5 well">
                    <h2> If you have not registered !</h2>
                    {!! Form::open(['route'=>'customer-reg', 'method'=>'post']) !!}
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
                <div class="col-md-5 well" style="margin-left: 30px">
                    <h2>If you have registered login please..</h2>
                    <h4 class="text-danger text-center">{{ Session::get('message') }}</h4>
                    {!! Form::open(['route'=>'customer-login', 'method'=>'post']) !!}
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