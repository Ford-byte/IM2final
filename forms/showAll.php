<?php
require_once('formHead.php');
require_once('../submission/submit.php');
$stud = new Functions();
$ass = $stud->getAllAssignment();
?>

<section class="showallbody table p-5">
    <div class="container border border-secondary studentlistform">
        <table class="table table-striped rounded">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ASSIGNMENT NAME</th>
                    <th>SUBJECT</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                foreach ($ass as $data) {
                    $i++; ?>
                    <tr>
                        <td>
                            <?php echo $i ?>
                        </td>
                        <td>
                            <?php echo $data->assignment_name; ?>
                        </td>
                        <td>
                            <?php echo $data->subject; ?>
                        </td>
                        <td>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editstudentModal<?php echo $data->id; ?>">
                                EDIT
                            </button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal<?php echo $data->id; ?>">
                                DELETE
                            </button>
                        </td>
                    </tr>
                    <!-- edit modal part -->
                    <div class="modal fade" id="editstudentModal<?php echo $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="editstudentModal" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editstudentModal">Edit Student</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                        <input type="hidden" name="ass_id" value="<?php echo $data->id; ?>">
                                        <label for="fname" class="form-label">
                                            ASSIGNMENT NAME :
                                        </label>
                                        <input type="text" class="form-control" name="ass_name" value="<?php echo $data->assignment_name; ?>" required>
                                        <br>
                                        <label for="lname" class="form-label">
                                            SUBJECT :
                                        </label>
                                        <input type="text" class="form-control" name="ass_sub" value="<?php echo $data->subject; ?>" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="edit_assignment" class="btn btn-primary">Save
                                        Changes</button>
                                </div>
                                    </form>
                            </div>
                        </div>
                    </div>
    </div>
    <!-- end of edit modal part  -->
                   
    <!-- delete modal part -->
    <div class="modal fade" id="deleteConfirmationModal<?php echo $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <input type="hidden" name="deleteOneAss" value="<?php echo $data->id; ?>">
                        Are you sure you want to delete this student?<b> NO
                            <?php echo $i; ?>
                        </b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger" name="deleteOneAssbtn" id="DeleteStudent">Yes</button>
                </div>
                </form>
            </div>
        </div>
    </div>

<?php } ?>
</tbody>
</table>
</div>
<form action="studentList.php" class="text-center m-4">
<button type="submit" class="btn btn-secondary" >BACK</button>
</form>
</section>
<?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_assignment'])) {
                        $success = edit_assignment();
                        if ($success) {
                            echo "<script>
                            Swal.fire({
                                title: 'Successfully!',
                                icon: 'success',
                                showCancelButton: false,
                                showConfirmButton: true,
                            });
                        
                            setTimeout(() => {
                                window.location.href = 'showAll.php';
                            }, 1000);
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

<?php require_once('formFoot.php'); ?>