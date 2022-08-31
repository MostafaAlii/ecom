<div class="modal fade" tabindex="-1" id="create_new_category">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="bi bi-plus fs-2x text-primary"></i>
                    {{trans('dashboard/category.create_new_category')}}
                </h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>
            <form action="{{ route('Categories.store') }}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <!-- StartCategory Name -->
                    <div class="form-group">
                        <label><i class="bi bi-pen text-dark"></i> {{ trans('dashboard/category.category_name') }}</label>
                        <input type="text" name="name" class="form-control"placeholder="{{ trans('dashboard/category.type_category_name') }}" required="required"/>
                    </div>
                    <!-- End Category Name -->
                    <br>
                    <!-- Start Parent Category Select -->
                    <label><i class="bi bi-pen text-dark"></i> {{ trans('dashboard/category.select_parent_category') }}</label>
                    <select class="form-select form-select-solid form-select-lg" name="parent_id">
                        <option class="invisible"></option>
                        <optgroup label="{{trans('dashboard/category.parent_category')}}">
                            @php
                                $main_category = Category::parent()->active()->get();
                            @endphp
                            @foreach ($main_category as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </optgroup>
                    </select>
                    <!-- End Parent Category Select -->
                    <br>
                    <!-- Start Category Status Select -->
                    <label><i class="bi bi-pen text-dark"></i> {{ trans('dashboard/category.select_category_status') }}</label>
                    <select class="form-select form-select-solid form-select-lg" name="status">
                        <option value="pending">{{trans('dashboard/general.pending')}}</option>
                        <option  value="active">{{trans('dashboard/general.active')}}</option>
                        <option  value="notactive">{{trans('dashboard/general.notactive')}}</option>
                    </select>
                    <!-- End Category Status Select -->
                    <br>
                    <!-- Start Category Description -->
                    <div class="form-group">
                        <label><i class="bi bi-pen text-dark"></i> {{ trans('dashboard/category.category_description') }}</label>
                        <textarea class="form-control form-control-solid" name="description"></textarea>
                    </div>
                    <!--- End Category Description -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ trans('dashboard/general.cancel') }}</button>
                    <button type="submit" class="btn btn-primary">{{ trans('dashboard/general.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>