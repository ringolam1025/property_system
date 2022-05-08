<!--=================================
Javascript -->

<!-- JS Global Compulsory (Do not remove)-->
<script src="{{asset('app-assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('app-assets/js/popper/popper.min.js')}}"></script>
<script src="{{asset('app-assets/js/bootstrap/bootstrap.min.js')}}"></script>

<!-- Page JS Implementing Plugins (Remove the plugin script here if site does not use that feature)-->
<script src="{{asset('app-assets/js/jquery.appear.js')}}"></script>
<!-- <script src="{{asset('app-assets/js/counter/jquery.countTo.js')}}"></script> -->
<script src="{{asset('app-assets/js/select2/select2.full.js')}}"></script>
<script src="{{asset('app-assets/js/range-slider/ion.rangeSlider.min.js')}}"></script>
<script src="{{asset('app-assets/js/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('app-assets/js/jarallax/jarallax.min.js')}}"></script>
<script src="{{asset('app-assets/js/jarallax/jarallax-video.min.js')}}"></script>
<script src="{{asset('app-assets/js/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('app-assets/js/slick/slick.min.js')}}"></script>
<script src="{{asset('app-assets/js/datetimepicker/moment.min.js')}}"></script>
<script src="{{asset('app-assets/js/datetimepicker/datetimepicker.min.js')}}"></script>

<!-- Property List -->
<script src="{{asset('app-assets/js/nicescroll/jquery.nicescroll.min.js')}}"></script>

<!-- Template Scripts (Do not remove)-->
<script src="{{asset('app-assets/js/custom.js')}}"></script>

<!-- map -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer_compiled.js"></script>
<script src="{{asset('app-assets/js/map/handlebars.min.js')}}"></script>
<script src="{{asset('app-assets/js/map/snazzy-info-window.min.js')}}"></script>
<script src="{{asset('app-assets/js/map/map-script.js')}}"></script>
<script id="marker-content-template" type="text/x-handlebars-template">
  <div class="property-item-map-img" style="background-image: url(@{{{bgImg}}})"></div>
    <div class="property-item-map">
      <h6 class="property-item-map-title">
      <a href="@{{link}}">@{{title}}</a>
      </h6>
      <div class="property-item-map-content">@{{{body}}}</div>
  </div>
</script>