<?php if (!empty($errors)):?>
    <div class="errors">
        <ul>
            <?php foreach ($errors as $error):?>
                <li><?= $error?></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>
<form method="post" action="<?=Rout::url('registrationUser')?>">
    <div>Registration new user</div>
    <label>Email:
        <input type="text" name="email" required>
    </label>
    <label>Password:
        <input type="password" name="pass" required>
    </label>
    <label>PassConfirm:
        <input type="password" name="passConfirm" required>
    </label>
    <input type="submit" value="Sign in">
</form>
