{$header}
{$navbar}
<div class="section forum" id="section2">
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
    <div class="{$hide}">
      <div class="col-md-2">ID</div>
      <div class="col-md-8">Title</div>
      <div class="col-md-2">Settings</div>
    </div>
    {$rulesList}
      <div class="row pagination_and_button">
        <div class="col-md-12">
            <a href="{$root}admin/addRule" class="button"><i class="fas fa-edit"></i> Add Rule</a>
        </div>
      </div>
    </div>
    </form>
</div>
</main>
{$footer}