<main role="main" class="container cat_border">
  <div class="row category_head">
    <ol>
      <li>
        {$postTitle} 
      </li>
    </ol>
  </div>
  <div class="row forum_rows2">
    <div class="col-md-3 center"><a href="{$root}user/{$userID}">{$userName}</a></div>
    <div class="col-md-9 textbg title">{$postTitle}</div>
  </div>
  <div class="row forum_rows rows">
    <div class="col-md-3 userdetails">
            <div class="line">{$userRang}</div>
            <div class="picture"><img src="{$root}img/profile/{$userPicture}" width="220px" height="280px" /></div>
            <div class="line"><span style="color:{$statusColor}; font-weight:bolder">{$userStatus}</span></div>
            <div class="line2"><i class="fa fa-male"></i> : {$userGender}</div>
            <div class="line"><i class="fa fa-calendar"></i> : {$userRegDate}</div>
            <div class="line2"><i class="fa fa-comment"></i> : {$userThreads}</div>
            <div class="line"><i class="fa fa-comments"></i> : {$userPosts}</div>
    </div>
    <div class="col-md-9 textbg threadText">{$postText}</div>
  </div>
  <div class="row pagination_and_button">
      <div class="col-md-12">
        <a href="{$root}thread/postEdit/{$postID}" class="button tool {$hidden}" data-tip="Last edit on {$postEditDate} at {$postEditTime} by {$editUserName}"><i class="fa fa-edit"></i> Edit <span class="badge blue">{$postEdits}</span></a>
        <a href="{$root}thread/reply/{$threadID}" class="button {$hidden}"><i class="fas fa-pencil-alt"></i> Reply</a>
        <a href="{$root}thread/delete/{$postID}/post" class="button {$hidden}"><i class="fas fa-trash-alt"></i> Delete</a>
        <a href="#" class="button {$hidden}"><i class="fa fa-quote-right"></i> Quote</a>
        <a href="#" class="button {$hidden}"><i class="fa fa-flag"></i> Report</a>
        <a href="#top" class="button"><i class="fa fa-arrow-up"></i></a>
      </div>
    </div>
</main>