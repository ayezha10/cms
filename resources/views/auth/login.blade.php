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
          <form class="mt-4" action="{{ route('login') }}" method="post">
            @csrf
            <input type="email" id="email" class="fadeIn second" name="email" placeholder="Masukin Email">
            @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="Masukin Password">
            @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
            <input type="submit" class="fadeIn fourth" value="Log In">
    
          </form>
      
          <!-- Remind Passowrd -->
          <div id="formFooter">
            <a class="underlineHover" href="/register">Register</a>
          </div>
      
        </div>
      </div> 
</body>
</html>




