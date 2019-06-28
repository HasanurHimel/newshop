@extends('dashboard.master');
@section('title')
   Create Category
    @endsection

@section('element')
   <div class="container">
       <div class="row col-sm-8 col-sm-offset-3">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <h4 align="center">Create your Category</h4>
               </div>
               <div class="panel-body">
                   <h4 align="center" style="color: #5cb85c">{{ Session::get('message') }}</h4>
                           <form action="{{ route('category-save') }}" method="POST">
                               {{ csrf_field() }}
                               <div class="form-group">
                                   <label class="col-sm-4 control-label">Category Name</label>
                           <div class="col-sm-8">
                               <input type="text" name="category_name" class="form-group form-control" />
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-4 control-label">Category description</label>
                           <div class="col-sm-8">
                               <textarea name="category_description" class="form-group  form-control"></textarea>
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-4 control-label">Publication Status</label>
                           <div class="col-sm-8">
                               <input type="radio" name="publication_status" class="form-group  " value="1"/>  Published
                               <input type="radio" name="publication_status" class="form-group  " value="0"/>  Unpublished
                           </div>
                       </div>
                       <div class="form-group">
                           <label class=" control-label"></label>
                           <div class="col-sm-8">
                               <input type="submit" name="btn" value="Save Category" class="form-group form-control btn-block btn btn-success" />
                           </div>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>




    @endsection