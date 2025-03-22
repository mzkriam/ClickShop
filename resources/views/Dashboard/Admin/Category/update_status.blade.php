<div class="modal fade" id="update_status{{ $category->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ trans('Dashboard\category.Status_change') }}{{$category->name}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('categories.update_status') }}" method="post" autocomplete="off">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="status">{{trans('Dashboard\category.Status')}}</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" selected disabled>--{{trans('Dashboard\category.Choose')}}--</option>
                            <option value="1">{{trans('Dashboard\category.Enabled')}}</option>
                            <option value="0">{{trans('Dashboard\category.Not_enabled')}}</option>
                        </select>
                    </div>
                    <input type="hidden" name="id" value="{{ $category->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{trans('Dashboard/category.Close')}}</button>
                    <button type="submit" class="btn btn-primary">{{trans('Dashboard/category.edit')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>