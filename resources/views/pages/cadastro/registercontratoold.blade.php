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
                            <h6 class="h2 text-white d-inline-block mb-0">Contratoss</h6>
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
                        <!-- Formularios de Registro -->
                        <div class="custom-control custom-radio custom-control-inline ml-1">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">IPTVBRASIL</label>

                        </div>
                        <div class="custom-control custom-radio custom-control-inline ml-1 mb-3">
                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">PRÓEMPRESA</label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Selecione o tipo</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Clientes</option>
                                <option>Fornecedores</option>
                                <option>Prestadores</option>
                                <option>ContraCheque(Funcionarios)</option>
                            </select>
                        </div>
                        <form>

                            <div class="form-group ml-1">
                                <label for="exampleFormControlInput1">Nome Contrato</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group ml-1">
                                <label for="exampleFormControlInput1">Codigo ou Numero do Contrato</label>
                                <input type="tel" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group ml-1">
                                <label for="exampleFormControlInput1">Data de Inicio</label>
                                <input type="tel" class="form-control" id="exampleFormControlInput1">
                                <input type="checkbox" name="showField" id="showField" value="yes" onchange="myFunction()"> Indeterminado<br />
                                <span id="nameField">
                                    <label for="exampleFormControlInput1">Data de Termino</label><input type="text" class="form-control name=" fullName" id="fullName"></span>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline ml-1">
                                <input type="radio" id="customRadioInline3" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline3">Despesa Fixa</label>

                            </div>
                            <div class="custom-control custom-radio custom-control-inline ml-1 mb-3">
                                <input type="radio" id="customRadioInline4" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline4">Despesa Variavel</label>
                            </div>
                            <div class="form-group ml-1">
                                <label for="exampleFormControlInput1">Objeto do Contrato</label>
                                <input class="form-control" id="exampleFormControlInput1"></input>
                            </div>
                            <div class="form-group ml-1">
                                <label for="exampleFormControlInput1">Ciclo de pagamento</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline ml-1">
                                <input type="radio" id="customRadioInline5" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline5">Mensal</label>

                            </div>
                            <div class="custom-control custom-radio custom-control-inline ml-1 mb-3">
                                <input type="radio" id="customRadioInline6" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline6">Anual</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline ml-1 mb-3">
                                <input type="radio" id="customRadioInline7" name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline7">Empreitada</label>
                            </div>
                            <div class="form-group ml-1">
                                <label for="exampleFormControlInput1">Valor do Contrato</label>
                                <input class="form-control" id="exampleFormControlInput1"></input>
                            </div>

                            <!-- Botão Modal -->
                            <button type="button" class="btn btn-success ">Cadastrar</button>
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
        $('#nameField').css('display', 'block'); // Esconde a caixa de input de texto por padrão
        function myFunction() {
            if ($('#showField').prop('checked')) {
                $('#nameField').css('display', 'none');
            } else {
                $('#nameField').css('display', 'block');
            }
        }
    </script>
</body>

</html>