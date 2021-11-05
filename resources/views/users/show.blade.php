@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Просмотр пользователя</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url("/") }}">На главную</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Фамилия:</strong>
                {{ $user->Lastname }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Имя:</strong>
                {{ $user->Firstname }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Отчество:</strong>
                {{ $user->Secondname }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Долг:</strong>
                {{ $user->Debt }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Госпошлина:</strong>
                {{ $user->StateFee }}
            </div>
        </div>

    </div>
@endsection
