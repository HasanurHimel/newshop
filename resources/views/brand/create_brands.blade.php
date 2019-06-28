@extends('dashboard.master');
@section('title')
    Create brand
@endsection

@section('element')
    <div class="container">
        <div class="row col-sm-8 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 align="center">Create your Brands</h4>
                </div>
                <div class="panel-body">
                    <h4 align="center" style="color: #5cb85c">{{ Session::get('message') }}</h4>
                    <form action="{{ route('save-brand') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Brand Name</label>
                            <div class="col-sm-8">
                                <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : '' }}</span>

                                <input type="text" name="brand_name" class="form-group form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Brands description</label>
                            <div class="col-sm-8">
                                <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : '' }}</span>

                                <textarea name="brand_description" class="form-group form-control"></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Publication Status</label>
                            <div class="col-sm-8 ">
                             <input type="radio" name="publication_status" class="form-group  " value="1"/> Published
                              <input type="radio" name="publication_status" class="form-group  " value="0"/>  Unpublished
                                <br/>
                                <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : '' }}</span>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" name="btn" value="Save Brand" class="form-group form-control btn-block btn btn-success" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection