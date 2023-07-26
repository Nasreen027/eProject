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
    // $p_image = $_FILES['model-image']['name'];
    // $p_image_size = $_FILES['model-image']['size'];
    // $p_image_tmp_name = $_FILES['model-image']['tmp_name'];
    // $p_image_ext = pathinfo($p_image, PATHINFO_EXTENSION);
    // $destination = "cozastoreimages/".$p_image;
    // $destinationProductCozastore = "/cozastore-master/databaseImage/".$p_image;

    // if($p_image_size <= 48000000){
    // if($p_image_ext === 'jpg' || $p_image_ext === "png" || $p_image_ext === 'jpeg'|| $p_image_ext === "webp"  || $p_image_ext === "" || $p_image === ""){
    //     if(move_uploaded_file($p_image_tmp_name,$destination)){
            $query= $pdo -> prepare("update hospital_login set hospitalName = :name,hospitalEmail = :email ,hospitalLocation = :location where hospitalID = :_id");
            // $query= $pdo -> prepare("update category set category_name = :name,category_image=:image where category_id = :_id");
            $query -> bindParam('name', $name);
            $query -> bindParam('email', $email);
            $query -> bindParam('location', $location);
            $query -> bindParam('_id', $id);
            // $query -> bindParam('image', $p_image);
            $query -> execute();
            echo "<script>alert('hospital updated succesfully')</script>";
            header('Location: hospitalData.php');
            exit;
    
        }
     
    // }else{
    //     echo "<script>alert('not valid extension')
    //     location.assign('adminPanelProducts.php')
    //     </script>";
    // }
    
    // }else{
    //     echo "file size is greater";
    // }if($p_image_size == 0){
    //     if($p_image_ext === '' || $p_image === ""   ){
            
    //             $query= $pdo -> prepare("update category set category_name = :name where category_id = :_id");
    //             $query -> bindParam('name', $c_name);
    //             $query -> bindParam('_id', $c_id);
             
    //             $query -> execute();
    //             echo "<script>alert('your changes are saved !!')</script>";
            
        
    //     }
        
    //     }
    
    
    
    // }
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
        // $p_image = $_FILES['categoryImage']['name'];
        // $p_image_size = $_FILES['categoryImage']['size'];
        // $p_image_tmp_name = $_FILES['categoryImage']['tmp_name'];
        // $p_image_ext = pathinfo($p_image, PATHINFO_EXTENSION);
        // $destination = "images/".$p_image;
        // if($p_image_size <= 48000000){
        // if($p_image_ext == 'jpg' || $p_image_ext == "png" || $p_image_ext== 'jpeg' || $p_image_ext== 'webp'){
        //     if(move_uploaded_file($p_image_tmp_name,$destination)){
                $query= $pdo -> prepare("INSERT into hospital_login(hospitalName,hospitalEmail,hospitalLocation) values(:hospital_name,:hospital_email,:hospital_location)");
                $query -> bindParam('hospital_name', $hospital_name);
                $query -> bindParam('hospital_email', $hospital_email);
                $query -> bindParam('hospital_location', $hospital_location);
                // $query -> bindParam('p_image', $p_image);
                $query -> execute();
               
                echo "<script>alert('hospital added succesfully')</script>";
                header('Location: hospitalData.php');
                exit;
        
            }
        
        // }else{
        //     echo "<script>alert('not valid extension')
        //     location.assign('category.php')
        //     </script>";
        // }
        
        // }else{
        //     echo "file size is greater";
        // }
        
        
        
        // }
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
    $query -> execute();
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

<?php

if (isset($_POST['parentApprove'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'approved' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}

if (isset($_POST['parentReject'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE parent_login SET parentStatus = 'rejected' WHERE parentID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}
?>
<?php

if (isset($_POST['hospitalApprove'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE hospital_login SET hospitalStatus = 'approved' WHERE hospitalID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}

if (isset($_POST['hospitalReject'])) {
    $id = $_POST['statusID'];
    $query = $pdo->prepare("UPDATE hospital_login SET hospitalStatus = 'rejected' WHERE hospitalID = :_id");
    $query->bindParam('_id', $id);
    $query->execute();
}
?>