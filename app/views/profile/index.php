{$header}{$navbar}
<div class="section forum" id="section2">
  <br>
  <br>
  <br>
  <br>
  <main role="main" class="container cat_border">
    <div class="row category_head">
      <ol>
        <li class="cat_active">&nbsp;Your Profile</li>
      </ol>
    </div>
    {$success} {$error}
    <div class="{$hideForm}">
      <div class="row forum_rows2">
        <div class="col-md-3 title center">User Picture</div>
        <div class="col-md-5 offset-md-1 title textbg">User Details</div>
      </div>
      <div class="row forum_rows rows">
        <div class="col-md-3 center">
          <br>
          <form method="post" enctype="multipart/form-data">
            <img src="{$root}/img/profile/{$userPicture}" width="220px" height="280px" />
            <label for="userPicUpload" class="button spaces">
            <i class="fas fa-image"></i> Choose Image
            </label>
            <input type="file" name="userPicUpload" id="userPicUpload">
            <button type="submit" name="upload" class="button"> <i class="fas fa-upload"></i> Upload Image</button>
          </form>
        </div>
        <div class="col-md-5 offset-md-1 textbg threadText">
          <div class="col-md-12">
            <form action="profile" method="post" enctype="multipart/form-data">
              <label for="userName">Username</label>
              <input name="userName" class="form-control" type="text" value="{$userName}">
              <label for="userEmail">Email</label>
              <input name="userEmail" class="form-control" type="text" value="{$userEmail}">
              <label for="userCourse">Course</label>
              <input name="userCourse" class="form-control" type="text" value="{$userCourse}">
              <div class="border_sep"></div>
              <label for="userFB">Facebook</label>
              <input name="userFB" class="form-control" type="text" value="{$userFB}">
              <label for="userTW">Twitter</label>
              <input name="userTW" class="form-control" type="text" value="{$userTW}">
              <div class="border_sep"></div>
              <label for="userTW">Old Password</label>
              <input name="userPWOld" class="form-control" type="password" value="{$userPWOld}">
              <label for="userTW">New Password</label>
              <input name="userPW" class="form-control" type="password" value="{$userPW}">
              <br>
              <center><button type="submit" name="update" class="button center"><i class="fas fa-edit"></i> Update Userdetails</button></center>
            </form>
          </div>
        </div>
      </div>
      <div class="row pagination_and_button">
        <div class="col-md-12"></div>
      </div>
    </div>
</div>
</main>
{$footer}