<!doctype html>
<html lang="en">

<head>
    <?php
include './components/header.php';
?>
    <title>Vesen Computing</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row mt-4">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-4">
                <form method="POST" action="server.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <!-- display errors captured here  -->


                            <label for="inputEmail4">Name</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Enter Name"
                                name="user_name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Phone</label>
                            <input type="number" class="form-control" id="inputPassword4"
                                placeholder="Enter phone number" name="user_phone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Email</label>
                        <input type="email" name="user_email" class="form-control" id="inputAddress"
                            placeholder="Enter email address" required>
                    </div>


                    <button type="submit" class="btn btn-primary btn-block" name="submit-btn">Submit</button>
                </form>

            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php
include './components/scripts.php';
?>

</body>

</html>