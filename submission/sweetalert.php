<?php
require_once('submit.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['TeacherLogin'])) {
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
};
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DeleteStudent'])) {
    $loginSuccessful = true;
    if ($loginSuccessful) {
        echo "<script>
            Swal.fire({
                title: 'User Deleted',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: true,
                timer: 2000 
            });
        </script>";
    } else {

    }
};
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['AssignmentSubmit'])) {
    $loginSuccessful = true;
    if ($loginSuccessful) {
        echo "<script>
            Swal.fire({
                title: 'DONE!',
        text: 'Assignment submitted successfully!',
        icon: 'success',
                showCancelButton: false,
                showConfirmButton: true,
                timer: 2000 
            });
        </script>";
    }
};

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addStudent'])) {
    $success = addStudent();
    if ($success) {
        echo "<script>
        Swal.fire({
            title: 'Successfully!',
            icon: 'success',
            showCancelButton: false,
            showConfirmButton: true,
        });
    </script>";
    }else {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Student already exists.',
                icon: 'error',
                showCancelButton: false,
                showConfirmButton: true,
            });
        </script>";
    }
};
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['EditSubmit'])) {
    $success = EditSubmit();
    if ($success) {
        echo "<script>
        Swal.fire({
            title: 'Successfully!',
            icon: 'success',
            showCancelButton: false,
            showConfirmButton: true,
        });
    </script>";
    }else {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Student already exists or required fields are empty.',
                icon: 'error',
                showCancelButton: false,
                showConfirmButton: true,
            });
        </script>";
    }
};
?>
                        