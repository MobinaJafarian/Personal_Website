<div class="card-body">
   
    <ul>
        <li><a href="{{ route('home') }}">Dashboard</a></li>
        <li><a href="{{ route('home.index') }}">home</a></li>
        <li><a href="{{ route('about.index') }}">about me</a></li>
        <li><a href="{{ route('skill.index') }}">my skills</a></li>
        <li><a href="">social</a></li>
        <li><a href="{{ route('blog.index') }}">blogs </a></li>
    </ul>

    {{ __('You are awesome!') }}
</div>