<?php 
require_once('formHead.php'); 
$stud = new Functions();
$ass = $stud -> showAllAssignment();
?>

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

<?php require_once('formFoot.php'); ?> 