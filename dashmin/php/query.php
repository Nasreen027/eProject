<?php

include("connection.php");

?>
<!-----------------------------------------------------------------------------------------------
|   php tag start for queries to update delete and add  hospital information  by admin           |
|   [start]                                                                                      |  
------------------------------------------------------------------------------------------------->
<?php
// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for update hospital information                                      |
//               [start]                                                      |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|
if(isset($_POST['update_hospital_info'])){
    $name = $_POST['model-name'];
    $email = $_POST['model-email'];
    $location = $_POST['model-location'];
    $id= $_POST['model-id'];
    
            $query= $pdo -> prepare("update hospital_login set hospitalName = :name,hospitalEmail = :email ,hospitalLocation = :location where hospitalID = :_id");
            $query -> bindParam('name', $name);
            $query -> bindParam('email', $email);
            $query -> bindParam('location', $location);
            $query -> bindParam('_id', $id);
            $query -> execute();
            echo "<script>alert('hospital updated succesfully')</script>";
            header('Location: hospitalData.php');
            exit;
    
        }
     
  
// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for  update hospital information                                     |
//               [end]                                                        |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|


// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for  add hospital                                                    |
//               [start]                                                      |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|
    if(isset($_POST['insert-hospital-btn'])){
        $hospital_name = $_POST['insert-hospital-name'];
        $hospital_email = $_POST['insert-hospital-email'];
        $hospital_location = $_POST['insert-hospital-location'];
       
                $query= $pdo -> prepare("INSERT into hospital_login(hospitalName,hospitalEmail,hospitalLocation) values(:hospital_name,:hospital_email,:hospital_location)");
                $query -> bindParam('hospital_name', $hospital_name);
                $query -> bindParam('hospital_email', $hospital_email);
                $query -> bindParam('hospital_location', $hospital_location);
                $query -> execute();
               
                echo "<script>alert('hospital added succesfully')</script>";
                header('Location: hospitalData.php');
                exit;
        
            }
        
       
// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for  add hospital                                                    |
//               [end]                                                        |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|



// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for  delete hospital                                                 |
//               [start]                                                      |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|
    

if (isset($_POST['delete_hospital_info'])) {
    $hospital_id = $_POST['hospital_id_delete'];
    $query= $pdo -> prepare(" DELETE FROM hospital_login WHERE hospitalID = :id;");
    $query->bindParam('id', $hospital_id);
    $query->execute();
    echo "<script>alert('hospital deleted')</script>";
    header('Location: hospitalData.php');
    exit;
    
};


// ---------------------------------------------------------------------------|
//                                                                            |                 
//                                                                            |
// query for  delete hospital                                                 |
//               [end]                                                        |     
//                                                                            |
//                                                                            |
// ---------------------------------------------------------------------------|

?>
<!-----------------------------------------------------------------------------------------------
|   php tag end for queries to update delete and add  hospital information  by admin             |
|   [end]..                                                                                      |  
------------------------------------------------------------------------------------------------->



<!-----------------------------------------------------------------------------------------------
|   query for status column of parent table      (Registeration Approval)                        |
|   [start]..                                                                                    |  
------------------------------------------------------------------------------------------------->

<?php
// set parent status = approve in database table when it is approved by admin  [start]//

if (isset($_POST['parentApprove'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'approved' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}

//     [end]     //

// set parent status = reject in database table when it is rejected by admin  [start]//

if (isset($_POST['parentReject'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'rejected' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}

//     [end]     //
?>
<!-----------------------------------------------------------------------------------------------
|   query for status column of parent table                                                      |
|   [end]..                                                                                      |  
------------------------------------------------------------------------------------------------->


<!-----------------------------------------------------------------------------------------------
|   query for status column of hospital table      (Registeration Approval)                      |
|   [start]..                                                                                    |  
------------------------------------------------------------------------------------------------->

<?php
// set hospital status = approve in database table when it is approved by admin  [start]//

if (isset($_POST['hospitalApprove'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE hospital_login SET hospitalStatus = 'approved' WHERE hospitalID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}

//     [end]     //

// set hospital status = reject in database table when it is rejected by admin  [start]//

if (isset($_POST['hospitalReject'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE hospital_login SET hospitalStatus = 'rejected' WHERE hospitalID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}
//     [end]     //

?>
<!----------------------------------------------------------------------------------------------
|   query for status column of hospital table                                                  |
|   [end]..                                                                                    |  
----------------------------------------------------------------------------------------------->

<!-----------------------------------------------------------------------------------------------
|   query for appointment status column of child table      (Registeration Approval)             |
|   [start]..                                                                                    |  
------------------------------------------------------------------------------------------------->

<?php
// set appointment status = approve in database table when it is approved by admin  [start]//

if (isset($_POST['childAppointmentApprove'])) {
    $id = $_POST['childID'];
    $query = $pdo->prepare("UPDATE children_details SET appointmentStatus = 'approved' WHERE childID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}

//     [end]     //

// set appointment status = reject in database table when it is rejected by admin  [start]//

if (isset($_POST['childAppointmentReject'])) {
    $id = $_POST['childID'];
    $query = $pdo->prepare("UPDATE children_details SET appointmentStatus = 'rejected' WHERE childID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}
//     [end]     //

?>
<!---------------------------------------------------------------------------------------------
|   query for appointment status column of child table                                         |
|   [end]..                                                                                    |  
----------------------------------------------------------------------------------------------->


<!---------------------------------------------------------------------------------------------
|   query for approve or reject registeration and appointment request in requestPage           |
|   [start]..                                                                                  |  
----------------------------------------------------------------------------------------------->
<?php

//approve parent registeration on notification page query [start]//
if (isset($_POST['notification-parent-approve-btn'])) {
    $id = $_POST['notification-parent-id'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'approved' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    header('Location: requestPage.php');
    exit;
}
//     [end]     //

//reject parent registeration on notification page query [start]//
if (isset($_POST['notification-parent-reject-btn'])) {
    $id = $_POST['notification-parent-id'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'rejected' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    header('Location: requestPage.php');
    exit;
}
//     [end]     //

//apporve hospital  registeration on notification page query [start]//
if (isset($_POST['notification-hospital-approve-btn'])) {
    $id = $_POST['notification-hospital-id'];
    $query = $pdo->prepare("UPDATE hospital_login SET hospitalStatus = 'approved' WHERE hospitalID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    header('Location: requestPage.php');
    exit;
}
//     [end]     //

//reject hospital registeration on notification page query [start]//
if (isset($_POST['notification-hospital-reject-btn'])) {
    $id = $_POST['notification-hospital-id'];
    $query = $pdo->prepare("UPDATE hospital_login SET hospitalStatus = 'rejected' WHERE hospitalID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    header('Location: requestPage.php');
    exit;
}
//     [end]     //
//apporve child  appointment on notification page query [start]//
if (isset($_POST['child-appointment-approve-btn'])) {
    $id = $_POST['child-appointment-id'];
    $query = $pdo->prepare("UPDATE children_details SET appointmentStatus = 'approved' WHERE childID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    header('Location: requestPage.php');
    exit;
}
//     [end]     //

//reject child  appointment on notification page query [start]//
if (isset($_POST['child-appointment-reject-btn'])) {
    $id = $_POST['child-appointment-id'];
    $query = $pdo->prepare("UPDATE children_details SET appointmentStatus = 'rejected' WHERE childID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
    header('Location: requestPage.php');
    exit;
}
//     [end]     //


?>
<!---------------------------------------------------------------------------------------------
|   query for approve or reject registeration and appointment request in requestPage           |
|   [end]..                                                                                    |  
----------------------------------------------------------------------------------------------->