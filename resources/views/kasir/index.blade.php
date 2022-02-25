@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-7">
            <div class="col-sm-12">
                <div class="card radius-25">
                    <div class="card-body">
                        <h4 class="mb-5">Orders</h4>
                        <div class="table-responsive">
                            <table class="display table table-striped" id="manager">
                                <thead>
                                <tr >
                                    <th width="3%">No</th>
                                    <th>Name Table</th>
                                    <th>Status</th>
                                    <th width="50%" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               <tr id="ujicoba">
                                   <td>1</td>
                                   <td>Meja 1</td>
                                   <td>
                                       <span class="badge badge-info" id="waiting">Waiting</span>
                                       <span class="badge badge-warning" id="process">Process</span>
                                   </td>
                                   <td class="text-center">
                                       <button class="btn btn-danger btn-sm" id="trash" onclick="return confirm('Deletet Order?')"><i class="fa fa-trash"></i></button >
                                       <button class="btn btn-primary btn-sm" id="check"><i class="fa fa-check"></i></button>
                                   </td>
                               </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="col-sm-12"id="order">
                <div class="card radius-25">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6"><h4 class="mb-2">Order</h4></div>
                            <div class="col-6"><h5 class="float-end">Meja 1</h5></div>
                        </div>
                        <hr>
                        <div class="table-responsive">
                            <table class="display table " id="manager">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th width="50%" class="text-center">price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Seblak</td>
                                    <td>3</td>
                                    <td class="text-center">
                                    Rp. 50.000,-
                                    </td>
                                </tr>
                                <tr>
                                    <td>Seblak</td>
                                    <td>3</td>
                                    <td class="text-center">
                                    Rp. 50.000,-
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="mb-3 mt-3">
                                <strong>Subtotal</strong>
                                <strong class="float-end">Rp. 300.000,-</strong>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary float-end" id="chekOut">Chek-Out</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection

@push('head')

@endpush
@push('js')
    <script>
        $('#order').hide()
        $('#check').click( function () {
            $('#order').show();
        })
        $('#process').hide()
        $('#chekOut').click(function () {
            $('#waiting').hide()
            $('#process').show()
            $('#trash').hide()
        })
        $('#trash').click(function () {
            $('#ujicoba').hide()
        })
    </script>
@endpush
