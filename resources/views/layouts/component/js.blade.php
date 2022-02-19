<!-- latest jquery-->
<script src="{{URL::to('assets/js/jquery-3.5.1.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{URL::to('assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{URL::to('assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{URL::to('assets/js/sidebar-menu.js')}}"></script>
<script src="{{URL::to('assets/js/config.js')}}"></script>
<!-- Bootstrap js-->

<script src="{{URL::to('assets/js/bootstrap/popper.min.js')}}"></script>
<script src="{{URL::to('assets/js/bootstrap/bootstrap.min.js')}}"></script>

<!-- Theme js-->
<script src="{{URL::to('assets/js/script.js')}}"></script>

<!-- login js-->


<script src="{{URL::to('assets/js/chart/apex-chart/apex-chart.js')}}"></script>

<script src="{{URL::to('assets/js/dashboard/default.js')}}"></script>


<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@stack('js')
