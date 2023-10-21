<?php include_once("formHead.php"); ?>
<div class="studentloginbody">
    <section class="form studentloginform border border-secondary p-5 mx-5">
        <div class="row justify-content-center">
            <div class="title studentloginheader font-weight-bold text-center mb-4">
                <h1>Student Login Page</h1>
            </div>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <form action="" method="POST" class="form">
                    <div class="form-group">
                        <label for="username" class="form-label">USERNAME:</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">PASSWORD:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="text-center">
                    <button class="btn btn-secondary btn-block m-2" name="studentLogin" value="LOGIN">LOGIN</button></div>
                </form>
            </div>
        </div>
    </div>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['studentLogin'])) {
    $loginSuccessful = true;
    if ($loginSuccessful) {

        echo "<script>
            Swal.fire({
                title: 'Login Unsuccessful!',
                icon: 'warning',
                showCancelButton: false,
                showConfirmButton: true,
                timer: 2000 
            });
        </script>";
    } else {

    }
}
?>

</div>
<?php include_once("formFoot.php"); ?>