<div id="navigation">
  @php($url = str_replace(URL::to('/'),'',URL::current()))

  @if(!($url == '/home'))
    @if(!($url == '/login'))
      @if(!($url == '/register'))
        @if(!($url == ''))
          @if(!($url == '/aluno/listar'))
            <div style="margin-top: -30px" class="container">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <br>
                  <h4>
                    @yield('navbar')
                  </h4>
                  <br>
                </div>
              </div>
            </div>
          @endif
        @endif
      @endif
    @endif
  @endif
</div>
