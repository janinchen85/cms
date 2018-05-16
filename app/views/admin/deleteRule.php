{$header}
{$navbar}
<div class="section forum" id="section2">
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<main role="main" class="container cat_border">
  <div class="row category_head">
  <ol>
      <li class="cat_active">&nbsp;Delete rule</li>
    </ol>
  </div>
  {$success} {$error}
  <div class="{$hideForm}">
  <div class="row forum_rows rows center">
    <div class="col-md-12 center">
    <br><br>
        <h4>Are you sure you want to delete this rule?</h4>
        <br><br>
        <form method="post">
          <center>
              <button type="submit" name="delete" class="col-md-12 button center" style="width:20%"><i class="fas fa-check-circle"></i> Yes</button>
              <button type="submit" name="abort" class="col-md-12 button center" style="width:20%"><i class="fas fa-times-circle"></i> No</button>
            </center>
    </form>
    <br><br>
    </div>
  </div>
</div>
  <div class="row pagination_and_button">
    <div class="col-md-12"></div>
  </div>
</main>
{$footer}