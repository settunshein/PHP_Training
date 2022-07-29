<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>

    <div class="container">
        <div class="row justify-content-center py-5">
            @yield('content')
        </div>
    </div>

    @include('layouts.scripts')
</body>
</html>