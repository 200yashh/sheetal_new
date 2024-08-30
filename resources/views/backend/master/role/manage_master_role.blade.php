@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Master /</span> {{ $page_title }}
    </h4>

    <div class="row">
        <div class="col-md-12">
            {{-- <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i class="bx bx-bell me-1"></i> Notifications</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-connections')}}"><i class="bx bx-link-alt me-1"></i> Connections</a></li>
    </ul> --}}
            {!! Helper::getDismissableAlert('danger') !!}
            {!! Helper::getDismissableErrorAlert($errors) !!}
            <form action="{{ $action }}" id="manage_form" method="POST" enctype="multipart/form-data">
                @csrf
                @if (!empty($data['id']))
                    @method('PUT')
                @endif
                <div class="card mb-4">
                    <h5 class="card-header">Roles</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="name" class="form-label">Role Name</label>
                                <input class="form-control required" type="text" id="name" name="name"
                                    value="{{ $data['name'] ?? '' }}" {{ !empty($data['id']) ? 'readonly' : '' }} />
                            </div>
                        </div>
                    </div>
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
                                <td class="text-center"><input class="form-check-input" type="checkbox" value="1" name="permission[admin][{{ $slug }}][view]" {{ in_array('admin.' . $slug . '.view', $permissionData) ? 'checked' : '' }} /></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" value="1" name="permission[admin][{{ $slug }}][add]" {{ in_array('admin.' . $slug . '.add', $permissionData) ? 'checked' : '' }} /></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" value="1" name="permission[admin][{{ $slug }}][edit]" {{ in_array('admin.' . $slug . '.edit', $permissionData) ? 'checked' : '' }} /></td>
                                <td class="text-center"><input class="form-check-input" type="checkbox" value="1" name="permission[admin][{{ $slug }}][delete]" {{ in_array('admin.' . $slug . '.delete', $permissionData) ? 'checked' : '' }} /></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- /Account -->
                </div>
                {!! Helper::getFormSubmitButton() !!}
                {!! Helper::getFormCancelButton(route('master_role.index')) !!}
            </form>
        </div>
    </div>
<script>
    $("#manage_form").validate();
</script>
    @endsection
