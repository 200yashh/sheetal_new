@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('content')

    <div class="row">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header">{{ $page_title }}</h5>
                <div class="card-body">
                    @isset($route)
                    <div class="d-flex justify-content-end me-4">
                        {!! Helper::getListAddButton($route, 'Add User') !!}
                    </div>
                    @endisset

                    {!! Helper::getDismissableAlert('primary') !!}
                    <!--begin: Datatable-->
                    {!! $html->table() !!}
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>

    {!! $html->scripts() !!}

    <script type="text/javascript">
    // delete normal user
        function actionDelete(ele) {
            var row = $(ele).parents('tr:first');
            if (row) {
                var id = row.attr('id');
                if (id) {
                    Swal.fire(deleteAlert).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    id: id,
                                    "_token": "{{ csrf_token() }}",
                                    "type": "soft",
                                    _method: 'DELETE'
                                },
                                url: "{!! route('users.destroy', 1) !!}",
                                success: function(data) {
                                    if (data.status) {
                                        Swal.fire(deleteSuccessAlert);
                                        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
                                    }
                                }
                            });
                        }
                    });
                }
            }
        }
        // delete trashed user
        function actionForceDelete(ele) {
            var row = $(ele).parents('tr:first');
            if (row) {
                var id = row.attr('id');
                if (id) {
                    Swal.fire(deleteAlert).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    id: id,
                                    "_token": "{{ csrf_token() }}",
                                    "type": "hard",
                                    _method: 'DELETE'
                                },
                                url: "{!! route('users.destroy', 1) !!}",
                                success: function(data) {
                                    if (data.status) {
                                        Swal.fire(deleteSuccessAlert);
                                        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
                                    }
                                }
                            });
                        }
                    });
                }
            }
        }

        // disable user
        function actionDisable(ele) {
            var row = $(ele).parents('tr:first');
            if (row) {
                var id = row.attr('id');
                if (id) {
                    Swal.fire(disableAlert).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    id: id,
                                    "_token": "{{ csrf_token() }}",
                                    "type": "disable",
                                    _method: 'GET'
                                },
                                url: "{!! route('users.action', 1) !!}",
                                success: function(data) {
                                    if (data.status) {
                                        Swal.fire(disableSuccessAlert);
                                        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
                                    }
                                }
                            });
                        }
                    });
                }
            }
        }
        // enable user
        function actionEnable(ele) {
            var row = $(ele).parents('tr:first');
            if (row) {
                var id = row.attr('id');
                if (id) {
                    Swal.fire(enableAlert).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    id: id,
                                    "_token": "{{ csrf_token() }}",
                                    "type": "enable",
                                    _method: 'GET'
                                },
                                url: "{!! route('users.action', 1) !!}",
                                success: function(data) {
                                    if (data.status) {
                                        Swal.fire(enableSuccessAlert);
                                        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
                                    }
                                }
                            });
                        }
                    });
                }
            }
        }
        // restore deleted user
        function actionRestore(ele) {
            var row = $(ele).parents('tr:first');
            if (row) {
                var id = row.attr('id');
                if (id) {
                    Swal.fire(restoreAlert).then(function(result) {
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    id: id,
                                    "_token": "{{ csrf_token() }}",
                                    "type": "restore",
                                    _method: 'GET'
                                },
                                url: "{!! route('users.action', 1) !!}",
                                success: function(data) {
                                    if (data.status) {
                                        Swal.fire(restoreSuccessAlert);
                                        window.LaravelDataTables["dataTableBuilder"].ajax.reload();
                                    }
                                }
                            });
                        }
                    });
                }
            }
        }


    </script>

@endsection
