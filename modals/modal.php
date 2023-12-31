<div class="modal fade" id="addstudentmodal" tabindex="-1" role="dialog" aria-labelledby="addstudentmodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addstudentmodal">Add Student</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <label for="fname" class="form-label">
                        FIRST NAME:
                    </label>
                    <input type="text" class="form-control" id="fname" name="addstudentFname" required>
                    <br>
                    <label for="lname" class="form-label">
                        LAST NAME:
                    </label>
                    <input type="text" class="form-control" id="lname" name="addstudentLname" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="addStudent" class="btn btn-primary" value="ADD STUDENT">
            </div>
            </form>
        </div>
    </div>
</div>

<!-- add student end here -->
<?php
require_once('formHead.php');
$func = new Functions();
$objects = $func->getTeacherInfo();
$ass = $func->showAllAssignment();
foreach ($objects as $id => $value) {
?>

    <div class="modal fade" id="addAssignmentmodal" tabindex="-1" role="dialog" aria-labelledby="addAssignmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAssignmentModalLabel">Add Assignment</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="AssignmentSubmit" method="post">
                        <div class="form-group">
                            <label for="AssignmentName">
                                <h3>ASSIGNMENT NAME:</h3>
                            </label>
                            <input type="text" class="form-control" name="assname" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                <h3>SUBJECT</h3>
                            </label>
                            <input type="text" class="form-control" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="description">
                                <h3>INSTRUCTION</h3>
                            </label>
                            <textarea type="" class="form-control" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="teacher">
                                <h3>TEACHER</h3>
                            </label>
                            <input type="text" class="form-control" name="teacher" value="Sir <?php echo $value->firstname; ?>">
                            <input type="hidden" name="teachers_id" value="<?php echo $value->teachers_id; ?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="AssignmentSubmit" class="btn btn-primary">ADD ASSIGNMENT</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- show all modal starts here -->
<div class="modal fade" id="showAll" tabindex="-1" role="dialog" aria-labelledby="showAll" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showAll">Show All assigned Assignment</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form">
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>NO:</th>
                                    <th>ASSIGNMENT NAME</th>
                                    <th>INSTRUCTION</th>
                                    <th>SUBJECT</th>
                                    <th>FIRSTNAME</th>
                                    <th>LASTNAME</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $i = 0;
                                foreach ($ass as $id => $data) {
                                    $i++;
                                ?> <form method="post">
                                        <tr>
                                            <input type="hidden" name="deletestudentass" value="<?php print_r($data->ass_id) ?>">
                                            <td><?php echo $i;  ?>
                                            <td><?php print_r($data->assignment_name) ?></td>
                                            <td><?php print_r($data->description) ?></td>
                                            <td><?php print_r($data->subject) ?></td>
                                            <td><?php print_r($data->fname) ?></td>
                                            <td><?php print_r($data->lname) ?></td>
                                            <td>
                                                <button class="btn btn-danger" name="deleteAss">
                                                    DELETE
                                                </button>
                                            </td>
                                    </form>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="text-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="../styling/index.js"></script>
<?php require_once('formFoot.php'); ?>