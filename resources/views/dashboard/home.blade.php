@extends('layouts.app')

@section('head')
    <meta http-equiv="refresh" content="300" />
    <style type="text/css">
        .card {
            margin-bottom: 24px;
            box-shadow: 0 2px 3px #e4e8f0;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #eff0f2;
            border-radius: 1rem;
        }
        .avatar-md {
            height: 4rem;
            width: 4rem;
        }
        .rounded-circle {
            border-radius: 50%!important;
        }
        .img-thumbnail {
            padding: 0.25rem;
            background-color: #f1f3f7;
            border: 2px solid #eff0f2;
            border-radius: 0.75rem;
        }
        .avatar-title {
            align-items: center;
            background-color: #3b76e1;
            color: #fff;
            display: flex;
            font-weight: 500;
            height: 100%;
            justify-content: center;
            width: 100%;
        }
        .bg-soft-primary {
            background-color: rgba(59,118,225,.25)!important;
        }
        a {
            text-decoration: none!important;
        }
        .badge-soft-danger {
            color: #f56e6e !important;
            background-color: rgba(245,110,110,.1);
        }
        .badge-soft-success {
            color: #63ad6f !important;
            background-color: rgba(99,173,111,.1);
        }
        .mb-0 {
            margin-bottom: 0!important;
        }
        .badge {
            display: inline-block;
            padding: 0.25em 0.6em;
            font-size: 75%;
            font-weight: 500;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 0.75rem;
        }
        .border-bottom-dotted {
             border-bottom: 2px dotted #ccc;
             margin-bottom: 5px; /* Ajuste para alinhar os pontos com a base do texto */
         }

        /* Estilo para tornar as setas do carrossel visíveis em fundos claros */
        .filter-dark {
            filter: invert(1) grayscale(100) brightness(0.5);
        }

        /* Garante que o carrossel tenha uma altura mínima para não "pular" entre itens */
        .carousel-item {
            min-height: 80px;
        }

        .carousel-control-prev, .carousel-control-next {
            width: 20%; /* Diminui a área de clique para não sobrepor o texto */
        }

    </style>
@endsection

@section('pageTitle')
@endsection

@section('content')

    <div class="page-header d-flex justify-content-between align-items-center mb-4">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>

        <nav aria-label="Legenda de status">
            <ul class="d-flex align-items-center gap-3 mb-0 list-unstyled" style="font-size: 0.875rem;">
                <li class="d-flex align-items-center gap-1" style="padding-left:10px;padding-right: 10px;">
                    <i class="bi  rounded-circle bi-circle-fill bg-success p-10"></i>
                    <span class="text-muted">&nbsp; Pontual</span>
                </li>
                <li class="d-flex align-items-center gap-1" style="padding-left:10px;padding-right: 10px;">
                    <i class="bi  rounded-circle bi-circle-fill bg-warning p-10"></i>
                    <span class="text-muted">&nbsp;Atrasado</span>
                </li>
                <li class="d-flex align-items-center gap-1" style="padding-left:10px;padding-right: 10px;">
                    <i class="bi  rounded-circle bi-circle-fill bg-danger p-10"></i>
                    <span class="text-muted">&nbsp;Desconectado</span>
                </li>
            </ul>
        </nav>

    </div>

    <div class="container-fluid">
        <div class="row align-items-stretch"> <div class="col-lg-6 mb-4">
                <div class="card h-100 bg-primary text-white border-0 shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <div class="text-center">
                            <p class="text-white-50 mb-4">Consolidado por Método (Rede)</p>

                            <div id="carouselTotals" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($formattedGlobalTotals as $index => $total)
                                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                            <h1 class="display-4 font-weight-bold mb-0">{{ $total['value'] }}</h1>
                                            <p class="text-uppercase tracking-wider">{{ $total['description'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselTotals" data-slide="prev">
                                    <span class="carousel-control-prev-icon"></span>
                                </a>
                                <a class="carousel-control-next" href="#carouselTotals" data-slide="next">
                                    <span class="carousel-control-next-icon"></span>
                                </a>
                            </div>

                            <div class="mt-4">
                                <i class="fa fa-university fa-3x mb-3 opacity-2"></i>
                                <p class="small mb-0">Soma total de todas as unidades</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4 d-flex flex-column">

                <div class="card flex-fill mb-3 border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Vendas Hoje</p>
                            <h3 class="font-weight-bold mb-0">{{ $totalSales }}</h3>
                        </div>
                        <img src="{{ url('assets/media/image/user/money_bag.png') }}" width="45">
                    </div>
                </div>

                <div class="card flex-fill mb-3 border-0 shadow-sm">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Qtd de Vendas Hoje</p>
                            <h3 class="font-weight-bold mb-0">{{ $totalCountSales }}</h3>
                        </div>
                        <img src="{{ url('assets/media/image/user/quanVendas.png') }}" width="45">
                    </div>
                </div>

                <div class="card flex-fill mb-0 border-0 shadow-sm"> <div class="card-body d-flex align-items-center justify-content-between">
                        <div>
                            <p class="text-muted mb-1">Ticket Médio</p>
                            <h3 class="font-weight-bold mb-0">{{ $avgTicket }}</h3>
                        </div>
                        <img src="{{ url('assets/media/image/user/lucros.png') }}" width="45">
                    </div>
                </div>

            </div>
        </div>
    </div>

    <hr />

    <div class="container-fluid">
        @foreach ($collection->chunk(4) as $sublist)
            <div class="row">
                @foreach($sublist as $row)
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img
                                            src="{{ url('assets/media/image/user/women_avatar1.jpg') }}"
                                            alt="{{ $row->enterprise->fantasia }}"
                                            class="avatar-md rounded-circle img-thumbnail border-10 {{ $row->enterprise->getBorderClass() }}"
                                        />
                                    </div>
                                    <div class="flex-1 ms-3">
                                        <h5 class="font-size-16 mb-1"><a href="{{ route('view_enterprise',['id' => $row->enterprise->id]) }}" class="text-dark">{{ $row->enterprise->fantasia }}</a></h5>
                                        <span class="badge badge-soft-success mb-0">{{ $row->enterprise->getDocument() }}</span>
                                    </div>
                                </div>
                                <div class="mt-3 pt-1 d-flex flex-column gap-2">
                                    <p class="text-muted mb-0">
                                        <strong class="text-dark">Última Atualização:</strong>
                                        {{ $row->enterprise->last_update->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                                <hr />
                                <div class="mt-3 pt-1 d-flex flex-column gap-2">
                                    @foreach($row->payments as $payment)
                                        <p class="text-muted mb-0 d-flex align-items-baseline">
                                        <strong class="text-dark">{{ $payment->description }}</strong>

                                        <span class="flex-grow-1 mx-1 border-bottom-dotted"></span>

                                        <span class="text-nowrap">{{ $payment->value }}</span>
                                    </p>
                                    @endforeach
                                </div>
                                <hr />
                                <div class="d-flex gap-2 pt-4">
                                    <a href="{{ route('view_enterprise',['id' => $row->enterprise->id]) }}" class="btn btn-primary btn-block btn-sm h-25" style="color:#FFFFFF;"><i class="fa fa-link"></i> &nbsp; Acessar Financeiro</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

@endsection

@section('script')

@endsection
