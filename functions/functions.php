<?php
require_once('../server/server.php');

class Functions{
    private $dbconn;
    private $conn;
    public function __construct(){
        try {
            $this->dbconn=new Server();
            $this->conn = $this->dbconn->_getConfig();
        } catch (PDOException $e) {
            echo "Error Database Connection".$e->getMessage();
        }
    }
    public function insertStudent($data){
        $sqlCall = "CALL insertStudent(:fname,:lname)";

        $stmt = $this->conn->prepare($sqlCall);

        $stmt -> bindParam(":fname",$data['fname']);
        $stmt -> bindParam(":lname",$data['lname']);

        return $stmt -> execute();
    }
    public function getTeacherInfo(){
        $sqlCall = "CALL getTeacherInfo()";
    
        try {

            $stmt = $this->conn->prepare($sqlCall);
            $stmt->execute();

            $results = $stmt->fetchAll();

            return $results;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function getStudent(){
        $sqlCall = "CALL getStudent()";
    
        try {

            $stmt = $this->conn->prepare($sqlCall);
            $stmt->execute();

            $results = $stmt->fetchAll();

            return $results;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function deleteStudent($id){
        try {
            $sqlCall = "CALL deleteStudent(:id)";
            $stmt = $this->conn->prepare($sqlCall);
            $stmt -> bindParam(":id",$id);
            $stmt -> execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function updateStudent($data){
        try {
            $sqlCall = "CALL updateStudent(:id,:fname,:lname)";
            $stmt = $this->conn->prepare($sqlCall);
            $stmt -> bindParam(":id",$data['id']);
            $stmt -> bindParam(":fname",$data['fname']);
            $stmt -> bindParam(":lname",$data['lname']);
            $stmt -> execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function addAssignmentTask($data){
    $sqlCall = "CALL addAssignmentTask(:assignment_name,:subject,:description,:teachers_id)";

    $stmt = $this->conn->prepare($sqlCall);

    $stmt -> bindParam(":assignment_name",$data['assignment_name']);
    $stmt -> bindParam(":subject",$data['subject']);
    $stmt -> bindParam(":description",$data['description']);
    $stmt -> bindParam(":teachers_id",$data['teachers_id']);
   
    return $stmt -> execute();
    }
    public function getAllAssignment(){
        $sqlCall = "CALL getAllAssignment()";
        try {

            $stmt = $this->conn->prepare($sqlCall);
            $stmt->execute();

            $results = $stmt->fetchAll();

            return $results;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function showOnlySubject($subject){
        $sqlCall = "CALL showOnlySubject(:subject)";
        try{
        $stmt = $this->conn->prepare($sqlCall);
        $stmt -> bindParam(":subject",$subject);
        $stmt-> execute();

        $results = $stmt -> fetchAll();

        return $results;
        }catch(PDOException $e){
            throw $e;
        }
    }
    public function deleteTask($id){
        try {
            $sqlCall = "CALL deleteAssignment(:ass_id)";
            $stmt = $this->conn->prepare($sqlCall);
            $stmt -> bindParam(":ass_id",$id);
            $stmt -> execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function editAssignment($data){
        try {
            $sqlCall = "CALL editAssignment(:ass_name,:subject,:ass_id)";
            $stmt = $this->conn->prepare($sqlCall);
            $stmt -> bindParam(":ass_name",$data['ass_name']);
            $stmt -> bindParam(":subject",$data['subject']);
            $stmt -> bindParam(":ass_id",$data['ass_id']);
            $stmt -> execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function showAllAssignment(){
        $sqlCall = "CALL try()";
    
        try {

            $stmt = $this->conn->prepare($sqlCall);
            $stmt->execute();

            $results = $stmt->fetchAll();

            return $results;
        } catch (PDOException $e) {
            throw $e;
        }
    } 
};
?>
