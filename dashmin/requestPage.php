<?php
include('header.php')
?>
<div class="container pt-4">
    <div class="bg-light rounded p-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-white rounded h-100 ">
                    <div class="d-flex bg-light justify-content-between">

                        <h4>Requests</h4>




                    </div>
                    <div class="table-responsive bg- ">
                        <table class="table">
                           
                            <tbody>
                                <?php
                        $query = $pdo->query("SELECT * from parent_login where parentStatus = 'pending'");
                        $result = $query->fetchAll(PDO::FETCH_ASSOC);
               
                        foreach($result as $row){
                        ?>
                                <tr class="tr-row">
                                   
                                    <td>
                                        <?php echo ucfirst($row['parentName'])?> has requested for registeration 
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
