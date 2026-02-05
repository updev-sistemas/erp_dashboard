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
        <div class="row">
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <p class="text-muted">Vendas Hoje</p>
                                <h2  id="totalVendas2" class="font-weight-bold"><span id="lucrosPresumidosValorVendas">{{ $totalSales }}</span></h2>
                            </div>
                            <div>
                                <figure class="avatar">
                                    <img src="{{ url('assets/media/image/user/money_bag.png') }}" alt="Valor de Vendas">
                                </figure>
                            </div>
                        </div>
                        <div class="d-inline-flex align-items-center">
                            <span class="text-success d-inline-flex align-items-center mr-2">
                                <p  id="a" class="text-muted">Média das Lojas</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <p class="text-muted">Qtd de vendas Hoje</p>
                                <h2 id="quantidadeVendas2" class="font-weight-bold"><span id="lucrosPresumidosQuantidadeVendas">{{ $totalCountSales }}</span></h2>
                            </div>
                            <div>
                                <figure class="avatar">
                                    <img src="{{ url('assets/media/image/user/quanVendas.png') }}">
                                </figure>
                            </div>
                        </div>
                        <div class="d-inline-flex align-items-center">
                            <span class="text-danger d-inline-flex align-items-center mr-2">
                                <p  id="b" class="text-muted">Média das Lojas</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <p class="text-muted">Ticket Médio</p>
                                <h2 id="meusLucros2" class="font-weight-bold"><span id="lucrosPresumidosTotalLucros">{{ $avgTicket }}</span></h2>
                            </div>
                            <div>
                                <figure class="avatar">
                                    <img src="{{ url('assets/media/image/user/lucros.png') }}">
                                </figure>
                            </div>
                        </div>
                        <div class="d-inline-flex align-items-center">
                            <span class="text-danger d-inline-flex align-items-center mr-2">
                                <p  id="c" class="text-muted">Média das Lojas</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr />

    <div class="container-fluid">
        @foreach ($collection->chunk(4) as $sublist)
            <div class="row">
                @foreach($sublist as $enterprise)
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img
                                            src="{{ url('assets/media/image/user/women_avatar1.jpg') }}"
                                            alt="{{ $enterprise->fantasia }}"
                                            class="avatar-md rounded-circle img-thumbnail border-10 {{ $enterprise->getBorderClass() }}"
                                        />
                                    </div>
                                    <div class="flex-1 ms-3">
                                        <h5 class="font-size-16 mb-1"><a href="{{ route('view_enterprise',['id' => $enterprise->id]) }}" class="text-dark">{{ $enterprise->fantasia }}</a></h5>
                                        <span class="badge badge-soft-success mb-0">{{ $enterprise->getDocument() }}</span>
                                    </div>
                                </div>
                                <div class="mt-3 pt-1 d-flex flex-column gap-2">
                                    <p class="text-muted mb-0">
                                        <strong class="text-dark">Última Atualização:</strong>
                                        {{ $enterprise->last_update->format('d/m/Y H:i') }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong class="text-dark">Estado:</strong>
                                        {{ $enterprise->state_name }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong class="text-dark">Cidade:</strong>
                                        {{ $enterprise->city_name }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <strong class="text-dark">Telefone:</strong>
                                        {{ $enterprise->phone }}
                                    </p>
                                    <p class="text-muted mb-0 text-truncate" title="{{ $enterprise->email }}">
                                        <strong class="text-dark">Email:</strong>
                                        {{ $enterprise->email }}
                                    </p>
                                </div>
                                <div class="d-flex gap-2 pt-4">
                                    <a href="{{ route('view_enterprise',['id' => $enterprise->id]) }}" class="btn btn-primary btn-sm h-25" style="color:#FFFFFF;"><i class="fa fa-link"></i> &nbsp; Acessar Financeiro</a>
                                    <a href="{{ route('view_enterprise_edt',['id' => $enterprise->id]) }}" class="btn btn-warning btn-sm h-25" style="color:#FFFFFF;"><i class="fa fa-edit"></i> &nbsp; Editar Informações</a>
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
