<!-- Message -->
@if (session()->has('success'))
<div class="alert alert-success alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Excelente!</h4>
    {{ Session::get('success')}}
</div>
@endif

@if(session()->has('info'))
<div class="alert alert-info alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-info"></i> Deberías saber</h4>
    {{ Session::get('info')}}
</div>
@endif

@if(session()->has('warning'))
<div class="alert alert-warning alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-warning"></i> Precaución!</h4>
    {{ Session::get('warning')}}
</div>
@endif

@if(session()->has('danger'))
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Peligro!</h4>
    {{ Session::get('danger')}}
</div>
@endif
<!-- Message -->