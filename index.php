<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUDE-operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    include_once 'part/nav.php';
    ?>
    <?php
    session_start();
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> ' . $_SESSION['status'] . '!</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        unset($_SESSION['status']);
    }
    ?>
    <?php

    if (isset($_SESSION['deleted'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong> ' . $_SESSION['deleted'] . '!</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
        unset($_SESSION['deleted']);
    }
    ?>


    <div class="w-50 m-auto my-5 fs-5 ">
        <div class="container">
            <form action="Code.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter You Name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email address" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label m-auto ms-auto fs-4 mx-4 bold ">Gender</label>
                    <label for="">Male</label> <input type="radio" value="Male" name="radio1" class="p-2 me-3">
                    <label for="">Femal</label> <input type="radio" value="Femal" name="radio1" class="p-2 me-3">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label m-auto ms-auto  fs-4 mx-4 bold ">Language</label>
                    <label for="">Gujarati</label> <input type="checkbox" value="gujarati" name="language[]" class="p-2 me-3">
                    <label for="">English</label> <input type="checkbox" value="english" name="language[]" class="p-2 me-3">
                    <label for="">Hidi</label> <input type="checkbox" value="hindi" name="language[]" class="p-2 me-3">
                    <label for="">Spanish</label> <input type="checkbox" value="spanish" name="language[]" class="p-2 me-3">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label m-auto ms-auto  fs-4 mx-4 bold ">Interest</label>
                    <label for="">Sport</label> <input type="checkbox" value="Sport" name="interest[]" class="p-2 me-3">
                    <label for="">Music</label> <input type="checkbox" value="Music" name="interest[]" class="p-2 me-3">
                    <label for="">Reading</label> <input type="checkbox" value="Reading" name="interest[]" class="p-2 me-3">
                    <label for="">Traveling</label> <input type="checkbox" value="Traveling" name="interest[]" class="p-2 me-3">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>



    <div class="container">
        <div class="table-1 mt-5 mx-auto  border border-2">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
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
                    <tr>
                        <?php
                        include 'part/_db_connect.php';
                        $sql = "SELECT * FROM `user data`";

                        $result = mysqli_query($conn, $sql);

                        foreach ($result as $row) {

                        ?>
                            <th scope="row"><?= $row['id'];  ?></th>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['gender']; ?> </td>
                            <td><?= $row['language'] ?></td>
                            <td><?= $row['interest'] ?></td>
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
                </tr>

                </tbody>
            </table>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>