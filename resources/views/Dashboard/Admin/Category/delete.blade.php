<div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ trans('Dashboard\category.delete_category') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('categories.destroy', 'test') }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <h5>{{ trans('Dashboard\category.Warning') }}</h5>
                    <h4>{{$category->name}}</h4>
                    <input type="hidden" value="1" name="page_id">
                    @if($category->image)
                    <input type="hidden" name="filename" value="{{$category->image->filename}}">
                    @endif
                    <input type="hidden" name="id" value="{{ $category->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{trans('Dashboard/category.Close')}}</button>
                    <button type="submit" class="btn btn-danger">{{trans('Dashboard/category.delete')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>