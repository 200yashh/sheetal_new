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
                        {!! Helper::getListAddButton($route, 'Add Agents') !!}
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
    // delete agents
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
                                url: "{!! route('agents.destroy', 1) !!}",
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


    </script>

@endsection
