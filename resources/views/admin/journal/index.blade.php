@extends('admin.layouts.app')
@section('stylesheets')
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/sweetalert2.min.css">

<style>
</style>
<!-- END: Vendor CSS-->
@endsection
@section('title','Journal')
@section('content')
<section id="customer-list">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <table class="data-table table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created at</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')

<script src="/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
<script>
    var table = $(".data-table").dataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "type": "get",
            "url": "{{route('admin.journal.all')}}",
            "beforeSend": function (){
            },
        },
        "createdRow": function (row, data, dataIndex) {
            $(row).attr('data-delete-id', data[9]);
        },
        "dom": '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
        "order": [
            [0, 'desc']
        ],
        "displayLength": 10,
        "lengthMenu": [ 10, 25, 50, 75, 100],
        "columnDefs": [
            {
                "orderable": false,
                "targets": -1
            },{
                "targets": [2],
                "render": function (data, type, full) {
                    return data.toLocaleString('id');
                }
            }
        ],
        "drawCallback": function (settings) {
            stopAjaxLoader()
            const popUp = Swal.mixin({
                toast: false,
                showConfirmButton: true,
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(".deleteAjax").off().on('click',function () {
                var msg = $(this).data('msg');
                popUp.fire({
                    title: "Are You Sure?",
                    text: msg,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then((result) => {
                    if (result.value) {
                        var url = $(this).data("url");
                        $.ajax({
                            url: url,
                            type: 'get',
                            dataType: 'JSON',
                            success: function (response) {
                                $('.data-table').DataTable().ajax.reload();
                                toastr.success(response.message, response.status, {
                                    closeButton: true,
                                    tapToDismiss: false
                                });
                            },
                            error: function (xhr) {
                                toastr.error(xhr.responseJSON.message, xhr.responseJSON.status, {
                                    closeButton: true,
                                    tapToDismiss: false
                                });
                            }
                        })
                    }
                })
            });
        }
    });
    $('div.head-label').html('<h6 class="mb-0">@yield('title')</h6>');
</script>
@endsection
