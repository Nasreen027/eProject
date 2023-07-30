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
if(isset($_POST['update_vaccine_info'])){
    $vaccineName = $_POST['model-vaccine-name'];
    $vaccineStock = $_POST['model-vaccine-stock'];
    // $location = $_POST['model-location'];
    $vaccineId= $_POST['model-vaccine-id'];
    
            $query= $pdo -> prepare("update vaccine_details set vaccineName = :name,vaccineStock = :stock where vaccineID = :_id");
            $query -> bindParam('name', $vaccineName);
            $query -> bindParam('stock', $vaccineStock);
            // $query -> bindParam('location', $location);
            $query -> bindParam('_id', $vaccineId);
            $query -> execute();
            echo "<script>alert('Vaccine updated succesfully')</script>";
            header('Location: vaccineData.php');
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
    if(isset($_POST['insert-vaccine-btn'])){
        $vaccine_name = $_POST['insert-vaccine-name'];
        $vaccine_stock = $_POST['insert-vaccine-stock'];
        // $hospital_location = $_POST['insert-hospital-location'];
        // $hospital_password = $_POST['insert-hospital-password'];
       
                $query= $pdo -> prepare("INSERT into vaccine_details(vaccineName,vaccineStock) values(:vaccine_name,:vaccine_stock)");
                $query -> bindParam('vaccine_name', $vaccine_name);
                $query -> bindParam('vaccine_stock', $vaccine_stock);
                // $query -> bindParam('hospital_location', $hospital_location);
                // $query -> bindParam('hospital_password', $hospital_password);
                $query -> execute();
               
                echo "<script>alert('Vaccine added succesfully')</script>";
                header('Location: vaccineData.php');
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
    

if (isset($_POST['delete_vaccine_info'])) {
    $vaccine_id = $_POST['vaccine_id_delete'];
    $query= $pdo -> prepare(" DELETE FROM vaccine_details WHERE vaccineID = :id;");
    $query->bindParam('id', $vaccine_id);
    $query->execute();
    echo "<script>alert('Vaccine deleted')</script>";
    header('Location: vaccineData.php');
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