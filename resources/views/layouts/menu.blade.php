<div id="menu">
    @if(Auth::check())
        Início | 
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
            Sair
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    @else
        <a href="{{route('login')}}">Entrar</a> | <a href="{{route('login')}}">Registrar</a>
    @endif
</div>