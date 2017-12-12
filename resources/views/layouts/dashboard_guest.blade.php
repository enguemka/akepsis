<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Online Network for local talented professionals">
        <meta name="keywords" content="Startup,Free,Fast,Reliable,Collaboration,Calendar">
        <meta name="author" content="Eric Dorian Nguemkam">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Akepsis | @yield('title')</title>
        <link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
        <style>
         body {
            font-family: Lato;
         }
        </style>
        @yield('child-css')
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::route('home') }}">
                    <span>Akepsis</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li {{ (Request::route()->getName() == "home") ? "class=active" : "" }} ><a href="{{ URL::route('home') }}">Home</a></li>
                    <li {{ (Request::route()->getName() == "about") ? "class=active" : "" }}><a href="{{ URL::route('about') }}">About</a></li>
                    <li {{ (Request::route()->getName() == "how") ? "class=active" : "" }}><a href="{{ URL::route('how') }}">How it works</a></li>
                    <li><a href="#"><span class="text-muted">Free</span></a></li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ URL::route('pro.login') }}">Log in</a></li>
                    <li><a href="{{ URL::route('pro.signup') }}">Join now</a></li>
                </ul>
            </div>
          </div>
        </nav>
        
        @yield('content')
        
        <footer class="footer footer-inverse">
          <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul>
                        <li><a href="{{ URL::route('about') }}">About</a></li>
                        <li>Contacts</li>
                        <li>Careers</li>
                        <li>Team</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Become a Professional</li>
                        <li>Become a Partner</li>
                        <li>Become an Affiliates</li>
                        <li>Professional Resources</li>
                        <li>Donate</li>
                        <li>Help</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Proposal contests</li>
                        <li>1-to-1 Projects</li>
                        <li>1-to-Many Projects</li>
                        <li>Medium Fixes</li>
                        <li>Small Fixes</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>Blog</li>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Google+</li>
                        <li>Pinterest</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <p class="text-muted text-center">2016&copy;Akepsis</p>
            </div>
          </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        @yield('child-javascript')
    </body>
</html>
