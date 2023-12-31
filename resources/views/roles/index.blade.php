@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <a class="text-success" href="{{ route('criar.perfil') }}">&plus; Cadastrar Perfis</a>

                        @if(Session::has('message'))
                                <div class="alert {{ Session::get('alert-type') }} message-alert">{{ Session::get('message') }}</div>
                            @endif

                        <table class="table table-striped mt-4">
                            <thead>
                            <tr>
                                <th>Perfis</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>

                           @forelse($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td class="d-flex">
                                        <a class="mr-3 btn btn-sm btn-outline-success" href="{{ route('editar.perfil', ['perfil' => $role->id] ) }}">Editar</a>
                                        <a class="mr-3 btn btn-sm btn-outline-info" href="{{ route('vincular.perfil.permissao', ['perfil' => $role->id]) }}">Permissões</a>

                                        <button class="btn btn-sm btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#deletar{{ $role->id }}">Deletar</button>

                                        <div class="modal fade" id="deletar{{ $role->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletar{{ $role->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deletar{{ $role->id }}Label">Exclusão de Registro</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        O registro <b>{{ $role->name }}</b> será deletado da base de dados.
                                                        <p>Deseja realmente executar esta ação?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                        <form action="{{ route('deletar.perfil', ['perfil' => $role->id]) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-sm btn-success" type="submit" value="Deletar">Confirmar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                   </td>
                               </tr>
                         @empty
                         <tr>
                            <td colspan="2" style="background-color:white !important">
                                <div class="alert alert-info"> Nenhum registro cadastrado! </div>
                            </td>
                         </tr>
                         @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
