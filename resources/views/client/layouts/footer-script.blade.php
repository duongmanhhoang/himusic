<script src="{{asset('client/vendors/jquery.2.2.3.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('client/vendors/popper.js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('client/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Camera Slider -->
<script src='{{asset('client/vendors/Camera-master/scripts/jquery.mobile.customized.min.js')}}'></script>
<script src='{{asset('client/vendors/Camera-master/scripts/jquery.easing.1.3.js')}}'></script>
<script src='{{asset('client/vendors/Camera-master/scripts/camera.min.js')}}'></script>
<!-- menu  -->
<script src="{{asset('client/vendors/menu/src/js/jquery.slimmenu.js')}}"></script>
<!-- AOS js -->
<script src="{{asset('vendors')}}"></script>
<!-- owl.carousel -->
<script src="{{asset('client/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<!-- js count to -->
<script src="{{asset('client/vendors/jquery.appear.js')}}"></script>
<script src="{{asset('client/vendors/jquery.countTo.js')}}"></script>
<!-- Fancybox -->
<script src="{{asset('client/vendors/fancybox/dist/jquery.fancybox.min.js')}}"></script>

<!-- Theme js -->
<script src="{{asset('client/js/theme.js')}}"></script>
<script>
    $(document).ready(function () {
        function numberWithCommas(number) {
            var parts = number.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            return parts.join(".");
        }

        $(document).ready(function () {
            $(".price").each(function () {
                var num = $(this).text();
                var commaNum = numberWithCommas(num);
                $(this).text(commaNum);
            });
        });


        $('.cart-button').hover(function () {
            $('.cart-dropdown').slideDown(500);
        })

        $('.cart-button').mouseout(function () {
            $('.cart-dropdown').slideUp(300);
        });

        @if(session('add_to_cart'))
            swal('Thêm vào giỏ hàng thành công' , '' , 'success')
        @endif
    })    
</script>
@yield('script')
