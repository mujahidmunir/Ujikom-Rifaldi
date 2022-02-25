@extends('layouts.master')
@section('content')
    <div class="col-sm-12">
        <div class="card radius-25">
            <div class="card-body">
                <div class="row">
                    <div class="col-6"><h4 class="mb-5">Orders</h4></div>
                    <div class="col-4">
                        <h4 class="float-end ">Meja : </h4>
                    </div>
                    <div class="col-2">
                        <select name="table" id="" class=" form-control">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="display table table-striped" id="manager">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th width="15%" class="text-center">Qty</th>
                            <th width="15%" class="text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Coffee</td>
                            <td class=" text-center"><strong>2</strong></td>
                            <td class=" text-center">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-check"></i></button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
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
        $('#manager').dataTable();
    </script>

@endpush

