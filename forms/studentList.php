<?php 
require_once('formHead.php');
require_once('../submission/sweetalert.php');
$stud = new Functions();
$object = $stud->getStudent();
?>

<div class="studentlistbody">
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent px-5">
        <div class="mr-2">
            <button class="btn btn-success p-2" data-bs-toggle="modal" data-bs-target="#addstudentmodal">ADD STUDENT</button>
        </div>
        <div>
            <button class="btn btn-success m-2 p-2" data-bs-toggle="modal" data-bs-target="#addAssignmentmodal">ADD ASSIGNMENT</button>
        </div>
        <div>
            <button type="submit" class="btn btn-success p-2" name="showAll" data-bs-toggle="modal" data-bs-target="#showAll">SHOW ALL ASSIGNMENT</button>
        </div>

    </nav>

    <section class="table p-5">
        <div class="container border border-secondary studentlistform">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($object as $data) { ?>
                        <tr>
                            <td><?php echo $data->student_id; ?></td>
                            <td><?php echo $data->fname; ?></td>
                            <td><?php echo $data->lname; ?></td>
                            <td>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editstudentModal<?php echo $data->student_id;?>">
                                    EDIT
                                </button>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal<?php echo $data->student_id; ?>">
                                    DELETE
                                </button>
                             </td>
                        </tr>
                        <!-- edit modal part -->
                        <div class="modal fade" id="editstudentModal<?php echo $data->student_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editstudentModal" aria-hidden="true">
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
                            <label for="fname" class="form-label">
                                FIRST NAME:
                            </label>
                            <input type="text" class="form-control" id="fname" name="studentFname" required>
                            <br>
                            <label for="lname" class="form-label">
                                LAST NAME:
                            </label>
                            <input type="text" class="form-control" id="lname" name="studentLname" required> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="addStudent" class="btn btn-primary">ADD STUDENT</button>
                        </div>
                        </form>
                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end of edit modal part  -->
                        <!-- delete modal part -->
<div class="modal fade" id="deleteConfirmationModal<?php echo $data->student_id; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
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
            <input type="hidden" name="deletestudentid" value="<?php echo $data->student_id; ?>">
                Are you sure you want to delete this student? <b><?php echo $data->student_id; ?></b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="submit" class="btn btn-danger" name="DeleteStudent" id="DeleteStudent">Yes</button>
            </div>
            </form>
        </div>
    </div>
</div>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
<script src="../styling/index.js"></script>
<?php require_once('formFoot.php'); ?>
