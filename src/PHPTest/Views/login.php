<!--LOGIN-->
<div>
    <h2>Login</h2>
    <form method="post" action="?controller=site&action=login">
        <div class="form-group">
            <input type="email" name="posted_params[email]" class="form-control" value="<?=$posted_params['email']?>"  placeholder="Enter email">
        </div>
        <div class="form-group">
            <input type="password"  name="posted_params[password]" class="form-control"  value="" placeholder="Password" \>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<!--LOGIN-->