@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Тестовый список</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url("create") }}">Добавить пользователя</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Долг</th>
            <th>Госпошлина</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td><a href="{{ url("pdf/$user->id") }}">{{ $user->Lastname }}</a></td>
                <td>{{ $user->Firstname }}</td>
                <td>{{ $user->Secondname }}</td>
                <td>{{ $user->Debt }}</td>
                <td>{{ $user->StateFee }}</td>
                <td>
                    <a class="btn btn-info" href="{{ url("show/$user->id") }}">Просмотреть</a>
                    <a class="btn btn-info" href="{{ url("pdf/$user->id?export=pdf") }}">PDF</a>
                    <a class="btn btn-primary" href="{{ url("edit/$user->id") }}">Редактировать</a>
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-primary" href="{{ url("export") }}">Сохранить в EXCEL</a>
@endsection






