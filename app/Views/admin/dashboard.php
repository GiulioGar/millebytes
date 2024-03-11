<?php
include 'include/header.php';
?>


    <div id="main-wrapper">
        
        <?php
        include 'include/top.php';
        include 'include/menu.php';
        ?>
        

        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            <?php
            include 'include/breadcrumbs.php';
            ?>

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <?php
                include 'include/statBlocks.php';
                ?>


                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex no-block">
                                    <h4 class="card-title">Nuovi utenti</h4>
                                </div>
                                <div class="table-responsive mt-2">
                                    <table class="table stylish-table mb-0 mt-2 no-wrap v-middle">
                                        <thead>
                                            <tr>
                                                <th class="font-weight-normal text-muted border-0 border-bottom">Nominativo</th>
                                                <th class="font-weight-normal text-muted border-0 border-bottom">Email</th>
                                                <th class="font-weight-normal text-muted border-0 border-bottom">Code</th>
                                                <th class="font-weight-normal text-muted border-0 border-bottom">Provenienza</th>
                                                <th class="font-weight-normal text-muted border-0 border-bottom">Points</th>
                                            </tr>
                                            <?php foreach ($query->getResult() as $row) { ?>
                                                <tr>
                                                    <td><?php echo $row->second_name." ".$row->first_name; ?></td>
                                                    <td><?php echo $row->email; ?></td>
                                                    <td><?php echo $row->user_id; ?></td>
                                                    <td><?php echo $row->provenienza; ?></td>
                                                    <td><?php echo $row->points; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Row -->


            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

            <?php
            include 'include/sign.php';
            ?>

        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    
    <div class="chat-windows"></div>
    
<?php
include 'include/footer.php';
?>