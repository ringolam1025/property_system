<!DOCTYPE html>
<html lang="en">
@include('layouts.includes.FNHeader')
<body>

<!--=================================
header -->
<header class="header">
  <div class="topbar">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="d-block d-md-flex align-items-center text-center">
            <div class="mr-3 d-inline-block">
              <a href="tel:852 9285 9851"><i class="fa fa-phone mr-2 fa fa-flip-horizontal"></i>852-9285 9851</a>
              &nbsp;
            </div>
            <div class="mr-auto d-inline-block">
            </div>
            <div class="dropdown d-inline-block pl-2 pl-md-0">
            </div>
            <div class="social d-inline-block">
              <ul class="list-unstyled">
                <li><a href="https://www.facebook.com/myhomehk2020/"> <i class="fab fa-facebook-f"></i> </a></li>
              </ul>
            </div>
            <div class="login d-inline-block">
              <a data-toggle="modal" data-target="#loginModal" href="#">Sign in<i class="fa fa-user pl-2"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-light bg-white navbar-static-top navbar-expand-lg header-sticky">
    <div class="container-fluid">
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
      <a class="navbar-brand" href="/">
        <img class="img-fluid" src="{{asset('assets/img/logo_small_black_2.png')}}" alt="logo">
      </a>
      <div class="navbar-collapse collapse justify-content-center">
        <ul class="nav navbar-nav">
          <li class="nav-item dropdown {{ (request()->is('/')) ? 'active' : '' }}"> 
            <a class="nav-link dropdown-item" href="/">Home</a>
          </li>
          <li class="nav-item dropdown {{ (request()->is('propertyList') || request()->is('property/*')) ? 'active' : '' }}">
            <a class="nav-link dropdown-item" href="/propertyList">Properties</a>
          </li>
          <li class="nav-item dropdown {{ (request()->is('aboutus')) ? 'active' : '' }}">
            <a class="nav-link dropdown-item" href="/aboutus">About Us</a>
          </li>
          <li class="nav-item dropdown {{ (request()->is('profile')) ? 'active' : '' }}">
            <a class="nav-link dropdown-item" href="/profile">Profile</a>
          </li>
          <li class="nav-item dropdown {{ (request()->is('history')) ? 'active' : '' }}">
            <a class="nav-link dropdown-item" href="/history">Browse History</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!--=================================
 header -->
@yield('content')


<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
      FB.init({ xfbml:true, version:'v6.0'});
    };
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your customer chat code -->
<div class="fb-customerchat" attribution=setup_tool page_id="101018721576281" theme_color="#0084ff"></div>


<!--=================================
footer-->
<footer class="footer bg-dark space-pt">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="footer-contact-info">
          <h5 class="text-primary mb-4">About MyHome</h5>
          <p class="text-white mb-4">MyHome is helping thousands of clients to find the right property for their needs by using new technology.</p>
          <ul class="list-unstyled mb-0">
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4 text-center text-md-left">
          <a href="/"><img class="img-fluid footer-logo" src="{{asset('assets/img/logo_small_black_2.png')}}" alt=""> </a>
        </div>
        <div class="col-md-4 text-center my-3 mt-md-0 mb-md-0">
          <a id="back-to-top" class="back-to-top" href="#"><i class="fas fa-angle-double-up"></i> </a>
        </div>
        <div class="col-md-4 text-center text-md-right">
          <p class="mb-0 text-white"> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="#"> MyHome </a> All Rights Reserved </p>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--=================================
footer-->

<!--=================================
 Modal login -->
 <div class="modal login fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="loginModalLabel">Log in & Register</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs nav-tabs-02 justify-content-center" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="true">Register</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
            <form class="form-row mt-4 mb-2 align-items-center" action="frontend/login">
              <div class="form-group col-sm-12">
                <input type="text" class="form-control" placeholder="Email">
              </div>
              <div class="form-group col-sm-12">
                <input type="Password" class="form-control" placeholder="Password">
              </div>
              <div class="col-sm-6">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>          
              <div class="col-sm-6">
                <ul class="list-unstyled d-flex mb-1 mt-sm-0 mt-3">
                  <li class="mr-1"><a href="password/reset"><b>Forget Password?</b></a></li>
                </ul>
              </div>              
            </form>
          </div>
          <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
            <form action="/register" class="form-row mt-4 mb-2 align-items-center">              
                <div class="col-sm-12">
                  <label>Personal</label> 
                </div>
                <div class="form-group col-sm-6">  
                  <input type="text" id="customer_eName_firstName" name="customer_eName_firstName" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group col-sm-6">
                  <input type="text" id="customer_eName_lastName" name="customer_eName_lastName" class="form-control" placeholder="Last Name">
                </div>
                <div class="form-group col-sm-6">
                  <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile">
                </div>
                <div class="form-group col-sm-6">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" id="is_whatsapp" name="is_whatsapp" class="custom-control-input">
                    <label class="custom-control-label" for="is_whatsapp">Is Whatsapp?</label>
                  </div>
                </div>
                <div class="form-group col-sm-4">
                  <input type="text" id="customer_eRoom" name="customer_eRoom" class="form-control" placeholder="Room">
                </div>
                <div class="form-group col-sm-4">
                  <input type="text" id="customer_eFloor" name="customer_eFloor" class="form-control" placeholder="Floor">
                </div>
                <div class="form-group col-sm-4">
                  <input type="text" id="customer_eBlock" name="customer_eBlock" class="form-control" placeholder="Block">
                </div>
                <div class="form-group col-sm-6">
                  <input type="text" id="customer_eStreet" name="customer_eStreet" class="form-control" placeholder="Street">
                </div>
                <div class="form-group col-sm-6">                  
                  <select id="district_id" name="district_id" class="form-control"></select>
                </div>
                

                <div class="col-sm-12">
                  <label>Account</label> 
                </div>
                <div class="form-group col-12">
                  <input type="email" class="form-control" placeholder="Email Address">
                </div>
                <div class="form-group col-6">
                  <input type="Password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group col-6">
                  <input type="Password" class="form-control" placeholder="Confirm Password">
                </div>
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary btn-block">Sign up</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('layouts.includes.FNFooter')
</body>
</html>


@yield('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
  $('#district_id').select2({
    placeholder: "Choose District...",
    ajax: {
      url: '/get/district',
      dataType: 'json',
      cache: true,
      data: function (params) { return { q: $.trim(params.term) }; },
      processResults: function (data) { return { results: data }; },
    }
  });
</script>

@yield('customjs')