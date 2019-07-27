@extends('layouts.principal')
@section('title','Início')
@section('path','Início')

@section('navbar')
  <a href="{{route('instituicao.listar')}}">Instituições</a>
  > Editar: <strong>{{$instituicao->nome}}</strong>
@endsection

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">Editar Instituição</div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route("instituicao.atualizar") }}">
                {{ csrf_field() }}

                <input type="hidden" name="id_instituicao" value="{{ $instituicao->id }}">
                <input type="hidden" name="id_endereco" value="{{ $endereco->id }}">

                <font size="4" class="row" >
                  Instituição
                </font>

                <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                    <label for="nome" class="col-md-4 control-label"> Nome <font color="red">*</font>
                    </label>

                    <div class="col-md-6">

                        @if(old('nome',NULL) != NULL)
                          <input id="nome" type="text" class="form-control" name="nome" value="{{ old('nome') }}" autofocus>
                        @else
                          <input id="nome" type="text" class="form-control" name="nome" value="{{ $instituicao->nome }}" autofocus>
                        @endif

                        @if ($errors->has('nome'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nome') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}">
                    <label for="telefone" class="col-md-4 control-label">Telefone <font color="red">*</font> </label>

                    <div class="col-md-6">

                        @if(old('nome',NULL) != NULL)
                          <input id="telefone" type="digit" class="form-control" name="telefone" minlength="10" placeholder="DDD+Telefone" maxlength="11" value="{{ old('telefone') }}">
                        @else
                          <input id="telefone" type="digit" class="form-control" name="telefone" minlength="10" placeholder="DDD+Telefone" maxlength="11" value="{{ $instituicao->telefone }}">
                        @endif

                        @if ($errors->has('telefone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('telefone') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                    <div class="col-md-6">

                      @if(old('nome',NULL) != NULL)
                        <input id="email" class="form-control" name="email" value="{{ old('email') }}">
                      @else
                        <input id="email" class="form-control" name="email" value="{{ $instituicao->email }}">
                      @endif

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('logradouro') ? ' has-error' : '' }}">
                    <label for="logradouro" class="col-md-4 control-label">Logradouro <font color="red">*</font></label>

                    <div class="col-md-6">

                        @if(old('nome',NULL) != NULL)
                          <input id="logradouro" type="text" class="form-control" name="logradouro" value="{{ old('logradouro') }}">
                        @else
                          <input id="logradouro" type="text" class="form-control" name="logradouro" value="{{ $endereco->logradouro }}">
                        @endif

                        @if ($errors->has('logradouro'))
                            <span class="help-block">
                                <strong>{{ $errors->first('logradouro') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                    <label for="numero" class="col-md-4 control-label">Número <font color="red">*</font> </label>

                    <div class="col-md-6">

                        @if(old('nome',NULL) != NULL)
                          <input id="numero" type="text" class="form-control" name="numero" value="{{ old('numero') }}">
                        @else
                          <input id="numero" type="text" class="form-control" name="numero" value="{{ $endereco->numero }}">
                        @endif

                        @if ($errors->has('numero'))
                            <span class="help-block">
                                <strong>{{ $errors->first('numero') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                    <label for="bairro" class="col-md-4 control-label">Bairro <font color="red">*</font></label>

                    <div class="col-md-6">

                        @if(old('nome',NULL) != NULL)
                          <input id="bairro" type="text" class="form-control" name="bairro" value="{{ old('bairro') }}">
                        @else
                          <input id="bairro" type="text" class="form-control" name="bairro" value="{{ $endereco->bairro }}">
                        @endif

                        @if ($errors->has('bairro'))
                            <span class="help-block">
                                <strong>{{ $errors->first('bairro') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('estado') ? ' has-error' : '' }}">
                    <label for="estado" class="col-md-4 control-label">Estado <font color="red">*</font> </label>

                    <div class="col-md-6">
                      <select id="estado" class="form-control" name="estado" data-target="#cidade">
                          <option value="">Estado</option>
                      </select>

                      @if ($errors->has('estado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('estado') }}</strong>
                        </span>
                      @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('cidade') ? ' has-error' : '' }}">
                    <label for="cidade" class="col-md-4 control-label">Cidade <font color="red">*</font> </label>

                    <div class="col-md-6">

                        <select id="cidade" class="form-control" name="cidade">
                            <option value=""> Cidade </option>
                        </select>

                        @if ($errors->has('cidade'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cidade') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <a class="btn btn-danger" href="{{URL::previous()}}">Voltar</a>
                        <button type="submit" class="btn btn-success">
                          Atualizar
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var estados = [];

  function loadEstados(element) {
    if (estados.length > 0) {
      putEstados(element);
      $(element).removeAttr('disabled');
    } else {
      $.ajax({
        url: 'https://api.myjson.com/bins/enzld',
        method: 'get',
        dataType: 'json',
        beforeSend: function() {
          $(element).html('<option>Carregando...</option>');
        }
      }).done(function(response) {
        estados = response.estados;
        putEstados(element);
        $(element).removeAttr('disabled');
      });
    }
  }

  function putEstados(element) {

    var label = $(element).data('label');
    label = label ? label : 'Estado';

    var options = '<option value="">' + label + '</option>';
    for (var i in estados) {
      var estado = estados[i];
      options += '<option value="' + estado.sigla + '">' + estado.nome + '</option>';
    }

    $(element).html(options);
  }

  function loadCidades(element, estado_sigla) {
    if (estados.length > 0) {
      putCidades(element, estado_sigla);
      $(element).removeAttr('disabled');
    } else {
      $.ajax({
        url: theme_url + '/assets/json/estados.json',
        method: 'get',
        dataType: 'json',
        beforeSend: function() {
          $(element).html('<option>Carregando...</option>');
        }
      }).done(function(response) {
        estados = response.estados;
        putCidades(element, estado_sigla);
        $(element).removeAttr('disabled');
      });
    }
  }

  function putCidades(element, estado_sigla) {
    var label = $(element).data('label');
    label = label ? label : 'Cidade';

    var options = '<option value="">' + label + '</option>';
    for (var i in estados) {
      var estado = estados[i];
      if (estado.sigla != estado_sigla)
        continue;
      for (var j in estado.cidades) {
        var cidade = estado.cidades[j];
        options += '<option value="' + cidade + '">' + cidade + '</option>';
      }
    }
    $(element).html(options);
  }

  document.addEventListener('DOMContentLoaded', function() {
    loadEstados('#estado');

    $(document).on('change', '#estado', function(e) {
      var target = $(this).data('target');
      if (target) {
        loadCidades(target, $(this).val());
      }
    });
  }, false);

</script>
@endsection