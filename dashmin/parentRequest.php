<?php
include('header.php')
?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Parents Request</h4>




                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <td>Parent Name</td>
                                    <td>Parent Email</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $query = $pdo->query("SELECT * from parent_login");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($result as $row){
                        ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $row['parentID'] ?>
                                    </th>

                                    <td>
                                        <?php echo $row['parentName'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['parentEmail'] ?>
                                    </td>
                                    <td>
                                    <select class="form-select" onchange="updateParentStatus(this.value, <?php echo $row['parentID']; ?>)">
                        <option value="0" <?php if ($row['parentStatus'] == 0) echo 'selected'; ?>>Pending</option>
                        <option value="1" <?php if ($row['parentStatus'] == 1) echo 'selected'; ?>>Approved</option>
                        <option value="2" <?php if ($row['parentStatus'] == 2) echo 'selected'; ?>>Rejected</option>
                    </select>
                                    </td>
                                   
                                   

                                </tr>


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

<?php
include('footer.php')
?>