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
    <form id="addStudent" method="POST">
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
    <div id="successMessage" style="display: none;">Student added successfully!</div>
</div>

                            </div>
</div>

<!-- add student end here -->
<?php 
require_once('formHead.php');
$func = new Functions();
$objects = $func -> getTeacherInfo();
$ass = $func -> showAllAssignment();
foreach($objects as $id => $value){
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
                        <label for="AssignmentName"><h3>ASSIGNMENT NAME:</h3></label>
                        <input type="text" class="form-control" name="assname" required>
                    </div>
                    <div class="form-group">
                        <label for="subject"><h3>SUBJECT</h3></label>
                        <input type="text" class="form-control" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="description"><h3>DESCRIPTION</h3></label>
                        <textarea type="" class="form-control" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="teacher"><h3>TEACHER</h3></label>
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

<div class="modal fade" id="showAll" tabindex="-1" role="dialog" aria-labelledby="showAll" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="showAll">Show All Assignment</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <section>
    <div class="form">
                <div class="row justify-content-center p-2 m-4">
                    <table class="table">
                        <th>NO:</th>
                        <th>ASSIGNMENT NAME</th>
                        <th>SUBJECT</th>
                        <th>FIRSTNAME</th>
                        <th>LASTNAME</th>
                    <tbody>
                        <form method="post">
                            <?php
                            $i = 0;
                            foreach ($ass as $id => $data) {
                            $i++;
                                ?>
                            
                            <tr>
                                <td><?php echo $i;  ?></td>
                                <td><?php print_r($data -> assignment_name)?></td>
                                <td><?php print_r($data -> subject)?></td>
                                <td><?php print_r($data -> fname)?></td> 
                                <td><?php print_r($data -> lname)?></td>         
                            </tr>
                           
                            <?php }?>
                        </form>
                    </tbody>
                </table>
                </div>
            </div>
    </section>
                                        <div class="text-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                            </div>
    </div>
</div>

<script src="../styling/index.js"></script>
<?php } require_once('formFoot.php'); ?> 