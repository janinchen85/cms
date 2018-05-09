<nav class="navbar navbar-expand-md navbar-bg fixed-top w-100 justify-content-center">
  <a class="navbar-brand d-flex w-50 mr-auto" href="#"><img src="{$root}img/logo.png" height="50px"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse w-100" id="navbarsExampleDefault">
    <ul class="navbar-nav mx-auto w-100 justify-content-center" id="menu">
      <li class="nav-item">
        <a class="nav-link" data-menuanchor="home" href="{$root}#home">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-menuanchor="about" href="{$root}#about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-menuanchor="forum" href="{$root}#forum">Forum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-menuanchor="rules" href="{$root}#rules">Rules</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-menuanchor="contact" href="{$root}#contact">Contact</a>
      </li>
    </ul>
    {$loggedinout}
  </div>
</nav>
{$adminNav}
<div id="fullpage">