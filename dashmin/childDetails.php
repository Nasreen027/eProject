<?php
include('header.php')
?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4> Details of child</h4>




                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <td>Child Name</td>
                                    <td>Gender</td>
                                    <td>Age</td>
                                    <td>Hospital Booked </td>
                                    <td>Vaccine </td>
                                    <td>Medical Conditions </td>
                                    <td>Parent Name </td>
                                    <td>Date of Vaccination </td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                        $query = $pdo->query("SELECT * from children_details JOIN parent_login on children_details.childID = parent_login.parentID join  vaccine_details on children_details.childID = vaccine_details.vaccineID  join  hospital_login on children_details.childID =  hospital_login.hospitalID ");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($result as $row){
                        ?>
                                <tr class="tr-row">
                                    <th scope="row">
                                        <?php echo $row['childID'] ?>
                                    </th>

                                    <td>
                                        <?php echo $row['childName'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['childGender'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['childAge'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['hospitalName'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['vaccineName'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['medicalConditions'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['parentName'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['vaccineDate'] ?>
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
<script src="js/script.js"></script>

<?php
include('footer.php')
?>
