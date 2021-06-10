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
    <!-- Sidenav Barralateral -->
    @include('layouts.navbars.sidebar')
    <!-- Conteudo Principal -->
    <div class="main-content" id="panel">
        <!-- Topnav BarraTop -->
        @include('layouts.navbars.topnav')
        <!-- Cabeçalho -->
        <div class="header bg-primary py-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Contratos</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Cadastro</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contratos</li>
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

            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Cabeçalho do Card -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Cadastro</h3>
                        </div>
                        <!-- Formulario de Registro -->
                        <form action="{{ route('atualizar_contrato', ['id' => $contrato->id]) }}" method="POST">
                            @csrf
                            @if (session('status2'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('status2') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            
                            <input value="{{$contrato->cliente_id}}">
                            <input value="{{$contrato->prestador_id}}">
                            <div class="form-group ml-1">
                                <label>Nome ou Numero do Contrato</label>
                                <input type="text" class="form-control" name="nome" value="{{$contrato->nome}}">
                                <div class="invalid-feedback">
                                    <p>Nome ou Numero do Contrato é Obrigatório</p>
                                </div>
                            </div>

                            <div class="form-group ml-1">
                                <label>Data de Inicio</label>
                                <input class="form-control @if($errors->has('datainicial')) is-invalid @endif" type="date" name="datainicial" value="{{$contrato->datainical}}">
                                <div class="invalid-feedback">
                                    <p>Data é Obrigatória</p>
                                </div>
                                <input type="checkbox" name="showField" id="showField" value="yes" onchange="myFunction()"> 
                                <label for="exampleFormControlInput1">Periodo Indeterminado</label>
                                <span id="nameField">
                                    <label for="exampleFormControlInput1">Data de Termino</label>
                                    <input class="form-control" type="date" name="datafinal" value="{{$contrato->datafinal}}">
                                </span>
                            </div>
                            <label> Tipo de Despesa</label><br>
                            <div class="form-group custom-radio custom-control-inline"> 
                                <input type="radio" required name="tipo" value="Despesa Fixa">
                                <label> Despesa Fixa</label>

                            </div>
                            <div class="form-group custom-radio custom-control-inline ml-0 mb-3">
                                <input type="radio" name="tipo" value="Despesa Variavel">
                                <label> Despesa Variavel</label>
                            </div>
                            <div class="form-group ml-1">
                                <label>Objeto do Contrato</label>
                                <input class="form-control" name="objeto" value="{{$contrato->objeto}}"></input>
                            </div>
                            <div class="form-group ml-1">
                                <label>Ciclo de pagamento</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline ml-1">
                                <input type="radio" required id="customRadioInline5" name="ciclo" class="custom-control-input" value="Mensal">
                                <label class="custom-control-label" for="customRadioInline5">Mensal</label>

                            </div>
                            <div class="custom-control custom-radio custom-control-inline ml-1 mb-3">
                                <input type="radio" id="customRadioInline6" name="ciclo" class="custom-control-input" value="Anual">
                                <label class="custom-control-label" for="customRadioInline6">Anual</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline ml-1 mb-3">
                                <input type="radio" id="customRadioInline7" name="ciclo" class="custom-control-input" value="Empreitada">
                                <label class="custom-control-label" for="customRadioInline7">Empreitada</label>
                            </div>
                            <div class="form-group ml-1">
                                <label for="exampleFormControlInput1">Valor do Contrato</label>
                                <input class="form-control" name="valor" value="{{$contrato->valor}}"></input>
                            </div>

                            <button type="submit" class="btn btn-success ">Cadastrar</button>


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
        $('#nameField').css('display', 'block'); // Esconde a caixa de texto por padrão
        function myFunction() {
            if ($('#showField').prop('checked')) {
                $('#nameField').css('display', 'none');
            } else {
                $('#nameField').css('display', 'block');
            }
        }
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    
</body>

</html>