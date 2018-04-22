{$header} {$navbar}
<br>
<br>
<br>
<br>
<main role="main" class="container mx-auto w-100 justify-content-center">
    <div class="row">
        <ol class="container breadcrumb card-header bg-dark border_color">
            <li class="active">&nbsp;Your Profile</li>
        </ol>
    </div>
    {$success} {$error}
    <div class="row {$hideForm}">
        <div class="col-md-4 bg-dark border_color">
            <div class="breadcrumb bg-dark card-header justify-content-center border_sep">User Picture</div>
            <div class="breadcrumb bg-dark user_picture justify-content-center">
                <img src="./img/profile/{$userPicture}" width="220px" height="280px" />
            </div>
            <form method="post" enctype="multipart/form-data">
                <div class="breadcrumb bg-dark user_picture justify-content-center">
                    <input type="file" name="userPicUpload" id="userPicUpload" class="btn btn-default">
                    <input type="submit" name="upload" class="btn btn-default" value="Upload Image">
                </div>
            </form>
        </div>
        <div class="col-md-8 bg-dark border_color">
            <div class="breadcrumb bg-dark card-header justify-content-center border_sep">User Details</div>
            <form action="profile" method="post" enctype="multipart/form-data">
                <div class="col-md-6 offset-md-3">
                    <label for="userName">Username</label>
                    <input name="userName" class="form-control" type="text" value="{$userName}">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="userEmail">Email</label>
                    <input name="userEmail" class="form-control" type="text" value="{$userEmail}">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="userCourse">Course</label>
                    <input name="userCourse" class="form-control" type="text" value="{$userCourse}">
                </div>
                <div class="breadcrumb bg-dark border_sep"></div>
                <div class="col-md-6 offset-md-3">
                    <label for="userFB">Facebook</label>
                    <input name="userFB" class="form-control" type="text" value="{$userFB}">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="userTW">Twitter</label>
                    <input name="userTW" class="form-control" type="text" value="{$userTW}">
                </div>
                <div class="breadcrumb bg-dark"></div>
                <button type="submit" name="update" class="btn btn-default updbutton">Update</button>
            </form>
        </div>
    </div>
</main>
{$footer}