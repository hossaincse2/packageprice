<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown
        </a>
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
          @if (Route::has('login'))
                @auth
                 <li class="nav-item">
                        <a class="nav-link waves-effect waves-light" href="{{ url('/home') }}">Home</a>  
                 </li>
                @else
                 @if (Route::has('register'))
                    <li class="nav-item"> <a class="nav-link waves-effect waves-light" href="{{ route('login') }}">Login</a></li> 
                
                    <li class="nav-item"><a class="nav-link waves-effect waves-light" href="{{ route('register') }}">Register</a></li> 
                 @endif
               @endauth
            @endif

       
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
            

            <div class="container mt-5">
            <div class="row">
            <div class="col-md-12">
                <!-- Classic tabs -->
                <div class="classic-tabs">

                <ul class="nav tabs-cyan" id="myClassicTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link  waves-light active show" id="profile-tab-classic" data-toggle="tab" href="#profile-classic"
                    role="tab" aria-controls="profile-classic" aria-selected="true">Free</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" id="follow-tab-classic" data-toggle="tab" href="#follow-classic" role="tab"
                    aria-controls="follow-classic" aria-selected="false">One-time purchase</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" id="contact-tab-classic" data-toggle="tab" href="#contact-classic" role="tab"
                    aria-controls="contact-classic" aria-selected="false">Monthly subscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-light" id="awesome-tab-classic" data-toggle="tab" href="#awesome-classic" role="tab"
                    aria-controls="awesome-classic" aria-selected="false">Yearly subscription</a>
                </li>
                </ul>
                <div class="tab-content" id="myClassicTabContent">
                <div class="tab-pane fade active show" id="profile-classic" role="tabpanel" aria-labelledby="profile-tab-classic">
                <table class="table table-borderless"> 
                    <tbody>
                        <tr>
                        <th scope="row">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios" checked>
                            <label class="custom-control-label" for="defaultGroupExample1">2,000</label>
                        </div>
                        </th>
                         <td>Queries</td>
                        <td>Free</td>
                        <td>$ 00.00</td>
                        </tr>
                        <tr>
                        <th scope="row">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample2">5,000</label>
                        </div>
                        </th>
                        <td>Queries</td>
                        <td>Free</td>
                        <td>$ 00.00</td>
                        </tr>
                        <tr>
                        <th scope="row">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample3">10,000</label>
                        </div>
                        </th>
                        <td>Queries</td>
                        <td>Free</td>
                        <td>$ 00.00</td>
                        </tr>
                        <tr>
                        <th scope="row">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample4" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample4">15,000</label>
                        </div>
                        </th>
                        <td>Queries</td>
                        <td>Free</td>
                        <td>$ 00.00</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="follow-classic" role="tabpanel" aria-labelledby="follow-tab-classic">
                <table class="table table-borderless">
                <tbody>
                        <tr>
                        <th scope="row">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample1">2,000</label>
                        </div>
                        </th>
                         <td>Queries</td>
                        <td>One-time purchase</td>
                        <td>$ 15.00</td>
                        </tr>
                        <tr>
                        <th scope="row">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample1">2,000</label>
                        </div>
                        </th>
                        <td>Queries</td>
                        <td>One-time purchase</td>
                        <td>$ 30.00</td>
                        </tr>
                        <tr>
                        <th scope="row">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample1">2,000</label>
                        </div>
                        </th>
                        <td>Queries</td>
                        <td>One-time purchase</td>
                        <td>$ 40.00</td>
                        </tr>
                        <tr>
                        <th scope="row">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample1">2,000</label>
                        </div>
                        </th>
                        <td>Queries</td>
                        <td>One-time purchase</td>
                        <td>$ 50.00</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="contact-classic" role="tabpanel" aria-labelledby="contact-tab-classic">
                <table class="table table-borderless">
                <tbody>
                        <tr>
                        <th scope="row">2,000</th>
                        <td>Queries per month</td>
                        <td>Monthly subscription</td>
                        <td>$ 15.00</td>
                        </tr>
                        <tr>
                        <th scope="row">5,000</th>
                        <td>Queries per month</td>
                        <td>Monthly subscription</td>
                        <td>$ 30.00</td>
                        </tr>
                        <tr>
                        <th scope="row">10,000</th>
                        <td>Queries per month</td>
                        <td>Monthly subscription</td>
                        <td>$ 40.00</td>
                        </tr>
                        <tr>
                        <th scope="row">15,000</th>
                        <td>Queries per month</td>
                        <td>Monthly subscription</td>
                        <td>$ 50.00</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="awesome-classic" role="tabpanel" aria-labelledby="awesome-tab-classic">
                <table class="table table-borderless">
                <tbody>
                        <tr>
                        <th scope="row">2,000</th>
                        <td>Queries per Year</td>
                        <td>Yearly subscription</td>
                        <td>$ 15.00</td>
                        </tr>
                        <tr>
                        <th scope="row">5,000</th>
                        <td>Queries per Year</td>
                        <td>Yearly subscription</td>
                        <td>$ 50.00</td>
                        </tr>
                        <tr>
                        <th scope="row">10,000</th>
                        <td>Queries per Year</td>
                        <td>Yearly subscription</td>
                        <td>$ 140.00</td>
                        </tr>
                        <tr>
                        <th scope="row">15,000</th>
                        <td>Queries per Year</td>
                        <td>Yearly subscription</td>
                        <td>$ 150.00</td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                </div>

                </div>
                <div class="text-center">
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <button type="button" class="btn btn-warning">Buy With Credit Card</button>
                    <span>Or</span>
                <!-- Default button -->
                <button type="button" class="btn btn-warning">Buy With Paypal</button>
                </div>
                <!-- Classic tabs -->
                </div>
                </div>
            </div>
        </div>
        <!-- SCRIPTS -->
        <!-- JQuery -->
        <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    </body>
</html>
