@extends('layouts.master')
@section('content')
    <div class="col-sm-12">
        <div class="card radius-25">
            <div class="card-body">
                <a href="{{route('admin.account.create')}}" class="btn btn-primary float-end"><i class="fa fa-plus"></i></a>
                <h4 class="mb-5">List Account</h4>
                <div class="table-responsive">
                    <table class="display table table-striped" id="users">
                        <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="20%">Phone</th>
                            <th class="text-center">Role</th>
                            <th width="20%" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user as $key => $data)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->phone}}</td>
                            <td class="text-center">
                                @foreach($data->roles as $role)
                                    {{$role->name}}
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="{{route('admin.account.edit', $data->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit pe-1"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash pe-1"></i></a>
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
        $('#users').dataTable();
    </script>
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            $.get(window.location.pathname, function (data) {--}}
{{--                console.log(data)--}}
{{--               var res = [];--}}
{{--                data.map(function (v,key) {--}}
{{--                    res.push([--}}
{{--                        key + 1,--}}
{{--                        v.name,--}}
{{--                        v.email,--}}
{{--                        v.phone,--}}
{{--                        v.roles.name,--}}
{{--                        'asdf'--}}
{{--                    ])--}}
{{--                });--}}
{{--                $('#users').dataTable({--}}
{{--                    data : res--}}
{{--                })--}}
{{--            });--}}



{{--        })--}}
{{--    </script>--}}

@endpush

