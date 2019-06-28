@extends('dashboard.master');
@section('title')
    Create product
@endsection
@section('css')
    <link href="{{ asset('/') }}dropzone/dropzone.css" rel='stylesheet' type='text/css' />
    @endsection
@section('js')
    <script src="{{ asset('/') }}dropzone/dropzone.js"></script>
    <script src="{{ asset('/') }}dropzone/dropzone-config-3.js"></script>
    @endsection

@section('element')
    <div class="container">
        <div class="row col-sm-9 col-sm-offset-3">
            <div class="panel panel-default ">
                <div class="panel-heading " >
                    <h4 align="center" class="bg-primary">Products info</h4>
                </div>
                <div class="panel-body">

                    <h4 align="center" style="color: #5cb85c">{{ Session::get('message') }}</h4>


                    <div class="form-group">

                                        {{--multiple photo upload start--}}





                        <div class="row">
                            <div class="col-md-12">
                                <div class=" how-to-create" >

                                    {{--<h3>Images - 3<span id="photoCounter"></span></h3>--}}
                                    {{--<br />--}}

                                    {!! Form::open(['url' => route('upload-post'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}

                                    <div class="dz-message">

                                    </div>

                                    <div class="fallback">
                                        <input name="file" type="file" multiple />
                                    </div>

                                    <div class="dropzone-previews" id="dropzonePreview"></div>

                                    <h4 style="text-align: center;color:#428bca;">Drop product images in this area  <span class="glyphicon glyphicon-hand-down"></span></h4>

                                    {!! Form::close() !!}
                                    <br>
                                    <button id='submitfiles' class='btn btn-primary pull-right'>Submit Files</button>
                                </div>

                            </div>
                        </div>

                        <!-- Dropzone Preview Template -->
                        <div id="preview-template" style="display: none;">

                            <div class="dz-preview dz-file-preview">
                                <div class="dz-image"><img data-dz-thumbnail=""></div>

                                <div class="dz-details">
                                    <div class="dz-size"><span data-dz-size=""></span></div>
                                    <div class="dz-filename"><span data-dz-name=""></span></div>
                                </div>
                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                                <div class="dz-error-message"><span data-dz-errormessage=""></span></div>

                                <div class="dz-success-mark">
                                    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                        <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                                        <title>Check</title>
                                        <desc>Created with Sketch.</desc>
                                        <defs></defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                            <path d="M23.5,31.8431458 L17.5852419,25.9283877 C16.0248253,24.3679711 13.4910294,24.366835 11.9289322,25.9289322 C10.3700136,27.4878508 10.3665912,30.0234455 11.9283877,31.5852419 L20.4147581,40.0716123 C20.5133999,40.1702541 20.6159315,40.2626649 20.7218615,40.3488435 C22.2835669,41.8725651 24.794234,41.8626202 26.3461564,40.3106978 L43.3106978,23.3461564 C44.8771021,21.7797521 44.8758057,19.2483887 43.3137085,17.6862915 C41.7547899,16.1273729 39.2176035,16.1255422 37.6538436,17.6893022 L23.5,31.8431458 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" stroke-opacity="0.198794158" stroke="#747474" fill-opacity="0.816519475" fill="#FFFFFF" sketch:type="MSShapeGroup"></path>
                                        </g>
                                    </svg>
                                </div>

                                <div class="dz-error-mark">
                                    <svg width="54px" height="54px" viewBox="0 0 54 54" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
                                        <!-- Generator: Sketch 3.2.1 (9971) - http://www.bohemiancoding.com/sketch -->
                                        <title>error</title>
                                        <desc>Created with Sketch.</desc>
                                        <defs></defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage">
                                            <g id="Check-+-Oval-2" sketch:type="MSLayerGroup" stroke="#747474" stroke-opacity="0.198794158" fill="#FFFFFF" fill-opacity="0.816519475">
                                                <path d="M32.6568542,29 L38.3106978,23.3461564 C39.8771021,21.7797521 39.8758057,19.2483887 38.3137085,17.6862915 C36.7547899,16.1273729 34.2176035,16.1255422 32.6538436,17.6893022 L27,23.3431458 L21.3461564,17.6893022 C19.7823965,16.1255422 17.2452101,16.1273729 15.6862915,17.6862915 C14.1241943,19.2483887 14.1228979,21.7797521 15.6893022,23.3461564 L21.3431458,29 L15.6893022,34.6538436 C14.1228979,36.2202479 14.1241943,38.7516113 15.6862915,40.3137085 C17.2452101,41.8726271 19.7823965,41.8744578 21.3461564,40.3106978 L27,34.6568542 L32.6538436,40.3106978 C34.2176035,41.8744578 36.7547899,41.8726271 38.3137085,40.3137085 C39.8758057,38.7516113 39.8771021,36.2202479 38.3106978,34.6538436 L32.6568542,29 Z M27,53 C41.3594035,53 53,41.3594035 53,27 C53,12.6405965 41.3594035,1 27,1 C12.6405965,1 1,12.6405965 1,27 C1,41.3594035 12.6405965,53 27,53 Z" id="Oval-2" sketch:type="MSShapeGroup"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>

                            </div>
                        </div>
                        <!-- End Dropzone Preview Template -->
                        {!! Form::hidden('csrf-token', csrf_token(), ['id' => 'csrf-token']) !!}






                                        {{--multiple photo upload end--}}


                </div>





                    <form action="{{ route('save-product') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Product Category</label>
                            <div class="col-sm-8">
                                <select class="form-group form-control" name="product_id">
                                    <h5 class="text-danger"><span>{{ $errors->has('product_id') ? $errors->first('product_id') : '' }}</span></h5>

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
                                    <h5 class="text-danger"><span>{{ $errors->has('brand_id') ? $errors->first('brand_id') : '' }}</span></h5>

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
                                <h5 class="text-danger"><span>{{ $errors->has('product_name') ? $errors->first('product_name') : '' }}</span></h5>

                                <input type="text" name="product_name" class="form-group form-control">


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Short description</label>
                            <div class="col-sm-8">
                                <h5 class="text-danger"><span>{{ $errors->has('short_description') ? $errors->first('short_description') : '' }}</span></h5>

                                <textarea name="short_description" class="form-group form-control"></textarea>


                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">long description</label>
                            <div class="col-sm-8">
                                <h5 class="text-danger"><span>{{ $errors->has('long_description') ? $errors->first('long_description') : '' }}</span></h5>

                                <textarea id="editor"  name="long_description" class="form-group  form-control"></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Product image</label>
                            <div class="col-sm-8">
                                <h5 class="text-danger"><span>{{ $errors->has('product_image') ? $errors->first('product_image') : '' }}</span></h5>

                                <input type="file" name="product_image" class="form-group">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Quantity</label>
                            <div class="col-sm-8">
                                <h5 class="text-danger"><span>{{ $errors->has('quantity') ? $errors->first('quantity') : '' }}</span></h5>

                                <input required type="number" name="quantity" class="form-group form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Product price</label>
                            <div class="col-sm-8">
                                <h5 class="text-danger"><span>{{ $errors->has('product_price') ? $errors->first('product_price') : '' }}</span></h5>

                                <input required type="text" name="product_price" class="form-group form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label">Publication Status</label>
                            <div class="col-sm-8 radio">
                               <label> <input type="radio" name="publication_status" class="form-group  " value="1"/> Published</label>
                                <label> <input type="radio" name="publication_status" class="form-group  " value="0"/>  Unpublished</label>
                            <br/>
                                <h5 class="text-danger"><span>{{ $errors->has('publication_status') ? $errors->first('publication_status') : '' }}</span></h5>


                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" name="btn" value="save product" class="btn btn-success btn-block form-group form-control">
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>




@endsection

