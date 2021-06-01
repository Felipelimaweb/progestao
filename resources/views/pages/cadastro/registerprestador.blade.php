<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PRÓGESTÃO - Sistema de gestão financeira</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
    <!-- Sidenav BarraLateral -->
    @include('layouts.navbars.sidebar')
    <!-- Conteudo Principal -->
    <div class="main-content" id="panel">
        <!-- Topnav BarraTopo -->
        @include('layouts.navbars.topnav')
        <!-- Cabeçalho -->
        <div class="header bg-primary py-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Prestadores</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Cadastro</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Prestadores</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-lg-6 col-5 text-right">
                            <a href="#" class="btn btn-sm btn-neutral">Novo</a>
                            <a href="#" class="btn btn-sm btn-neutral">Filtros</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Conteudo da pagina -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Cabeçalho do Card -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Cadastro</h3>
                        </div>
                        <!-- Formulario de Registro -->
                        <form action="{{ route('salvar_prestador') }}" method="POST">
                            @csrf
                            @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if (session('status1'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('status1') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <div class="custom-control custom-radio custom-control-inline ml-0">
                                <input type="checkbox" name="sede" class="custom-control-input1" value=IPTVBRASIL>
                                <label class="custom-control-label1" for="123">  IPTVBRASIL</label>

                            </div>
                            <div class="custom-control custom-radio custom-control-inline ml-0 mb-3">
                                <input type="checkbox" name="sede" class="custom-control-input1" value=PRÓEMPRESA>
                                <label class="custom-control-label1" for="1234">  PRÓEMPRESA</label>
                            </div>

                            <div class="form-group ml-1">
                                <label for="">Nome</label>
                                <input type="text" class="form-control" name="nome">
                            </div>
                            <div class="form-group ml-1">
                                <label for="">CNPJ</label>
                                <input type="text" class="form-control" name="cnpj" placeholder="12.345.678/0001-00" onkeypress="$(cnpj).mask('00.000.000/000-00')">
                            </div>
                            <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>


                        </form>
                    </div>
                </div>
            </div>
            <!-- Tabela Prestadores -->
            <div class="row ">
                <div class="col ">
                    <div class="card bg-default shadow">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Prestadores</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-dark table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="sede">Sede</th>
                                        <th scope="col" class="sort" data-sort="nome">Nome do Prestador</th>
                                        <th scope="col" class="sort" data-sort="contrato">Contrato</th>
                                        <th scope="col" class="sort" data-sort="notafiscal">Nota Fiscal</th>
                                        <th scope="col" class="sort" data-sort="valor">Valor</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @csrf
                                    @foreach ($prestadores as $prestador)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$prestador->sede}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$prestador->nome}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$prestador->cnpj}} </span>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Editar</a>
                                                    <a class="dropdown-item" href="{{ route('excluir_prestador', ['id'=>$prestador->id])}}">Remover</a>
                                                    <a class="dropdown-item" href="#">Vincular Contrato</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach


                                </tbody>
                            </table>
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">
                                                <i class="fas fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="fas fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- RodaPé -->
            @include('layouts.footers.auth')
        </div>
    </div>
    <!-- Scripts JQuery/ JS / Bootstrap -->
    <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>
    
</body>

</html>