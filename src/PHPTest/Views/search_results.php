
    <div class="row">
        <div class="col-md-3">Name</div>
        <div class="col-md-3">Email</div>
    </div>
    <?php
    if(sizeof($users)) {
        foreach ($users as $user) {
            ?>
            <div class="row">
                <div class="col-md-3"><?= $user->name ?></div>
                <div class="col-md-3"><?= $user->email ?></div>
            </div>
            <?php
        }
    }else{
        ?>
        <div class="row">
            <div class="col-md-3">Sorry, No records found</div>
        </div>
    <?php
    }
    ?>