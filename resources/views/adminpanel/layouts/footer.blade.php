 <!-- footer start-->
 <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6 p-0 footer-copyright">
          <p class="mb-0">Copyright 2025 © Repa.</p>
        </div>
        <div class="col-md-6 p-0">
          <p class="heart mb-0">
            Developed by Techovirish.
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- latest jquery-->
  <script src="{{url('adminpanel/assets/js/jquery.min.js') }}"></script>
  <!--custom js -->
  <script src="{{url('adminpanel/assets/js/app.js') }}"></script>
  <!-- toastr js -->


  <!-- Bootstrap js-->
  <script src="{{url('adminpanel/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <!-- feather icon js-->
  <script src="{{url('adminpanel/assets/js/icons/feather-icon/feather.min.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
  <!-- scrollbar js-->
  <script src="{{url('adminpanel/assets/js/scrollbar/simplebar.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/scrollbar/custom.js') }}"></script>
  <!-- Sidebar jquery-->
  <script src="{{url('adminpanel/assets/js/config.js') }}"></script>
  <!-- Plugins JS start-->
  <script src="{{url('adminpanel/assets/js/sidebar-menu.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/sidebar-pin.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/slick/slick.min.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/slick/slick.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/header-slick.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/chart/morris-chart/raphael.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/chart/morris-chart/morris.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/chart/morris-chart/prettify.min.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/chart/apex-chart/moment.min.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/notify/bootstrap-notify.min.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/dashboard/default.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/notify/index.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/datatable/datatables/datatable.custom.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/datatable/datatables/datatable.custom1.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/owlcarousel/owl.carousel.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/owlcarousel/owl-custom.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/typeahead/handlebars.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/typeahead/typeahead.bundle.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/typeahead/typeahead.custom.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/typeahead-search/handlebars.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/typeahead-search/typeahead-custom.js') }}"></script>
  <script src="{{url('adminpanel/assets/js/height-equal.js') }}"></script>
  <!-- Plugins JS Ends-->
  <!-- Theme js-->
  <script src="{{url('adminpanel/assets/js/script.js') }}"></script>
  <!-- <script src="{{url('adminpanel/assets/js/theme-customizer/customizer.js') }}"></script> -->
  <!-- Plugin used-->
  <script type="text/javascript">
    @if(session('success'))
        window.successMessage =  @json(session('success'));;
    @else
        window.successMessage = null;
    @endif
</script>

