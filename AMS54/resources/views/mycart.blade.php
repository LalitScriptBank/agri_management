<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Bootstrap CSS -->
         
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="//code.jquery.com/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
         <!-- Scripts -->
  <script src="/js/app.js" type="text/javascript" charset="utf-8" async defer></script>

        <!-- Styles -->
        <!-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style> -->
    </head>
    <body>
       <!--  <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::guard('admin')->check())
                        <a href="{{ url('/admin') }}">Admin Home</a>
                    
                    @elseif (Auth::guard('seller')->check())
                        <a href="{{ url('/seller') }}">Seller Home</a>
                    
                    @elseif (Auth::guard('web')->check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
 -->
 




<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Title</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="mycart">Cart <span class="badge">{{ $products->count()}}</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{Auth::user()->name}}  <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li><a href="{{ route('logout') }}">
                                            Logout
                                        </a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

                @if (empty($errors))

                <div class=" alert alert-warning">
                <span class="help-block">
                <strong>{{ $errors}}</strong>
                </span> 
                </div>

                @endif


                   <div class="col-sm-offset-1 col-sm-10">
                       
                   
                @if (session('status'))

                <div class=" alert alert-success">
                <span class="help-block">
                    <center>
                <strong>{{ session('status')}}</strong></center>
                </span> 
                </div>

                @endif

                </div>



     <div class="col-md-12">
       <div class="row">
    <div class="col-md-offset-1 col-md-10">
     <div class="panel panel-danger">  
      <div class="panel-body">  
<table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Sr.No,</th>
                                <th scope="col">Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
<?php $total = 0; ?>
    @foreach($products as $product)

    <?php $total += $product->price; ?>

                      <tbody>
                            <tr>
                                <td scope="row">{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{$product->price}}</td>
                                <td><button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                                           <i class="fa fa-trash" aria-hidden="true">&times</i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    
@endforeach      
</table>
</div>

 <div class="panel panel-footer">{{$total}}</div>

</div>

 

 

                     </div>

                     

      
 </div>
 </div> 
    </body>
</html>
