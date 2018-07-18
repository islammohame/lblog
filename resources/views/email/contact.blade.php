<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-mail</title>
</head>
<body>
<div class="panel panel-default">
  <div class="panel-body">
       <h1>Hi Admin</h1>
       <p>You have new Email From : {{$name}} </p>
       <p>You have new Subject : {{$subject}} </p>
       <p>You have new Email : {{$email}} </p>
       <hr>
       <p>You have new Body {{$body}}</p>
  </div>
</div>
</body>
</html>