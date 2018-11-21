<?php
//include auth.php file on all secure pages
include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Softwares | JamgPH</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico">
    <link href="css/css.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <span class="navbar-brand mb-0 h1">
                        <img src="icon.svg" width="30" height="30" class="d-inline-block align-top" alt=""> JAMGPH</span>
            <!-- toggler code here -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="softwares.php">Softwares</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="movies.php">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="generator.php">Generator <span class="badge badge-danger">New</span></a>
                    </li>
                    <!--
								<li class="nav-item dropdown active">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Others
									</a>
									<div class="dropdown-menu" aria-labelledby="navbarDropdown">
										<a class="dropdown-item" href="#">...</a>
										<a class="dropdown-item" href="#">...</a>
									</div>
								</li>
								-->
                    <li class="nav-item">
                        <a class="nav-link" href="/contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="logout.php">
                    <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
                </form>
            </div>
            <!-- navbar end tag -->
        </nav>
    </header>
    <!-- body started -->
    <main class="container">
        <!-- logged user body -->
        <div id="softwares-windows">
            <h1 class="mt-5">Movies</h1>
            <hr class="my-4">
            <pre id="movies"></pre>
        </div>
    </main>
    <footer class="footer">
        <div class="container" align="center">
            <span class="text-muted">www.jamgph.com</span>
        </div>
    </footer>
</body>

</html>
<!-- Javascript / JQuery BEGIN (sorry for encrypting my js) -->
<script>
$.get('links/movies.txt', function(data) {
    //var fileDom = $(data);
    var lines = data.split("\n");
    $.each(lines, function(n, links) {
        $('#movies').append('<div><a href="' + links + '</a></div>');
    });
});
</script>