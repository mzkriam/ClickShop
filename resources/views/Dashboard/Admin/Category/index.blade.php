@extends('Dashboard.layouts.master')
@section('title')
{{trans('Dashboard/category.category')}}
@endsection
@section('page-header')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            {{trans('Dashboard/category.category')}}
            <span class="h5 text-muted mt-1 tx-13 mr-2 mb-0">
                / {{trans('Dashboard/category.show_all')}}
            </span>
        </h1>

        <a href="{{route('categories.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50 mx-1"></i>
            {{trans('Dashboard\category.add_category')}}
        </a>

    </div>
    @endsection
    @section('content')
    @include('Dashboard.messages_alert')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{trans('Dashboard\category.category_photo')}}</th>
                            <th>{{trans('Dashboard\category.name')}}</th>
                            <th>{{trans('Dashboard\category.status')}}</th>
                            <th>{{trans('Dashboard\category.created_at')}}</th>
                            <th>{{trans('Dashboard\category.Processes')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr scope="row">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($category->image)
                                <img style="border-radius:50%"
                                    src="{{asset('Dashboard/img/Category/'. $category->image->filename)}}" height="50px"
                                    width="50px" alt="{{$category->name}}">
                                @else
                                <img style="rounded m-0" src="{{asset('Dashboard/img/category_default.png')}}"
                                    alt="category default image" height="50px" width="50px">

                                @endif
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="rounded border border-{{$category->status == 1 ? 'success' : 'danger'}}">
                                    {{$category->status == 1 ?
                                    trans('Dashboard\category.Enabled'):trans('Dashboard\category.Not_enabled')}}
                                </div>
                            </td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button aria-expanded="false" aria-haspopup="true"
                                        class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                        type="button">{{trans('Dashboard\category.Processes')}}<i
                                            class="fas fa-caret-down mr-1"></i></button>
                                    <div class="dropdown-menu tx-13">
                                        <a class="dropdown-item" href="{{route('categories.edit',$category->id)}}">
                                            <i style="color: #0ba360" class="fas fa-sync"></i>&nbsp;&nbsp;
                                            {{trans('Dashboard\category.edit_category')}}
                                        </a>

                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#update_status{{$category->id}}"><i
                                                style="color: rgba(255, 0, 200, 0.523)"
                                                class="fas fa-ethernet"></i>&nbsp;&nbsp;
                                            {{trans('Dashboard\category.Status_change')}}
                                        </a>
                                        <a class="dropdown-item" href="#" data-toggle="modal"
                                            data-target="#delete{{$category->id}}">
                                            <i style="color: rgb(223, 81, 83)" class="fas fa-trash"></i>&nbsp;&nbsp;
                                            {{trans('Dashboard\category.delete_category')}}
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @include('Dashboard.Admin.category.delete')
                        @include('Dashboard.Admin.category.update_status')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>
</div>



@endsection
</body>

</html>
