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
                            <h6 class="h2 text-white d-inline-block mb-0">Notas Fiscais</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Conteudo da Pagina -->

        <!-- Formulario de Registro -->
        <form action="{{ route('salvar_notafiscal') }}" method="POST">
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
            <div class="form-group">
                <label for="exampleFormControlSelect1">Selecione o tipo</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Clientes</option>
                    <option>Fornecedores</option>
                    <option>Prestadores</option>
                    <option>ContraCheque(Funcionarios)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Selecione o cliente/funcionario/fornecedor/prestador</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Lista Clientes</option>
                    <option>Lista Fornecedores</option>
                    <option>Lista Prestadores</option>
                    <option>Lista Funcionarios</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Selecione o contrato</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Exemplo Contrato</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Numero da Nota</label>
                <input type="text" class="form-control" name="nome">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Valor</label>
                <input type="text" class="form-control" name="valor">
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
    /**  */
    </script>
</body>

</html>