@extends('dashboard.master');
@section('title')
   Create Category
    @endsection

@section('element')
   <div class="container">
       <div class="row col-sm-8 col-sm-offset-3">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <h4 align="center">Experiment of ckeditor</h4>
               </div>
               <div class="panel-body">
			   
			   
                           <form action="{{ route('save-ckeditor') }}" method="POST">
                               {{ csrf_field() }}
                               <div class="form-group">
                                   <label class="col-sm-4 control-label">title</label>
                           <div class="col-sm-8">
                               <input type="text" name="title_name" class="form-group form-control" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-4 control-label">ckeditor blog</label>
                           <div class="col-sm-8">
                               <textarea name="ckeditor_blog" class="form-group ckeditor  form-control"><h1>himel khan</h1></textarea>
                           </div>
                       </div>
                       
                       <div class="form-group">
                           <label class=" control-label"></label>
                           <div class="col-sm-8">
                               <input type="submit" name="btn" value="Save data" class="form-group form-control btn-block btn btn-success" />
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>




    @endsection