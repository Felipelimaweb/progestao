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
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav BarraTop -->
        @include('layouts.navbars.topnav')
        <!-- Cabeçalho -->
        <div class="header bg-primary py-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Despesas</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Despesas</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('pagamentodespesa') }}">Pagamento Despesas</a></li>
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
        <!-- Conteudo da Pagina -->
        @csrf
        <div class="container-fluid mt--7">
            <div class="row">
                <!-- Tabela de Consumiveis -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Consumiveis</h5>
                                    <span class="h2 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="ni ni-cart"></i>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Data</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @csrf
                                        @foreach ($consumiveis as $consumivel)
                                        <tr>
                                            <td>{{$consumivel->nome}}</td>
                                            <td>{{$consumivel->data}}</td>
                                            <td>{{$consumivel->valor}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <span class="h2 font-weight-bold mb-0">Valor Total: {{$consumiveis->sum('valor')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tabela de Prestadores -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Prestadores</h5>
                                    <span class="h2 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-user"></i>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Contrato</th>
                                            <th scope="col">Nota Fiscal</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($notafiscals as $nota)
                                        @if ($nota->contrato->prestador)
                                        <tr>
                                            <td>{{$nota->contrato->prestador->nome}}</td>
                                            <td>{{$nota->contrato->nome}}</td>
                                            <td>{{$nota->nome}}</td>
                                            <td>{{$nota->valor}}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                                
                                
                                <span class="h2 font-weight-bold mb-0">Total: {{$total_prestador}} </span>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tabela de Funcionarios -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Funcionarios</h5>
                                    <span class="h2 font-weight-bold mb-0"></span>

                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Contrato</th>
                                            <th scope="col">Nota Fiscal</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                    
                                        @foreach ($notafiscals as $nota)
                                        @if ($nota->contrato->funcionario)
                                        <tr>
                                            <td>{{$nota->contrato->funcionario->nome}}</td>
                                            <td>{{$nota->contrato->nome}}</td>
                                            <td>{{$nota->nome}}</td>
                                            <td>{{$nota->valor}}</td>
                                        </tr>
                                        @endif
                                        @endforeach

                                    </tbody>
                                </table>
                                <span class="h2 font-weight-bold mb-0">Total: {{$total_funcionario}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tabela de Fornecedores -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Fornecedores</h5>
                                    <span class="h2 font-weight-bold mb-0"></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="fas fa-bus"></i>
                                    </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Contrato</th>
                                            <th scope="col">Nota Fiscal</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                    @foreach ($notafiscals as $nota)
                                        @if ($nota->contrato->fornecedor)
                                        <tr>
                                            <td>{{$nota->contrato->fornecedor->nome}}</td>
                                            <td>{{$nota->contrato->nome}}</td>
                                            <td>{{$nota->nome}}</td>
                                            <td>{{$nota->valor}}</td>
                                        </tr>
                                        @endif
                                        @endforeach

                                    </tbody>
                                </table>
                                <span class="h2 font-weight-bold mb-0">Total: {{$total_fornecedor}}</span>
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
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>