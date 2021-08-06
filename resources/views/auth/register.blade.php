<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="/css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
          <!-- Tabs Titles -->
      
          <!-- Icon -->
         
      
          <!-- Login Form -->
          <form class="mt-4" action="{{ route('register') }}" method="post">
            @csrf
            <input type="text" id="name" class="fadeIn second" name="name" placeholder="Masukin Nama">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="email" id="email" class="fadeIn third" name="email" placeholder="Masukin Email">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Masukin Password">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="password" id="password" class="fadeIn third" name="password_confirmation" placeholder="Konfirmasi Password">
            @error('password_confirmation')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="submit" class="fadeIn fourth" value="Daftar">
          </form>
      
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="/login">Login</a>
          </div>
      
        </div>
      </div> 
</body>
</html>




