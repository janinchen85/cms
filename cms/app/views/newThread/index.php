{$header}
{$navbar}
<br><br><br><br>
<main role="main" class="container mx-auto w-100 justify-content-center">
    <div class="row">
        <ol class="container breadcrumb card-header bg-dark border_color">
            <li><a href="../home">{$categoryName}</a> / </li>
            <li><a href="../forum/{$forumID}">&nbsp;{$forumName}</a> / </li>
            <li class="active">&nbsp;New Thread</li>
        </ol>  
    </div>
    {$success}
    <form method="post">
        <div class="row">
            <div class="container breadcrumb card-header bg-dark border_color">
                <div class="row">
                    <div class="col-md-2">Title:</div>
                    <div class="col-md-10"><input type="text" size="100%" name="threadTitle"></input></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container breadcrumb card-header bg-dark border_color">
                <div class="row">
                    <div class="col-md-9 offset-md-2 justify-content-center"><textarea id="example" name="threadText" style="height:300px;width:100%;"></textarea></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container bg-dark border_color">
                <div class="row">
                    <div class="col-md-12 btn-newThread2">
                        <button type="submit" class="btn btn-sm red" name="newThread">Create Thread</button>
                    </div>
                    <div class="line">&nbsp;</div>
                </div>
            </div>
        </div>     
    </form>
</main>
{$footer}