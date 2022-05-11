<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/mainStyle.css"/>
    <style>
        .log_button{

    width: 200px;
    margin-left: 720px;
}
    </style>
</head>
<body>
<header>
    <h1>
        <a href="<?=Rout::url('logIn')?>">
            <img src="/images/logo.png" alt="logo"/>
        </a>
    </h1>
    <div class="log_button">
        <p><a href="<?=Rout::url('createArticleForm')?>">Create article</a></p>
        <p><a href="<?=Rout::url('index')?>">Log out</a></p>
    </div>
</header>
<main>
    <lsb class="lsb">
        <h2>Here can be your advertising</h2>
        <h2>Here can be your advertising</h2>
        <h2>Here can be your advertising</h2>
        <h2>Here can be your advertising</h2>
        <h2>Here can be your advertising</h2>
        <h2>Here can be your advertising</h2>
        <h2>Here can be your advertising</h2>
        <h2>Here can be your advertising</h2>
    </lsb>
    <rsb class="rsb">
        <?php include_once 'includes'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$page.'.php';?>
    </rsb>
</main>
<div class="nav">
    <div class="nav_button">
        <p><a href="#">about us</a></p>
        <p><a href="#">contacts</a></p>
        <p><a href="#">references</a></p>
    </div>
</div>
<footer>
    <a href="#">Ioann web-studio</a> 2022 &copy;
</footer>
</body>
</html>
