@extends('layouts.template')

@section('titulo', 'Vagas')

@section('table-delete', 'vaga')

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
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">{{ __('Cadastro de Vagas') }}</h1>
        </div>

        <!-- Content Datatable -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ __('Vagas') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatableVaga" class="datatable table table-sm table-responsive text-center rounded"
                        cellspacing="0" width="100%">
                        <thead class="thead-dark">
                            <tr class="text-justify border">
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Status</th>
                                <th style="display: none;">Carga Horária</th>
                                <th style="display: none;">Habilidades</th>
                                <th style="display: none;">Diferenciais</th>
                                <th class="th-sm border-bottom border-left">Faixa Salarial</th>
                                <th style="display: none;">Banefícios</th>
                                <th style="display: none;">Informações adicionais</th>
                                <th class="th-sm border-bottom border-left">Vagas</th>
                                <th style="display: none;">CEP</th>
                                <th class="th-sm border-bottom border-left">Cidade</th>
                                <th class="th-sm border-bottom border-left">Area</th>
                                <th class="th-sm border-bottom border-left">Anunciante</th>
                                <th style="display: none;">Tipo de Contratação</th>
                                <th style="display: none;">Formato de Trabalho</th>
                                <th style="display: none;">Status_cod</th>
                                <th style="display: none;">cid_id</th>
                                <th style="display: none;">are_id</th>
                                <th style="display: none;">div_id</th>
                                <th style="display: none;">tip_id</th>
                                <th style="display: none;">fdt_id</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vagas as $obj)
                                @php
                                $cidade = $obj->cidade->find($obj->cid_id);
                                $area = $obj->area->find($obj->are_id);
                                $divulgador = $obj->divulgador->find($obj->div_id);
                                $tipoContratacao = $obj->tipoContratacao->find($obj->tip_id);
                                $formatoTrabalho = $obj->formatoTrabalho->find($obj->fdt_id);
                                @endphp
                                <tr>
                                    <th class="align-middle border-left">{{ $obj->id }}</th>
                                    <td class="align-middle border-left">
                                        {{ $obj->vag_status == '1' ? 'ACEITO' : 'RECUSADO' }}
                                    </td>
                                    <td style="display: none;">{{ $obj->vag_carga_horaria }}</td>
                                    <td style="display: none;">{{ $obj->vag_habilidades }}</td>
                                    <td style="display: none;">{{ $obj->vag_diferenciais }}</td>
                                    <td class="align-middle border-left">{{ $obj->vag_faixa_salarial ?? '' }}</td>
                                    <td style="display: none;">{{ $obj->vag_beneficios }}</td>
                                    <td style="display: none;">{{ $obj->vag_informacoes_adicionais }}</td>
                                    <td class="align-middle border-left">{{ $obj->vag_numero_de_vagas }}</td>
                                    <td style="display: none;">{{ $obj->vag_cep }}</td>
                                    <td class="align-middle border-left">{{ $cidade->cid_nome }}/{{ $cidade->cid_uf }}</td>
                                    <td class="align-middle border-left">{{ $area->area_nome }}</td>
                                    <td class="align-middle border-left">{{ $divulgador->div_nome }}</td>
                                    <td style="display: none;">{{ $tipoContratacao->tip_nome }}</td>
                                    <td style="display: none;">{{ $formatoTrabalho->fdt_nome }}</td>
                                    <td style="display: none;">{{ $obj->vag_status }}</td>
                                    <td style="display: none;">{{ $cidade->id }}</td>
                                    <td style="display: none;">{{ $area->id }}</td>
                                    <td style="display: none;">{{ $divulgador->id }}</td>
                                    <td style="display: none;">{{ $tipoContratacao->id }}</td>
                                    <td style="display: none;">{{ $formatoTrabalho->id }}</td>

                                    <td class="align-middle th-sm border-left border-right">
                                        <a href="#" class="btn_crud btn btn-info btn-sm view"><i class="fas fa-eye"
                                                data-toggle="tooltip" title="Visualizar"></i></a>
                                        <a href="#" class="btn_crud btn btn-warning btn-sm edit"><i
                                                class="fas fa-pencil-alt" data-toggle="tooltip" title="Editar"></i></a>
                                        <a href="#" class="btn_crud btn btn-danger btn-sm" data-toggle="tooltip"
                                            onclick="return confirmDeletion({{ $obj->id }}, '{{ $obj->vag_numero_de_vagas }} vaga(s) - {{ $area->area_nome }} - {{ $divulgador->div_nome }} ({{ $obj->vag_status == '1' ? 'ACEITO' : 'RECUSADO' }})', '{{ strtolower(class_basename($obj)) }}')"
                                            title="Excluir">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-light">
                            <tr>
                                <th class="th-sm border-bottom border-left">id</th>
                                <th class="th-sm border-bottom border-left">Status</th>
                                <th style="display: none;">Carga Horária</th>
                                <th style="display: none;">Habilidades</th>
                                <th style="display: none;">Diferenciais</th>
                                <th class="th-sm border-bottom border-left">Faixa Salarial</th>
                                <th style="display: none;">Banefícios</th>
                                <th style="display: none;">Informações adicionais</th>
                                <th class="th-sm border-bottom border-left">Vagas</th>
                                <th style="display: none;">CEP</th>
                                <th class="th-sm border-bottom border-left">Cidade</th>
                                <th class="th-sm border-bottom border-left">Area</th>
                                <th class="th-sm border-bottom border-left">Anunciante</th>
                                <th style="display: none;">Tipo de Contratação</th>
                                <th style="display: none;">Formato de Trabalho</th>
                                <th style="display: none;">Status_cod</th>
                                <th style="display: none;">cid_id</th>
                                <th style="display: none;">are_id</th>
                                <th style="display: none;">div_id</th>
                                <th style="display: none;">tip_id</th>
                                <th style="display: none;">fdt_id</th>
                                <th class="th-sm border-bottom border-left">Ações</th>
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
                    <h5 class="modal-title text-white font-weight-bold" id="addModalLabel">{{ __('Nova Vaga') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ action('App\Http\Controllers\VagaController@store') }}" method="POST" id="addForm">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="text-danger float-right">Campo Obrigatório(*)</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="mb-0" for="vag_status">Status*</label>
                            <select class="form-control selectpicker" data-live-search="true" name="vag_status" required>
                                <option value="">Selecione...</option>
                                <option value="1">ACEITO</option>
                                <option value="0">RECUSADO</option>
                            </select>
                            <span class="text-danger" id="vag_statusError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_carga_horaria">Carga horária*</label>
                            <input class="form-control" type="number" id="vag_carga_horaria" name="vag_carga_horaria"
                                required>
                            <span class="text-danger" id="vag_carga_horariaError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_habilidades">Habilidades*</label>
                            <input class="form-control" type="text" maxlength="250" id="vag_habilidades"
                                name="vag_habilidades" required>
                            <span class="text-danger" id="vag_habilidadesError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_diferenciais">Diferenciais</label>
                            <input class="form-control" type="text" maxlength="250" id="vag_diferenciais"
                                name="vag_diferenciais">
                            <span class="text-danger" id="vag_diferenciaisError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_faixa_salarial">Faixa Salárial</label>
                            <input class="form-control" type="text" id="vag_faixa_salarial" name="vag_faixa_salarial">
                            <span class="text-danger" id="vag_faixa_salarialError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_beneficios">Benificios</label>
                            <input class="form-control" type="text" maxlength="250" id="vag_beneficios"
                                name="vag_beneficios">
                            <span class="text-danger" id="vag_beneficiosError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_informacoes_adicionais">Informações adicionais</label>
                            <textarea class="form-control" maxlength="500" id="vag_informacoes_adicionais"
                                name="vag_informacoes_adicionais"></textarea>
                            <span class="text-danger" id="vag_informacoes_adicionaisError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_numero_de_vagas">Número de Vagas*</label>
                            <input class="form-control" style="width: 100px" type="number" id="vag_numero_de_vagas"
                                name="vag_numero_de_vagas" required>
                            <span class="text-danger" id="vag_numero_de_vagasError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_cep">CEP*</label>
                            <input class="form-control" style="width: 120px" id="vag_cep" maxlength="10" name="vag_cep"
                                required>
                            <span class="text-danger" id="vag_cepError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="cid_id">Cidade/UF*</label>
                            <select class="form-control selectpicker" data-live-search="true" id="cid_id" name="cid_id"
                                required>
                                <option value="">Selecione...</option>
                                @foreach ($cidades as $cidade)
                                    <option value={{ $cidade->id }}> {{ $cidade->cid_nome }}/{{ $cidade->cid_uf }} </option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="cid_idError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="are_id">Area de Atuação*</label>
                            <select class="form-control selectpicker" data-live-search="true" name="are_id" required>
                                <option value="">Selecione...</option>
                                @foreach ($areas as $area)
                                    <option value={{ $area->id }}> {{ $area->area_nome }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="cid_idError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="div_id">Anunciantes*</label>
                            <select class="form-control selectpicker" data-live-search="true" name="div_id" required>
                                <option value="">Selecione...</option>
                                @foreach ($divulgadores as $divulgador)
                                    <option value={{ $divulgador->id }}> {{ $divulgador->div_nome }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="cid_idError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="tip_id">Tipos de Contratação*</label>
                            <select class="form-control selectpicker" data-live-search="true" name="tip_id" required>
                                <option value="">Selecione...</option>
                                @foreach ($tiposContratacao as $tipo)
                                    <option value={{ $tipo->id }}> {{ $tipo->tip_nome }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger" id="cid_idError"></span>
                        </div>
                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="fdt_id">Formatos de Trabalho*</label>
                            <select class="form-control selectpicker" data-live-search="true" name="fdt_id" required>
                                <option value="">Selecione...</option>
                                @foreach ($formatosTrabalho as $formatoTrabalho)
                                    <option value={{ $formatoTrabalho->id }}> {{ $formatoTrabalho->fdt_nome }}</option>
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
                    <h5 class="modal-title text-dark font-weight-bold" id="editModalTitle">{{ __('Alterar Vaga') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/vagas" method="POST" id="editForm">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label class="text-danger float-right">Campo Obrigatório(*)</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="mb-0" for="vag_status">Status*</label>
                            <select class="form-control selectpicker" data-live-search="true" id="vag_status"
                                name="vag_status" required>
                                <option value="">Selecione...</option>
                                <option value="1">ACEITO</option>
                                <option value="0">RECUSADO</option>
                            </select>
                            <span class="text-danger" id="vag_statusError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_carga_horaria">Carga horária*</label>
                            <input class="form-control" type="number" id="vag_carga_horaria" name="vag_carga_horaria"
                                required>
                            <span class="text-danger" id="vag_carga_horariaError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_habilidades">Habilidades*</label>
                            <input class="form-control" type="text" maxlength="250" id="vag_habilidades"
                                name="vag_habilidades" required>
                            <span class="text-danger" id="vag_habilidadesError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_diferenciais">Diferenciais</label>
                            <input class="form-control" type="text" maxlength="250" id="vag_diferenciais"
                                name="vag_diferenciais">
                            <span class="text-danger" id="vag_diferenciaisError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_faixa_salarial">Faixa Salárial</label>
                            <input class="form-control" type="text" id="vag_faixa_salarial" name="vag_faixa_salarial">
                            <span class="text-danger" id="vag_faixa_salarialError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_beneficios">Benificios</label>
                            <input class="form-control" type="text" maxlength="250" id="vag_beneficios"
                                name="vag_beneficios">
                            <span class="text-danger" id="vag_beneficiosError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_informacoes_adicionais">Informações adicionais</label>
                            <textarea class="form-control" maxlength="500" id="vag_informacoes_adicionais"
                                name="vag_informacoes_adicionais"></textarea>
                            <span class="text-danger" id="vag_informacoes_adicionaisError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_numero_de_vagas">Número de Vagas</label>
                            <input class="form-control" type="number" style="width: 100px" id="vag_numero_de_vagas"
                                name="vag_numero_de_vagas" required>
                            <span class="text-danger" id="vag_numero_de_vagasError"></span>
                        </div>

                        <div class="form-group col-xs-2">
                            <label class="mb-0" for="vag_cep">CEP*</label>
                            <input class="form-control" style="width: 120px" id="vag_cep" maxlength="10" name="vag_cep"
                                required>
                            <span class="text-danger" id="vag_cepError"></span>
                        </div>

                        <div id="select-cidade" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div id="select-area" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div id="select-divulgador" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div id="select-tiposContratacao" class="form-group col-xs-2">
                            <!-- jquery -->
                        </div>
                        <div id="select-formatosTrabalho" class="form-group col-xs-2">
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
                    <h5 class="modal-title text-white font-weight-bold" id="viewModalTitle">{{ __('Ver Vaga') }}</h5>
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
                            <label class="mb-0" for="vag_status">Status</label>
                            <input type="text" class="form-control" id="vag_status" name="vag_status" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="vag_carga_horaria">Carga Horária</label>
                            <input type="text" class="form-control" id="vag_carga_horaria" name="vag_carga_horaria"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="vag_habilidades">Habilidades</label>
                            <input type="text" class="form-control" id="vag_habilidades" name="vag_habilidades" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="vag_diferenciais">Diferenciais</label>
                            <input type="text" class="form-control" id="vag_diferenciais" name="vag_diferenciais" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="vag_faixa_salarial">Faixa Salarial</label>
                            <input type="text" class="form-control" id="vag_faixa_salarial" name="vag_faixa_salarial"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="vag_beneficios">Beneficios</label>
                            <input type="text" class="form-control" id="vag_beneficios" name="vag_beneficios" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="vag_informacoes_adicionais">Informações adicionais</label>
                            <textarea type="text" class="form-control" id="vag_informacoes_adicionais"
                                name="vag_informacoes_adicionais" readonly></textarea>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="vag_numero_de_vagas">Número de Vagas</label>
                            <input type="text" class="form-control" style="width: 100px" id="vag_numero_de_vagas"
                                name="vag_numero_de_vagas" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="vag_cep">CEP</label>
                            <input type="text" style="width: 120px" class="form-control" id="vag_cep" name="vag_cep"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="cid_nome">Cidade/UF</label>
                            <input type="text" class="form-control" id="cid_nome" name="cid_nome" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="are_nome">Area de Atuação</label>
                            <input type="text" class="form-control" id="are_nome" name="are_nome" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="div_nome">Anunciantes</label>
                            <input type="text" class="form-control" id="div_nome" name="div_nome" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="tip_nome">Tipo de contratação</label>
                            <input type="text" class="form-control" id="tip_nome" name="tip_nome" readonly>
                        </div>
                        <div class="form-group">
                            <label class="mb-0" for="fdt_nome">Formato de Trabalho</label>
                            <input type="text" class="form-control" id="fdt_nome" name="fdt_nome" readonly>
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
                    <h5 class="modal-title text-white font-weight-bold" id="deleteModalTitle">{{ __('Excluir Vaga') }}
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/vaga" method="POST" id="deleteForm">
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
        // Vagas
        $(document).ready(function() {

            $("#addModal #vag_cep").keyup(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {


                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#addModal #cid_id option").each(function() {

                                    if ($(this).text().toUpperCase().includes(dados
                                            .localidade.toUpperCase())) {
                                        $("#addModal #cid_id").val($(this).val());
                                    }

                                });
                            } else {
                                //CEP pesquisado não foi encontrado.
                                alert("CEP não encontrado.");
                            }
                        });
                    }

                }
            });

            $("#editModal #vag_cep").keyup(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {


                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#editModal #cid_id option").each(function() {

                                    if ($(this).text().toUpperCase().includes(dados
                                            .localidade.toUpperCase())) {
                                        $("#editModal #cid_id").val($(this).val());
                                    }

                                });
                            } else {
                                //CEP pesquisado não foi encontrado.
                                alert("CEP não encontrado.");
                            }
                        });
                    }

                }
            });

            $("#editModal #vag_cep").mask("99.999-999");
            $("#addModal #vag_cep").mask("99.999-999");
            $("#viewModal #vag_cep").mask("99.999-999");
            var table = $('#datatableVaga').DataTable();

            //Start Edit Record
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                console.log(table);
                console.log(data);

                $('#select-status').html(
                    '<label class="mb-0" for="vag_status">Status</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="vag_status" required>' +
                    '    <option value="">Selecione...</option>' +
                    '    <option value="1">ACEITO</option> ' +
                    '    <option value="0">RECUSADO</option> ' +
                    '</select>');
                $("select[name='vag_status'] option[value='" + data[15] + "']").attr('selected',
                    'selected');

                $('#editModal #vag_carga_horaria').val(data[2]);
                $('#editModal #vag_habilidades').val(data[3]);
                $('#editModal #vag_diferenciais').val(data[4]);
                $('#editModal #vag_faixa_salarial').val(data[5]);
                $('#editModal #vag_beneficios').val(data[6]);
                $('#editModal #vag_informacoes_adicionais').val(data[7]);
                $('#editModal #vag_numero_de_vagas').val(data[8]);
                $('#editModal #vag_cep').val(data[9]);


                $('#select-cidade').html(
                    '<label class="mb-0" for="cid_id">Cidade*</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" id="cid_id" name="cid_id" required>' +
                    '   @foreach ($cidades as $cidade)' +
                    '       <option value={{ $cidade->id }}> {{ $cidade->cid_nome }}/{{ $cidade->cid_uf }} </option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='cid_id'] option[value='" + data[16] + "']").attr('selected',
                    'selected');

                $('#select-area').html(
                    '<label class="mb-0" for="are_id">Area*</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="are_id" required>' +
                    '   @foreach ($areas as $area)' +
                    '       <option value={{ $area->id }}> {{ $area->area_nome }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='are_id'] option[value='" + data[17] + "']").attr('selected',
                    'selected');

                $('#select-divulgador').html(
                    '<label class="mb-0" for="div_id">Anunciante*</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="div_id" required>' +
                    '   @foreach ($divulgadores as $divulgador)' +
                    '       <option value={{ $divulgador->id }}> {{ $divulgador->div_nome }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='div_id'] option[value='" + data[18] + "']").attr('selected',
                    'selected');

                $('#select-tiposContratacao').html(
                    '<label class="mb-0" for="tip_id">Tipos de Contratacao*/label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="tip_id" required>' +
                    '   @foreach ($tiposContratacao as $tipo)' +
                    '       <option value={{ $tipo->id }}> {{ $tipo->tip_nome }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='tip_id'] option[value='" + data[19] + "']").attr('selected',
                    'selected');

                $('#select-formatosTrabalho').html(
                    '<label class="mb-0" for="fdt_id">Formato de Trabalho*</label>' +
                    '<select class="form-control selectpicker" data-live-search="true" name="fdt_id" required>' +
                    '   @foreach ($formatosTrabalho as $formatoTrabalho)' +
                    '       <option value={{ $formatoTrabalho->id }}> {{ $formatoTrabalho->fdt_nome }}</option>' +
                    '   @endforeach' +
                    '</select>');
                $("select[name='fdt_id'] option[value='" + data[20] + "']").attr('selected',
                    'selected');

                $('#editForm').attr('action', '/vagas/' + data[0]);
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
                $('#viewModal #vag_status').val(data[1]);
                $('#viewModal #vag_carga_horaria').val(data[2]);
                $('#viewModal #vag_habilidades').val(data[3]);
                $('#viewModal #vag_diferenciais').val(data[4]);
                $('#viewModal #vag_faixa_salarial').val(data[5]);
                $('#viewModal #vag_beneficios').val(data[6]);
                $('#viewModal #vag_informacoes_adicionais').val(data[7]);
                $('#viewModal #vag_numero_de_vagas').val(data[8]);
                $('#viewModal #vag_cep').val(data[9]);
                $('#viewModal #cid_nome').val(data[10]);
                $('#viewModal #are_nome').val(data[11]);
                $('#viewModal #div_nome').val(data[12]);
                $('#viewModal #tip_nome').val(data[13]);
                $('#viewModal #fdt_nome').val(data[14]);

                $('#viewForm').attr('action');
                $('#viewModal').modal('show');
            });
            //End View

        });

    </script>

    @include('scripts.confirmdeletion')

@endsection
