@extends('admin.layouts.master')


@section('content')
    <section class="section" >
        <div  >
            <div class="section-header" style="  background-color: #313235;">
                <h1 style="  color: #c3cafd;">Dashboard Administradores</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1" style="  background-color: #313235;">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap" style="  background-color: #313235;">
                            <div class="card-header">
                                <h4 style="  color: #c3cafd;">Total Admin</h4>
                            </div>
                            <div class="card-body" style="  color: #c3cafd;">
                                10
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12" >
                    <div class="card card-statistic-1" style="  background-color: #313235;">
                        <div class="card-icon bg-danger" style="  background-color: #313235;">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 style="  color: #c3cafd;">News</h4>
                            </div>
                            <div class="card-body" style="  color: #c3cafd;">
                                42
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1" style="  background-color: #313235;">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 style="  color: #c3cafd;">Reports</h4>
                            </div>
                            <div class="card-body" style="  color: #c3cafd;">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1" style="  background-color: #313235;">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4 style="  color: #c3cafd;">Online Users</h4>
                            </div>
                            <div class="card-body" style="  color: #c3cafd;">
                                47
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection