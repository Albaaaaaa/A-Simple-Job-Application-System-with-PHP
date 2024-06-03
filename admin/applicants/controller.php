<?php
require_once ("../../include/initialize.php");
if(!isset($_SESSION['ADMIN_USERID'])){
    redirect(web_root."admin/index.php");
}

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
    case 'add':
        doInsert();
        break;

    case 'edit':
        doEdit();
        break;

    case 'delete':
        doDelete();
        break;

    case 'photos':
        doupdateimage();
        break;

    case 'addfiles':
        doAddFiles();
        break;

    case 'approve':
        doApproved();
        break;

    case 'checkid':
        Check_StudentID();
        break;
}

function doInsert(){
    global $mydb;
    if(isset($_POST['save'])){
        if ($_POST['FNAME'] == "" OR $_POST['LNAME'] == "" OR $_POST['MNAME'] == "" OR $_POST['ADDRESS'] == "" OR $_POST['TELNO'] == "") {
            $messageStats = false;
            message("All fields are required!", "error");
            redirect('index.php?view=add');
        } else {
            $birthdate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
            $age = date_diff(date_create($birthdate), date_create('today'))->y;

            if ($age < 20) {
                message("Invalid age. 20 years old and above is allowed.", "error");
                redirect("index.php?view=add");
            } else {
                $sql = "SELECT * FROM tblemployees WHERE EMPLOYEEID='" . $_POST['EMPLOYEEID'] . "'";
                $mydb->setQuery($sql);
                $cur = $mydb->executeQuery();
                $maxrow = $mydb->num_rows($cur);

                if ($maxrow > 0) {
                    message("Employee ID already in use!", "error");
                    redirect("index.php?view=add");
                } else {
                    @$datehired = date_format(date_create($_POST['DATEHIRED']), 'Y-m-d');

                    $emp = New Employee(); 
                    $emp->EMPLOYEEID = $_POST['EMPLOYEEID'];
                    $emp->FNAME = $_POST['FNAME']; 
                    $emp->LNAME = $_POST['LNAME'];
                    $emp->MNAME = $_POST['MNAME'];
                    $emp->ADDRESS = $_POST['ADDRESS'];  
                    $emp->BIRTHDATE = $birthdate;
                    $emp->BIRTHPLACE = $_POST['BIRTHPLACE'];  
                    $emp->AGE = $age;
                    $emp->SEX = $_POST['optionsRadios']; 
                    $emp->TELNO = $_POST['TELNO'];
                    $emp->CIVILSTATUS = $_POST['CIVILSTATUS']; 
                    $emp->POSITION = trim($_POST['POSITION']);
                    $emp->EMP_EMAILADDRESS = $_POST['EMP_EMAILADDRESS'];
                    $emp->EMPUSERNAME = $_POST['EMPLOYEEID'];
                    $emp->EMPPASSWORD = sha1($_POST['EMPLOYEEID']);
                    $emp->DATEHIRED = @$datehired;
                    $emp->COMPANYID = $_POST['COMPANYID'];
                    $emp->create(); 

                    $autonum = New Autonumber(); 
                    $autonum->auto_update('employeeid');

                    message("New employee created successfully!", "success");
                    redirect("index.php");
                }
            }
        }
    }
}

