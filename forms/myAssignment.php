<?php 
require_once('formHead.php'); 
$stud = new Functions();
$ass = $stud->getAllAssignment();
?>
<section>
    <form action="showAllAssignment.php" method="post">
        <input type="submit" name="showAll" class="btn btn-primary m-4" value="SHOW ALL ASSIGNMENT">
    </form>
</section>
<section>
    <div class="form">
        <div class="container">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">NO:</th>
                        <th class="text-center">ASSIGNMENT NAME</th>
                        <th class="text-center">SUBJECT</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($ass as $id => $data) {
                        $i++;
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $i; ?></td>
                        <td><?php echo $data->assignment_name; ?></td>
                        <td><?php echo $data->subject; ?></td>
                        <td class="text-center">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ViewAssignment<?php echo $data->id; ?>">
                                VIEW
                            </button>
                        </td>
                    </tr>
                    <!-- Modal for view assignment -->
                    <div class="modal fade" id="ViewAssignment<?php echo $data->id; ?>" tabindex="-1" role="dialog" aria-labelledby="ViewAssignment" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="ViewAssignment">View Assignment</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" class="form">
                                        <input type="hidden" name="deletestudentid" value="<?php echo $data->id; ?>">
                                        <div class="form-group">
                                            <label for="assignmentName">ASSIGNMENT NAME:</label>
                                            <p class="form-control"><?php print_r($data->assignment_name) ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="subject">SUBJECT:</label>
                                            <p class="form-control"><?php print_r($data->subject) ?></p>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">DESCRIPTION:</label>
                                            <textarea class="form-control" name="description" rows="5"><?php print_r($data->description) ?></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Modal view ends here -->
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once('formFoot.php'); ?>
