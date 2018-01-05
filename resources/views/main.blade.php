
@include('partials._head')

<div class="container">
    @include('partials._messages')

    @yield('content')
</div>


@include('partials._footer')