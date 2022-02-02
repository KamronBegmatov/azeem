<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <title>Log In</title>
</head>

<body>
    <div class="wrapper authorization">
        <div class="container">
            <div class="bg">
                <form method="POST" action="{{url('login/attempt')}}">
                @csrf
                    <h6>Authorization</h6>
                    <p>Log into your account</p>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>


</html>
