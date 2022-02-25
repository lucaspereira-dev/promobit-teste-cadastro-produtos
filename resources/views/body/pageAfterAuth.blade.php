@extends('body.pageBeforeAuth')

@section('styleHead')
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ asset('page/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
@show
@section('scriptHead')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@show
@section('body')
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-2 me-0 px-3" href="https://www.promobit.com.br/" target="_blank">
            <img src="{{ asset('/imgs/logo/promobit.png') }}" alt="Logo" width="150" height="45">
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="{{ route('logout') }}">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-sm-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Home</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'products' ? 'active' : '' }}"
                                aria-current="page" href="{{ route('products') }}">
                                <span data-feather="shopping-cart"></span>
                                Product
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'tags' ? 'active' : '' }}"
                                href="{{ route('tags') }}">
                                <span data-feather="layers"></span>
                                Tag
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Report</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link {{ Route::current()->getName() == 'reports' ? 'active' : '' }}"
                                href="{{ route('reports') }}">
                                <span data-feather="bar-chart-2"></span>
                                Relevance
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            @yield('bodyAfterAuth')
        </div>
    </div>
@endsection
@section('scriptFooter')
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        (function() {
            'use strict'
            feather.replace({
                'aria-hidden': 'true'
            });
        })();
    </script>
@show
