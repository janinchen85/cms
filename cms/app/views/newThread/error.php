{$header}
{$navbar}
<br><br><br><br>
<main role="main" class="container mx-auto w-100 justify-content-center">
    <div class="row">
        <ol class="container breadcrumb card-header bg-dark border_color">
            <li><a href="../home">{$categoryName}</a> / </li>
            <li><a href="../forum/{$forumID}">&nbsp;{$forumName}</a> / </li>
            <li class="active">&nbsp;New Thread Error</li>
        </ol>  
    </div>
        <div class="row">
            <div class="container breadcrumb card-header bg-dark border_color justify-content-center">
                <div class="row">
                    <div class="col-md-12">You have to be <a href="../login">logged in</a> or <a href="../register">resgistered</a>, before you can create new Topics.</div>
                </div>
            </div>
        </div>
</main>
{$footer}