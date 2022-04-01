@extends('layouts.master')

@section('content')
    <div class="row mt-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-head">
                     <h4 class="mt-5 text-center">Chef</h4>
                </div>
                <div class="card-body">
                    <div class="card">
                        <form id="filterChef" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">
                                            Start Date
                                        </label>
                                        <input type="date" class="form-control" name="start_date" id="startDate" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">
                                            End Date
                                        </label>
                                        <input type="date" class="form-control" name="end_date" id="endDate" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-end mb-4">
                                    <button type="button" id="reset" class="btn btn-sm  btn-danger me-3"><i class="fa fa-times"></i>&nbsp; Reset</button>
                                    <button type="submit" class="btn btn-sm  btn-success"><i class="fa fa-search"></i>&nbsp; Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped"  id="chef">
                            <thead>
                            <tr>
                                <th width="4%" class="text-center">No</th>
                                <th>Tanggal</th>
                                <th>Nama Chef</th>
                                <th>Menu</th>
                                <th>Total Pesanan</th>

                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-head">
                    <div class="card-head">
                        <h4 class="mt-5 text-center">Waiters</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <form id="filterWaiter" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">
                                            Start Date
                                        </label>
                                        <input type="date" class="form-control" name="start_date" id="startDate" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">
                                            End Date
                                        </label>
                                        <input type="date" class="form-control" name="end_date" id="endDate" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-end mb-4">
                                    <button type="button" id="reset" class="btn btn-sm  btn-danger me-3"><i class="fa fa-times"></i>&nbsp; Reset</button>
                                    <button type="submit" class="btn btn-sm  btn-success"><i class="fa fa-search"></i>&nbsp; Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped"  id="waiter">
                            <thead>
                            <tr>
                                <th width="4%" class="text-center">No</th>
                                <th>Tanggal</th>
                                <th>Nama Waiter</th>
                                <th>Menu</th>
                                <th>Total Pesanan</th>
                            </tr>
                            </thead>
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
    <script>
        $(document).ready(function () {
            chef();
            waiter();
        })

        function chef() {
            $("#chef").dataTable().fnDestroy();
            $.get("{{route('log.chef')}}", function (data) {
                console.log(data)
                var resChef  = [];
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

                data.map(function (v,key) {
                    var today  = new Date(v.day);
                    var day = today.toLocaleDateString("id-ID", options)
                    resChef.push([
                        key+1, day,v.chef.name , v.menu.name,v.Total, '1234'
                    ]);
                });
                $('#chef').DataTable({data: resChef});
            })
        }

        function waiter() {
            $("#waiter").dataTable().fnDestroy();
            $.get("{{route('log.waiter')}}", function (data) {
                console.log(data)
                var resWaiter  = [];
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

                data.map(function (v,key) {
                    var today  = new Date(v.day);
                    var day = today.toLocaleDateString("id-ID", options)
                    resWaiter.push([
                        key+1, day,v.waiter.name , v.menu.name,v.Total, '1234'
                    ]);
                });
                $('#waiter').DataTable({data: resWaiter});
            })
        }

        $('#filterChef').on('submit', function (event) {
            event.preventDefault();
            $("#chef").dataTable().fnDestroy();
            let Rupiah = Intl.NumberFormat('id-ID');
            $.ajax({
                type: "POST",
                url: "{{route('log.chef.filter')}}",
                dataType: "json",
                data: $('#filterChef').serialize(),
                success: function(data){
                    var res  = [];
                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    console.log(data)
                    data.map(function (v,key) {
                        var today  = new Date(v.day);
                        var day = today.toLocaleDateString("id-ID", options)

                        res.push([
                            key+1, day,v.chef.name ,'Rp ' + v.menu.name,v.Total
                        ]);
                    });
                    $('#chef').DataTable({data:res});
                },
                error: function(data){
                    alert("Error")
                }
            });
        })

        $('#filterWaiter').on('submit', function (x) {
            x.preventDefault();
            $("#waiter").dataTable().fnDestroy();
            let Rupiah = Intl.NumberFormat('id-ID');
            $.ajax({
                type: "POST",
                url: "{{route('log.waiter.filter')}}",
                dataType: "json",
                data: $('#filterWaiter').serialize(),
                success: function(data){
                    var res  = [];
                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    console.log(data)
                    data.map(function (v,key) {
                        var today  = new Date(v.day);
                        var day = today.toLocaleDateString("id-ID", options)

                        res.push([
                            key+1, day,v.waiter.name ,'Rp ' + v.menu.name,v.Total
                        ]);
                    });
                    $('#waiter').DataTable({data:res});
                 },
                error: function(data){
                    alert("Error")
                }
            });
        })

        $('#reset').click(function () {

            Starter();
            document.getElementById('startDate').value = "";
            document.getElementById('endDate').value = "";

        })
    </script>

@endpush
