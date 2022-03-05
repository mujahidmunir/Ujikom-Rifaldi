@extends('layouts.master')
@section('content')
    <div class="row mt-4">
    <div class="col-lg-6">
        <div class="card radius-25">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><h4 class="mb-5">Makanan</h4></div>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th width="15%" class="text-center">Qty</th>
                            <th width="15%" class="text-center">No Meja</th>
                            <th width="15%" class="text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($makanan as $data)
                        <tr>
                            <td>{{$data->name}}</td>
                            <td class=" text-center"><strong>{{$data->total_qty}}</strong></td>
                            <td class=" text-center"><strong>{{$data->table_name}}</strong></td>
                            <td class=" text-center">
                                <button class="btn btn-primary btn-sm" onclick="Select(1,{{$data->table_id}}, {{$data->menu_id}})"><i class="fa fa-check"></i></button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card radius-25">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"><h4 class="mb-5">Minuman</h4></div>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped" style="overflow: auto">

                        <tbody>
                        @foreach($minuman as $data)
                            <tr>
                                <td>{{$data->name}}</td>
                                <td class=" text-center"><strong>{{$data->total_qty}}</strong></td>
                                <td class=" text-center"><strong>{{$data->table_name}}</strong></td>
                                <td class=" text-center">
                                    <button type="button" class="btn btn-primary btn-sm" onclick="Select(2,{{$data->table_id}}, {{$data->menu_id}})"><i class="fa fa-check"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection


@push('head')
    <link rel="stylesheet" type="text/css" href="{{URL::to('assets/css/datatables.css')}}">
@endpush

@push('js')
    <script src="{{URL::to('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::to('assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <script src="{{URL::to('assets/js/tooltip-init.js')}}"></script>

    <script>
        function Select(id,tableId, menuId) {
            document.getElementById("tableId").value = tableId;
            document.getElementById("menuId").value = menuId;

            $.get("{{url('chef/dashboard')}}/"+id, function (data) {
                $('#SelectEmployee').html('')
                $('#SelectEmployee').html('<option value="">Select Name</option>')
                $('#Select').modal('show');
                data.map(function (v) {
                    $('#SelectEmployee').append('<option value="'+v.id+'">'+v.name+'</option>')
                })

            })


        }
    </script>



@endpush

<div class="modal fade" id="Select" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url('chef/approve')}}" method="POST">
                @csrf

            <div class="modal-body">
                <select class="form-control" id="SelectEmployee" name="waiter_id" required></select>
                <input type="hidden" name="table_id" id="tableId">
                <input type="hidden" name="menu_id" id="menuId">
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

