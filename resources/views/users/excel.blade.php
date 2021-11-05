</
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Долг</th>
            <th>Госпошлина</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->Lastname }}</td>
                <td>{{ $user->Firstname }}</td>
                <td>{{ $user->Secondname }}</td>
                <td>{{ $user->Debt }}</td>
                <td>{{ $user->StateFee }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
