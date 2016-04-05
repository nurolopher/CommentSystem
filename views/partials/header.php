<?php include($_SERVER['DOCUMENT_ROOT'] . '/config/DbConnection.php') ?>
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Comment System</title>
    <meta name="description" content="Comment System">
    <meta name="author" content="Nursultan Turdaliev">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"
          integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/style.css">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <ul class="nav navbar-nav ">
            <li><a href="/">Home</a></li>
            <li><a href="/post/new-post.php">New Post</a></li>
        </ul>
    </div>
</nav>