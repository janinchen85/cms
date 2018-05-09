{$header}
{$navbar}
<br><br><br><br>
<main role="main" class="container mx-auto w-100 justify-content-center">
    <div class="row">
        <ol class="container breadcrumb card-header bg-dark border_color">
            <li class="active">&nbsp;Your Profile</li>
        </ol>  
    </div>
    <div class="row">
        <div class="col-md-4 bg-dark border_color">
            <div class="breadcrumb bg-dark card-header justify-content-center border_sep">User Picture</div>
            <div class="breadcrumb bg-dark user_picture justify-content-center">
                <img src="../img/profile/{$userPicture}" width="220px" height="280px"/>
            </div>
        </div>
        <div class="col-md-8 bg-dark border_color">
            <div class="breadcrumb bg-dark card-header justify-content-center border_sep">User Details</div>
            <div class="col-md-6 offset-md-3">
                <div class="row">
                    <div class="col-md-4">Username:</div>
                    <div class="col-md-4">{$userName}</div>
                </div>               
            </div>
            <div class="col-md-6 offset-md-3">
            <div class="row">
                    <div class="col-md-4">Email:</div>
                    <div class="col-md-4">{$userEmail}</div>
                </div>   
            </div>    
            <div class="col-md-6 offset-md-3">
            <div class="row">
                <div class="col-md-4">Course:</div>
                    <div class="col-md-4">{$userCourse}</div>
                </div>   
            </div>
            <div class="breadcrumb bg-dark border_sep"></div>
            <div class="col-md-6 offset-md-3">
            <div class="row">
                    <div class="col-md-4">Facebook:</div>
                    <div class="col-md-4">{$userFB}</div>
                </div>   
            </div>
            <div class="col-md-6 offset-md-3">
            <div class="row">
                <div class="col-md-4">Twitter:</div>
                    <div class="col-md-4">{$userTW}</div>
                </div>   
            </div>
            <div class="breadcrumb bg-dark border_sep"></div>
            <div class="col-md-6 offset-md-3">
            <div class="row">
                    <div class="col-md-4">Rang:</div>
                    <div class="col-md-4">{$userRang}</div>
                </div>   
            </div>
            <div class="col-md-6 offset-md-3">
            <div class="row">
                    <div class="col-md-4">Posts:</div>
                    <div class="col-md-4">{$userPosts}</div>
                </div>   
            </div>
            <div class="col-md-6 offset-md-3">
            <div class="row">
                    <div class="col-md-4">Last post:</div>
                    <div class="col-md-4">{$userLastPost}</div>
                </div>   
            </div>        
        </div>
    </div>
</main>
{$footer}