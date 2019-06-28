@extends('dashboard.master');
@section('title')
    Edit Category
@endsection

@section('element')
    <div class="container">
        <div class="row col-sm-8 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 align="center">Edit your Brand</h4>
                </div>
                <div class="panel-body">

                    <form action="{{ route('update-brand') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Brand Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="brand_name" value="{{ $brands->brand_name }}" class="form-group form-control" />
                                <input type="hidden" name="brand_id" value="{{ $brands->id }}" class="form-group form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Brand description</label>
                            <div class="col-sm-8">
                                <textarea name="brand_description" class="form-group  form-control">{{ $brands->brand_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Publication Status</label>
                            <div class="col-sm-8">

                                <input type="radio" name="publication_status" {{ $brands->publication_status==1 ? 'checked' : '' }} class="form-group  " value="1"/>  Published
                                <input type="radio" name="publication_status" {{ $brands->publication_status==0 ? 'checked' : '' }} class="form-group  " value="0"/>  Unpublished

                            </div>
                        </div>
                        <div class="form-group">
                            <label class=" control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" name="btn" value="Update Brand" class="form-group form-control btn-block btn btn-success" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




@endsection