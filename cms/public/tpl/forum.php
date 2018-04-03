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
            <li class="active">&nbsp;Forum 1</li>
        </ol>  
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-12 btn-newThread">
                    <a href="#" class="btn btn-sm red">New Thread</a>
                </div>
            </div>
        </div>
    </div>      
    <div class="row">
        <div class="container border_color">
            <div class="row card-header bg-dark">
                <div class="col-md-12">Forum 1</div>
            </div>
            <div class="row card-body red fhead">
                <div class="col-md-5">Thread</div>
                <div class="col-md-1"></div>
                <div class="col-md-1">Posts</div>
                <div class="col-md-4">Last Post</div>
            </div>
            <div class="row card-body bg-dark border_bottom">
                <div class="col-md-5"><a href="thread_user.php">Thread User Views</a><br><span style="font-size:12px">by: Username on sun, 22.22.2222 22:22</span></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center"></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center">1.234</div>
                <div class="col-md-4" style="font-size:14px">by: Username <br><span style="font-size:12px">on sun, 22.22.2222 22:22</span></div>
            </div>
            <div class="row card-body bg-dark border_bottom">
            <div class="col-md-5"><a href="thread_admin.php">Thread Admin View</a><br><span style="font-size:12px">by: Username on sun, 22.22.2222 22:22</span></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center"></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center">1.234</div>
                <div class="col-md-4" style="font-size:14px">by: Username <br><span style="font-size:12px">on sun, 22.22.2222 22:22</span></div>
            </div>
            <div class="row card-body bg-dark border_bottom">
            <div class="col-md-5"><a href="thread_mod.php">Thread Moderator View</a><br><span style="font-size:12px">by: Username on sun, 22.22.2222 22:22</span></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center"></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center">1.234</div>
                <div class="col-md-4" style="font-size:14px">by: Username <br><span style="font-size:12px">on sun, 22.22.2222 22:22</span></div>
            </div>
            <div class="row card-body bg-dark border_bottom">
            <div class="col-md-5"><a href="thread_creator.php">Thread Creator View</a><br><span style="font-size:12px">by: Username on sun, 22.22.2222 22:22</span></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center"></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center">1.234</div>
                <div class="col-md-4" style="font-size:14px">by: Username <br><span style="font-size:12px">on sun, 22.22.2222 22:22</span></div>
            </div>
            <div class="row card-body bg-dark border_bottom">
            <div class="col-md-5"><a href="thread.php">Thread 5</a><br><span style="font-size:12px">by: Username on sun, 22.22.2222 22:22</span></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center"></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center">1.234</div>
                <div class="col-md-4" style="font-size:14px">by: Username <br><span style="font-size:12px">on sun, 22.22.2222 22:22</span></div>
            </div>
            <div class="row card-body bg-dark border_bottom">
            <div class="col-md-5"><a href="thread.php">Thread 6</a><br><span style="font-size:12px">by: Username on sun, 22.22.2222 22:22</span></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center"></div>
                <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center">1.234</div>
                <div class="col-md-4" style="font-size:14px">by: Username <br><span style="font-size:12px">on sun, 22.22.2222 22:22</span></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-12 btn-newThread2">
                    <a href="#" class="btn btn-sm red">New Thread</a>
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
