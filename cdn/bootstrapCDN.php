<?php 
require_once('../forms/formHead.php'); 
$stud = new Functions();
$object = $stud->getStudent();
?>

<div class="studentlistbody">
    <nav class="navbar navbar-expand-lg navbar-light bg-light bg-transparent px-5">
        <div class="mr-2">
            <form action="addStudent.php" method="post">
                <button class="btn btn-success p-2" name="addStudentBtn">ADD STUDENT</button>
            </form>
        </div>
        <div>
            <form action="addAssignment.php" method="post">
                <button class="btn btn-success m-2" name="addAssignment">ADD ASSIGNMENT</button>
            </form>
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
                                <input type="submit" class="btn btn-danger" name="DeleteStudent[<?php echo $data->student_id; ?>]" value="DELETE">
                            </td>
                        </tr>
                        <!-- modal part -->
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
                                        <form method="post">
                                            <input type="hidden" name="student_id" value="<?php echo $data->student_id; ?>">
                                            <div class="form-group">
                                                <label for="editFirstName">First Name:</label>
                                                <input type="text" class="form-control" name="fname" value="<?php echo $data->fname; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="editLastName">Last Name:</label>
                                                <input type="text" class="form-control" name="lname" value="<?php echo $data->lname; ?>">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="EditSubmit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end of modal part  -->
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</div>

<?php require_once('../forms/formFoot.php'); ?>