function doEdit(){
    if(isset($_POST['save'])){
        if ($_POST['FNAME'] == "" OR $_POST['LNAME'] == "" OR $_POST['MNAME'] == "" OR $_POST['ADDRESS'] == "" OR $_POST['TELNO'] == "") {
            $messageStats = false;
            message("All fields are required!", "error");
            redirect('index.php?view=add');
        } else {
            $birthdate = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
            $age = date_diff(date_create($birthdate), date_create('today'))->y;
            if ($age < 20) {
                message("Invalid age. 20 years old and above is allowed.", "error");
                redirect("index.php?view=edit&id=".$_POST['EMPLOYEEID']);
            } else {
                @$datehired = date_format(date_create($_POST['DATEHIRED']), 'Y-m-d');

                $emp = New Employee(); 
                $emp->EMPLOYEEID = $_POST['EMPLOYEEID'];
                $emp->FNAME = $_POST['FNAME']; 
                $emp->LNAME = $_POST['LNAME'];
                $emp->MNAME = $_POST['MNAME'];
                $emp->ADDRESS = $_POST['ADDRESS'];  
                $emp->BIRTHDATE = $birthdate;
                $emp->BIRTHPLACE = $_POST['BIRTHPLACE'];  
                $emp->AGE = $age;
                $emp->SEX = $_POST['optionsRadios']; 
                $emp->TELNO = $_POST['TELNO'];
                $emp->CIVILSTATUS = $_POST['CIVILSTATUS']; 
                $emp->POSITION = trim($_POST['POSITION']);
                $emp->EMP_EMAILADDRESS = $_POST['EMP_EMAILADDRESS'];
                $emp->EMPUSERNAME = $_POST['EMPLOYEEID'];
                $emp->EMPPASSWORD = sha1($_POST['EMPLOYEEID']);
                $emp->DATEHIRED = @$datehired;
                $emp->COMPANYID = $_POST['COMPANYID'];
                $emp->update($_POST['EMPLOYEEID']);

                message("Employee has been updated!", "success");
                redirect("index.php?view=edit&id=".$_POST['EMPLOYEEID']);
            }
        }
    }
}

function doDelete(){
    global $mydb;
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
        $id = intval($_POST['delete']); // Ensure the ID is an integer
        
        $sql = "DELETE FROM `tbljobregistration` WHERE `REGISTRATIONID` = {$id}";
        $mydb->setQuery($sql);
        
        if ($mydb->executeQuery()) {
            message("Pelamar telah dihapus!", "success");
            redirect('index.php?view=appliedjobs');
        } else {
            message("Gagal menghapus pelamar.", "error");
            redirect('index.php?view=appliedjobs');
        }
    } else {
        message("Invalid request.", "error");
        redirect('index.php?view=appliedjobs');
    }
}


function doupdateimage(){
    $target_dir = "../../employee/photos/";
    $target_file = $target_dir . date("dmYhis") . basename($_FILES["picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

    if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "gif") {
        if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
            return date("dmYhis") . basename($_FILES["picture"]["name"]);
        } else {
            echo "Error Uploading File";
            exit;
        }
    } else {
        echo "File Not Supported";
        exit;
    }
}

function doApproved(){
    global $mydb;
    if (isset($_POST['submit'])) {
        $id = $_POST['JOBREGID'];
        $applicantid = $_POST['APPLICANTID'];
        $remarks = $_POST['REMARKS'];

        $sql = "UPDATE `tbljobregistration` SET `REMARKS`='{$remarks}',PENDINGAPPLICATION=0,HVIEW=0,DATETIMEAPPROVED=NOW() WHERE `REGISTRATIONID`='{$id}'";
        $mydb->setQuery($sql);
        $cur = $mydb->executeQuery();

        if ($cur) {
            $sql = "SELECT * FROM `tblfeedback` WHERE `REGISTRATIONID`='{$id}'";
            $mydb->setQuery($sql);
            $res = $mydb->loadSingleResult();
            if (isset($res)) {
                $sql = "UPDATE `tblfeedback` SET `FEEDBACK`='{$remarks}' WHERE `REGISTRATIONID`='{$id}'";
                $mydb->setQuery($sql);
                $cur = $mydb->executeQuery();
            } else {
                $sql = "INSERT INTO `tblfeedback` (`APPLICANTID`, `REGISTRATIONID`,`FEEDBACK`) VALUES ('{$applicantid}','{$id}','{$remarks}')";
                $mydb->setQuery($sql);
                $cur = $mydb->executeQuery();
            }

            message("Applicant is calling for an interview.", "success");
            redirect("index.php?view=view&id=".$id); 
        } else {
            message("Cannot be saved.", "error");
            redirect("index.php?view=view&id=".$id); 
        }
    }
}
?>
