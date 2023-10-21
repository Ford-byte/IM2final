<?php
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
                icon: 'warning',
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
    } else {

    }
};
?>