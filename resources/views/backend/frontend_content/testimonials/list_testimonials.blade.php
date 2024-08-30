@extends('layouts/contentNavbarLayout')

@section('title', $page_title)

@section('content')

    <div class="row">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header">{{ $page_title }}</h5>
                <div class="card-body">
                    <div class="d-flex justify-content-end me-4">
                        {!! Helper::getListAddButton($route, 'Add Testimonials') !!}
                    </div>

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
        
        var defaultAlertText = deleteAlert['text'];
        var defaultConfirmButtonText = deleteAlert['confirmButtonText'];
        var defaultSuccessAlertText = deleteSuccessAlert['text'];

        // delete testimonial
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
                                url: "{!! route('frontend_testimonials.destroy', 1) !!}",
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

        // Enable/Disable Testimonials
        function actionTestimonialStatus(ele) {
            var row = $(ele).parents('tr:first');
            var type = $(ele).data('type');
            if (row) {
                var id = row.attr('id');
                if (id) {
                    if (type == 'enable') {
                        deleteAlert['text'] = 'Are you sure want to enable this testimonial?';
                        deleteAlert['confirmButtonText'] = 'Yes, enable!';
                    } else {
                        deleteAlert['text'] = 'Are you sure want to disable this testimonial?';
                        deleteAlert['confirmButtonText'] = 'Yes, disable!';
                    }
                    Swal.fire(deleteAlert).then(function(result) {
                        deleteAlert['text'] = defaultAlertText;
                        deleteAlert['confirmButtonText'] = defaultConfirmButtonText;
                        if (result.value) {
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                data: {
                                    id: id,
                                    type: type,
                                    "_token": "{{ csrf_token() }}",
                                    _method: 'DELETE'
                                },
                                url: "{!! route('frontend_testimonials.destroy', 1) !!}",
                                success: function(data) {
                                    if (data.status) {
                                        if (type == 'enable') {
                                            deleteSuccessAlert['text'] = 'Testimonial enabled successfully!';
                                        } else {
                                            deleteSuccessAlert['text'] = 'Testimonial disabled successfully!';
                                        }
                                        Swal.fire(deleteSuccessAlert);
                                        deleteSuccessAlert['text'] = defaultSuccessAlertText;
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
