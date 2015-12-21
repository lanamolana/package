<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/laravel">
        <span class="glyphicon glyphicon-th" aria-hidden="true"></span>  
        <font color="red">Home</font></a>
    </div>
    
    @if (Auth::guest())
    @else
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/user">Manajemen User<span class="sr-only">(current)</span></a></li>
      </ul>
     @endif
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
          @if (Auth::guest())
            <li><a href="/auth/login">
            <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Login</a></li>
            <li><a href="/user/register">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>   Register</a></li>


          @else
            <li><a>
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            Hello <font color ="red">{{ Auth::user()->username }}</font></a></li>
            
            <li><a href="/auth/logout">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>  Logout</a></li>
          @endif
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>