{$header}
{$navbar}
<div class="section forum" id="section2">
<br>
<br>
<br>
<br>
<br>
<br>
<main role="main" class="container cat_border">
    <div class="row category_head">
        <ol>
            <li>Contact Info</li>
        </ol>
    </div>
  {$success} {$error}
    <div class="{$hideForm}">
        <form method="post">
            <div class="row forum_rows row textInput">
                <div class="col-md-3 title"></div>
                <div class="col-md-6">
                <br>
                    <label for="contactName">Contact name</label>
                    <input name="contactName" class="form-control" type="text" value="{$contactName}">
                    <label for="contactAddress">Address</label>
                    <input name="contactAddress" class="form-control" type="text" value="{$contactAddress}">
                    <label for="contactPLZ">PLZ</label>
                    <input name="contactPLZ" class="form-control" type="text" value="{$contactPLZ}">
                    <label for="contactCity">City</label>
                    <input name="contactCity" class="form-control" type="text" value="{$contactCity}">
                    <label for="contactTel">Telefon</label>
                    <input name="contactTel" class="form-control" type="text" value="{$contactTel}">
                    <label for="contactEmail">Email</label>
                    <input name="contactEmail" class="form-control" type="text" value="{$contactEmail}">
                    <br>
                </div>
            </div>
            <div class="row pagination_and_button">
                <div class="col-md-12">
                    <button type="submit" class="button bt" name="{$buttonMethod}"><i class="fas fa-edit"></i> {$buttonText}</button>
                </div>
            </div>
        </form>
    </div>
</main>
{$footer}