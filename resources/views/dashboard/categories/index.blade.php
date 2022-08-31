@extends('dashboard.layouts.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('pageTitle')
    {{ trans('dashboard/category.categories') }}
@endsection

@section('content')
<div id="kt_content_container" class="container-xxl">
    <div class="card card-xxl-stretch mb-5 mb-xl-8">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bolder fs-3 mb-1">{{ trans('dashboard/category.categories') }}</span>
            </h3>
        </div>
        <!--end::Header-->
        <!--begin::Body-->
        <div class="card-body py-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_new_category">
                {{trans('dashboard/category.create_category')}}
            </button>
            <br>
            <!--begin::Table container-->
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                    <thead>
                        <tr>
                            <th>
                                <label class="checkbox checkbox-lg checkbox-single">
                                    <input type="checkbox" value="1" name="checkbox" />
                                    <span></span>
                                </label>
                            </th>
                            <th>{{ trans('dashboard/category.category_name') }}</th>
                            <th>{{ trans('dashboard/category.category_parent') }}</th>
                            <th>{{ trans('dashboard/category.category_status') }}</th>
                            <th>{{ trans('dashboard/general.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>
                                <label class="checkbox checkbox-lg checkbox-single">
                                    <input type="checkbox" value="1" name="checkbox" />
                                    <span></span>
                                </label>
                            </td>
                            <td>{{ $category->name }}</td>
                            <td>{!! $category->getParentCategory() !!}</td>
                            <td>{!! $category->statusWithLabel() !!}</td>
                            <td>
                                <a href="{{ route('Categories.edit', $category->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
                                    <i class="la la-edit"></i>
                                </a>
                                <a href="{{ route('Categories.destroy', $category->id) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                                    <i class="la la-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                <div class="text-center">
                                    <h4 class="text-danger">{{trans('dashboard/category.sorry_not_category_avilable')}}</h4>
                                </div>
                            </td>
                        @endforelse
                    </tbody>
                </table>
                <!--end::Table-->
                {{ $categories->links() }}
            </div>
            <!--end::Table container-->
        </div>
        <!--begin::Body-->
        @include('dashboard.categories.btn.create_new_category')
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection