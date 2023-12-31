@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <a class="text-success" href="{{ route('listar.perfil') }}">&leftarrow; Voltar para a listagem</a>

                        @if(Session::has('message'))
                                <div class="alert {{ Session::get('alert-type') }} message-alert">{{ Session::get('message') }}</div>
                            @endif

                        <h2 class="mt-4">Permissões para: {{ $role->name }}</h2>

                        <form action="{{ route('vincular.perfil.permissao', ['perfil' => $role->id]) }}" method="post" class="mt-4" autocomplete="off">
                            @csrf
                            @method('PUT')
                           @foreach($permissions as $permission)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="{{ $permission->id }}" name="{{ $permission->id }}" {{ ($permission->can == '1' ? 'checked':'') }} />
                                    <label class="custom-control-label" for="{{ $permission->id }}">{{ $permission->description }}</label>
                                </div>
                          @endforeach
                            <button type="submit" class="btn btn-block btn-success mt-4">Sincronizar Permissões</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
