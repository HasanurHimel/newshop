@extends('dashboard.master');
@section('title')
   ckeditor
    @endsection

@section('element')
   <div class="container">
       <div class="row col-sm-8 col-sm-offset-3">
           <div class="panel panel-default">
               <div class="panel-heading">
                   <h4 align="center">Experiment result of ckeditor</h4>
               </div>
               <div class="panel-body">
			   @php($i=1)
			   @foreach($ck_editors as $ck_editor)
			  <h2 align="center">{{ $ck_editor->ckeditor_blog }}</h2>
			   
                @endforeach          
               </div>
           </div>
       </div>
   </div>




    @endsection