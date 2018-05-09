{$header}
{$navbar}
<div class="section forum" id="section2">
  <br>
  <br>
  <br>
  <br>
  <main role="main" class="container cat_border">
    <div class="row category_head">
      <ol>
        <li class="cat_active">&nbsp;Profile of {$userName}</li>
      </ol>
    </div>
    <div class="row forum_rows2">
      <div class="col-md-3 title center">User Picture</div>
      <div class="col-md-5 offset-md-1 title textbg">User Details</div>
    </div>
    <div class="row forum_rows rows">
      <div class="col-md-3 center">
        <br>
        <img src="{$root}/img/profile/{$userPicture}" width="220px" height="280px" />
      </div>
      <div class="col-md-5 offset-md-1 textbg threadText">
        <div class="col-md-12">
          <br>
          <div class="row">
            <div class="col-md-4 offset-md-2">Username:</div>
            <div class="col-md-4">{$userName}</div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-2">Email:</div>
            <div class="col-md-4">{$userEmail}</div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-2">Course:</div>
            <div class="col-md-4">{$userCourse}</div>
          </div>
          <br>
          <div class="col-md-12 red"></div>
          <br>
          <div class="row">
            <div class="col-md-4 offset-md-2">Facebook:</div>
            <div class="col-md-4">{$userFB}</div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-2">Twitter:</div>
            <div class="col-md-4">{$userTW}</div>
          </div>
          <br>
          <div class="col-md-12 red"></div>
          <br>
          <div class="row">
            <div class="col-md-4 offset-md-2">Rang:</div>
            <div class="col-md-4">{$userRang}</div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-2">Posts:</div>
            <div class="col-md-4">{$userPosts}</div>
          </div>
          <div class="row">
            <div class="col-md-4 offset-md-2">Last post:</div>
            <div class="col-md-4">{$userLastPost}</div>
          </div>
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