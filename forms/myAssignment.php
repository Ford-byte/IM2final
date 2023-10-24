<?php
if (isset($_GET['id'])) {
$showId = $_GET['id'];
require_once('formHead.php'); 
$stud = new Functions();
$ass = $stud->show($showId);
}
?>
<div class="myassignmentbody">
    <section class="p-5">
        <div class="form ">
            <div class="container">
                <table class="table table-striped">
                    <thead class="myassignmentform">
                        <tr>
                            <th class="text-center">NO:</th>
                            <th class="text-center">ASSIGNMENT NAME</th>
                            <th class="text-center">SUBJECT</th>
                            <th class="text-center">ACTION</th>
                        </tr>
                    </thead>
                    <tbody class="myassignmentform">
                        <?php
                    $i = 0;
                    foreach ($ass as $id => $data) {
                        $i++;
                    ?>
                        <tr>
                            <td class="text-center"><?php echo $i; ?></td>
                            <td class="text-center"><?php echo $data->assignment_name; ?></td>
                            <td class="text-center"><?php echo $data->subject; ?></td>
                            <td class="text-center">
                                <button class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#ViewAssignment<?php echo $data->ass_id; ?>">
                                    VIEW
                                </button>
                            </td>   
                        </tr>
                        <!-- Modal for view assignment -->
                        <div class="modal fade" id="ViewAssignment<?php echo $data->ass_id; ?>" tabindex="-1" role="dialog"
                            aria-labelledby="ViewAssignment" aria-hidden="true">
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
                                            <input type="hidden" name="deletestudentid"
                                                value="<?php echo $data->ass_id; ?>">
                                            <div class="form-group">
                                                <label for="assignmentName">ASSIGNMENT NAME:</label>
                                                <p class="form-control"><?php print_r($data->assignment_name) ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="subject">SUBJECT:</label>
                                                <p class="form-control"><?php print_r($data->subject) ?></p>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">INSTRUCTION:</label>
                                                <p class="form-control" name="description" rows="5">
                                                    <?php print_r($data->description) ?></p>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
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
</div>
<?php require_once('formFoot.php'); ?>