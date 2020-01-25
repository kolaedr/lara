@include('layouts.header')

      <div class="container-fluid row m-auto">
          <div class="col-4 bg-success">Categories news</div>
          <div class="col-8 bg-warning">@yield('content')</div>
          
      </div>
    
@include('layouts.footer')
    