
<?php
    $servername = "localhost";
    $username = "root";
    $password = "1234";
    $database = "myblog";
    $table = "posts";
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Post - Simple Blog Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-blog-template.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="Blog.php">Simple Blog</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="about.html">About</a>
            </li>
            <li>
              <a href="login.html">Profile</a>
            </li>
            <li>
              <a href="index.php">Log out</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>


    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Post Content Column -->
        <div class="col-lg-12">
           <!-- Blog Post -->

          <!-- Title -->
        <?php
        // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);
            // Check connection
            if ($conn->connect_error) {
              //$_SESSION['msg'] = "Connection failed";
                //die("Connection failed: " . $conn->connect_error);
                    echo "connection failed!";
            }
            else{
              $id = $_GET['id'];
                  
              $sql_command = "SELECT * FROM posts WHERE idpost='".$id."'";
            
              $result = mysqli_query($conn, $sql_command);

              if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) {
                          $title = $row["title"];
                          $username = $row["username"];
                          $timepost = $row["timepost"];
                          $content = $row["content"];
                          $timepost = $row["timepost"];
                          $image = $row["image"];

                          echo '<h1 class="post-title">'.$title.'</h1>

                          <!-- Author -->
                          <p class="lead">
                            by '.$username.'
                          </p>
                
                          <hr>
                
                          <!-- Date/Time -->
                          <p><span class="glyphicon glyphicon-time"></span>'.$timepost.' </p>
                
                          <hr>
                
                          <!-- Post Content -->
                          <p>'.$content.'</p>
                          
                
                          <hr>';
                        }
                    } else {
                        echo "0 results";
                    }

              mysqli_close($conn);
            }
          ?>

          <!-- Blog Comments -->

          <!-- Comments Form -->
          <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form">
              <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>

          <hr>
          
          <!-- Posted Comments -->

          <!-- Comment -->
          <div class="media">
            <a class="pull-left" href="#">
              <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
              <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
              </h4>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
          </div>

          <!-- Comment -->
          <div class="media">
            <a class="pull-left" href="#">
              <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
              <h4 class="media-heading">Start Bootstrap
                <small>August 25, 2014 at 9:30 PM</small>
              </h4>
              Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              <!-- Nested Comment -->
              <div class="media">
                <a class="pull-left" href="#">
                  <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                  <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                  </h4>
                  Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
              </div>
              <!-- End Nested Comment -->
            </div>
          </div>

        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright &copy; Your Website 2014</p>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
      </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </body>

</html>
