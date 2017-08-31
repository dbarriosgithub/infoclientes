<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="XU-A-Compatible" content="IE=Edge">
<meta name="viewport" initial-scale="1" content="width=device-width">
<meta name="_token" content="{!!csrf_token()!!}"/>
<title>Info Clientes</title>
 {!! Html::style('assets/css/bootstrap.css') !!}
 <!-- Fonts -->
 <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
</head>
<body>
 <nav class="navbar navbar-default">
 <div class="container-fluid">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
 <span class="sr-only">Toggle Navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 </button>
 <a class="navbar-brand" href="#">Infoclientes app</a>
 </div>
 </div>
 </nav>
  @yield('content')
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
   {!! Html::script('assets/js/bootstrap.js') !!}
  @yield('scripts') 
 </body>
 </html>