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
                            <h6 class="h2 text-white d-inline-block mb-0">Lista de Contratos</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-0">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></a></i></li>
                                    <li class="breadcrumb-item"><a href="{{ route('contrato') }}">Cadastro de Contrato</a></li>
                                    <li class="breadcrumb-item">Lista de Contratos</li>
                                    <li class="breadcrumb-item"><a href="{{ route('notafiscal') }}">Notas Fiscais</a></li>
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
        <div class="container-fluid mt--7">

            <!-- Tabela Clientes -->
            <div class="row">
                <div class="col">
                    <div class="card bg-default shadow">
                        @if (session('status1'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('status1') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Contratos</h3>
                        </div>
                        <!--  Inicio Script Contratos   -->
                        <div class="form-group ml-1">
                            <select name="tipo" id="tipo" class="form-control">
                                <option value="0">
                                    <p>Selecione o Tipo de Contrato</p>
                                </option>
                                <option value="cli">Cliente</option>
                                <option value="for">Fornecedor</option>
                                <option value="fun">Funcionario</option>
                                <option value="pre">Prestador</option>
                            </select>
                        </div>
                        <!--  Seleção de Tabelas  -->
                        
                        <div id="showcliente" class="form-group-md-2">
                         <!--  Tabela Contrato Cliente  -->
                            <div class="table-responsive">
                                <table class="table align-items-center table-dark table-flush">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="Sede">Nome do Contrato</th>
                                            <th scope="col" class="sort" data-sort="Nome">Cliente</th>
                                            <th scope="col" class="sort" data-sort="CNPJ">CNPJ</th>
                                            <th scope="col" class="sort" data-sort="contrato">Nota Fiscal</th>
                                            <th scope="col" class="sort" data-sort="contrato">Valor do Contrato</th>
                                            <th scope="col" class="sort" data-sort="confirmacao">Confirmação de Pagamento</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @csrf
                                        @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        @foreach ($contratos as $cli)
                                        @if ($cli->cliente)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->nome}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->cliente->nome}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->cliente->cnpj}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group align-items-center">
                                                    <span class="text-right"> #Nota fiscal</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group align-items-center">
                                                    <span class="text-right"> {{$cli->valor}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" id="confirmacao">
                                                        <option>Confirmado</option>
                                                        <option>Pendente</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                        <a class="dropdown-item" href="{{ route('editar_contrato', ['id'=>$cli->id])}}">Editar</a>
                                                        <a class="dropdown-item" href="{{ route('excluir_contrato', ['id'=>$cli->id])}}">Remover</a>
                                                        <a class="dropdown-item" href="{{ route('incluir_notafiscal', ['id'=>$cli->id])}}">Incluir Nota Fiscal</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
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
                        <div id="showfornecedor" class="form-group-md-2">
                         <!--  Tabela Contrato Fornecedor  -->
                            <div class="table-responsive">
                                <table class="table align-items-center table-dark table-flush">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="Sede">Nome do Contrato</th>
                                            <th scope="col" class="sort" data-sort="Nome">Fornecedor</th>
                                            <th scope="col" class="sort" data-sort="CNPJ">CNPJ</th>
                                            <th scope="col" class="sort" data-sort="contrato">Nota Fiscal</th>
                                            <th scope="col" class="sort" data-sort="contrato">Valor do Contrato</th>
                                            <th scope="col" class="sort" data-sort="confirmacao">Confirmação de Pagamento</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @csrf
                                        @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        @foreach ($contratos as $cli)
                                        @if ($cli->fornecedor)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->nome}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->fornecedor->nome}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->fornecedor->cnpj}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group align-items-center">
                                                    <span class="text-right"> #Nota fiscal</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group align-items-center">
                                                    <span class="text-right"> {{$cli->valor}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" id="confirmacao">
                                                        <option>Confirmado</option>
                                                        <option>Pendente</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="{{ route('editar_contrato', ['id'=>$cli->id])}}">Editar</a>
                                                        <a class="dropdown-item" href="#{{ route('excluir_contrato', ['id'=>$cli->id])}}">Remover</a>
                                                        <a class="dropdown-item" href="{{ route('incluir_notafiscal', ['id'=>$cli->id])}}">Incluir Nota Fiscal</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
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
                        <div id="showfuncionario" class="form-group-md-2">
                         <!--  Tabela Contrato Funcionario  -->
                            <div class="table-responsive">
                                <table class="table align-items-center table-dark table-flush">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="Sede">Nome do Contrato</th>
                                            <th scope="col" class="sort" data-sort="Nome">Funcionario</th>
                                            <th scope="col" class="sort" data-sort="Salario">Salario</th>
                                            <th scope="col" class="sort" data-sort="contrato">Nota Fiscal</th>
                                            <th scope="col" class="sort" data-sort="contrato">Valor do Contrato</th>
                                            <th scope="col" class="sort" data-sort="confirmacao">Confirmação de Pagamento</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @csrf
                                        @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        @foreach ($contratos as $cli)
                                        @if ($cli->funcionario)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->nome}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->funcionario->nome}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->funcionario->salario}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group align-items-center">
                                                    <span class="text-right"> #Nota fiscal</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group align-items-center">
                                                    <span class="text-right"> {{$cli->valor}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" id="confirmacao">
                                                        <option>Confirmado</option>
                                                        <option>Pendente</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="{{ route('editar_contrato', ['id'=>$cli->id])}}">Editar</a>
                                                        <a class="dropdown-item" href="{{ route('excluir_contrato', ['id'=>$cli->id])}}">Remover</a>
                                                        <a class="dropdown-item" href="{{ route('incluir_notafiscal', ['id'=>$cli->id])}}">Incluir Nota Fiscal</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
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
                        <div id="showprestador" class="form-group-md-2">
                         <!--  Tabela Contrato Prestador  -->
                            <div class="table-responsive">
                                <table class="table align-items-center table-dark table-flush">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col" class="sort" data-sort="Sede">Nome do Contrato</th>
                                            <th scope="col" class="sort" data-sort="Nome">Prestador</th>
                                            <th scope="col" class="sort" data-sort="CNPJ">CNPJ</th>
                                            <th scope="col" class="sort" data-sort="contrato">Nota Fiscal</th>
                                            <th scope="col" class="sort" data-sort="contrato">Valor do Contrato</th>
                                            <th scope="col" class="sort" data-sort="confirmacao">Confirmação de Pagamento</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @csrf
                                        @if (session('status'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('status') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        @endif
                                        @foreach ($contratos as $cli)
                                        @if ($cli->prestador)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->nome}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->prestador->nome}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="text-right"> {{$cli->prestador->cnpj}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group align-items-center">
                                                    <span class="text-right"> #Nota fiscal</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group align-items-center">
                                                    <span class="text-right"> {{$cli->valor}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" id="confirmacao">
                                                        <option>Confirmado</option>
                                                        <option>Pendente</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                        <a class="dropdown-item" href="{{ route('editar_contrato', ['id'=>$cli->id])}}">Editar</a>
                                                        <a class="dropdown-item" href="{{ route('excluir_contrato', ['id'=>$cli->id])}}">Remover</a>
                                                        <a class="dropdown-item" href="{{ route('incluir_notafiscal', ['id'=>$cli->id])}}">Incluir Nota Fiscal</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
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
    <script>
        $(document).ready(function() {
            $('#showcliente').closest('div').hide();
            $('#showfornecedor').closest('div').hide();
            $('#showfuncionario').closest('div').hide();
            $('#showprestador').closest('div').hide();
            $('#tipo').change(function() {
                var tipoescolhido = $('#tipo option:selected').text();
                if (tipoescolhido == 'Cliente') {
                    debugger
                    $('#showcliente').closest('div').show();
                } else {
                    $('#showcliente').closest('div').hide();
                }
                if (tipoescolhido == 'Fornecedor') {
                    debugger
                    $('#showfornecedor').closest('div').show();
                } else {
                    $('#showfornecedor').closest('div').hide();
                }
                if (tipoescolhido == 'Funcionario') {
                    debugger
                    $('#showfuncionario').closest('div').show();
                } else {
                    $('#showfuncionario').closest('div').hide();
                }
                if (tipoescolhido == 'Prestador') {
                    debugger
                    $('#showprestador').closest('div').show();
                } else {
                    $('#showprestador').closest('div').hide();
                }


            });
        });
    </script>

</body>

</html>