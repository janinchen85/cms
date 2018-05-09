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
        <li>Rules</li>
    </ol>
  </div>
  {$success} {$error}
    <div class="{$hideForm}">
    <form method="post">
      <div class="row forum_rows2">
        <div class="col-md-1 title">Title:</div>
        <div class="col-md-10 title"><input type="text" size="80%" name="pTitle" onfocus="if(this.value == '{$pTitle}') { this.value = ''; }" value="{$pTitle}"></input></div>
      </div>
      <div class="row forum_rows row textInput">
        <div class="col-md-1 title"></div>
        <div class="col-md-10">
            <textarea id="eg-dark-theme" name="pText" style="height:300px;width:100%;">{$pText}</textarea>
        </div>
      </div>
      <div class="row pagination_and_button">
        <div class="col-md-12">
            <button type="submit" class="button bt" name="{$buttonMethod}"><i class="fas fa-edit"></i> {$buttonText}</button>
        </div>
      </div>
    </div>
    </form>
</div>
</main>
{$footer}