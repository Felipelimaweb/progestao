<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PRÓGESTÃO - Sistema de gestão financeira</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Extra details for Live View on GitHub Pages -->

    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
    <!-- Sidenav BarraLateral-->
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
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-0">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a>Clientes</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('registerfornecedor') }}">Fornecedores</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('registerfuncionario') }}">Funcionarios</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('registerprestador') }}">Prestadores</a></li>
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
        <!-- Page content -->

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Cabeçalho do Card -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Cadastro</h3>
                        </div>
                        <!-- Formularios de Registro -->
                        <form action="{{ route('salvar_cliente') }}" method="POST">
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

                            <div class="form-group custom-control-inline ml-0">
                                <input type="radio" class="custom-control-input1" name="sede" value=IPTVBRASIL>
                                <label class="custom-control-label1">  IPTVBRASIL</label>

                            </div>
                            <div class="form-group custom-control-inline ml-0 mb-3">
                                <input type="radio" required class="custom-control-input1 @if($errors->has('sede')) is-invalid @endif" name="sede" value=PRÓEMPRESA>
                                <label class="custom-control-label1">  PRÓEMPRESA</label>
                                <div class="invalid-feedback">
                                    <p>Sede é Obrigatório</p>
                                </div>
                            </div>

                            <div class="form-group ml-1">
                                <label for="">Nome</label>
                                <input type="text" class="form-control @if($errors->has('nome')) is-invalid @endif" name="nome">
                                <div class="invalid-feedback">
                                    <p>Nome é Obrigatório</p>
                                </div>
                            </div>
                            <div class="form-group ml-1">
                                <label for="">CNPJ</label>
                                <input type="text" class="form-control @if($errors->has('cnpj')) is-invalid @endif" name="cnpj" placeholder="12.345.678/0001-00" onkeypress="$(cnpj).mask('00.000.000/0000-00')">
                                <div class="invalid-feedback">
                                    <p>CNPJ é Obrigatório</p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>


                        </form>
                    </div>
                </div>
            </div>
            <!-- Tabela Clientes -->
            <div class="row">
                <div class="col">
                    <div class="card bg-default shadow">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Clientes</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-dark table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="Sede">Sede</th>
                                        <th scope="col" class="sort" data-sort="Nome">Nome da Empresa</th>
                                        <th scope="col" class="sort" data-sort="CNPJ">CNPJ</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @csrf
                                    @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$cliente->sede}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$cliente->nome}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$cliente->cnpj}} </span>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <!-- <a href="{{ route('incluir_notafiscal', ['id'=>$cliente->id])}}" class="btn btn-outline-secondary" tabindex="-1" role="button">Contrato</a> -->
                                            <a href="{{ route('editar_cliente', ['id'=>$cliente->id])}}" class="btn btn-outline-info" tabindex="-1" role="button">Editar</a>
                                            <a href="{{ route('excluir_cliente', ['id'=>$cliente->id])}}" class="btn btn-outline-danger" tabindex="-1" role="button">X</a>
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
    <!-- Argon Scripts -->
    <!-- Core -->
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