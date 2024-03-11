<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="Gestionale">
    <meta name="robots" content="noindex,nofollow">
    <title>Millebytes - Admin area</title>
    <link rel="canonical" href="https://www.paolorussodeveloper.it" />

    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link href="<?php echo base_url(); ?>/assetsa/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/assetsa/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    
    <div class="main-wrapper">


            <div class="container-fluid">

				
                <div class="row page-titles">
                    
					<?php
					$this->load->view('include/breadcrumbs');
					?>
					
                    <div class="col-md-6 col-4 align-self-center">
                    </div>
					
                </div>
				

				
				<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $pageTitle; ?> - <a href="agentinew">Aggiungi nuovo</a></h4>
                                <h6 class="card-subtitle"><?php echo $pageSubtitle; ?></h6>
                                <div class="table-responsive m-t-40">
                                    <table id="list" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nominativo</th>
                                                <th>Email</th>
                                                <th>Stato</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Nominativo</th>
                                                <th>Email</th>
                                                <th>Stato</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php foreach ($query->getResult() as $row) { ?>
											<tr>
                                                <td style="width:50px;"><span class="round"><?php echo $row->id; ?></span></td>
                                                <td><a href="<?php echo base_url().'registro/agenti/edit/'.$row->id; ?>"><?php echo $row->nominativo; ?></a></td>
                                                <td><?php echo $row->manager; ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                <td>
                                                    <?php 
                                                    if($row->status==0) {
                                                        echo '<a href="'.base_url().'registro/agenti/status/'.$row->id.'/1">'.statusActive($row->status).'</a>'; 
                                                    } else {
                                                        echo '<a href="'.base_url().'registro/agenti/status/'.$row->id.'/0">'.statusActive($row->status).'</a>'; 
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo base_url().'registro/agenti/add/fatturato/'.$row->id; ?>">
                                                        <button type="button" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-comment-plus-outline"></i></button>
                                                    </a>
                                                    <a href="<?php echo 'agenti/list/fatturato/'.$row->id; ?>">
                                                        <button type="button" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-format-list-bulleted"></i></button>
                                                    </a>
                                                    <a href="<?php echo base_url().'registro/agenti/del/'.$row->id; ?>">
                                                        <button type="button" class="btn btn-danger waves-effect waves-light" onClick="return(confirm('Confermo eliminazione?'))"><i class="mdi mdi-delete"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
											<?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
				
				
                

            </div>


<?php 
$this->load->view('include/footer');
?>