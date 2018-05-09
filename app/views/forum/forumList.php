<div class="row forum_rows">
    <div class="col-md-5"><a href="{$root}forum/{$forumID}/#forum">{$forumName}</a></div>
    <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center">{$threadCount}</div>
    <div class="col-md-1" style="line-height:30px;font-size:13px; text-align:center">{$postCount}</div>
    <div class="col-md-4 {$isVisible}" style="font-size:13px">
            <a href="{$root}thread/{$threadID}" style="font-size:12px">{$threadTitle}</a> by: 
            <a href="{$root}user/{$userID}" style="font-size:12px">{$userName}</a><br>
            <span style="font-size:12px">on {$threadDay}, {$threadDate} at {$threadTime} o'clock</span></div>
    <div class="col-md-4 {$isHidden}" style="font-size:13px">No threads yet.</div>
</div>