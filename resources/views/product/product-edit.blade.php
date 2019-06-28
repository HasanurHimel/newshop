@extends('dashboard.master');
@section('title')
    edit product
@endsection

@section('element')
    <div class="container">
        <div class="row col-sm-9 col-sm-offset-3">
            <div class="panel panel-default ">
                <div class="panel-heading " >
                    <h4 align="center" class="bg-primary">Products Edit</h4>
                </div>
                <div class="panel-body">

                    {{--<h4 align="center" style="color: #5cb85c">{{ Session::get('message') }}</h4>--}}
                    <form action="{{ route('update-product') }}" method="post" enctype="multipart/form-data" name="editFormsInfo">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Product Category</label>
                            <div class="col-sm-8">
                                <select class="form-group form-control" name="product_id">

                                    <option>-----select product category----</option>
                                    @foreach($categories as $category )
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Brand name</label>
                            <div class="col-sm-8">
                                <select class="form-group form-control" name="brand_id">

                                    <option>-----select your brand----</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach;


                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Product name</label>
                            <div class="col-sm-8">

                                <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-group form-control">


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Short description</label>
                            <div class="col-sm-8">
                                <h5 class="text-danger"><span>{{ $errors->has('short_description') ? $errors->first('short_description') : '' }}</span></h5>

                                <textarea name="short_description" class="form-group form-control">{{ $product->short_description }}</textarea>


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">long description</label>
                            <div class="col-sm-8">


                                <textarea id="editor" name="long_description" class="form-group form-control">{{ $product->long_description }}</textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Product image</label>
                            <div class="col-sm-8">

                                <img src="{{ asset( $product->product_image) }}" alt="" height="80px" width="80">
                                <input type="file" name="product_image" class="form-group">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Quantity</label>
                            <div class="col-sm-8">

                                <input required type="number" value="{{ $product->quantity }}" name="quantity" class="form-group form-control">
                                <input type="hidden" name="products_id" value="{{ $product->id }}" class="form-group form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Product price</label>
                            <div class="col-sm-8">

                                <input required type="number" value="{{ $product->product_price }}" name="product_price" class="form-group form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Publication Status</label>
                            <div class="col-sm-8 radio">
                                <label> <input type="radio" name="publication_status" {{ $product->publication_status ==1 ? 'checked' : '' }} class="form-group  " value="1"/> Published</label>
                                <label> <input type="radio" name="publication_status" {{ $product->publication_status ==0 ? 'checked' : '' }} class="form-group  " value="0"/>  Unpublished</label>
                                <br/>


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" name="btn" value="Update product" class="btn btn-success btn-block form-group form-control">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    document.forms['editFormsInfo'].elements['product_id'].value = '{{ $product->product_id }}';
    document.forms['editFormsInfo'].elements['brand_id'].value = '{{ $product->brand_id }}';
</script>


@endsection