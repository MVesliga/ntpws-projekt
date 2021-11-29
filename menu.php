<?php 
    print '
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="index.php?menu=1">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?menu=2">News</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?menu=3">Contact</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="index.php?menu=4">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=5">Gallery</a>
                      </li>';
                    if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
                      print '
                      <li class = "nav-item">
                        <a class="nav-link" href="index.php?menu=6">Register</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="index.php?menu=7">Sign In</a>
                      </li>';
                    }
                    else if ($_SESSION['user']['valid'] == 'true') {
                      if ($_SESSION['user']['type'] == 'A'){
                          print '
                            <li class = "nav-item">
                              <a class="nav-link" href="index.php?menu=8">Admin</a>
                            </li>';
                      }
                      print '
                      <li class = "nav-item">
                        <a class="nav-link" href="signout.php">Sign Out</a>
                      </li>';
                    }
                    print ' 
                      <li class = "nav-item">
                        <a class="nav-link" href="index.php?menu=9">Covid data</a>
                      </li> 
                  </ul>
                </div>
              </nav>
    ';
?>