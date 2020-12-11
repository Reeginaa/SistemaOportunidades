@extends('layouts.template')

@section('titulo', 'Anunciantes')

@section('table-delete', 'divulgadores')

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
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">{{ __('Cadastro de Anunciantes') }}</h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Anunciantes') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableDivulgadores" class="datatable table table-sm table-responsive text-center rounded"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome</th>
                                <th class="th-sm border-bottom border-left">Telefone</th>
                                <th style="display: none;">email</th>
                                <th class="th-sm border-bottom border-left">Endereço</th>
                                <th style="display: none;">endereço</th>
                                <th style="display: none;">numero</th>
                                <th style="display: none;">complemento</th>
                                <th class="th-sm border-bottom border-left">Bairro</th>
                                <th class="th-sm border-bottom border-left">Cidade/UF</th>
                                <th style="display: none;">id_fk1</th>
                                <th style="display: none;">cnpj</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($divulgadores as $obj)
                                @php
                                $cidade = $obj->find($obj->id)->cidade;
                                @endphp
                                <tr>
                                    <th class="align-middle border-left">{{ $obj->id }}</th>
                                    <td class="align-middle border-left">{{ $obj->div_nome }}</td>
                                    <td class="align-middle border-left">{{ $obj->div_telefone }}</td>
                                    <td style="display: none;">{{ $obj->div_email }}</td>
                                    <td class="align-middle border-left">{{ $obj->div_rua }}, {{ $obj->div_numero }}
                                        @php
                                        if ($obj->div_complemento) {
                                            echo " - " .$obj->div_complemento;
                                        } else {
                                            echo "";
                                        } 
                                        @endphp
                                    </td>
                                    <td style="display: none;">{{ $obj->div_rua }}</td>
                                    <td style="display: none;">{{ $obj->div_numero }}</td>
                                    <td style="display: none;">{{ $obj->div_complemento ?? null }}</td>
                                    <td class="align-middle border-left">{{ $obj->div_bairro }}</td>
                                    <td class="align-middle border-left">{{ $cidade->cid_nome }}/{{ $cidade->cid_uf }}</td>
                                    <td style="display: none;">{{ $cidade->id }}</td>
                                    <td style="display: none;">{{ $obj->div_cnpj }}</td>
                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <!--<a href="#" class="btn_crud btn btn-danger btn-sm delete" data-toggle="tooltip"
                                                                                                                                        title="Excluir"><i class="fas fa-trash-alt"></i></a>-->
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $obj->id }}, '{{ $obj->div_nome }}-{{ $cidade->cid_nome }}/{{ $cidade->cid_uf }}', '{{ strtolower(class_basename($obj)) }}')"
                                            title="Excluir"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Nome</th>
                                <th class="th-sm border-bottom border-left">Telefone</th>
                                <th style="display: none;">email</th>
                                <th class="th-sm border-bottom border-left">Endereço</th>
                                <th style="display: none;">endereço</th>
                                <th style="display: none;">numero</th>
                                <th style="display: none;">complemento</th>
                                <th class="th-sm border-bottom border-left">Bairro</th>
                                <th class="th-sm border-bottom border-left">Cidade/UF</th>
                                <th style="display: none;">id_fk1</th>
                                <th style="display: none;">cnpj</th>
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
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">{{ __('Novo Anunciante') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\DivulgadoresController@store') }}" method="POST"
                        id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="text-danger float-right">Campo Obrigatório(*)</label>
                        </div>
                        <br>
                        <div id="div_cnpj" class="form-group">
                            <label class="mb-0" for="div_cnpj">CNPJ*</label>
                            <input type="text" name="div_cnpj" value="" id="div_cnpj" class="form-control"
                                style="width: 185px;" maxlength="18" vk_1bc56="subscribed">
                            <span class="text-danger" id="div_cnpjError"></span>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="div_nome">Nome*</label>
                            <input type="text" class="form-control" maxlength="100" id="div_nome" name="div_nome" required>
                            <span class="text-danger" id="div_nomeError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_telefone">Telefone*</label>
                            <input type="text" class="form-control" maxlength="15" style="width: 200px" id="div_telefone"
                                name="div_telefone" required>
                            <span class="text-danger" id="div_telefoneError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_email">E-mail*</label>
                            <input type="text" class="form-control" maxlength="100" style="width: 280px" id="div_email"
                                name="div_email" required>
                            <span class="text-danger" id="div_emailError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_rua">Endereço (Rua, Avenida, ...)*</label>
                            <input type="text" class="form-control" maxlength="100" id="div_rua" name="div_rua" required>
                            <span class="text-danger" id="div_ruaError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_numero">Número*</label>
                            <input type="text" class="form-control" maxlength="10"
                                style="text-transform: uppercase; width: 180px" id="div_numero" name="div_numero" required>
                            <span class="text-danger" id="div_numeroError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_complemento">Complemento</label>
                            <input type="text" class="form-control" maxlength="15"
                                style="text-transform: uppercase; width: 230px" id="div_complemento" name="div_complemento">
                            <span class="text-danger" id="div_complemento"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_bairro">Bairro*</label>
                            <input type="text" class="form-control" maxlength="30" style="width: 300px" id="div_bairro"
                                name="div_bairro" required>
                            <span class="text-danger" id="div_bairroError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="cid_id">Cidade/UF*</label>
                            <a href="#" class="btn_crud btn btn-sm text-success cidade" data-toggle="modal" data-target="#addCidade">
                                <i class="fas fa-plus" data-toggle="tooltip" title="Nova Cidade"></i>
                            </a>
                            <select class="form-control selectpicker" data-live-search="true" name="cid_id" required>
                                <option value="">Selecione...</option>
                                @foreach ($cidades as $cidade)
                                    <option value={{ $cidade->id }}> {{ $cidade->cid_nome }}/{{ $cidade->cid_uf }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="cid_idError"></span>
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
                    <h5 class="modal-title text-dark font-weight-bold" id="editModalTitle">{{ __('Alterar Anunciante') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/divulgadores" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="text-danger float-right">Campo Obrigatório(*)</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="mb-0" name="div_cnpj" for="div_cnpj">CNPJ</label>
                            <input type="text" class="form-control" id="div_cnpj" name="div_cnpj"
                                style="text-align: right; width: 155px;" maxlength="14" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="div_nome">Nome*</label>
                            <input type="text" class="form-control" maxlength="100" id="div_nome" name="div_nome" required>
                            <span class="text-danger" id="div_nomeError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_telefone">Telefone*</label>
                            <input type="text" class="form-control" maxlength="15" style="width: 200px" id="div_telefone"
                                name="div_telefone" required>
                            <span class="text-danger" id="div_telefoneError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_email">E-mail*</label>
                            <input type="text" class="form-control" maxlength="100" style="width: 280px" id="div_email"
                                name="div_email" required>
                            <span class="text-danger" id="div_emailError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_rua">Endereço (Rua, Avenida, ...)*</label>
                            <input type="text" class="form-control" maxlength="100" id="div_rua" name="div_rua" required>
                            <span class="text-danger" id="div_ruaError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_numero">Número*</label>
                            <input type="text" class="form-control" maxlength="10"
                                style="text-transform: uppercase; width: 180px" id="div_numero" name="div_numero" required>
                            <span class="text-danger" id="div_numeroError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_complemento">Complemento</label>
                            <input type="text" class="form-control" maxlength="15"
                                style="text-transform: uppercase; width: 230px" id="div_complemento" name="div_complemento">
                            <span class="text-danger" id="div_complemento"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_bairro">Bairro*</label>
                            <input type="text" class="form-control" maxlength="30" style="width: 300px" id="div_bairro"
                                name="div_bairro" required>
                            <span class="text-danger" id="div_bairroError"></span>
                        </div>
                        <div id="select-cidade" class="form-group col-xs-2">
                            <!-- jquery -->
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
                    <h5 class="modal-title text-white font-weight-bold" id="viewModalTitle">{{ __('Ver Anunciante') }}</h5>
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
                        <div class="form-group col-xs-2">
                            <label class="mb-0" name="div_cnpj" for="div_cnpj">CNPJ</label>
                            <input type="text" class="form-control" id="div_cnpj" name="div_cnpj" style="width: 190px;"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="div_nome">Nome</label>
                            <input type="text" class="form-control" id="div_nome" name="div_nome" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_telefone">Telefone</label>
                            <input type="text" class="form-control" maxlength="15" style="width: 200px" id="div_telefone"
                                name="div_telefone" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_email">E-mail</label>
                            <input type="text" class="form-control" maxlength="100" style="width: 280px" id="div_email"
                                name="div_email" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_rua">Endereço (Rua, Avenida, ...)</label>
                            <input type="text" class="form-control" maxlength="100" id="div_rua" name="div_rua" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_numero">Número</label>
                            <input type="text" class="form-control" maxlength="10"
                                style="text-transform: uppercase; width: 180px" id="div_numero" name="div_numero" readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_complemento">Complemento</label>
                            <input type="text" class="form-control" maxlength="15"
                                style="text-transform: uppercase; width: 230px" id="div_complemento" name="div_complemento"
                                readonly>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_bairro">Bairro</label>
                            <input type="text" class="form-control" maxlength="30" style="width: 300px" id="div_bairro"
                                name="div_bairro" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="cid_nome">Cidade/UF</label>
                            <input type="text" class="form-control" id="cid_nome" name="cid_nome" readonly>
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
                    <form action="/divulgadores" method="POST" id="deleteForm">
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

    <!-- MODAL CIDADE -->

    <!-- Start Add Modal -->
    <div class="modal fade" id="addCidade" tabindex="-1" role="dialog" aria-labelledby="addCidadeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title text-white font-weight-bold" id="addCidadeLabel">{{ __('Nova Cidade') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\CidadeController@store') }}" method="POST" id="formAddCidade">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="text-danger float-right">Campo Obrigatório(*)</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="mb-0" for="cid_nome_modal">Nome*</label>
                            <input type="text" class="form-control" id="cid_nome_modal" name="cid_nome_modal" required>
                            <span class="text-danger" id="cid_nome_modalError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="cid_uf_modal">UF*</label>
                            <input type="text" class="form-control" maxlength="2" style="text-transform: uppercase; width: 60px" id="cid_uf_modal" name="cid_uf_modal" required>
                            <span class="text-danger" id="cid_uf_modalError"></span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" data-toggle="tooltip" title="Cancelar">
                        <i class="fas fa-undo-alt mr-1"></i>{{ __('Cancelar') }}
                    </button>
                    <button type="submit" form="formAddCidade" class="btn btn-success" data-toggle="tooltip" title="Salvar">
                        <i class="fas fa-save mr-1"></i>{{ __('Salvar') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Modal -->

@endsection

@section('script_pages')

    <script type="text/javascript">
        // Anunciante
        $(document).ready(function() {
            $( "#addModal #div_cnpj" ).keyup(function() {
                console.log($(this).val())
                $CNPJ = $(this).val();

                if($(this).val().length == 14){
                    $.get('divulgadores/CNPJ/' + $CNPJ, function(dados) {
                       if(dados) {
                        let response = JSON.parse(dados);
                        $('#addModal #div_nome').val(response.nome) ;
                        $('#addModal #div_telefone').val(response.telefone) ;
                        $('#addModal #div_rua').val(response.logradouro);
                        $('#addModal #div_numero').val(response.numero);
                        $('#addModal #div_complemento').val(response.complemento);
                        $('#addModal #div_bairro').val(response.bairro);
                       }
                    });
                }
            });


           


            $("#formAddCidade").submit(function() {
                    
                // Pegando os dados do formulário e pegando o token que válida o request.
                var cid_nome = $("#cid_nome_modal").val();
                var cid_uf = $("#cid_uf_modal").val();
                var _token = $("[name='_token']")[0].value;

                // Montando o objeto que sera enviado na request.
                var dados = {
                    cid_nome: cid_nome,
                    cid_uf: cid_uf,
                    _token: _token,
                    ajax: true
                }

                // Executando o POST para a rota de cadastro de cidade
                $.ajax({
                    url: "/cidade",
                    type: 'POST',
                    data: dados
                })
                
                // Caso der sucesso então adiciona a nova cidade no select e fecha o modal.
                .done(function (result) {
                    result = JSON.parse(result); // Como o resultado volta em string então da parse pra JSON

                    // Setando a cidade no select.
                    $('[name=cid_id]').map(function(_i, element) {
                        var option = document.createElement("option");
                        option.text = result.cid_nome + "/" + result.cid_uf;
                        option.value = result.id;
                        element.appendChild(option);
                        element.value = result.id;
                    });

                    // Fechando o modal
                    $('#addCidade').modal('hide');
                })
                
                // Caso der erro então da um aviso.
                .fail(function (err) {
                    console.log(err);
                    alert("Erro ao tentar cadastrar a cidade.");
                })

                return false;
            });

            var table = $('#datatableDivulgadores').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(data);

                $('#editModal #div_cnpj').val(data[11]);
                $('#editModal #div_nome').val(data[1]);
                $('#editModal #div_telefone').val(data[2]);
                $('#editModal #div_email').val(data[3]);
                $('#editModal #div_rua').val(data[5]);
                $('#editModal #div_numero').val(data[6]);
                $('#editModal #div_complemento').val(data[7]);
                $('#editModal #div_bairro').val(data[8]);

                $('#select-cidade').html(
                    '<label class="mb-0" for="cid_id">Cidade/UF*</label>' +
                    '<a href="#" class="btn_crud btn btn-sm text-success cidade" data-toggle="modal" data-target="#addCidade"><i class="fas fa-plus"' +
                    '    data-toggle="tooltip" title="Nova Cidade"></i></a>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="cid_id" required>' +
                    '   @foreach ($cidades as $cidade)' +
                    '       <option value={{ $cidade->id }}> {{ $cidade->cid_nome }}/{{ $cidade->cid_uf }} </option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='cid_id'] option[value='" + data[10] + "']").attr('selected',
                    'selected');

                $('#editForm').attr('action', '/divulgadores/' + data[0]);
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
                $('#viewModal #div_cnpj').val(data[11]);
                $('#viewModal #div_nome').val(data[1]);
                $('#viewModal #div_telefone').val(data[2]);
                $('#viewModal #div_email').val(data[3]);
                $('#viewModal #div_rua').val(data[5]);
                $('#viewModal #div_numero').val(data[6]);
                $('#viewModal #div_complemento').val(data[7]);
                $('#viewModal #div_bairro').val(data[8]);
                $('#viewModal #cid_nome').val(data[9]);

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
                $('#deleteForm').attr('action', '/divulgadores/' + data[0]);
                $('#deleteModal').modal('show');
            });
            //End Delete Record
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#addModal #div_cnpj').mask('00.000.000/0000-00',options);

            var PhoneMaskBehavior = function(val) {
                    let len = val.replace(/\D/g, '').length;
                    return len === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                phoneOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(PhoneMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('#addModal #div_telefone').mask(PhoneMaskBehavior, phoneOptions);
            $('#editModal #div_telefone').mask(PhoneMaskBehavior, phoneOptions);
        });

    </script>


    @include('scripts.confirmdeletion')

@endsection
