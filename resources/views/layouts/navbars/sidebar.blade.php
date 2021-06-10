<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="../assets/img/brand/blue.png" class="navbar-brand-img" alt="Logo PróEmpresa">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="../assets/img/theme/team-5.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Bem Vindo!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Meu Perfil') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Configurações') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Atividade') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Suporte') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation itens-->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-chart-pie-35 text-red"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Despesas') }}</span>
                    </a>
                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                            <a class="nav-link" href="{{ route('showdespesa') }}">
                                    {{ __('Despesas') }}
                                </a>
                                <a class="nav-link" href="{{ route('pagamentodespesa') }}">
                                    {{ __('Pagamento Despesas') }}
                                </a>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('showreceita') }}">
                        <i class="ni ni-chart-bar-32 text-green"></i> {{ __('Receitas') }}
                    </a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="#navbar-examples2" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-single-copy-04 text-black"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Contratos') }}</span>
                    </a>
                    <div class="collapse show" id="navbar-examples2">
                    <ul class="nav nav-sm flex-column">
                            <li class="nav-item"><a class="nav-link" href="{{ route('contrato') }}">
                        <i class="ni ni-single-copy-04 text-black"></i> {{ __('Cadastro de Contratos') }}
                    </a>
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="ni ni-archive-2 text-black"></i> {{ __('Lista de Contratos') }}
                    </a>
                    <a class="nav-link" href="{{ route('notafiscal') }}">
                        <i class="ni ni-archive-2 text-black"></i> {{ __('Notas Fiscais') }}
                    </a>
                    </ul>
                
                <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-settings text-gray"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Cadastro') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples3">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('registercliente') }}">
                                    {{ __('Clientes') }}
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
                    <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples4" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-single-02 text-blue"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Usuarios') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples4">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('Perfil de Usuarios') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                </li>

                </li>
            </ul>

        </div>
    </div>
</nav>