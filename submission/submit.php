<?php
    $TeacherLogin = (isset($_POST['TeacherLogin'])) ? TeacherLogin() : "Error!!" ;
    $DeleteStudent = (isset($_POST['DeleteStudent'])) ? DeleteStudent() : "Error!!";
    $addStudent = (isset($_POST['addStudent'])) ? addStudent() : "Error!!";
    $EditSubmit = (isset($_POST['EditSubmit'])) ? EditSubmit() : "Error!!";
    $assSubmit = (isset($_POST['AssignmentSubmit'])) ? addAssignmentTask() : "Error!!";
    $deleteAssignment = (isset($_POST['deleteAssignment'])) ? deleteAssign() : "Error!!";
    $EditAssignmentSubmit = (isset($_POST['EditAssignmentSubmit'])) ? EditAssignmentSubmit() : "Error!!";
    $studentLogin = (isset($_POST['studentLogin'])) ? studentLogin() : "Error!!";
    $showAll = (isset($_POST['showAll'])) ? showAll() : "Error!!";
    
    if(isset($_POST['EditStudent'])){
        foreach($_POST['EditStudent'] as $student_id => $value){
            $location = 'editStudent.php?id=' . $student_id;
            header('Location: ' . $location);        
        }
    }
    if(isset($_POST['EditAssignment'])){
        foreach($_POST['EditAssignment'] as $id => $value){
            $location = 'editAssignment.php?id=' . $id;
            header('Location: ' . $location);        
        }
    }
    if(isset($_POST['ViewAssignment'])){
        foreach($_POST['ViewAssignment'] as $id => $value){
            $location = 'viewAssignment.php?id=' . $id;
            header('Location: ' . $location);        
        }
    }
    if(isset($_POST['backTOmyASSIGNMENT'])){
           header("Location:myAssignment.php");        
    }
    function TeacherLogin(){
        $func = new Functions();
        $user = $func -> getTeacherInfo();
        $username = $_POST['uname'];
        $password = $_POST['pass'];
       try {
        foreach($user as $col => $data){
            if ($username == $data -> firstname && $password == $data -> pword) {
                // header('Location:studentList.php?success=true');
            }
        }
       } catch (PDOException $e) {
        throw $e;
       }
    }
    function DeleteStudent(){
        $func = new Functions();
        $id = $_POST['deletestudentid'];
            $func -> deleteStudent($id);
    }
    function addStudent(){
        $func = new Functions();
        $object = $func -> getStudent();

        $studentFname = $_POST['studentFname'];
        $studentLname = $_POST['studentLname'];
        $i=0;
        $data = array(
            'fname' => $studentFname,
            'lname' => $studentLname
        );   


        foreach($object as $id => $value){
        if($studentFname == $value->fname && $studentLname == $value->lname){
            $i++;       
        }
    }
        if($studentFname!=null && $studentLname!=null){
            if($i==0){
                $func-> insertStudent($data);
                }
            }   
}
    function EditSubmit(){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $id = $_POST['student_id'];

    if($fname!=null && $lname!=null){
    $data = array(
        'id'=> $id,
        'fname' => $fname,
        'lname' => $lname
    );

    $insert = new Functions();

    $insert-> updateStudent($data);
    // header("Location:studentList.php?success=true");
}
}
    function addAssignmentTask(){
        $func = new Functions();
        $assname = $_POST['assname'];
        $subject = $_POST['subject'];
        $description = $_POST['description'];
        $teachers_id = $_POST['teachers_id'];

        $data = array(
            'assignment_name' => $assname,
            'subject' => $subject,
            'description' => $description,
            'teachers_id' => $teachers_id
        );
        $func-> addAssignmentTask($data);
    }
    function deleteAssign(){
        $func = new Functions();
        foreach ($_POST['deleteAssignment'] as $id => $value) {
            $func -> deleteTask($id);
           }
        header("Location:assignmentList.php?success=true"); 
    }
    function EditAssignmentSubmit(){
        $func = new Functions();
        $ass_name = $_POST['ass_name'];
        $subject = $_POST['subject'];
        $ass_id = $_GET['id'];
    
        if($ass_name!=null && $subject!=null){
        $data = array(
            'ass_id'=> $ass_id,
            'ass_name' => $ass_name,
            'subject' => $subject
        );
        $func-> editAssignment($data);
        header("Location:assignmentList.php?success=true");
        exit; 
    } 
    }
    function studentLogin(){
        $func = new Functions();
        $user = $func -> getStudent();
        $username = $_POST['username'];
        $password = $_POST['password'];
       try {
        foreach($user as $col => $data){
            if ($username == $data -> fname && $password == $data -> lname) {
                header('Location:myAssignment.php');
            }
        }
       } catch (PDOException $e) {
        throw $e;
       }
    }
    function showAll(){
        header('Location:showAllAssignment.php');
    }
?>