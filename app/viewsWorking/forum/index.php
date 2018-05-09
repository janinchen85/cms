{$header}
{$navbar}
<br><br><br><br>
<main role="main" class="container mx-auto w-100 justify-content-center">
    <div class="row">
        <ol class="container breadcrumb card-header bg-dark border_color">
            <li><a href="../home">{$categoryName}</a> / </li>
            <li class="active">&nbsp;{$forumName}</li>
        </ol>  
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-12 btn-newThread">
                    <a href="../newThread/{$forumID}" class="btn btn-sm red">New Thread</a>
                </div>
            </div>
        </div>
    </div>      
    <div class="row">
        <div class="container border_color">
            <div class="row card-header bg-dark">
                <div class="col-md-12">{$forumName}</div>
            </div>
            <div class="row card-body red fhead">
                <div class="col-md-5">Thread</div>
                <div class="col-md-1"></div>
                <div class="col-md-1">Posts</div>
                <div class="col-md-4">Last Post</div>
            </div>
            {$threadList}
        </div>
    </div>
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-12 btn-newThread2">
                    <a href="../newThread/{$forumID}" class="btn btn-sm red">New Thread</a>
                </div>
            </div>
        </div>
    </div>                
</main>
{$footer}