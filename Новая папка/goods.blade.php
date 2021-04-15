<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Овощнофф</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body class="bg-light">
    <div class="container py-4">
      <h1>Овощнофф</h1>
      <h4 class="text-muted">Самые свежие овощи и фрукты</h4>
      <hr class="mb-5">
      
      <div class="row">
      @foreach ($goods as $good)
        <div class="col-4">
          <div class="card" style="width: 18rem;">
            <img src="{{$good['img']}}" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">{{$good['name']}}</h5>
                <p class="card-text">{{$good['info']}}</p>
                <a href="#" class="btn btn-success">{{$good['price']}}</a>
            </div>
          </div>
        
        </div>
        @endforeach    
      </div>
    </div>
  </body>
</html>