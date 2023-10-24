<?php
require_once('../server/server.php');

class Functions
{
    private $dbconn;
    private $conn;
    public function __construct()
    {
        try {
            $this->dbconn = new Server();
            $this->conn = $this->dbconn->_getConfig();
        } catch (PDOException $e) {
            echo "Error Database Connection" . $e->getMessage();
        }
    }
    public function insertStudent($data)
    {
        $sqlCall = "CALL insertStudent(:fname,:lname)";

        $stmt = $this->conn->prepare($sqlCall);

        $stmt->bindParam(":fname", $data['fname']);
        $stmt->bindParam(":lname", $data['lname']);

        return $stmt->execute();
    }
    public function getTeacherInfo()
    {
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
    public function getStudent()
    {
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
    public function deleteStudent($id)
    {
        try {
            $sqlCall = "CALL deleteStudent(:id)";
            $stmt = $this->conn->prepare($sqlCall);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function deleteAssignment($id)
    {
        try {
            $sqlCall = "CALL deleteAssignment(:assid)";
            $stmt = $this->conn->prepare($sqlCall);
            $stmt->bindParam(":assid", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function updateStudent($data)
    {
        try {
            $sqlCall = "CALL updateStudent(:id,:fname,:lname)";
            $stmt = $this->conn->prepare($sqlCall);
            $stmt->bindParam(":id", $data['id']);
            $stmt->bindParam(":fname", $data['fname']);
            $stmt->bindParam(":lname", $data['lname']);
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function EditAssSubmit($data){
        try {
            $sqlCall = "CALL editAssignment(:ass_name,:subject,:ass_id)";
            $stmt = $this->conn->prepare($sqlCall);
            $stmt->bindParam(":ass_name", $data['ass_name']);
            $stmt->bindParam(":subject", $data['subject']);
            $stmt->bindParam(":ass_id", $data['ass_id']);
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function addAssignmentTask($data)
    {
        $sqlCall = "CALL addAssignmentTask(:ass_name,:subject,:description,:teachers_id)";

        $stmt = $this->conn->prepare($sqlCall);

        $stmt->bindParam(":ass_name", $data['assignment_name']);
        $stmt->bindParam(":subject", $data['subject']);
        $stmt->bindParam(":description", $data['description']);
        $stmt->bindParam(":teachers_id", $data['teachers_id']);

        return $stmt->execute();
    }
    public function getAllAssignment()
    {
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
    public function showOnlySubject($subject)
    {
        $sqlCall = "CALL showOnlySubject(:subject)";
        try {
            $stmt = $this->conn->prepare($sqlCall);
            $stmt->bindParam(":subject", $subject);
            $stmt->execute();

            $results = $stmt->fetchAll();

            return $results;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function deleteTask($id)
    {
        try {
            $sqlCall = "CALL deleteAssignment(:assid)";
            $stmt = $this->conn->prepare($sqlCall);
            $stmt->bindParam(":assid", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function deleteOneAss($id)
    {
        try {
            $sqlCall = "CALL deleteONEAssignment(:assid)";
            $stmt = $this->conn->prepare($sqlCall);
            $stmt->bindParam(":assid", $id);
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }   
    }
    
    
    public function editOneAss($data)
    {            
        $sqlCall = "CALL edit_Assignment(:ass_name,:subject,:ass_id)";
        try {
            $stmt = $this->conn->prepare($sqlCall);
            $stmt->bindParam(":ass_name", $data['assONEname']);
            $stmt->bindParam(":subject", $data['subjONE']);
            $stmt->bindParam(":ass_id", $data['assONEid']);
            $stmt->execute();
        } catch (PDOException $e) {
            throw $e;
        }
    }

    public function showAllAssignment()
    {
        $sqlCall = "CALL view3nf()";
        
        try {

            $stmt = $this->conn->prepare($sqlCall);
            $stmt->execute();
            
            $results = $stmt->fetchAll();

            return $results;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function show($id)
    {
            $sqlCall = "CALL showTrial(:id)";
            try {
            $stmt = $this->conn->prepare($sqlCall);
            $stmt -> bindParam(":id",$id);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function showOneAss($id)
    {
            $sqlCall = "CALL showOneAss(:id)";
            try {
            $stmt = $this->conn->prepare($sqlCall);
            $stmt -> bindParam(":id",$id);
            $stmt->execute();
            $results = $stmt->fetchAll();
            return $results;
        } catch (PDOException $e) {
            throw $e;
        }
    }
    public function editAssOnAsslist($data)
    {
        $sqlCall = "CALL editAssOnAsslist(:ass_name,:subj,:student_id)";
        $stmt = $this->conn->prepare($sqlCall);
        $stmt->bindParam(":ass_name", $data['assignment_name']);
        $stmt->bindParam(":subj", $data['subj']);
        $stmt->bindParam(":student_id", $data['student_id']);
        return $stmt->execute();
    }
};
