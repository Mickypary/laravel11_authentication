<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Website</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    .menu {
      display: flex;
      gap: 10px;
      list-style: none;
      padding: 10px;
    }

    .heading {
      margin-top: 10px;
    }

    .p-10 {
      padding: 10px;
    }

    .form-control {
      padding: 5px;
    }

    .btn {
      padding: 5px;
    }

    .ms {
      margin-left: 10px;
    }

    .mt {
      margin-top: 10px;
    }

  </style>
</head>
<body>

  <div>
    <ul class="menu">
      <li><a href="{{ url('/') }}">Home</a></li>

      @if(Auth::guard('web')->user())   
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li><a href="{{ route('logout') }}">Logout</a></li>
      @endif


      @if(!Auth::guard('web')->user())
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('registration') }}">Registration</a></li>
      @endif
      
    </ul>