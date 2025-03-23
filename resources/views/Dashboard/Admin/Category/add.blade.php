@extends('Dashboard.layouts.master')
@section('title')
{{ trans('Dashboard/category.add_category') }}
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('page-header')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <a class="d-none d-sm-inline-block h3 mb-0 text-gray-800 text-decoration-none"
                href="{{ route('categories.index') }}">
                {{ trans('Dashboard/category.category') }}
            </a>
            <span class="h5 text-muted mt-1 tx-13 mr-2 mb-0">
                / {{ trans('Dashboard/category.add_category') }}
            </span>
        </h1>
    </div>
@endsection

@section('content')
@include('Dashboard.messages_alert')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="post" autocomplete="off"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    {{ csrf_field() }}

                    <div class="row row-xs align-items-center mg-b-20">
                        <div class="col-md-4">
                            <label class="form-label mb-3" for="name">
                                {{ trans('Dashboard/category.name') }}
                            </label>
                            <input value="{{ old('name') }}" class="form-control" name="name" type="text" required>
                            <div class="valid-feedback">
                                {{ trans('validation.good') }}
                            </div>
                            <div class="invalid-feedback">
                                {{ trans('validation.required_filed') }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mb-3" for="parent_id">
                                {{ trans('Dashboard/category.parent_category') }}
                            </label>
                            <select name="parent_id" class="form-select" id="parent_id_select">
                                <option value="" selected>{{ trans('Dashboard/category.selecte') }}</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                            <div class="valid-feedback">
                                {{ trans('validation.good') }}
                            </div>
                            <div class="invalid-feedback">
                                {{ trans('validation.required_filed') }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label mb-3" for="status">
                                {{ trans('Dashboard/category.status') }}
                            </label>
                            <select name="status" class="form-select" required>
                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                                    {{ trans('Dashboard/category.Enabled') }}
                                </option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                                    {{ trans('Dashboard/category.Not_enabled') }}
                                </option>
                            </select>
                            <div class="valid-feedback">
                                {{ trans('validation.good') }}
                            </div>
                            <div class="invalid-feedback">
                                {{ trans('validation.required_filed') }}
                            </div>
                        </div>
                    </div>
                    <div class="row row-xs align-items-center my-md-4 mg-b-20">                        
                        <div class="col-md-4">
                            <label class="form-label mb-3" for="description">
                                {{ trans('Dashboard/category.description') }}
                            </label>
                            <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                            <div class="valid-feedback">
                                {{ trans('validation.good') }}
                            </div>
                            <div class="invalid-feedback">
                                {{ trans('validation.required_filed') }}
                            </div>
                        </div>                       
                    </div>
                    <div class="row row-xs align-items-center my-md-4 mg-b-20 d-flex align-items-stretch">
                        <div class="col-md-6">
                            <label class="form-label mb-3" for="photo">
                                {{ trans('Dashboard\category.category_photo') }}
                            </label>
                            <input type="file" accept="image/*" name="photo" onchange="loadFile(event)" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            <img style="border-radius:50%" width="150px" height="150px" id="output" />
                        </div>
                    </div>                    
                    <button type="submit" class="btn btn-info my-3">
                        {{ trans('Dashboard/category.save') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


</div>
</div>
@endsection

@section('js')
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    <script>
        $(document).ready(function() {
            
            $('#parent_id_select').select2({
                placeholder: "{{ trans('Dashboard/category.selecte') }}",   
                allowClear: true   
            });
        });
    </script>
    <script>
        function loadFile(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) 
            }
        }
    </script>
    
@endsection
</body>

</html>