
<!-- Latest jQuery -->
<script src="{{asset('menu/assets/js/jquery-1.12.4.min.js')}}"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="{{asset('menu/assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- owl-carousel min js  -->
<script src="{{asset('menu/assets/owlcarousel/js/owl.carousel.min.js')}}"></script>
<!-- magnific-popup min js  -->
<script src="{{asset('menu/assets/js/magnific-popup.min.js')}}"></script>
<!-- waypoints min js  -->
<script src="{{asset('menu/assets/js/waypoints.min.js')}}"></script>
<!-- parallax js  -->
<script src="{{asset('menu/assets/js/parallax.js')}}"></script>
<!-- countdown js  -->
<script src="{{asset('menu/assets/js/jquery.countdown.min.js')}}"></script>
<!-- jquery.countTo js  -->
<script src="{{asset('menu/assets/js/jquery.countTo.js')}}"></script>
<!-- imagesloaded js -->
<script src="{{asset('menu/assets/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- isotope min js -->
<script src="{{asset('menu/assets/js/isotope.min.js')}}"></script>
<!-- jquery.appear js  -->
<script src="{{asset('menu/assets/js/jquery.appear.js')}}"></script>
<!-- jquery.dd.min js -->
<script src="{{asset('menu/assets/js/jquery.dd.min.js')}}"></script>
<!-- slick js -->
<script src="{{asset('menu/assets/js/slick.min.js')}}"></script>
<!-- DatePicker js -->
<script src="{{asset('menu/assets/js/datepicker.min.js')}}"></script>
<!-- TimePicker js -->
<script src="{{asset('menu/assets/js/mdtimepicker.min.js')}}"></script>
<!-- scripts js -->
<script src="{{asset('menu/assets/js/scripts.js')}}"></script>


<script>
    $(document).ready(function () {
        $('#cart').click(function () {
            $('#modal').modal('show')
        })

        $('.btnCancel').click(function () {
            $('#modal').modal('hide')
        })

       $('#qty').on('change paste ', function () {
            alert();
       })

    })
</script>

<script>
function remove() {
    alert();
}
</script>
@stack('js')
