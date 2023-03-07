<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reserve Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/frontend.css')}}">

  </head>
    <body>
    
        <div class="hero">
            <nav>
                <h3>Rerserve Now</h3>
                <ul>
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                
                            <!-- <li>
                                <a href="/public/bus/home">Admin Panel</a>
                            </li>
                            <li>
                                <a href="/public/user/logout">Logout</a>
                            </li> -->
                    
                   
                            <li>
                                <a href="{{url('/login')}}">Login</a>
                            </li>
                            <li>
                                <a href="{{url('/register')}}">Register</a>
                            </li>
                 
                            <!-- <li>
                                <a href="/public/ticket/search">Tickets</a>
                            </li>
                            <li>
                                <a href="/public/booking/inventory">Inventory</a>
                            </li>
                            <li>
                                <a href="/public/user/logout">Logout</a>
                            </li> -->
                   
                </ul>
            </nav>
            @yield('content')


        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    </body>
</html>


