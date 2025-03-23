@extends('Dashboard.layouts.master')

@section('title')
{{ trans('Dashboard/category.edit_category') }} {{ $category->name }}
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
                / {{ trans('Dashboard/category.edit_category') }}
            </span>
            <span class="h6 text-muted mt-1 tx-10 mr-2 mb-0">
                / {{ $category->name }}
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
                <form action="{{ route('categories.update', 'test') }}" method="post" autocomplete="off"
                    enctype="multipart/form-data" class="needs-validation" novalidate>
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="row row-xs align-items-center mg-b-20">
                        <input type="hidden" name="id" value={{ $category->id }}>
                        <div class="col-md-4">
                            <label class="form-label mb-3" for="name">
                                {{ trans('Dashboard/category.name') }}
                            </label>
                            <input value="{{ old('name', $category->name) }}" class="form-control" name="name" type="text" required>
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
                                <option value="" {{ is_null($category->parent_id) ? 'selected' : '' }}>{{ trans('Dashboard/category.selecte') }}</option>
                                @foreach($categories as $categoryItem)                                   
                                    <option value="{{ $categoryItem->id }}" 
                                        {{ old('parent_id', $category->parent_id) == $categoryItem->id || $categoryItem->id == $category->id ? 'disabled' : '' }} 
                                        {{ old('parent_id', $category->parent_id) == $categoryItem->id ? 'selected' : '' }}>
                                        {{ $categoryItem->name }}
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
                                <option value="1" {{ old('status', $category->status) == 1 ? 'selected' : '' }}>
                                    {{ trans('Dashboard/category.Enabled') }}
                                </option>
                                <option value="0" {{ old('status', $category->status) == 0 ? 'selected' : '' }}>
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
                            <textarea class="form-control" name="description">{{ old('description', $category->description) }}</textarea>
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
                                {{ trans('Dashboard/category.category_photo') }}
                            </label>
                            <input type="file" accept="image/*" name="photo" onchange="loadFile(event)" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-6">
                            @if ($category->image)
                                <img style="border-radius:50%" width="150px" height="150px" id="currentImage" src="{{asset('Dashboard/img/Category/'. $category->image->filename)}}" />
                            @else
                                <img style="border-radius:50%" width="150px" height="150px" id="output" />
                            @endif
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
    var currentImage = document.getElementById('currentImage');
    var fileInput = event.target;

    // إذا كانت الصورة موجودة، يتم تحميلها
    if (fileInput.files && fileInput.files[0]) {
        // تحديث صورة المعاينة
        output.src = URL.createObjectURL(fileInput.files[0]);

        // إذا كانت الصورة الحالية موجودة، أخفها
        if (currentImage) {
            currentImage.style.display = "none";
        }

        // لتحديث الصورة المعروضة في وقت مناسب
        output.onload = function() {
            // هذه الخطوة غير ضرورية، ولكن إن كنت تواجه مشاكل في الذاكرة يمكنك استخدامها
            URL.revokeObjectURL(output.src);
        };
    }
}

    </script>
@endsection

</body>

</html>
