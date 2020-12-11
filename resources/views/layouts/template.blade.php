<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href={{ URL::to('img/logo.png') }}>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;700&display=swap" rel="stylesheet">

    <!-- MDBootstrap Datatables  -->
    <link href={{ URL::to('css/addons/datatables2.min.css') }} rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    {{--
    <!-- BBBootstrap mask  -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    --}}

    <!-- Custom fonts for this template -->
    <link href={{ URL::to('css/style.css') }} rel="stylesheet" type="text/css">
    <link href={{ URL::to('vendor/fontawesome-free/css/all.min.css') }} rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href={{ URL::to('css/sb-admin-2.min.css') }} rel="stylesheet">
    <link href={{ URL::to('css/sb-admin-2.css') }} rel="stylesheet">

    <!-- DataTables Select CSS -->
    <link href={{ URL::to('css/addons/datatables-select2.min.css') }} rel="stylesheet">

    <title>SO | @yield('titulo')</title>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ URL::to('/') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img id="logo" src={{ URL::to('img/logo_branco.png') }} alt="" srcset="">
                    <!--<i class="fas fa-laugh-wink"></i>-->
                </div>
                <div class="sidebar-brand-text mx-3">{{ __('SO') }}<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item collapsed">
                <a class="nav-link" href={{ route('publico') }}>
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{ __('Painel de Controle') }}</span></a>
            </li>
            
            {{-- <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <li class="nav-item collapsed">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar-se') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            </div>
                        </li>
                @endguest
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                {{ __('Cadastro') }}
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOportunidade"
                    aria-expanded="true" aria-controls="collapseOportunidade">
                    <i class="fas fa-lightbulb"></i>
                    <span>{{ __('Oportunidade') }}</span>
                </a>
                <div id="collapseOportunidade" class="collapse" aria-labelledby="headingOportunidade"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">{{ __('Manutenção') }}</h6>
                        <a class="collapse-item" href={{ route('vagas.index') }}><i
                                class="fas fa-search-plus mr-1"></i>{{ __('Vagas') }}</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnunciante"
                    aria-expanded="true" aria-controls="collapseAnunciante">
                    <i class="fas fa-bullhorn"></i>
                    <span>{{ __('Anunciante') }}</span>
                </a>
                <div id="collapseAnunciante" class="collapse" aria-labelledby="headingAnunciante"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">{{ __('Manutenção') }}</h6>
                        <a class="collapse-item" href={{ route('divulgadores.index') }}><i
                                class="fas fa-bullhorn mr-1"></i>{{ __('Anunciante') }}</a>
                        <a class="collapse-item" href={{ route('tipocontratacoes.index') }}><i
                                class="fas fa-file-signature mr-1"></i>{{ __('Tipo de Contratação') }}</a>
                        <a class="collapse-item" href={{ route('formatotrabalhos.index') }}><i
                                class="fas fa-briefcase mr-1"></i>{{ __('Formato de Trabalho') }}</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseParametro"
                    aria-expanded="true" aria-controls="collapseParametro">
                    <i class="fas fa-cogs"></i>
                    <span>{{ __('Parâmetros') }}</span>
                </a>
                <div id="collapseParametro" class="collapse" aria-labelledby="headingParametro"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">{{ __('Manutenção') }}</h6>
                        <a class="collapse-item" href={{ route('cidade.index') }}><i
                                class="fas fa-city mr-1"></i>{{ __('Cidade') }}</a>
                        <a class="collapse-item" href={{ route('area.index') }}><i
                                class="fas fa-laptop-code mr-1"></i>{{ __('Área de Atuação') }}</a>
                    </div>
                </div>
            </li>




            <!-- Divider -->
            
            <hr class="sidebar-divider">

            {{--
            Heading -->
            <div class="sidebar-heading">
                {{ __('Outros') }}
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRelatorio"
                    aria-expanded="true" aria-controls="collapseRelatorio">
                    <i class="fas fa-file-export"></i>
                    <span>{{ __('Relatórios') }}</span>
                </a>
                <div id="collapseRelatorio" class="collapse" aria-labelledby="headingRelatorio"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">{{ _('Pessoas:') }}</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-user-tie mr-1"></i>{{ __('Clientes') }}</a>
                        <a class="collapse-item" href="#"><i
                                class="fas fa-id-card-alt mr-1"></i>{{ __('Funcionários') }}</a>
                        <a class="collapse-item" href="#"><i class="fas fa-id-badge mr-1"></i>{{ __('Usuários') }}</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">{{ __('Território:') }}</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-spa mr-1"></i>{{ __('Culturas') }}</a>
                        <a class="collapse-item" href="#"><i
                                class="fas fa-money-bill-alt mr-1"></i>{{ __('Potencial de Negócios') }}</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">{{ __('Operações') }}:</h6>
                        <a class="collapse-item" href="#"><i class="fas fa-crosshairs mr-1"></i>{{ __('Metas') }}</a>
                        <a class="collapse-item" href="#"><i
                                class="fas fa-money-bill-alt mr-1"></i>{{ __('Vendas') }}</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">{{ __('Parâmetros:') }}</h6>
                        <a class="collapse-item" href="#"><i
                                class="fas fa-business-time mr-1"></i>{{ __('Programas de Negócio') }}</a>
                        <a class="collapse-item" href="#"><i class="fas fa-box-open mr-1"></i>{{ __('Produtos') }}</a>
                        <a class="collapse-item" href="#"><i
                                class="fas fa-boxes mr-1"></i>{{ __('Grupos de Produto') }}</a>
                        <a class="collapse-item" href="#"><i class="fas fa-calendar mr-1"></i>{{ __('Safras') }}</a>
                    </div>
                </div>
            </li> --}}

            {{--
            <!-- Nav Item - Charts -->
            {{--
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>{{ __('Gráficos') }}</span></a>
            </li> 

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">--}}

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div>
                        <h1 id="system-title" class="h3 mb-0 text-gray-800 font-weight-bold font-italic">
                            {{ __('Sistema de Oportunidades') }}
                        </h1>

                    </div>
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600"></span>

                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Perfil') }}
                                </a>
                                <a class="dropdown-item" href="#">
                                    <!--<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                    <i class="fas fa-cogs fa-sm fa-key mr-2 text-gray-400"></i>
                                    {{ __('Alterar Senha') }}
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Registro de Atividades') }}
                                    </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Sair') }}
                                </a>
                            </div>
                        </li> 

                        <li class="nav-item collapsed">
                            @guest
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-danger" href="{{ route('register') }}">{{ __('Cadastrar-se') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-danger" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                    </li>
                                @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
            
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                        </div>
                                    </li>
                            @endguest
                        </li>
                    </ul>
                </nav>

                <!-- Alert Start  -->
                
                @if (\Session::has('error'))
                @php
                    dd("entrou aqui");
                @endphp
                    <div class="toast-body">
                        <div class="alert alert-danger">
                            <p>{{ \Session::get('error') }}</p>
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <!-- ou (count($errors) > 0)-->
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               
                @if (\Session::has('success'))
                    <div class="toast-body">
                        <div class="alert alert-success">
                            <p>{{ \Session::get('success') }}</p>
                        </div>
                    </div>
                @endif

                <!-- Alert End  -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                @yield('content')

                <!-- /.container-fluid -->

                <!-- Form Modal-->
                <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="ModalLabel">{{ __('Pronto para sair?') }}</h3>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ __('Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual.') }}
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button"
                                    data-dismiss="modal">{{ __('Cancelar') }}</button>
                                <a class="btn btn-primary" href="login.html">{{ __('Sair') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ __('ADS CASCA - NÍVEL 5 - 2020.2') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">{{ __('Pronto para sair?') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('Selecione "Sair" abaixo se você estiver pronto para encerrar sua sessão atual.') }}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                    <a class="btn btn-danger" href="{{ url('logout') }}">{{ __('Sair') }}</a>
                </div>
            </div>
        </div>
    </div> --}}

    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>

    <!-- Bootstrap core JavaScript-->
    {{-- --}}<script
        src={{ URL::to('vendor/jquery/jquery.min.js') }}></script>
    <script src={{ URL::to('vendor/bootstrap/js/bootstrap.bundle.min.js') }}></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Core plugin JavaScript-->
    <script src={{ URL::to('vendor/jquery-easing/jquery.easing.min.js') }}></script>

    <!-- Custom scripts for all pages-->
    <script src={{ URL::to('js/sb-admin-2.min.js') }}></script>

    <!-- JS -->
    <script src={{ URL::to('js/javascript.js') }} type="text/javascript"></script>

    <!-- Page level plugins -->
    <script src={{ URL::to('vendor/chart.js/Chart.min.js') }}></script>

    <!-- Page level custom scripts -->
    {{--<script src={{ URL::to('js/demo/chart-area-demo.js') }}></script>
    <script src={{ URL::to('js/demo/chart-pie-demo.js') }}></script> --}}
    <script src={{ URL::to('js/demo/datatables-demo.js') }}></script>

    <!-- DataTables JS -->

    <script src={{ URL::to('js/addons/datatables2.min.js') }} type="text/javascript"></script>
    <script src={{ URL::to('js/mask.min.js') }} type="text/javascript"></script>

    <!-- DataTables Select JS -->
    <script src={{ URL::to('js/addons/datatables-select2.min.js') }} type="text/javascript"></script>
    <script src={{ URL::to('vendor/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ URL::to('vendor/datatables/dataTables.bootstrap4.min.js') }}></script>

    <!-- MDBootstrap Datatables  -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    {{--
    <!-- BBBootstrap Mask  -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    --}}


    <script type="text/javascript">
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });

        //Seleção de filtro
        $(document).ready(function() {
            $('.datatable').dataTable({
                initComplete: function() {
                    this.api().columns().every(function() {
                        var column = this;
                        var select = $(
                                '<select  class="browser-default custom-select form-control-sm"><option value="" SELECTED>Selecionar</option></select>'
                            )
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true,
                                        false)
                                    .draw();
                            });
                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });
                    });
                },

                "language": {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        }
                    },
                    "buttons": {
                        "copy": "Copiar para a área de transferência",
                        "copyTitle": "Cópia bem sucedida",
                        "copySuccess": {
                            "1": "Uma linha copiada com sucesso",
                            "_": "%d linhas copiadas com sucesso"
                        }
                    }
                }
            });
        });

    </script>

    <!-- Start script for specific page -->
    @yield('script_pages')
    <!-- End script for specific page -->

</body>

</html>
