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
                            <th>Name</th>
                            <th>Role</th>
                            <th width="20%" class="text-center">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $key => $data)
                        <tr>
                            <td>{{$key +1}}</td>
                            <td>{{$data->name}}</td>
                            <td >
                                @foreach($data->roles as $role)
                                    {{$role->name}}
                                @endforeach
                            </td>
                            <td class="text-center">
                                @if($data->id = 1)
                                <span class="badge badge-primary">Active</span>
                                @else
                                    <span class="badge badge-danger">Non Active</span>
                                @endif
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

