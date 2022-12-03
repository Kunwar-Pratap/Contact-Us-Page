<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get & Post Method - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #E0DECA;
        }

        .m-het {
            min-height: 76vh !important;
        }

        .f-bg {
            background-color: #404258;
        }
    </style>

</head>

<body>
    <nav class="navbar bg-dark nav-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="/php/exercise/new28.php">Get && Post</a>
        </div>
    </nav>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $desc = $_POST['desc'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "testContact";

        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            die("Could not connect to the database due to this error: " . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO `contacts` (`name`, `email`, `description`, `current_time_stamp`) VALUES ('$name', '$email', '$desc', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<div class="alert alert-success   alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your concern has been stored in our database. We will contact you shortly.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
                echo '<div class="alert alert-warning   alert-dismissible fade show" role="alert">
                    <strong>Failed!</strong> Your concern has not been stored in our database due to some technical issues. Please try again after some time.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }

    ?>

    <div class="container my-5 col-6 m-het">
        <h1 class="text-center mb-3">Contact With Us</h1>
        <form action="/php/exercise/new28.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Your Concern</label>
                <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-danger col-4 m-auto d-flex justify-content-center align-items-center my-4">Submit</button>
        </form>
    </div>

    <footer class="blog-footer d-flex align-items-center justify-content-center flex-column f-bg text-light">
        <p class="my-3 fs-6">This template built using <i class="fa-brands fa-bootstrap"></i> Bootstrap</a> by <a href="https://github.com/Kunwar-Pratap" class="text-info text-decoration-none">Kunwar Pratap</a></p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>