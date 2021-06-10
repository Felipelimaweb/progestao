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
                            <h6 class="h2 text-white d-inline-block mb-0">Clientes</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a>Cadastro</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
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
                        <form action="{{ route('atualizar_funcionario', ['id' => $funcionario->id]) }}" method="POST">
                            @csrf
                            @if (session('status2'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('status2') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <div class="form-group custom-radio custom-control-inline ml-0">
                                <input type="radio" required name="sede" class="custom-control-input1" value=IPTVBRASIL>
                                <label class="custom-control-label1" for="123">  IPTVBRASIL</label>

                            </div>
                            <div class="form-group custom-radio custom-control-inline ml-0 mb-3">
                                <input type="radio" name="sede" class="custom-control-input1" value=PRÓEMPRESA>
                                <label class="custom-control-label1" for="1234">  PRÓEMPRESA</label>
                            </div>

                            <div class="form-group ml-1">
                                <label for="">Nome</label>
                                <input type="text" class="form-control @if($errors->has('nome')) is-invalid @endif" name="nome" value="{{$funcionario->nome}}">
                                <div class="invalid-feedback">
                                    <p>Nome é Obrigatório</p>
                                </div>
                            </div>
                            <div class="form-group ml-1">
                                <label for="">CPF</label>
                                <input type="text" class="form-control @if($errors->has('cpf')) is-invalid @endif" name="cpf" placeholder="123.456.789-00" onkeypress="$(cpf).mask('000.000.000-00')" value="{{$funcionario->cpf}}">
                                <div class="invalid-feedback">
                                    <p>CPF é Obrigatório</p>
                                </div>
                            </div>
                            <div class="form-group ml-1">
                                <label for="">E-Mail</label>
                                <input type="text" class="form-control @if($errors->has('email')) is-invalid @endif" name="email" placeholder="PróEmpre@infproempresa.com.br" value="{{$funcionario->email}}">
                                <div class="invalid-feedback">
                                    <p>E-Mail é Obrigatório</p>
                                </div>
                            </div>
                            <div class="form-group ml-1">
                                <label for="">Telefone</label>
                                <input type="text" class="form-control @if($errors->has('telefone')) is-invalid @endif" name="telefone" placeholder="(61) 98544-1862" onkeypress="$(telefone).mask('(00) 00000-0000')" value="{{$funcionario->telefone}}">
                                <div class="invalid-feedback">
                                    <p>Telefone é Obrigatório</p>
                                </div>
                            </div>
                            <div class="form-group ml-1">
                                <label for="">Cargo</label>
                                <input type="text" class="form-control @if($errors->has('cargo')) is-invalid @endif" name="cargo" value="{{$funcionario->cargo}}">
                                <div class="invalid-feedback">
                                    <p>Cargo é Obrigatório</p>
                                </div>
                            </div>
                            <div class="form-group ml-1">
                                <label for="">Salario</label>
                                <input type="text" class="form-control @if($errors->has('salario')) is-invalid @endif" name="salario" placeholder="R$" onkeypress="$(salario).mask('R$ #.##0,00', {reverse: true});" value="{{$funcionario->salario}}">
                                <div class="invalid-feedback">
                                    <p>Salario é Obrigatório</p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>
</body>

</html>