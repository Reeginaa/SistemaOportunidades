@extends('layouts.template')

@section('titulo', 'Cidades')

@section('table-delete', 'cidade')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="crud_button">
                <button type="button" class="btn btn-group-sm btn-success mb-0 shadow-lg" data-toggle="modal"
                    data-target="#addModal"><i class="fas fa-plus-circle m-1" data-toggle="tooltip" data-placement="top"
                        title="Incluir item"></i>{{ __('Novo') }}</button>
            </div>
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">{{ __('Cadastro de Cidades') }}</h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Cidades Brasileiras') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableCidade" class="datatable table table-sm table-responsive text-center rounded"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome</th>
                                <th class="th-sm border-bottom border-left">UF</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cidades as $obj)
                                <tr>
                                    <th class="align-middle border-left">{{ $obj->id }}</th>
                                    <td class="align-middle border-left">{{ $obj->cid_nome }}</td>
                                    <td class="align-middle border-left">{{ $obj->cid_uf }}</td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <!--<a href="#" class="btn_crud btn btn-danger btn-sm delete" data-toggle="tooltip"
                                                    title="Excluir"><i class="fas fa-trash-alt"></i></a>-->
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $obj->id }}, '{{ $obj->cid_nome }}/{{ $obj->cid_uf }}', '{{ strtolower(class_basename($obj)) }}')"
                                            title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome</th>
                                <th class="th-sm border-bottom border-left">UF</th>
                                <th class="th-sm border-bottom border-left border-right">Ações</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <!-- End Content Datatable -->
    </div>
    <!-- Begin Page Content -->

    <!-- Start Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">{{ __('Novo Cidade') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\CidadeController@store') }}" method="POST" id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="text-danger float-right">Campo Obrigatório(*)</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="mb-0" for="cid_nome">Nome*</label>
                            <input type="text" class="form-control" id="cid_nome" name="cid_nome" required>
                            <span class="text-danger" id="cid_nomeError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="cid_uf">UF*</label>
                            <input type="text" class="form-control" maxlength="2"
                                style="text-transform: uppercase; width: 60px" id="cid_uf" name="cid_uf" required>
                            <span class="text-danger" id="cid_ufError"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip"
                        title="Cancelar"><i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}</button>
                    <button type="submit" form="addForm" class="btn btn-success" data-toggle="tooltip" title="Salvar"><i
                            class="fas fa-save mr-1"></i>{{ __('Salvar') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Modal -->

    <!-- Start EDIT Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title text-dark font-weight-bold" id="editModalTitle">{{ __('Alterar Cidade') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/cidade" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="text-danger float-right">Campo Obrigatório(*)</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="mb-0" for="cid_nome">Nome*</label>
                            <input type="text" class="form-control" id="cid_nome" name="cid_nome" required>
                            <span class="text-danger" id="cid_nomeError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="cid_uf">UF*</label>
                            <input type="text" class="form-control" maxlength="2"
                                style="text-transform: uppercase; width: 60px" id="cid_uf" name="cid_uf" required>
                            <span class="text-danger" id="cid_nomeError"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip"
                        title="Cancelar"><i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}</button>
                    <button type="submit" form="editForm" class="btn btn-success" data-toggle="tooltip" title="Salvar"><i
                            class="fas fa-save mr-1"></i>{{ __('Salvar') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End EDIT Modal -->

    <!-- Start VIEW Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white font-weight-bold" id="viewModalTitle">{{ __('Ver Cidade') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" id="viewForm">
                        <div class="form-group">
                            <label class="mb-0" for="id">id</label>
                            <input type="text" class="form-control" id="id" name="id"
                                style="text-align: center; width: 90px" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="cid_nome">Nome</label>
                            <input type="text" class="form-control" id="cid_nome" name="cid_nome" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="cid_uf">UF</label>
                            <input type="text" class="form-control" maxlength="2"
                                style="text-transform: uppercase; width: 60px" id="cid_uf" name="cid_uf" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip"
                        title="Sair"><i class="fas fa-undo-alt mr-1"></i>{{ __('Sair') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End VIEW Modal -->

    <!-- Start DELETE Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">{{ __('Excluir Produto') }}
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/cidade" method="POST" id="deleteForm">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div id="delete-modal-body">
                            <!-- Content Jquery -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i
                            class="fas fa-undo-alt mr-1"></i>{{ __('Não') }}</button>
                    <button type="submit" form="deleteForm" class="btn btn-danger"><i
                            class="fas fa-trash-alt mr-1"></i>{{ __('Sim') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End DELETE Modal -->

@endsection

@section('script_pages')

    <script type="text/javascript">
        // Cidade
        $(document).ready(function() {

            var table = $('#datatableCidade').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#editModal #cid_nome').val(data[1]);
                $('#editModal #cid_uf').val(data[2]);

                $('#editForm').attr('action', '/cidade/' + data[0]);
                $('#editModal').modal('show');
            });
            //End Edit Record

            //Start View
            table.on('click', '.view', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#viewModal #id').val(data[0]);
                $('#viewModal #cid_nome').val(data[1]);
                $('#viewModal #cid_uf').val(data[2]);

                $('#viewForm').attr('action');
                $('#viewModal').modal('show');
            });
            //End View

            //Start Delete Record
            table.on('click', '.delete', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                //$('#id').val(data[0]);
                var conteudo = $(".modal-body").html();

                $('#delete-modal-body').html(
                    '<input type="hidden" name="_method" value="DELETE">' +
                    '<p>Deseja excluir "<strong>' + data[1] + '</strong>"?</p>');
                $('#deleteForm').attr('action', '/cidade/' + data[0]);
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>

    @include('scripts.confirmdeletion')

@endsection
