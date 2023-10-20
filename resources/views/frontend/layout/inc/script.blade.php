  <!-- modernizr js -->
  <script src="{{ asset('assets/frontend') }}/js/modernizr-2.8.3.min.js"></script>
  <!-- jquery latest version -->
  <script src="{{ asset('assets/frontend') }}/js/jquery.min.js"></script>
  <!-- Bootstrap v4.4.1 js -->
  <script src="{{ asset('assets/frontend') }}/js/bootstrap.min.js"></script>
  <!-- Menu js -->
  <script src="{{ asset('assets/frontend') }}/js/rsmenu-main.js"></script>
  <!-- op nav js -->
  <script src="{{ asset('assets/frontend') }}/js/jquery.nav.js"></script>
  <!-- owl.carousel js -->
  <script src="{{ asset('assets/frontend') }}/js/owl.carousel.min.js"></script>
  <!-- Slick js -->
  <script src="{{ asset('assets/frontend') }}/js/slick.min.js"></script>
  <!-- isotope.pkgd.min js -->
  <script src="{{ asset('assets/frontend') }}/js/isotope.pkgd.min.js"></script>
  <!-- imagesloaded.pkgd.min js -->
  <script src="{{ asset('assets/frontend') }}/js/imagesloaded.pkgd.min.js"></script>
  <!-- wow js -->
  <script src="{{ asset('assets/frontend') }}/js/wow.min.js"></script>
  <!-- Skill bar js -->
  <script src="{{ asset('assets/frontend') }}/js/skill.bars.jquery.js"></script>
  <script src="{{ asset('assets/frontend') }}/js/jquery.counterup.min.js"></script>
  <!-- counter top js -->
  <script src="{{ asset('assets/frontend') }}/js/waypoints.min.js"></script>
  <!-- video js -->
  <script src="{{ asset('assets/frontend') }}/js/jquery.mb.YTPlayer.min.js"></script>
  <!-- magnific popup js -->
  <script src="{{ asset('assets/frontend') }}/js/jquery.magnific-popup.min.js"></script>
  <!-- plugins js -->
  <script src="{{ asset('assets/frontend') }}/js/plugins.js"></script>
  <!-- contact form js -->
  <script src="{{ asset('assets/frontend') }}/js/contact.form.js"></script>
  <!-- main js -->
  <script src="{{ asset('assets/frontend') }}/js/main.js"></script>


  <script src="https://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
        {!! Toastr::message() !!}

@stack('user_script')
