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
                            <h6 class="h2 text-white d-inline-block mb-0">Pagamento Despesa</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('showdespesa') }}">Despesas</a></li>
                                    <li class="breadcrumb-item"><a>Pagamento Despesas</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Conteudo da Pagina -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Cabeçalho do Card -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Consumivel</h3>
                        </div>
                        <!-- Formulario de Registro Consumivel -->
                        <form action="{{ route('salvar_consumivel') }}" method="POST">
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

                            <div class="form-group ml-1">
                                <label for="">Cadastro de Consumivel</label>
                                <input type="checkbox" name="showField" id="showField" value="yes" onchange="myFunction()"><br />
                                <span id="nameField">
                                    <div class="custom-control custom-radio custom-control-inline ml-0">
                                        <input type="checkbox" name="sede" class="custom-control-input1" value=IPTVBRASIL>
                                        <label class="custom-control-label1" for="123">  IPTVBRASIL</label>

                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline ml-0 mb-3">
                                        <input type="checkbox" name="sede" class="custom-control-input1" value=PRÓEMPRESA>
                                        <label class="custom-control-label1" for="1234">  PRÓEMPRESA</label>
                                    </div>
                                    <div class="form-group ml-1">
                                        <label for="exampleFormControlInput1">Nome</label>
                                        <input type="text" class="form-control" name="nome">
                                    </div>
                                    <div class="form-group ml-1">
                                        <label for="exampleFormControlInput1">Data</label>
                                        <input type="date" class="form-control" name="data">
                                    </div>
                                    <div class="form-group ml-1">
                                        <label for="exampleFormControlInput1">Valor</label>
                                        <input type="text" class="form-control" name="valor">
                                    </div>
                                    <div class="form-group ml-1">
                                        <label for="exampleFormControlInput1">Nota Fiscal</label>
                                        <input type="tel" class="form-control" name="notafiscal">
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>

                            </div>
                        </form>
                        <!-- Tabela Pagamentos Pendentes -->
                        <div class="table-responsive">
                            <table class="table align-items-center table-dark table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="Nome">Nome do Cliente</th>
                                        <th scope="col" class="sort" data-sort="Nome">Contrato</th>
                                        <th scope="col" class="sort" data-sort="Nome">Numero da Nota</th>
                                        <th scope="col" class="sort" data-sort="Valor">Valor</th>
                                        <th scope="col" class="sort" data-sort="Data">Data</th>
                                        <th scope="col" class="sort" data-sort="Confirmação">Confirmação</th>
                                    </tr>
                                </thead>

                                <tbody class="list">
                                    @csrf
                                    @foreach ($notafiscals as $nota)
                                    @if ($nota->confirmação == 'Pendente')
                                    <tr>
                                        <td>
                                            @if ($nota->contrato->cliente)
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$nota->contrato->cliente->nome}} </span>
                                            </div>
                                            @endif
                                            @if ($nota->contrato->prestador)
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$nota->contrato->prestador->nome}} </span>
                                            </div>
                                            @endif
                                            @if ($nota->contrato->fornecedor)
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$nota->contrato->fornecedor->nome}} </span>
                                            </div>
                                            @endif
                                            @if ($nota->contrato->funcionario)
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$nota->contrato->funcionario->nome}} </span>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$nota->contrato->nome}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$nota->nome}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$nota->valor}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$nota->data}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$nota->confirmação}} </span>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('editar_notafiscal', ['id'=>$nota->id])}}">Editar</a>
                                                    <a class="dropdown-item" href="{{ route('excluir_notafiscal', ['id'=>$nota->id])}}">Remover</a>
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
                        <!-- Formularios -->
                        <form>
                            <!-- Botão Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Selecione</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Selecione o contrato
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            <button type="button" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        $('#nameField').css('display', 'none'); // Esconde o campo te texto por padrão
        function myFunction() {
            if ($('#showField').prop('checked')) {
                $('#nameField').css('display', 'block');
            } else {
                $('#nameField').css('display', 'none');
            }
        }
    </script>
</body>

</html>