<!DOCTYPE html>
<html>
<head>
    <title>
        <?= isset($title)? $title : 'Mon Applicatif de News' ?>
    </title>

    <meta charset="utf-8" />

    <!--link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"-->
    <link rel="stylesheet" href="css/bootswatch.min.css" type="text/css" />
</head>

<body>
<div id="wrap" class="container">
    <div class="page-header jumbotron" id="banner">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <h1>Chatagin & Blog</h1>
                <p class="lead">Another blog from and for Developers</p>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-6">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="/"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/news-insert.html">Ajouter une news</a>
                </li>
            </ul>
            <!--form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form-->
        </div>
    </nav>
    <div id="content-wrap">
        <section id="main">
            <?php if($user->hasFlash()) echo '<p style="text-align:center;">'. $user->getFlash(). '</p>'; ?>

            <?= $content ?>
        </section>
    </div>

    <footer></footer>
</div>
</body>
</html>