{$header} {$navbar}
<br>
<br>
<br>
<br>
<main role="main" class="container mx-auto w-100 justify-content-center">
    <div class="row">
        <ol class="container breadcrumb card-header bg-dark border_color">
            <li>Login</li>
        </ol>
    </div>
    {$success} {$error}
    <div class="row {$hideForm}">
        <div class="col-md-12 bg-dark border_color">
            <form method="post" enctype="multipart/form-data">
                <div class="breadcrumb bg-dark"></div>
                <div class="col-md-6 offset-md-3">
                    <label for="userName">USERNAME</label>
                    <input name="userName" class="form-control" type="text">
                </div>
                <div class="col-md-6 offset-md-3">
                    <label for="userPW">PASSWORD</label>
                    <input name="userPW" class="form-control" type="password">
                </div>
                <div class="breadcrumb bg-dark"></div>
                <div class="col-md-6 offset-md-3">
                    <button type="submit" name="login" class="btn btn-default regbutton">Login</button>
                </div>
                <div class="breadcrumb bg-dark border_sep"></div>
                <div class="col-md-6 offset-md-3">
                    <div class="social-login justify-content-center">
                        <div class="social">LOGIN WITH</div>
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
            </form>
        </div>
    </div>
</main>
{$footer}