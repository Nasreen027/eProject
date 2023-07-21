<?php
include('header.php')
?>
            <div class="container pt-4">
            <div class="bg-light rounded p-4">
            <div class="row">
            <div class="col-12">
                        <div class="bg-white rounded h-100 ">
                        <div class="d-flex bg-light justify-content-between">

<h4>Category Table</h4>

<button type="button" class="btn text-dark  bg-white mb-2 insert"  data-bs-toggle="modal" data-bs-target="#insert-hospital" name="insertCategory">Add more Category ...
</button>


</div>
                            <div class="table-responsive bg- ">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            
                                            <th scope="col">Hospital Name</th>
                                            <th scope="col">Hospital Email</th>
                                            <th scope="col">Hospital Address</th>
                                            <th scope="col"> </th>
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                        $query = $pdo->query("SELECT * FROM hospital_login");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($result as $row){
                        ?>
                                        <tr>
                                            <th scope="row">  <?php echo $row['hospitalID'] ?></th>
                                            
                                            <td><?php echo $row['hospitalName'] ?></td>
                                            <td><?php echo $row['hospitalEmail'] ?></td>
                                            <td><?php echo $row['hospitalLocation'] ?></td>
                                            <td class="">
                                            <button class="btn btn-white edit-btn " data-bs-toggle="modal"
                                                data-bs-target="#edit-modal<?php echo $row['hospitalID']  ?>">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            
                                            <button class="btn btn-white" name="delete">
                                              <i class="fa fa-trash"></i>
                                            </button>

                                        </td>
                                        </tr>
                                        <div class="modal" id="edit-modal<?php echo $row['hospitalID'] ?>">
    <div class="modal-dialog modal-xl bg-light ">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h4 class="modal-title">Edit Information</h4>
                <button type="button" class="btn-close  bg-white"
                    data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">


                    <div class="mb-3 row">
                        <label for="inputPassword"
                            class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input id="modal-category-id"
                                value="<?php echo $row['hospitalID'] ?>"
                                readonly class="form-control bg-white" name="model-id">
                        </div>
                    </div >
                    <div class="mb-3 row">
                        <label 
                            class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                        <input value="<?php echo $row['hospitalName'] ?>"
                            id="modal-category-name" name="model-name"
                            class="form-control" type="text">
                        </div>
                    </div >
                    <div class="mb-3 row">
                        <label 
                            class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                        <input value="<?php echo $row['hospitalEmail'] ?>"
                            id="modal-category-name" name="model-email"
                            class="form-control" type="text">
                        </div>
                    </div >
                    <div class="mb-3 row">
                        <label 
                            class="col-sm-2 col-form-label">Adress</label>
                        <div class="col-sm-10">
                        <input value="<?php echo $row['hospitalLocation'] ?>"
                            id="modal-category-name" name="model-location"
                            class="form-control" type="text">
                        </div>
                    </div >
                 
                
                  
                  
                    <!-- <div class="mb-3 mt-3 row form-group">
                        <label for=""  class="col-sm-2 col-form-label">Change Image</label>
                        <div class="col-sm-10">
                        <input type="file" name="model-image"           class="form-control bg-dark" >
                    </div>
                    </div>
                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Category Image</label>
                        <div class="col-sm-10" ><img  width="50%" id="modal-category-image" 
                        src="cozastoreimages/<?php echo $row['category_image']  ?>" alt="">
                    </div> 
         
                </div>-->
                <!-- Modal footer -->
                <div class="modal-footer">
        <button type="submit" class="btn btn-dark text-white" name="update_hospital_info">
                    Update</button>
            <button type="button" class="btn btn-danger"
                data-bs-dismiss="modal">Close</button>
        </div>
                </form>
            </div>
        </div>
        
    </div>
</div>
                                       <?php
                        };

                                       ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

</div>
</div>
</div>
<!-- model for insert button start -->
<div class="modal" id="insert-hospital">
    <div class="modal-dialog modal-xl bg-white">
        <div class="modal-content bg-white">
            <div class="modal-header">
                <h4 class="modal-title">Add Hospital</h4>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="post" action="" enctype="multipart/form-data">
                
                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">  <input  placeholder="Enter hospital name.." class="form-control bg-white" name="hospitalName"></div>
                    </div>
                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">  <input  placeholder="Enter hospital email.."  class="form-control bg-white" name="hospitalEmail"></div>
                    </div>
                    <div class="mb-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">  <input  placeholder="Enter hospital location.."  class="form-control bg-white" name="hospitalLocation"></div>
                    </div>
                    <!-- <div class="mb-3 mt-3 row form-group">
                        <label for="" class="col-sm-2 col-form-label"> Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="categoryImage" class="form-control bg-dark">
                        </div>
                    </div> -->
                  
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" name="insertCategory" class="btn btn-dark text-white">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- model for insert button end -->
<?php
include('footer.php')
?>