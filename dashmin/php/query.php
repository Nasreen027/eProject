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
|   php tag end for queries to update delete and add  hospital information  by vaccine            |
|   [end]..                                                                                      |  
------------------------------------------------------------------------------------------------->