<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laravel PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>

<p>Очень Важный Официальный Документ</p>


<p>{{ $user->Lastname }} {{ $user->Firstname }} {{ $user->Secondname }}</p>

<p>Его долг: {{ $user->Debt }} руб.</p>

<p>Госпошлина: {{ $user->StateFee }} руб.</p>

</body>
</html>
