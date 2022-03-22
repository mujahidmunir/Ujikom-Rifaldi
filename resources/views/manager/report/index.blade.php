@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>Filter Date</h4>
            </div>
            <form id="filter" method="post">
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
                <div class="row">
                    <div class="col-sm-6">
                        <h4 id="totalIncome">Total Pendapatan Rp. 0 </h4>
                    </div>
                    <div class="col-sm-6">
                        <div class="float-end mb-4">
                            <button type="button" id="reset" class="btn btn-sm  btn-danger"><i class="fa fa-times"></i>&nbsp; Reset</button>
                            <button type="submit" class="btn btn-sm  btn-success"><i class="fa fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="card">
            <div class="card-head">
               <div class="row">
                   <div class="col-sm-6">
                       <h4 class="mt-3">Report</h4>
                   </div>
               </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped"  id="history">
                        <thead>
                        <tr>
                            <th width="4%" class="text-center">No</th>
                            <th>Tanggal</th>
                            <th>Kasir</th>
                            <th>Total Income</th>
                            <th  width="4%" class="text-center">Detail</th>
                        </tr>
                        </thead>
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
    <script>
        $(document).ready(function () {
            Starter();
        })

        function Starter() {
            $("#history").dataTable().fnDestroy();
            let Rupiah = Intl.NumberFormat('id-ID');
            $.get(window.location.pathname, function (data) {
                console.log(data)
                var res  = [];
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

                data.map(function (v,key) {
                    var today  = new Date(v.day);
                    var day = today.toLocaleDateString("id-ID", options)

                    res.push([
                        key+1, day,v.user.name , 'Rp ' + Rupiah.format(v.subTotal),'<a href="" class="btn btn-sm btn-success">Detail</a>'
                    ]);
                });
                $('#history').DataTable({data:res});
            })
        }

        $('#filter').on('submit', function (event) {
            event.preventDefault();
            $("#history").dataTable().fnDestroy();
            let Rupiah = Intl.NumberFormat('id-ID');
            $.ajax({
                type: "POST",
                url: "{{route('report.filter')}}",
                dataType: "json",
                data: $('#filter').serialize(),
                success: function(data){
                    var res  = [];
                    var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

                    data[0].map(function (v,key) {
                        var today  = new Date(v.day);
                        var day = today.toLocaleDateString("id-ID", options)

                        res.push([
                            key+1, day,v.user.name ,'Rp ' + Rupiah.format(v.subTotal),'<a href="" class="btn btn-sm btn-success">Detail</a>'
                        ]);
                    });
                    $('#history').DataTable({data:res});
                    $('#totalIncome').html('Total Pendapatan Rp.  ' + data[1])
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
