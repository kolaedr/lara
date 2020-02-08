@include('layouts.header')

      <div class="container-fluid row m-auto">
          <div class="col-4 bg-light">
              @section('sidebar')
                Categories news
              @show
          </div>
          <div class="col-8 bg-light">@yield('content')</div>
          
      </div>
    
@include('layouts.footer')
    