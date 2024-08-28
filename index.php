<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUDE-operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Arial', sans-serif;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            font-weight: bold;
            font-size: 16px;
        }

        .btn-danger {
            font-weight: bold;
            font-size: 16px;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .table tbody td {
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <?php include_once 'part/nav.php'; ?>
    <?php
    session_start();
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION['status'] . '!</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        unset($_SESSION['status']);
    }

    if (isset($_SESSION['deleted'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>' . $_SESSION['deleted'] . '!</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        unset($_SESSION['deleted']);
    }
    ?>

    <div class="container mt-5">
        <h1 class="text-center text-primary mb-4">Registration Form</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form action="Code.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label">Upload Image</label>
                            <input type="file" name="imgfile" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label><br>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="radio1" value="Male" id="male" class="form-check-input" required>
                                <label for="male" class="form-check-label">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="radio1" value="Female" id="female" class="form-check-input" required>
                                <label for="female" class="form-check-label">Female</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Language</label><br>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="language[]" value="Gujarati" id="gujarati" class="form-check-input">
                                <label for="gujarati" class="form-check-label">Gujarati</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="language[]" value="English" id="english" class="form-check-input">
                                <label for="english" class="form-check-label">English</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="language[]" value="Hindi" id="hindi" class="form-check-input">
                                <label for="hindi" class="form-check-label">Hindi</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="language[]" value="Spanish" id="spanish" class="form-check-input">
                                <label for="spanish" class="form-check-label">Spanish</label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Interest</label><br>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="interest[]" value="Sport" id="sport" class="form-check-input">
                                <label for="sport" class="form-check-label">Sport</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="interest[]" value="Music" id="music" class="form-check-input">
                                <label for="music" class="form-check-label">Music</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="interest[]" value="Reading" id="reading" class="form-check-input">
                                <label for="reading" class="form-check-label">Reading</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="interest[]" value="Traveling" id="traveling" class="form-check-input">
                                <label for="traveling" class="form-check-label">Traveling</label>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="table-responsive border border-2 rounded">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">IMAGE</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">GENDER</th>
                            <th scope="col">LANGUAGES</th>
                            <th scope="col">INTEREST</th>
                            <th scope="col">UPDATE</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'part/_db_connect.php';
                        $sql = "SELECT * FROM `user data`";
                        $result = mysqli_query($conn, $sql);
                        foreach ($result as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $row['id'];  ?></th>
                                <td><img src="<?= $row['img']; ?>" height="100px" width="100px" alt=""></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['gender']; ?></td>
                                <td><?= $row['language']; ?></td>
                                <td><?= $row['interest']; ?></td>
                                <td>
                                    <a class="btn btn-primary" href="edit.php?userid=<?= $row['id'] ?>">Edit</a>
                                </td>
                                <td>
                                    <form action="delete.php" method="post">
                                        <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
