<?php 
    print '
    <!DOCTYPE HTML>
    <html>
        <head>
            <title>Programiranje web aplikacija</title>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8">
            <meta name="description" content="">
            <meta name="keywords" content="">
            <meta name="author" content="Martin Vešliga">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            <title>NTPWS Projekt</title>
        </head>
    <body>
        <header>
            <div class="banner-img"></div>';
            include("menu.php");

        print '
        </header>
        <main class="container">
            <div class="row">
                <div class="col-md-12">';
                    # Homepage
                    if (!isset($_GET['menu']) || $_GET['menu'] == 1) { include("home.php"); }
                    
                    # News
                    else if ($_GET['menu'] == 2) { include("news.php"); }
                    
                    # Contact
                    else if ($_GET['menu'] == 3) { include("contact.php"); }
                    
                    # About us
                    else if ($_GET['menu'] == 4) { include("about.php"); }

                    # Gallery
                    else if ($_GET['menu'] == 5) { include("gallery.php"); }
            print '</div>
        </main>
        <footer class="footer mt-auto py-3 bg-light">
            <p style="text-align: center; font-size: 1.5rem;">Copyright &copy; 2021 Martin Vešliga. <a href="https://github.com/MVesliga?tab=repositories"><i class="fa fa-github"></i></a></p>
        </footer>
    </body>
    </html>
    '
?>