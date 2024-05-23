<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  @vite(['resources/js/app.js'])

</head>
<body>
    @if(session('msg'))
    <div class="alert alert-danger" role="alert">
        {{session('msg')}}
    </div>
    @endif
    <div class="form-bg">
        <div class="container">
            <div class="row" style="justify-content: center;transform: translateY(20%);">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">
                    <div class="form-container">
                        <h3 class="title">Create Account</h3>
                        <ul class="social-links">
                            <li><a href=""><i class="fab fa-google"></i></a></li>
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        </ul>
                        <span class="description">or use you email for registration:</span>
                        <form action="{{route('postRegister')}}" method="POST" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Name" value="{{old('name')}}">
                                @error('name')
                                <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" value="{{old('password')}}">
                                @error('password')
                                    <span style="color: red">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="checkbox" class="checkbox">
                                <span class="check-label">I agree to the <a href="">Terms</a> and <a href="">Privacy Policy.</a></span>
                            </div>
                            <button  class="btn signup"><a href="{{route('login')}}" style="text-decoration: none;color:#fff">Sign in</a></button>
                            <button type="submit"  class="btn signin">Sign up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>