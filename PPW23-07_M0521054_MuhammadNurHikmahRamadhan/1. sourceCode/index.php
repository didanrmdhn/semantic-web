<?php
session_start();
$id = isset($_SESSION["id"]) ? $_SESSION["id"] : "";
$firstName = isset($_SESSION["firstname"]) ? $_SESSION["firstname"] : "";
$lastname = isset($_SESSION["lastname"]) ? $_SESSION["lastname"] : "";
$address = isset($_SESSION["address"]) ? $_SESSION["address"] : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>

<body style="background-color: lightgrey;">
    <div class="container">
        <div style="height:50px;"></div>
        <div class="well" style="margin:auto; padding:auto; width:80%;">
            <span style="font-size:25px; color: grey">
                <center><strong>Data Mahasiswa</strong></center>
            </span>
            <div class="row">
                <form method="POST" action="<?= $id == "" ? "addnew.php" : "edithandler.php" ?>">
                    <input type="hidden" class="form-control" name="id" value="<?= $id ?>">
                    <div class="row mt-3">
                        <div class="col-lg-2">
                            <label class="control-label" style="position:relative; top:7px;">Firstname:</label>
                            <div style="height:10px;"></div>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="firstname" value="<?= $firstName ?>">
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label class="control-label" style="position:relative; top:7px;">Lastname:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="lastname" value="<?= $lastname ?>">
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label class="control-label" style="position:relative; top:7px;">Address:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="address" value="<?= $address ?>">
                        </div>
                    </div>

                    <div class="lg-12 d-flex justify-content-end mt-5">
                        <span class="pull-left"><button type="submit" class="btn <?= $id == "" ? "btn-primary" : "btn-warning" ?> mt-2"><span class="glyphicon glyphicon-plus"></span><?= $id == "" ? "Add New" : "Edit" ?></a></span>
                    </div>

                </form>
            </div>
        </div>

        <div style="height:50px;"></div>
        <div class="row d-flex justify-content-center">
            <div class="col-10">

                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Address</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        include('conn.php');

                        $query = mysqli_query($conn, "select * from `user`");
                        $i = 1;
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?php echo ucwords($row['firstname']); ?></td>
                                <td><?php echo ucwords($row['lastname']); ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['userid']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> ||
                                    <a href="delete.php?id=<?php echo $row['userid']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
                                </td>
                            </tr>
                        <?php
                            $i++;
                        }

                        ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
    </div>
</body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

?>

</html>