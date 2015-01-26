@include('layout.partials.header')
<div class="alert-box success">
@if(Session::has('global'))
<p>{{ Session::get('global') }}</p>
@endif
</div>

@yield('content')
@include('layout.partials.footer')