@extends('dashboard.master');
@section('title')
    Create Category
@endsection

@section('element')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <div class="jumbotron how-to-create" >

                    <h3>Images - 1<span id="photoCounter"></span></h3>
                    <br />

                    {!! Form::open(['url' => route('upload-post'), 'class' => 'dropzone', 'files'=>true, 'id'=>'real-dropzone']) !!}

                    <div class="dz-message">

                    </div>

                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>

                    <div class="dropzone-previews" id="dropzonePreview"></div>

                    <h4 style="text-align: center;color:#428bca;">Drop images in this area  <span class="glyphicon glyphicon-hand-down"></span></h4>

                    {!! Form::close() !!}

                </div>
                <div class="jumbotron how-to-create">
                    <ul>
                        <li>Images are uploaded as soon as you drop them</li>
                        <li>Maximum allowed size of image is 8MB</li>
                    </ul>

                </div>
            </div>
        </div>
    </div>




@endsection