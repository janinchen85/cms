<main role="main" class="container mx-auto w-100 justify-content-center">
    <div class="row">
        <ol class="col-md-6 offset-md-3 breadcrumb bg-dark border_color">
            <li>Login</li>
        </ol>  
    </div>
    {$success}
    {$error}
<div class="container mx-auto w-100 justify-content-center">
        <div class="row">
            <div class="col-md-6 offset-md-3 card-header bg-dark border_color">
                <form method="post"> 
                    <div class="row">      
                        <div class="col-md-6 offset-md-3">
                            <label for="userName">USERNAME</label>
                            <input name="userName" class="form-control" type="text">    
                        </div>            
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <label for="userPW">PASSWORD</label>
                            <input name="userPW" class="form-control" type="password">             
                        </div>            
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <button type="submit" name="login" class="btn btn-default regbutton">Login</button>
                        </div>        
                    </div>    
                </form>
            </div>
        </div>
        <div class="row ">
            <div class="col-md-6 offset-md-3 card-header bg-dark border_color">
                <div class="social-login justify-content-center">
                    <div class="col-md-12 social">LOGIN WITH</div>
                    <ul>
                        <li><a href=""><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href=""><i class="fab fa-google-plus-g"></i> Google+</a></li>
                        <li><a href=""><i class="fab fa-twitter"></i> Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>