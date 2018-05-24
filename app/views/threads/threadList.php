<div class="row forum_rows">
  <div class="col-md-5">
    <a href="{$root}thread/{$threadID}/#forum">{$threadTitle}</a>
    <br>
    <span style="font-size:12px">by:
    <a href="{$root}user/{$userID}">{$userName}</a> on {$threadDay}, {$threadDate} at {$threadTime} o'clock</span>
  </div>
  <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center">{$threadVisits}</div>
  <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center">{$postCount}</div>
  <div class="col-md-4 {$isVisible}" style="font-size:14px">by: <a href="{$root}user/{$userID}"  style="font-size:13px">{$userName}</a>
    <br>
    <span style="font-size:12px">on {$postDay}, {$postDate} at {$postTime} o'clock</span>
  </div>
  <div class="col-md-4 {$isHidden}" style="font-size:13px">No posts yet.</div>
</div>