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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                            <h6 class="h2 text-white d-inline-block mb-2">Notas Fiscais</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-0">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></a></i></li>
                                    <li class="breadcrumb-item"><a href="{{ route('contrato') }}">Cadastro de Contrato</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('register') }}">Lista de Contratos</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('notafiscal') }}">Notas Fiscais<a></li>
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
                    <!-- Formulario de Registro -->
                        <form action="{{ route('atualizar_notafiscal', ['id' => $notafiscal->id]) }}" method="POST">
                            @csrf
                            @if (session('status2'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('status2') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            @if ($notafiscal->contrato->cliente)
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nome do Cliente</label>
                                <input type="text" style="color:black; font-weight: bold;" class="form-control" name="" value="{{$notafiscal->contrato->cliente->nome}}" disabled>
                            </div>
                            @endif
                            @if ($notafiscal->contrato->prestador)
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nome do Prestador</label>
                                <input type="text" style="color:black; font-weight: bold;" class="form-control" name="" value="{{$notafiscal->contrato->prestador->nome}}" disabled>
                            </div>
                            @endif
                            @if ($notafiscal->contrato->fornecedor)
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nome do Fornecedor</label>
                                <input type="text" style="color:black; font-weight: bold;" class="form-control" name="" value="{{$notafiscal->contrato->fornecedor->nome}}" disabled>
                            </div>
                            @endif
                            @if ($notafiscal->contrato->funcionario)
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nome do Funcionario</label>
                                <input type="text" style="color:black; font-weight: bold;" class="form-control" name="" value="{{$notafiscal->contrato->funcionario->nome}}" disabled>
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nome do Contrato</label>
                                <input type="text" style="color:black; font-weight: bold;" class="form-control" name="" value="{{$notafiscal->contrato->nome}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Numero da Nota</label>
                                <input type="text" class="form-control" name="nome" value="{{$notafiscal->nome}}">
                            </div>
                            <input type="hidden" name="contrato_id" value="{{$notafiscal->contrato->id}}">
                            <div class="form-group ml-1">
                                <label>Data</label>
                                <input class="form-control @if($errors->has('datainicial')) is-invalid @endif" type="date" name="data" value="{{$notafiscal->data}}">
                                <div class="invalid-feedback">
                                    <p>Data é Obrigatória</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Valor</label>
                                <input type="text" class="form-control" name="valor" value="{{$notafiscal->valor}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Confirmação de Pagamento</label>
                                <select class="form-control" name="confirmação">
                                    <option value="Pendente">Pendente</option>
                                    <option value="Confirmado">Confirmado</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success ">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    
</body>

</html>