@extends('layouts.template')

@section('titulo', 'Início')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 id="page-title" class="h3 mb-0 text-gray-800 font-weight-bold">Tela Inicial</h1>
        </div>
        --}}

        <!-- Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Público</h6>
            </div>
            <div class="card-body" align="center">
            <h5>Gestor de Oportunidades</h5>
                <div class="row">
                @foreach ($vagas as $obj)
                <div class="card col-md-6">
                    <div class="card" style="margin: 15px 0;">
                        <div class="foto" style="height: 100px; 
                            width: 100%; 
                            background-image: url('https://www.woelfer.com.br/wp-content/uploads/2019/05/Aperto-de-m%C3%A3os-875x330.jpg');
                            background-size: cover;
                            background-position: center center;
                            opacity: 0.2;"
                        ></div>
                        
                        <div class="card-body" style="text-align: left;">
                            <h5 class="card-title" style="text-align: center;">{{$obj->area_nome}}</h5>
                            <div class="card-text" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><strong>Divulgador:</strong> {{$obj->div_nome}}</div>
                            <div class="card-text" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><strong>Cidade:</strong> {{$obj->cid_nome}} - {{$obj->cid_uf}}</div>
                            <div class="card-text" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><strong>Tipo da contratação:</strong> {{$obj->tip_nome}}</div>
                            
                            <div class="card-text" style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><strong>Habilidades:</strong> {{$obj->vag_habilidades}}</div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="detalhes/{{$obj->id}}" class="btn_crud btn btn-primary btn-sm details">Ver detalhes da vaga</a>
                                    <!--<button class="btn btn-sm btn-primary">Ver detalhes da vaga</button>-->
                                </div>
                                <div class="col-md-6">
                                    <div class="card-text"><small class="text-muted" style="float: right; margin-top: 15px;">Última atualização {{date('d/m/Y', strtotime($obj->vag_data_alteracao))}}</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </div>
        <!-- End Content -->

    @endsection

    @section('script_pages')

        

        <!-- Null -->

    @endsection
