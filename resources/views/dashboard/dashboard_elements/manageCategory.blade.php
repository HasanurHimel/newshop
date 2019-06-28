
@extends('dashboard.master');
@section('title')
    Manage Category
@endsection
@section('element')
    <div class="row ">
        <div class="col-md-9 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 align="center">Manage your Category</h4>
                </div>

                <div class="panel-body">
                <h4 align="center" style="color: #cb2027">{{ Session::get('message') }}</h4>
                <h4 align="center" style="color: saddlebrown">{{ Session::get('message2') }}</h4>
                <h4 align="center" style="color: saddlebrown">{{ Session::get('message3') }}</h4>
                <h4 align="center" style="color: saddlebrown">{{ Session::get('message4') }}</h4>

                    <table class="table ">


                        <tr class="bg-primary">
                            <th>Sl no</th>
                            <th>category name</th>
                            <th>category description</th>
                            <th>publication status</th>
                            <th>Action</th>

                        </tr>

                        @php ($i=1);
                        @foreach($category as $category) ;
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td>{{ $category->publication_status ==1 ? 'published' : 'unpublished' }}</td>
                            <td>
                                @if($category->publication_status ==1 )
                                <a href="{{ route('category-unpublished',['id'=>$category->id]) }}" class="btn btn-info btn-xs">
                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                </a>
                                @else
                                    <a href="{{ route('category-published', ['id'=>$category->id]) }}" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                @endif
                               <a href="{{ route('category-edit', ['id'=>$category->id]) }}" class="btn btn-primary btn-xs ">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ route('category-delete', ['id'=>$category->id]) }}" class="btn btn-danger btn-xs">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>

                            </td>
                        </tr>

                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>




@endsection