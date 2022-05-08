<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learning page</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-3.1.1-dist/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles_learningpage.css') }}">
    <script defer src="{{ asset('js/learningpage.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
</head>
<body>
<div class="col-md-7 col-md-offset-2">
    <button type="button" class="btn btn-danger" id="btn6" onClick="window.location.reload();">Refresh Page</button>
    <button type="button" class="btn btn-primary" id="btn5" onclick="window.location='{{ Route("auth.login")}}'">Go back</button><br><br><hr>
    <h1>Json and Ajax</h1>
    <button id="fetch3animals" class="btn btn-info">Fetch 3 animals</button><br><br>
    <div id="animal-container"></div>
    <div id="pets-container"></div>
</div>
<div class="container">
    <div class="box" style="background: red;"></div>
    <div class="box stack-top" style="background: blue;"></div>
</div>
</body>
</html>
