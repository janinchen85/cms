{$header} {$navbar}
<br>
<br>
<br>
<br>
<main role="main" class="container mx-auto w-100 justify-content-center">
    <div class="row">
        <ol class="container breadcrumb card-header bg-dark border_color">
            <li>Registration</li>
        </ol>
    </div>
    {$success} {$error}
    <div class="row {$hideForm}">
        <div class="col-md-12 bg-dark border_color">
            <div class="breadcrumb bg-dark"></div>
            <form method="post">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <label for="userName">USERNAME</label>
                        <input name="userName" class="form-control" type="text" value="{$userName}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <label for="userEmail">EMAIL</label>
                        <input name="userEmail" class="form-control" type="email" value="{$userEmail}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <label for="userPW">PASSWORD</label>
                        <input name="userPW" class="form-control" type="password" value="{$userPW}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <label for="confirmPW">CONFIRM PASSWORD</label>
                        <input name="confirmPW" class="form-control" type="password" value="{$confirmPW}">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <button type="submit" name="register" class="btn btn-default regbutton">Register</button>
                    </div>
                </div>
            </form>
            <div class="breadcrumb bg-dark border_sep"></div>
            <div class="col-md-6 offset-md-3">
                <div class="social-login justify-content-center">
                    <div class="social">REGISTER WITH</div>
                    <ul>
                        <li>
                            <a href="">
                                <i class="fab fa-facebook-f"></i> Facebook</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fab fa-google-plus-g"></i> Google+</a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fab fa-twitter"></i> Twitter</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="breadcrumb bg-dark"></div>
            <div class="breadcrumb bg-dark"></div>
        </div>
    </div>
</main>
{$footer}