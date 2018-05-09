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
        <li><a href="{$root}#forum/{$catNumber}">{$categoryName}</a> / </li>
        <li class="cat_active">&nbsp;{$forumName}</li>
      </ol>
    </div>
    <div class="row category_headline">
      <div class="col-md-5">Thread</div>
      <div class="col-md-1"></div>
      <div class="col-md-1">Posts</div>
      <div class="col-md-4">Last Post</div>
    </div>
    {$threadList}
    <div class="row pagination_and_button">
      <div class="col-md-12">
        <a href="{$root}thread/newThread/{$forumID}" class="button"><i class="fas fa-edit"></i> New Thread</a>
      </div>
    </div>
</div>
</main>
</div>
{$footer}