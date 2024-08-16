<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php include 'part/nav.php' ?>
    <?php include 'part/_db_connect.php' ?>

    <?php

    if (isset($_GET['userid'])) {

        $id = $_GET['userid'];
        $sqlEdit = "SELECT * FROM `user data` WHERE `user data`.`id` ='$id'";

        $resultEdit = mysqli_query($conn, $sqlEdit);

        while ($row = mysqli_fetch_assoc($resultEdit)) {

            $lang = $row['language'];
            $language1 = explode(",", $lang);

            $inte = $row['interest'];
            $interst = explode(",", $inte);

    ?>

            <div class="w-50 m-auto my-5 ">
                <div class="container">
                    <h1>Edit User</h1>
                    <form action="edit_code.php" method="post">
                        <input type="hidden" name="user_id" value="<?= $row['id']; ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" value="<?= $row['name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" value="<?= $row['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fs-4 mx-4 bold ">Gender</label>
                            <label for="">Male</label> <input type="radio" value="male" name="radio1"
                                <?php echo $row['gender'] == 'male' ? 'checked' : ''; ?>>

                            <label for="">Femal</label> <input type="radio" value="femal" name="radio1"
                                <?php
                                if ($row['gender'] == "femal") {
                                    echo 'checked';
                                }
                                ?>>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fs-4 mx-4 bold ">language</label>
                            <label for="">Gujarati</label> <input type="checkbox" value="gujarati" name="language[]"

                                <?php
                                if (in_array('gujarati', $language1)) {
                                    echo "checked";
                                }
                                ?>>

                            <label for="">English</label> <input type="checkbox" value="english" name="language[]"
                                <?php
                                if (in_array('english', $language1)) {
                                    echo "checked";
                                }
                                ?>>

                            <label for="">Hidi</label> <input type="checkbox" value="hindi" name="language[]"
                                <?php
                                if (in_array('hindi', $language1)) {
                                    echo "checked";
                                }
                                ?>>

                            <label for="">Spanish</label> <input type="checkbox" value="spanish" name="language[]"
                                <?php
                                if (in_array('spanish', $language1)) {
                                    echo "checked";
                                }
                                ?>>



                            <div class="mb-3">
                                <label for="" class="form-label m-auto ms-auto  fs-4 mx-4 bold ">Interest</label>
                                <label for="">Sport</label>
                                <input type="checkbox" value="Sport" name="interest[]" class="p-2 me-3"
                                    <?php echo in_array("Sport", $interst) ? 'checked' : '' ?>>

                                <label for="">Music</label>
                                <input type="checkbox" value="Music" name="interest[]" class="p-2 me-3"
                                    <?= in_array('Music', $interst) ? 'checked' : ''; ?>>

                                <label for="">Reading</label>
                                <input type="checkbox" value="Reading" name="interest[]" class="p-2 me-3"
                                    <?php echo in_array("Reading", $interst) ? 'checked' : '' ?>>

                                <label for="">Traveling</label>
                                <input type="checkbox" value="Traveling" name="interest[]" class="p-2 me-3"
                                    <?= in_array("Traveling", $interst) ? 'checked' : '' ?>>

                            </div>


                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
    <?php
        }
    } else {
        echo "Record was Not Found";
    } ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>