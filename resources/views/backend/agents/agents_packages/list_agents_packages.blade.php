@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('content')

    <div class="row">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header">{{ $page_title }}</h5>
                <div class="card-body">
                    <div class="accordion mt-3" id="accordionExample">
                        <div class="card accordion-item active">
                            <h2 class="accordion-header" id="headingOne">
                                <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#accordionOne" aria-expanded="true" aria-controls="accordionOne">
                                    Filters
                                </button>
                            </h2>

                            <div id="accordionOne" class="accordion-collapse collapse hide"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        @if (!Helper::isRole('agent'))
                                            <div class="mt-3 col-md-3">
                                                <select class="select2 form-select custom-filter agent_id" name="agent_id">
                                                    <option value="">All Agents</option>
                                                    @foreach ($agents_list as $pV => $pL)
                                                        <option value="{{ $pV }}">{{ $pL }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        <div class="mt-3 col-md-3">
                                            <select class="select2 form-select custom-filter master_package_id"
                                                name="master_package_id">
                                                <option value="">All Package Categories</option>
                                                @foreach ($master_packages_list as $pV => $pL)
                                                    <option value="{{ $pV }}">{{ $pL }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isset($route))
                        <div class="d-flex justify-content-end me-4">
                            {!! Helper::getListAddButton($route, 'Add Agent Package') !!}
                        </div>
                    @endif

                    {!! Helper::getDismissableAlert('primary') !!}
                    <!--begin: Datatable-->
                    {!! $html->table(['class' => 'table table-bordered w-100']) !!}
                    <!--end: Datatable-->
                </div>
            </div>
        </div>
    </div>

    {!! $html->scripts() !!}

    <script type="text/javascript">
        $('.custom-filter').change(function() {
            window.LaravelDataTables["dataTableBuilder"].ajax.reload();
        });


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
                                    "id": id,
                                    "_token": "{{ csrf_token() }}",
                                    _method: 'DELETE'
                                },
                                url: "{!! route('agents_packages.destroy', 1) !!}",
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
