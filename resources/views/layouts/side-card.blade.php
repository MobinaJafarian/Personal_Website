<div class="card-body">
    {{-- @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif --}}

    <ul>
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('home.index') }}">home</a></li>
        <li><a href="{{ route('about.index') }}">about me</a></li>
        <li><a href="">my skills</a></li>
        <li><a href="">social</a></li>
        <li><a href="">blogs </a></li>
    </ul>

    {{ __('You are awesome!') }}
</div>