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
    <link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
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
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-0">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></a></i></li>
                                    <li class="breadcrumb-item">Cadastro de Contrato</li>
                                    <li class="breadcrumb-item"><a href="{{ route('register') }}">Lista de Contratos</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('notafiscal') }}">Notas Fiscais</a></li>
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
                            <h3 class="mb-0">Contrato Fornecedores</h3>
                        </div>
                        <!-- Formulario de Registro -->
                        <form action="{{ route('contratofornecedor', ['id' => $fornecedor->id]) }}" method="POST">
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
                            @if (session('status2'))
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                {{ session('status2') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <div class="form-group ml-1">
                                <label for="">Nome</label>
                                <input type="text" style="color:black; font-weight: bold;" class="form-control" name="nome" value="{{$fornecedor->nome}}">
                                <div class="invalid-feedback">
                                    <p>Nome é Obrigatório</p>
                                </div>
                            </div>
                            <input type="hidden" name="fornecedor_id" value="{{$fornecedor->id}}">

                            <div class="form-group ml-1">
                                <label>Nome ou Numero do Contrato</label>
                                <input type="text" class="form-control @if($errors->has('nome')) is-invalid @endif" name="nome">
                                <div class="invalid-feedback">
                                    <p>Nome ou Numero do Contrato é Obrigatório</p>
                                </div>
                            </div>
                            <div class="input-daterange row align-items-start ">
                                <div class="col-6 col-sm-2 ">
                                    <label> Data do Contrato       </label>
                                    <div class="form-group ml-1 ">
                                        <div class='form-group date' id='datetimepicker1'>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input type='text' class="form-control" name="datainicial" value="Data Inicial"></input>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" col-sm-01">
                                <input type="checkbox" name="selectcliente" id="showField" value="yes" onchange="myFunction()">
                                </div>
                                <span id="nameField">
                                    <div class="col">
                                        <label>Prazo indeterminado</label>
                                        <div class="form-group ml-1 ">
                                            <div class='form-group date' id='datetimepicker2'>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                    </div>
                                                    <input type='text' class="form-control" name="datafinal" value="Data Final">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <label> Tipo de Despesa</label><br>
                            <div class="form-group custom-radio custom-control-inline ml-1 mb-1"> 
                                <input type="radio" required name="tipo" value="Despesa Fixa">
                                <label> Despesa Fixa</label>

                            </div>
                            <div class="form-group custom-radio custom-control-inline ml-0 mb-3">
                                <input type="radio" name="tipo" value="Despesa Variavel">
                                <label> Despesa Variavel</label>
                            </div>
                            <div class="form-group ml-1">
                                <label>Objeto do Contrato</label>
                                <input class="form-control" name="objeto"></input>
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
                                <input class="form-control" name="valor"></input>
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
    <script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datepicker({
                format: "dd/mm/yy",
                weekStart: 0,
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true,
                orientation: "auto",
                todayBtn: true,
            });
            $('#datetimepicker2').datepicker({
                format: "dd/mm/yy",
                weekStart: 0,
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true,
                orientation: "auto",
                language: "PT-BR",
            });
        });
    </script>
</body>

</html>