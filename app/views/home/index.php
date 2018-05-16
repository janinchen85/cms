{$header}
{$navbar}
<div class="section home" id="section0">
   <div class="slog1">
      <h2>Be together</h2>
   </div>
   <div class="slog2">
      <h2>Work together</h2>
   </div>
   <div class="slog3">
      <h2>Stay together</h2>
   </div>
   <div class="hotties">
      <div class="hot_threads">
         <div class="headline red">
            <h4>HOT THREADS</h4>
         </div>
         <div class="infos_headline">
            <div class="headline1">Title</div>
            <div class="headline2">Views</div>
         </div>
         {$hotList}
         <div class="sp"></div>
      </div>
      <div class="latest_threads">
         <div class="headline orange">
            <h4>LATEST THREADS</h4>
         </div>
         <div class="infos_headline">
            <div class="headline1">Title</div>
            <div class="headline2">Time</div>
         </div>
         {$lastT}
         <div class="sp"></div>
      </div>
      <div class="latest_posts">
         <div class="headline blue">
            <h4>LATEST POSTS</h4>
         </div>
         {$lastP}
         <div class="sp"></div>
      </div>
   </div>
   <div class="welcome">
      <h1>Welcome to the EASV Community Forum</h1>
      <h3>Here you can find helpful students and many new friends</h3>
   </div>
</div>
<div class="section about" id="section1">
   <div class="abouts">
      <main role="main" class="container cat_border">
         <div class="row category_head justify-content-center">
            <ol>
               <li>{$aboutTitle}</li>
            </ol>
         </div>
         <div class="row forum_rows3 row textInput justify-content-between">
            <div class="col-md-12">{$aboutText}</div>
         </div>
         <div class="row pagination_and_button">
            <div class="col-md-12"></div>
         </div>
      </main>
   </div>
</div>
<div class="section forum" id="section2">{$forum}</div>
<div class="section rules" id="section3">
   <div class="rules">
      <main role="main" class="container cat_border">
         <div class="row category_head">
            <ol>
               <li>Rules</li>
            </ol>
         </div>
         {$success} {$error}
         <div class="{$hideForm}">
            <div class="{$hide}">
                <div class="col-md-2">ID</div>
                <div class="col-md-8">Title</div>
            </div>
               {$rulesList}
            <div class="row pagination_and_button">
                <div class="col-md-12"></div>
            </div>
        </div>
   </main>
</div>
</div>
<div class="section contact" id="section4">
   <div class="abouts">
      <main role="main" class="container cat_border">
         <div class="row category_head justify-content-center">
            <ol>
               <li>Contact</li>
            </ol>
         </div>
         <div class="row forum_rows3 row textInput justify-content-between">
            <div class="col-md-4" justify-content-between>
               <br>
               <a href="#">Contact Name:</a> {$contactName}<br>
               <a href="#">Street:</a> {$contactAddress}<br>
               <a href="#">PLZ & City:</a> {$contactPLZ} {$contactCity}<br>
               <a href="#">Telefon:</a> {$contactTel}<br>
               <a href="#">Email:</a> {$contactEmail}<br>
               <br>    
            </div>
            <div class="col-md-8" justify-content-between>
               <form method="post">
                  <br>
                  <label for="name">Your Name</label>
                  <input name="name" class="form-control" type="text">
                  <label for="email">Your Email</label>
                  <input name="email" class="form-control" type="text">
                  <label for="title">Your Subject</label>
                  <input name="title" class="form-control" type="text">
                  <label for="text">Your Text</label><br>
                  <textarea name="text"  rows="50" cols="100"></textarea>
                  <br>    
            </div>
         </div>
         <div class="row pagination_and_button">
            <div class="col-md-12">
                <button type="submit" class="button bt" name="{$buttonMethod}"><i class="fas fa-edit"></i> {$buttonText}</button>
            </div>
         </div>
         </form>
      </main>
   </div>
</div>
{$footer}