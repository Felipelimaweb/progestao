<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>PRÓGESTÃO - Sistema de gestão financeira</title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('despesa') }}">
                                <i class="ni ni-scissors text-red"></i> {{ __('Despesas') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('receita') }}">
                                <i class="ni ni-money-coins text-green"></i> {{ __('Receita') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                                <i class="ni ni-single-02 text-blue"></i>
                                <span class="nav-link-text" style="color: #f4645f;">{{ __('Usuarios') }}</span>
                            </a>

                            <div class="collapse show" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('profile.edit') }}">
                                            {{ __('Perfil de Usuarios') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.index') }}">
                                            {{ __('Configuração de Usuarios') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                                <i class="ni ni-settings text-gray"></i>
                                <span class="nav-link-text" style="color: #f4645f;">{{ __('Cadastro') }}</span>
                            </a>

                            <div class="collapse show" id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('registercliente') }}">
                                            {{ __('Clientes') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('registercontrato') }}">
                                            {{ __('Contratos') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('registerfornecedor') }}">
                                            {{ __('Fornecedores') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('registerfuncionario') }}">
                                            {{ __('Funcionarios') }}
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('registerprestador') }}">
                                            {{ __('Prestadores') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        </li>
                    </ul>
                </div>
            </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Pesquisar" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center  ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                                <!-- Dropdown header -->
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">Você tem <strong class="text-primary">1</strong> notificação.</h6>
                                </div>
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="../assets/img/theme/vue.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">Vue JS</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>1 hora atrás</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Conheçe VueJS e suas funcionalidades?</p>
                                            </div>
                                        </div>



                                        <!-- View all -->
                                        <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                                </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-ungroup"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                                <div class="row shortcuts px-4">
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                            <i class="ni ni-calendar-grid-58"></i>
                                        </span>
                                        <small>Calendario</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                            <i class="ni ni-email-83"></i>
                                        </span>
                                        <small>Email</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                            <i class="ni ni-credit-card"></i>
                                        </span>
                                        <small>Pagamentos</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                            <i class="ni ni-books"></i>
                                        </span>
                                        <small>Relatórios</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                            <i class="ni ni-pin-3"></i>
                                        </span>
                                        <small>Mapas</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                            <i class="ni ni-basket"></i>
                                        </span>
                                        <small>Loja</small>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="../assets/img/theme/team-5.jpg">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">Felipe</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Bem Vindo!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Meu Perfil</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Configurações</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Atividade</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Suporte</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Sair</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h2 text-white d-inline-block mb-0">Cadastro</h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#">Cadastro</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Fornecedores</li>
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
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Cadastro</h3>
                        </div>
                        <!-- Register Forms -->
                        <div class="custom-control custom-radio custom-control-inline ml-1">
                            <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">IPTVBRASIL2</label>

                        </div>
                        <div class="custom-control custom-radio custom-control-inline ml-1 mb-3">
                            <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">PRÓEMPRESA</label>
                        </div>
                        <form>

                            <div class="form-group ml-1">
                                <label for="exampleFormControlInput1">Nome</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group ml-1">
                                <label for="exampleFormControlInput1">CNPJ</label>
                                <input type="tel" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group ml-1">
                                <label for="exampleFormControlTextarea1">Serviço Oferecido</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <!-- Botão Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Selecione o contrato
                            </button>
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

                        <!-- Card footer -->

                    </div>
                </div>
            </div>
            <!-- Dark table -->
            <div class="row">
                <div class="col">
                    <div class="card bg-default shadow">
                        <div class="card-header bg-transparent border-0">
                            <h3 class="text-white mb-0">Clientes</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-dark table-flush">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name">Empresa</th>
                                        <th scope="col" class="sort" data-sort="budget">Saldo</th>
                                        <th scope="col" class="sort" data-sort="status">Status</th>
                                        <th scope="col">Usuarios</th>
                                        <th scope="col" class="sort" data-sort="completion">Progresso</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/bootstrap.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Argon Design System</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            1.500,00R$
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-warning"></i>
                                                <span class="status">pendente</span>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">60%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Editar</a>
                                                    <a class="dropdown-item" href="#">Remover</a>
                                                    <a class="dropdown-item" href="#">Vincular contrato</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/angular.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Angular Now UI Kit PRO</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            3.200,00R$
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>
                                                <span class="status">completo</span>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">100%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Editar</a>
                                                    <a class="dropdown-item" href="#">Remover</a>
                                                    <a class="dropdown-item" href="#">Vincular contrato</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/sketch.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Black Dashboard</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            900,00R$
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-danger"></i>
                                                <span class="status">atrasado</span>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">72%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Editar</a>
                                                    <a class="dropdown-item" href="#">Remover</a>
                                                    <a class="dropdown-item" href="#">Vincular Contrato</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/react.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">React Material Dashboard</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            5.000,00R$
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-info"></i>
                                                <span class="status">a fazer</span>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">90%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Editar</a>
                                                    <a class="dropdown-item" href="#">Remover</a>
                                                    <a class="dropdown-item" href="#">Vincular Contrato</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle mr-3">
                                                    <img alt="Image placeholder" src="../assets/img/theme/vue.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm">Vue Paper UI Kit PRO</span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                            300,00R$
                                        </td>
                                        <td>
                                            <span class="badge badge-dot mr-4">
                                                <i class="bg-success"></i>
                                                <span class="status">completo</span>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="avatar-group">
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Ryan Tompson">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Romina Hadid">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Alexander Smith">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg">
                                                </a>
                                                <a href="#" class="avatar avatar-sm rounded-circle" data-toggle="tooltip" data-original-title="Jessica Doe">
                                                    <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg">
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="completion mr-2">100%</span>
                                                <div>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="#">Remover</a>
                                                    <a class="dropdown-item" href="#">Editar</a>
                                                    <a class="dropdown-item" href="#">Vincular Contrato</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
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

            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; {{ now()->year }} <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> &amp;
                            <a href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">Updivision</a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.updivision.com" class="nav-link" target="_blank">Updivision</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer>
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