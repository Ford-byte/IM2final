<?php
    $TeacherLogin = (isset($_POST['TeacherLogin'])) ? TeacherLogin() : "Error!!" ;
    $DeleteStudent = (isset($_POST['DeleteStudent'])) ? DeleteStudent() : "Error!!";
    $assSubmit = (isset($_POST['AssignmentSubmit'])) ? addAssignmentTask() : "Error!!";
    $deleteAss = (isset($_POST['deleteAss'])) ? deleteAss() : "Error!!";
    $deleteOneAss = (isset($_POST['deleteOneAss'])) ? deleteOneAss() : "Error!!";
    $studentLogin = (isset($_POST['studentLogin'])) ? studentLogin() : "Error!!";
    $logout = (isset($_POST['logout'])) ? logout() : "Error!!";
    // $edit_assignment = (isset($_POST['edit_assignment'])) ? edit_assignment() : "Error!!";
    function TeacherLogin(){
        $func = new Functions();
        $user = $func -> getTeacherInfo();
        $username = $_POST['uname'];
        $password = $_POST['pass'];
       try {
        foreach($user as $col => $data){
            if ($username == $data -> firstname && $password == $data -> pword) {
                return true;
            }
        }
       } catch (PDOException $e) {
        throw $e;
       }
       return false;
    }
    function DeleteStudent(){
        $func = new Functions();
        $id = $_POST['deletestudentid'];
            $func -> deleteStudent($id);
    }

    function addStudent() {
        $func = new Functions();
        $object = $func->getStudent();
        $studentFname = $_POST['addstudentFname'];
        $studentLname = $_POST['addstudentLname'];
        
        $data = array(
            'fname' => $studentFname,
            'lname' => $studentLname
        );
        
        $i = 0;

        foreach ($object as $id => $value) {
            if ($studentFname == $value->fname && $studentLname == $value->lname) {
                $i++;
            }
        }

        if ($studentFname != null && $studentLname != null) {
            if ($i == 0) {
                $func->insertStudent($data);
                return true;
            }
        }
        return false;
    };
    function EditSubmit(){
        $func = new Functions();
        $object = $func->getStudent();

        $fname = $_POST['studentFname'];
        $lname = $_POST['studentLname'];
        $id = $_POST['student_id'];
        $i=0;

        $data = array(
            'id'=> $id,
            'fname' => $fname,
            'lname' => $lname
        );

        foreach ($object as $id => $value) {
            if ($fname == $value->fname && $lname == $value->lname) {
                $i++;
            }
        }

        if ($fname != null && $lname != null) {
            if ($i == 0) {
                $func-> updateStudent($data);
                return 1;
            }
        }
        return 0;
}
function edit_assignment(){
    $func = new Functions();
    $object = $func->getAllAssignment();

    $assONEid = $_POST['ass_id'];
    $assONEname = $_POST['ass_name'];
    $subjONE = $_POST['ass_sub'];
    $i=0;

    $data = array(
        'assONEname'=> $assONEname,
        'subjONE' => $subjONE,
        'assONEid' => $assONEid
    );  

    foreach ($object as $id => $value) {
        if ($assONEname == $value->assignment_name && $subjONE == $value->subject) {
            $i++;
        }
    }

    if ($assONEname != null && $subjONE != null) {
        if ($i == 0) {
            $func-> editOneAss($data);
            return 1;
        }
    }
    return 0;
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
    function deleteAss(){
        try {   
        $id = $_POST['deletestudentass'];
        $func = new Functions();
        $func -> deleteTask($id);
        return true;
        } catch (PDOException $e) {
            throw $e;
        }
        return false;
    }
    function deleteOneAss(){
        try {   
        $id = $_POST['deleteOneAss'];
        $func = new Functions();
        $func -> deleteOneAss($id);
        return true;
        } catch (PDOException $e) {
            throw $e;
        }
        return false;
    }
    // function EditAssignmentSubmit(){
    //     $func = new Functions();
    //     $ass_name = $_POST['assme'];
    //     $subject = $_POST['subme'];
    //     $ass_id = $_GET['id'];
    //     $data = array(
    //         'ass_id'=> $ass_id,
    //         'ass_name' => $ass_name,
    //         'subject' => $subject
    //     );
    //     if($ass_name!=null && $subject!=null){
    //     $func-> editAssignment($data);
    //     header("Location:editAssignment.php");
    //     exit; 
    // } 
    // }
    function studentLogin(){
        $func = new Functions();
        $user = $func -> getStudent();
        $username = $_POST['username'];
        $password = $_POST['password'];
       try {
        foreach($user as $col => $data){
            if ($username == $data -> fname && $password == $data -> lname) {
                $id = $data -> student_id;
                return $id;
            }
        }
       } catch (PDOException $e) {
        throw $e;
       }
       return null;
    }   
    function logout(){
        return true;
    }
