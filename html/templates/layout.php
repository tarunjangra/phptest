<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="./">PHPTestHome</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="<?=($this->action=='login')?'active':''?>"><a href="?controller=site&action=login">Login</a></li>
                    <li class="<?=($this->action=='register')?'active':''?>"><a href="?controller=site&action=register">Signup</a></li>
                </ul>
                <div style="float:right; position: relative; top:8px;">
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Search...">
                        </div>
                        <button type="submit" class="btn btn-primary">Go</button>
                    </form>
                </div>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
    <?php
      include($this->config->views.DIRECTORY_SEPARATOR.$view.'.php');
    ?>
</div>
</body>
</body>
</html>