@extends('layouts.master')
@section('content')
    <div class="col-sm-12">
        <div class="card radius-25">
            <div class="card-body">
                <h4 class="mb-5">Log Account</h4>
                <div class="table-responsive">
                    <table class="display table table-striped" id="manager">
                        <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Name Menu</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            @foreach($menu as $key => $data)
                                <td>{{$key +1}}</td>

                                <td>{{$data->name}}</td>
                                <td>{{$data->price}}</td>
                                <td>{{$data-> cat_name}}</td>
                                <td class="text-center" width="25%">
                                    <a href="{{route('manager.menu.edit', $data->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="" class="btn btn-warning">Detail</a>
                                </td>
                        </tr>
                        @endforeach

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


