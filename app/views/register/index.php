{$header} 
{$navbar}
<div class="section forum" id="section2">
<br><br><br><br>
<main role="main" class="container cat_border">
  <div class="row category_head">
    <ol>
      <li>Register</li>
    </ol>
  </div>
  {$success} {$error}
  <div class="{$hideForm}">
  <div class="row forum_rows rows">
    <div class="col-md-6 offset-md-3 textbg threadText">
      <div class="col-md-12">
        <form method="post" enctype="multipart/form-data">
            <label for="userName">USERNAME</label>
            <input name="userName" class="form-control" type="text" value="{$userName}">
            <label for="userEmail">EMAIL</label>
            <input name="userEmail" class="form-control" type="email" value="{$userEmail}">
            <label for="userPW">PASSWORD</label>
            <input name="userPW" class="form-control" type="password" value="{$userPW}">
            <label for="confirmPW">CONFIRM PASSWORD</label>
            <input name="confirmPW" class="form-control" type="password" value="{$confirmPW}">
          <br>
          <center><button type="submit" name="register" class="col-md-12 button center"><i class="fas fa-user-plus"></i> Register</button></center>
          <br>
        </form>
      </div>
    </div>
    <div class="col-md-6 offset-md-3 spacer"></div>
    <div class="col-md-6 offset-md-3 textbg threadText">
      <div class="social-login">
        <div class="social">REGISTER WITH</div>
        <ul>
          <li>
            <a href="">
            <i class="fab fa-facebook-f"></i> Facebook</a>
          </li>
          <li>
            <a href="">
            <i class="fab fa-google-plus-g"></i> Google+</a>
          </li>
          <li>
            <a href="">
            <i class="fab fa-twitter"></i> Twitter</a>
          </li>
        </ul>
        <br>
      </div>
    </div>
  </div>
  <div class="row pagination_and_button">
    <div class="col-md-12"></div>
  </div>
</div>
</main>
{$footer}