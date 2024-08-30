@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Master /</span> {{ $page_title }}
    </h4>

{!! Helper::getDismissableErrorAlert($errors) !!}
<form action="{{ $action }}" id="manage_form" method="POST">
    @csrf
    @if (!empty($data['id']))
        @method('PUT')
    @endif
    <!-- Basic Bootstrap Table -->
    <div class="card">
    <h5 class="card-header">Table Basic</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
        <thead>
            <tr>
            <th>Module</th>
            <th class="text-center">View</th>
            <th class="text-center">Add</th>
            <th class="text-center">Edit</th>
            <th class="text-center">Delete</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($allMenus as $slug => $title) 
            <tr>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $title }}</strong></td>
                <td class="text-center"><input class="form-check-input" type="checkbox" value="1" name="permission[admin][{{ $slug }}][view]" {{ $user->can('admin.'. $slug . '.view') ? 'checked' : '' }} /></td>
                <td class="text-center"><input class="form-check-input" type="checkbox" value="1" name="permission[admin][{{ $slug }}][add]" {{ $user->can('admin.'. $slug . '.add') ? 'checked' : '' }} /></td>
                <td class="text-center"><input class="form-check-input" type="checkbox" value="1" name="permission[admin][{{ $slug }}][edit]" {{ $user->can('admin.'. $slug . '.edit') ? 'checked' : '' }} /></td>
                <td class="text-center"><input class="form-check-input" type="checkbox" value="1" name="permission[admin][{{ $slug }}][delete]" {{ $user->can('admin.'. $slug . '.delete') ? 'checked' : '' }} /></td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
<div class="mt-2">
    {!! Helper::getFormSubmitButton() !!}
    {!! Helper::getFormCancelButton(route('master_package.index')) !!}
</div>
    <!--/ Basic Bootstrap Table -->
</form>
<script>
$("#manage_form").validate();
</script>

@endsection
