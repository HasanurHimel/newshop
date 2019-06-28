
@extends('dashboard.master');
@section('title')
    Manage Brands
@endsection
@section('element')
    <div class="row ">
        <div class="col-md-9 col-sm-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 align="center">Manage your Brands</h4>
                </div>

                <div class="panel-body">
                    <h4 align="center" style="color: #cb2027">{{ Session::get('message') }}</h4>


                    <table class="table ">


                        <tr class="bg-primary">
                            <th>Sl no</th>
                            <th>Brand name</th>
                            <th>Brand description</th>
                            <th>publication status</th>
                            <th>Action</th>

                        </tr>

                        @php ($i=1);
                        @foreach($brands as $brand ) ;
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $brand->brand_name }}</td>
                            <td>{{ $brand->brand_description }}</td>
                            <td>{{ $brand->publication_status ==1 ? 'published' : 'unpublished' }}</td>
                            <td>
                                @if($brand->publication_status ==1 )
                                    <a href="{{ route('brand-unpublished',['id'=>$brand->id]) }}" class="btn btn-info btn-xs">
                                        <span class="glyphicon glyphicon-arrow-up"></span>
                                    </a>
                                @else
                                    <a href="{{ route('brand-published', ['id'=>$brand->id]) }}" class="btn btn-danger btn-xs">
                                        <span class="glyphicon glyphicon-arrow-down"></span>
                                    </a>
                                @endif
                                <a href="{{ route('brand-edit', ['id'=>$brand->id]) }}" class="btn btn-primary btn-xs ">
                                <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ route('brand-delete', ['id'=>$brand->id]) }}" class="btn btn-danger btn-xs">
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