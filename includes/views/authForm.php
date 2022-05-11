<?php if (!empty($errors)):?>
    <div class="errors">
        <ul>
            <?php foreach ($errors as $error):?>
                <li><?= $error?></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>
<?php if (isset($success)):?>
    <h2 style="color: #49ff96"><?=$success?></h2>
<?php endif;?>
<form method="post" action="<?=Rout::url('authUser')?>">
    <div>User authorization</div>
    <label>Email:
        <input type="text" name="email">
    </label>
    <label>Password:
        <input type="password" name="pass" >
    </label>
    <input type="submit" value="Log in">
</form>
