@extends('layouts.publictemplate')

@section('titulo', 'Detalhes da Vaga')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detalhes da Vaga</h6>
            </div>
            @php
            //dd($cidade_divulgador);
            @endphp
            <div class="card-body m-4">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="foto" style="height: 100px; 
                                                        width: 100%; 
                                                        background-image: url('https://www.woelfer.com.br/wp-content/uploads/2019/05/Aperto-de-m%C3%A3os-875x330.jpg');
                                                        background-size: cover;
                                                        background-position: center center;
                                                        opacity: 0.2;"></div>

                            <div class="card-body m-2" style="text-align: left;">
                                <h3 class="card-title mb-2">{{ $vaga->area_nome }} - {{ $vaga->fdt_nome ?? '' }}</h3>
                                <h5 class="card-title mb-2">{{ $vaga->tip_nome }}</h5>
                                <br>
                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <img class="img-fluid rounded-circle" alt="Ícone de localização" width="26px"
                                        src={{ URL::to('img/person.svg') }} />
                                    {{ $vaga->vag_numero_de_vagas }}
                                    @php
                                    if ($vaga->vag_numero_de_vagas > 1) {
                                    echo " vagas disponíveis";
                                    } else {
                                    echo " vaga disponível";
                                    }
                                    @endphp
                                </div>

                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <img alt="Ícone de localização" width="24px" src={{ URL::to('img/Red_clock.png') }} />
                                    {{ $vaga->vag_carga_horaria }} horas semanais
                                </div>
                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <img alt="Ícone de localização" src={{ URL::to('img/cifrao.svg') }} />
                                    @php
                                        if ($vaga->vag_faixa_salarial) {
                                            echo "R$ " . number_format($vaga->vag_faixa_salarial, 2, ',', '.') . "/mês";
                                        } else {
                                            echo "";
                                        }
                                    @endphp
                                    @php
                                        if ($vaga->vag_beneficios) {
                                            echo " + " . $vaga->vag_beneficios;
                                        }
                                    @endphp
                                </div>
                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <img alt="Ícone de localização" src={{ URL::to('img/location.svg') }} />
                                    {{ $vaga->cid_nome ?? '' }}/{{ $vaga->cid_uf ?? '' }} - CEP: {{ $vaga->vag_cep ?? '' }}
                                </div>

                                <br>
                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <strong> Habilidades Necessárias: </strong> {{ $vaga->vag_habilidades ?? 'NÃO INFORMADO' }}
                                </div>
                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <strong> Diferenciais: </strong> {{ $vaga->vag_diferenciais ?? 'NÃO INFORMADO' }}
                                </div>
                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <strong> Outras Informações: </strong> {{ $vaga->vag_informacoes_adicionais ?? 'NÃO INFORMADO' }}
                                </div>
                                
                                <br>
                                <h5 class="card-title mb-2">ANUNCIANTE</h5>
                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <strong> Nome: </strong> {{ $vaga->div_nome }}
                                </div>
                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <strong> CNPJ: </strong> {{ $vaga->div_cnpj }}
                                </div>
                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <strong> Telefone: </strong> {{ $vaga->div_telefone }}
                                </div>
                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <strong> E-mail:</strong> {{ $vaga->div_email }}
                                </div>

                                <div class="card-text mb-2"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <strong> Endereço:</strong> {{ $vaga->div_rua ?? '' }}, {{ $vaga->div_numero ?? '' }}
                                    @php
                                        if ($vaga->div_complemento) {
                                            echo " - " .$vaga->div_complemento;
                                        } else {
                                            echo "";
                                        }
                                    @endphp
                                    - {{ $vaga->div_bairro ?? '' }} -
                                    {{ $cidade_divulgador->cid_nome ?? '' }}/{{ $cidade_divulgador->cid_uf ?? '' }}
                                </div>

                               <br>
                               <br>
                                <div class="card-text mb-2"><small class="text-muted">Aberto desde
                                        {{ date('d/m/Y', strtotime($vaga->vag_data_publicacao)) }}. Última atualização:
                                        {{ date('d/m/Y', strtotime($vaga->vag_data_alteracao)) }}</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content -->

        @endsection

        @section('script_pages')

            <!-- Null -->

        @endsection
