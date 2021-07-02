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
</head>

<body>

    <!-- Sidenav BarraLateral -->
    @include('layouts.navbars.sidebar')
    <!-- Conteudo Principal -->
    <div class="main-content" id="panel">
        <!-- Topnav BarraTopo -->
        @include('layouts.navbars.topnav')
        <!-- Cabeçalho -->
        <div class="header bg-gradient-gray py-6">
            <div class="container-fluid ">
                <div class="header-body ">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                           
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-0">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item "><a href="{{ route('showdespesa') }}">Despesas</a></li>
                                    <li class="breadcrumb-item"><a>Pagamento Despesas</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Conteudo da Pagina -->
        <div class="container-fluid  mt--7">
            <div class="row ">
                <div class="col">
                    <div class="card bg-light">
                        <!-- Cabeçalho do Card -->
                        <div class="card-header bg-light border-0">
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
                            <div class="alert alert-red alert-dismissible fade show" role="alert">
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
                                    <div class="form-group custom-radio custom-control-inline ml-0">
                                        <input type="radio" name="sede" required class="custom-control-input1" value=IPTVBRASIL>
                                        <label class="custom-control-label1" for="123">  IPTVBRASIL</label>

                                    </div>
                                    <div class="form-group custom-radio custom-control-inline ml-0 mb-3">
                                        <input type="radio" name="sede" class="custom-control-input1" value=PRÓEMPRESA>
                                        <label class="custom-control-label1" for="1234">  PRÓEMPRESA</label>
                                    </div>
                                    <div class="form-group ml-1">
                                        <label for="">Nome</label>
                                        <input type="text" class="form-control" name="nome">
                                    </div>

                                    <div class="form-group ml-1">
                                        <div class='form-group date' id='datetimepicker1'>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input type='text' class="form-control" name="data" value="15/05/2021">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ml-1">
                                        <label for="exampleFormControlInput1">Valor</label>
                                        <input type="text" class="form-control @if($errors->has('valor')) is-invalid @endif" name="valor" >
                                        <div class="invalid-feedback">
                                            <p>Valor é Obrigatório</p>
                                        </div>
                                    </div>
                                    <div class="form-group ml-1">
                                        <label for="exampleFormControlInput1">Nota Fiscal</label>
                                        <input type="tel" class="form-control" name="notafiscal">
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Salvar') }}</button>

                            </div>
                        </form>
                        <!-- Tabela Pagamentos Pendentes -->
                        <div class="table-responsive ">
                            <table class="table align-items-center table-light table-flush">
                                <thead class="thead-secondary">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="Nome">Sede</th>
                                        <th scope="col" class="sort" data-sort="Nome">Nome</th>
                                        <th scope="col" class="sort" data-sort="Nome">Data</th>
                                        <th scope="col" class="sort" data-sort="Valor">Valor</th>
                                        <th scope="col" class="sort" data-sort="Data">Nota Fiscal</th>
                                    </tr>
                                </thead>

                                <tbody class="list">
                                    @csrf
                                    @foreach ($consumivels as $consumivel)
                                   
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$consumivel->sede}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$consumivel->nome}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$consumivel->data}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$consumivel->valor}} </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="text-right"> {{$consumivel->notafiscal}} </span>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                        <a href="{{ route('editar_consumivel', ['id'=>$consumivel->id])}}" class="btn btn-outline-info" tabindex="-1" role="button">Editar</a>
                                        <a href="{{ route('excluir_consumivel', ['id'=>$consumivel->id])}}" class="btn btn-outline-danger" tabindex="-1" role="button">X</a>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach


                                </tbody>
                            </table>
                            <div class="card-footer bg-light py-4">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">
                                                <i class="fas fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link bg-dark" href="#">1</a>
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
    <script src="/assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <!-- Argon JS -->
    <script src="../assets/js/argon.js?v=1.2.0"></script>
    <script>
        $('#nameField').css('display', 'block'); // Esconde o campo te texto por padrão
        function myFunction() {
            if ($('#showField').prop('checked')) {
                $('#nameField').css('display', 'block');
            } else {
                $('#nameField').css('display', 'none');
            }
        }
    </script>
    <script type="text/javascript">
        $(function() {
            var data = new Date();
            var dia = String(data.getDate()).padStart(2, '0');
            var mes = String(data.getMonth() + 1).padStart(2, '0');
            var ano = data.getFullYear();
            $dataAtual = dia + '/' + mes + '/' + ano;
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datepicker({
                format: "dd/mm/yyyy",
                weekStart: 0,
                calendarWeeks: true,
                autoclose: true,
                todayHighlight: true,
                orientation: "auto",
                todayBtn: true
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