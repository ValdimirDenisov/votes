<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Дела</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body class="bg-light">
    <div class="container py-4">
      <h1 class="mb-5">Сделать сегодня</h1>
      <ul class="list-group">
        @foreach ($todos as $todo)
            <li class="list-group-item">{{$todo['name']}}</li>
        @endforeach
      </ul>
    </div>
  </body>
</html>