
<!-- REGISTRATION FORM -->
<div >
    <h2>Register your account</h2>
    <form method="post">
        <div class="form-group">
            <input type="email" name="posted_params[email]" class="form-control" value="<?=$posted_params['email']?>"  placeholder="Enter email">
        </div>
        <div class="form-group">
            <input type="text" name="posted_params[name]" class="form-control" value="<?=$posted_params['name']?>" placeholder="Name">
        </div>
        <div class="form-group">
            <input type="password" name="posted_params[password]" class="form-control"  placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" name="posted_params[repeat_password]" class="form-control"  placeholder="Repeat Password">
        </div>
        <button type="submit" name="posted_params[submit]" class="btn btn-primary">Submit</button>
    </form>
</div>
<!-- REGISTRATION FORM -->