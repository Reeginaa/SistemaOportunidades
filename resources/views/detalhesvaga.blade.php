@extends('layouts.template')

@section('titulo', 'Detalhes da Vaga')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detalhes da Vaga</h6>
            </div>
            <div class="card-body m-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-5">
                            @php
                            //dd($vaga);
                            @endphp
                            <p>{{ $vaga->id ?? '' }}</p>
                            <p>{{ $vaga->area_nome ?? '' }}</p>
                            <p>{{ $vaga->div_nome ?? '' }}</p>
                            {{-- <p>{{ $vaga->$vag_data_publicacao ?? '' }}</p>
                            <p>{{ $vaga->$vag_data_alteracao }}</p>--}}
                            <p>{{ $vaga->vag_status ?? '' }}</p>
                            <li>
                                <figure class="icone-salario">
                                    <img alt="Ícone de salário" src={{ URL::to('img/cifrao.svg') }} />
                                </figure>
                            </li>
                            <li class="row">
                                <div class="col">
                                    <div class="col-1">
                                        <figure class="icone-localizacao" title="Local">
                                            <img alt="Ícone de localização" src={{ URL::to('img/location.svg') }} />
                                        </figure>
                                    </div>
                                    <div>
                                        <span class="info-localizacao" title={{ $vaga->cid_nome ?? '' }}>
                                            {{ $vaga->cid_nome ?? '' }}/{{ $vaga->cid_uf ?? '' }}
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <p>{{ $vaga->vag_carga_horaria ?? '' }}</p>
                            <p>{{ $vaga->vag_habilidades ?? '' }}</p>
                            <p>{{ $vaga->vag_diferenciais ?? '' }}</p>
                            <p>{{ $vaga->vag_faixa_salarial ?? '' }}</p>
                            <p>{{ $vaga->vag_beneficios ?? '' }}</p>
                            <p>{{ $vaga->vag_informacoes_adicionais ?? '' }}</p>
                            <p>{{ $vaga->vag_numero_de_vagas ?? '' }}</p>
                            <p>{{ $vaga->vag_cep ?? '' }}</p>
                            <p>{{ $vaga->cid_id ?? '' }}</p>
                            <p>{{ $vaga->are_id ?? '' }}</p>
                            <p>{{ $vaga->div_id ?? '' }}</p>
                            <p>{{ $vaga->tip_id ?? '' }}</p>
                            <p>{{ $vaga->fdt_id ?? '' }}</p>
                            <p>{{ $vaga->cid_nome ?? '' }}/{{ $vaga->cid_uf ?? '' }}</p>
                            <p>{{ $vaga->div_cnpj ?? '' }}</p>
                            <p>{{ $vaga->div_nome ?? '' }}</p>
                            <p>{{ $vaga->div_telefone ?? '' }}</p>
                            <p>{{ $vaga->div_email ?? '' }}</p>
                            <p>{{ $vaga->div_rua ?? '' }}</p>
                            <p>{{ $vaga->div_numero ?? '' }}</p>
                            <p>{{ $vaga->div_complemento ?? '' }}</p>
                            <p>{{ $vaga->div_bairro ?? '' }}</p>
                            <p>{{ $vaga->tip_nome ?? '' }}</p>
                            <p>{{ $vaga->fdt_nome ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->

        @endsection

        @section('script_pages')

            <!-- Null -->

        @endsection
