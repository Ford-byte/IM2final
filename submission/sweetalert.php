<?php
require_once('submit.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['TeacherLogin'])) {
    $loginSuccessful = TeacherLogin();
    if ($loginSuccessful) {
        echo "<script>
            Swal.fire({
                title: 'Login Successfully!',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: true,
                timer: 1500 
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'studentList.php';
                }else{
                    setTimeout(() => {
                        window.location.href = 'studentList.php';
                    }, 500);
                }
                });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Login Unsuccessful!',
                icon: 'warning',
                showCancelButton: false,
                showConfirmButton: true,
                timer: 2000 
            });
        </script>";
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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteAss'])) {
    $loginSuccessful = deleteAss();
    if ($loginSuccessful) {
        echo "<script>
            Swal.fire({
                title: 'Deleted Successfully!',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: true,
                timer: 1500 
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'studentList.php';
                }
                });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Delete Unsuccessful!',
                icon: 'warning',
                showCancelButton: false,
                showConfirmButton: true,
                timer: 2000 
            });
        </script>";
    }
};
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteOneAssbtn'])) {
    $loginSuccessful = deleteOneAss();
    if ($loginSuccessful) {
        echo "<script>
            Swal.fire({
                title: 'Deleted Successfully!',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: true,
                timer: 1500 
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'studentList.php';
                }
                });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Login Unsuccessful!',
                icon: 'warning',
                showCancelButton: false,
                showConfirmButton: true,
                timer: 2000 
            });
        </script>";
    }
};
if (isset($_POST['logout'])) {
    $loginSuccessful = logout();
    if ($loginSuccessful) {
        echo "<script>
            Swal.fire({
                title: 'Successfully!',
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: true,
                timer: 1500 
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'teacherLogin.php';
                }
                });
        </script>";
    }
};
?>