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
        <li>Add Rule</li>
    </ol>
  </div>
  {$success} {$error}
    <div class="{$hideForm}">
    <form method="post">
      <div class="row forum_rows2">
        <div class="col-md-2 title">Title:</div>
        <div class="col-md-8 title"><input type="text" size="65%" name="ruleTitle" onfocus="if(this.value == '{$ruleTitle}') { this.value = ''; }" value="{$ruleTitle}"></input></div>
      </div>
      <div class="row forum_rows row textInput">
        <div class="col-md-2 title">Description</div>
        <div class="col-md-8">
            <textarea name="ruleDesc" >{$ruleDesc}</textarea>
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