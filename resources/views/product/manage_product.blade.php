
@extends('dashboard.master');
@section('title')
    Manage products
@endsection
@section('element')
    <div class="row ">
        <div class="col-md-9 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 align="center">Manage your Category</h4>
                </div>

                <div class="panel-body">

                    <h2 align="center" class="text-success font-italic" >{{ Session::get('message') }}</h2>
                    <div class="table-responsive">
                        <table class="table ">


                            <tr class="bg-primary">
                                <th>Sl no</th>
                                <th>category name</th>
                                <th>Brand name</th>
                                <th>Product name</th>
                                <th>Short description</th>
                                <th>Long description</th>
                                <th>Product imagen</th>
                                <th>Quantity</th>
                                <th>Product price</th>
                                <th>Publication_status</th>
                                <th>Action</th>

                            </tr>


                            @php($i=1);
                            @foreach($products as $product);
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->brand_name }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->short_description }}</td>
                                <td>{{ $product->long_description }}</td>
                                <td><img src="{{ asset($product->product_image) }}" alt="" height="100px" width="100px"></td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->publication_status }}</td>
                                <td>
                                    @if($product->publication_status == 1)
                                    <a href="{{ route('product-unpublished', ['id'=>$product->id ]) }} " class="btn btn-info btn-xs">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                    @else
                                        <a href="{{ route('product-published', ['id'=>$product->id ]) }}" class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-arrow-down"></span>
                                        </a>
                                    @endif
                                    <br/>
                                    <a href="{{ route('product-edit', ['id'=>$product->id ]) }}" class="btn btn-primary btn-xs">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <br/>
                                    <a href="{{ route('delete-product', ['id'=>$product->id]) }}" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                    <br/>
                                </td>
                            </tr>
                                @endforeach;
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>




@endsection