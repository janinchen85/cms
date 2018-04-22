{$header} {$navbar}
<br>
<br>
<br>
<br>
<main role="main" class="container mx-auto w-100 justify-content-center">
    <div class="row">
        <ol class="container breadcrumb card-header bg-dark border_color">
            <li>
                <a href="../home">{$categoryName}</a> / </li>
            <li>
                <a href="../forum/{$forumID}">&nbsp;{$forumName}</a> / </li>
            <li class="active">&nbsp;{$threadTitle}</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-4 bg-dark border_color">
            <div class="breadcrumb bg-dark card-header justify-content-center border_sep">{$userName}</div>
            <div class="breadcrum bg-dark text-center">{$userRang}</div>
            <div class="breadcrumb bg-dark user_picture justify-content-center">
                <img src="../img/profile/{$userPicture}" width="220px" height="280px" />
            </div>
            <div class="breadcrum bg-dark text-center">
                <span style="color:{$statusColor}">{$userStatus}</span>
            </div>
            <div class="breadcrum bg-dark text-center">
                <i class="fa fa-male"></i> : {$userGender}</div>
            <div class="breadcrum bg-dark text-center">
                <i class="fa fa-calendar"></i> : {$userRegDate}</div>
            <div class="breadcrum bg-dark text-center">
                <i class="fa fa-comment"></i> : {$userThreads}</div>
            <div class="breadcrum bg-dark text-center">
                <i class="fa fa-comments"></i> : {$userPosts}</div>
        </div>
        <div class="col-md-8 bg-dark border_color">
            <div class="breadcrumb bg-dark card-header justify-content-center border_sep">{$threadTitle}</div>
            <div class="border_sep threadText">{$threadText}</div>
            <div class="">Written on {$threadDate} at {$threadTime} 10 o'clock.</div>
            <div class="breadcrumb bg-dark card-header justify-content-center">
                <a href="../thread/edit/{$threadID}" class="btn btn-xs btn-dark tool border_red {$hidden}" data-tip="Last edit on {$threadEditDate} at {$threadEditTime} by {$editUserName}">
                    <i class="fa fa-edit"></i> Edit
                    <span class="badge red">{$threadEdits}</span>
                </a>
                <a href="#" class="btn btn-xs btn-dark border_red">
                    <i class="fas fa-pencil-alt"></i> Answer</a>
                <a href="#" class="btn btn-xs btn-dark border_red">
                    <i class="fa fa-quote-right"></i> Quote</a>
                <a href="#" class="btn btn-xs btn-dark border_red">
                    <i class="fa fa-flag"></i> Report</a>
                <a href="#top" class="btn btn-xs btn-dark border_red">
                    <i class="fa fa-arrow-up"></i>
                </a>
            </div>
        </div>
    </div>
</main>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
{$footer}