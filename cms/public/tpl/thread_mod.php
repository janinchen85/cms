<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="./public/css/main.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top justify-content-center">
  <a class="navbar-brand d-flex w-50 mr-auto" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse w-100" id="navbarsExampleDefault">
    <ul class="navbar-nav mx-auto w-100 justify-content-center">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Forum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Rules</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">FAQ</a>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
      <li class="nav-item active">
        <a class="nav-link" href="#">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Register</a>
      </li>
    </ul>
  </div>
</nav>
<br><br><br><br>
<main role="main" class="container mx-auto w-100 justify-content-center">
    <div class="row">
        <ol class="container breadcrumb card-header bg-dark border_color">
        <li><a href="index.php">Category 1</a> / </li>
            <li><a href="forum.php">&nbsp;Forum 1</a> / </li>
            <li class="active">&nbsp;Thread Moderator View</li>
        </ol>  
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-12 btn-newThread">
                    <a href="#" class="btn btn-sm red">New Post</a>
                </div>
            </div>
        </div>
    </div>      
    <div class="row">
        <div class="container border_color">
            
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-12 btn-newThread2">
                    <a href="#" class="btn btn-sm red">New Post</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <ul class="pagination bg-dark">
            <li class="page-item bg-dark"><a class="page-link bg-dark border_color" href="#">&laquo;</a></li>
            <li class="page-item bg-dark"><a class="page-link bg-dark border_color" href="#">1</a></li>
            <li class="page-item bg-dark"><a class="page-link bg-dark border_color" href="#">&raquo;</a></li>
        </ul>
    </div>
</main>
<!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="./public/js/jquery-3.3.1.min.js"><\/script>')</script>
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>
