<html lang="en" >

<?php


//data
$data=date("Y-m-d H:i:s");

//Variabili da link
$userId=$_POST["user_id"];
$prjId=$_POST["prj"];

?>


<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=400, initial-scale=0.5" />
	<meta content="telephone=no" name="format-detection" />
	<title>Intervista terminata!</title>
	
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="res/style.css"> <!-- Resource style -->
	<script src="res/modernizr.js"></script> <!-- Modernizr -->
	
	<style type="text/css" media="screen">
		/* Linked Styles */
		body { padding:0 !important; margin:0 !important; display:block !important; background:#ededed; -webkit-text-size-adjust:none }
		a { color:#fff; text-decoration:none }
		.footer a { color: #8ec8de; text-decoration: underline; }

		
		.sondaggio {border:1px solid; -webkit-border-radius: 50px; -moz-border-radius: 50px; border-radius: 50px; 
					color:#fff; text-align:center; background:#EE750A; width:240px; font-size:18px; color:#fff;}
		.sondaggio:hover {background:#fff; border-color:#EE750A;}
		.sondaggio span:hover {color:#EE750A;}
		
		.scopri {border:1px solid; -webkit-border-radius: 50px; -moz-border-radius: 50px; border-radius: 50px; 
					color:#fff; text-align:center; background:#EE750A; width:180px; font-size:18px; color:#fff;}
		.scopri:hover {background:#fff; border-color:#EE750A;}
		.scopri span:hover {color:#EE750A;}
		
		.leggi {border:1px solid; -webkit-border-radius: 50px; -moz-border-radius: 50px; border-radius: 50px; 
					color:#fff; text-align:center; background:#EE750A; width:150px; font-size:18px; color:#fff;}
		.leggi:hover {background:#fff; border-color:#EE750A;}
		.leggi span:hover {color:#EE750A;}
					

		/* Campaign Monitor wraps the text in editor in paragraphs. In order to preserve design spacing we remove the padding/margin */
		p { padding:0 !important; margin:0 !important } 
		
		
.block {
    position: absolute;
    left: 0px;
    margin: 5px;
    z-index: 100;
  }

  td.text {max-height:350px;}
.contAnima { text-align:center; font-size:24px; padding:30px; line-height:50px; border:1px dotted #EE750A;}
.intest { position:relative; top:30px; font-family:Verdana; font-size:32px;  color:#fff; text-align:center; text-shadow: 2px 2px 3px #E75A14;}
.footClub { position:relative; font-family:Verdana; font-size:11px; color:#000; left:10px; top:-30px;  text-shadow: 2px 2px 3px #fff;}
	</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>	



</head>
<body  class="body" style="padding:0 !important; margin:0 !important; display:block !important; background:#ededed; -webkit-text-size-adjust:none">
<div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#ededed">
	<tr>
		<td align="center" valign="top">
			<table width="799" border="0" cellspacing="0" cellpadding="0">
				<!-- Top -->
				<tr>
					<td class="top" style="color:#4a5461; font-family:Verdana; font-size:11px; line-height:15px; text-align:center">
					&nbsp;

					</td>
				</tr>
				<!-- END Top -->
				
				<!-- Content -->
				<tr>
					<td>
						<table style="border:1px solid #C1C1C1;" width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="1" bgcolor="#dfdfdf"></td>
								<td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="1" bgcolor="#c1c1c1"></td>
								<td bgcolor="#ffffff">
														<!-- Hero -->
									<div class="img" style=" margin:0 auto;  height:100px; width:100%; text-align:center; background-image:url('images/bannerRedir.png'); ">
										<div class="intest">Spiacenti non puoi partecipare!</div>
									</div>
									<div style="font-size:0pt; line-height:0pt; height:1px; background:#e0e0e0; "><img src="http://www.interactive-mr.com/mail/images/empty.gif" width="1" height="1" style="height:1px" alt="" /></div>

									<!-- END Hero -->
									<!-- Main Content -->
									<div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><img src="http://www.interactive-mr.com/mail/images/content_top.jpg" alt="" border="0" width="799" height="20" /></div>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
											<td>
										


												<div>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
														
															<td class="text" style="color:#575556; font-family:Verdana; font-size:15px; text-align:left" valign="top">
																	<div id="testo" class="contAnima">
																	Ci dispiace, purtroppo abbiamo raggiunto il numero massimo di interviste per questa ricerca,
																	ma non preoccuparti quanto prima sarai contattato per partecipare ad una nuova ricerca!
															</div>	

														<form id="myForm" action="quotafull_final.php" method="POST">
														<input type="hidden" name="uid" value="<?php echo $userId ?> "> 
														<input type="hidden" name="livup" value="<?php echo $livelloaggiornato; ?> "> 
														</form>
															
																<section class="cd-intro">
																<h1 class="cd-headline rotate-1">
																	<span>Con Club Millebytes puoi </span>
																	<span class="cd-words-wrapper">
																		<b class="is-visible">dare la tua opinione liberamente.</b>
																		<b>guadagnare tanti buoni Amazon.</b>
																		<b>giocare, esprimerti e guadagnare!</b>
																	</span>
																</h1>
															</section>
															</td>
														</tr>
													</table>
													

													<div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><img src="http://www.interactive-mr.com/mail/images/separator.jpg" alt="" border="0" width="581" height="1" /></div>
									
												</div>

												<div>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
													<tr><div style="height:5px;"></div></tr>
													<tr><div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><img src="http://www.interactive-mr.com/mail/images/separator.jpg" alt="" border="0" width="581" height="3" /></div></tr>
													<tr><div style="height:20px;"></div></tr>
														<tr>
															<td valign="top" width="170" class="text" style="color:#a1a1a1; font-family:Verdana; font-size:12px; line-height:18px; text-align:left">
																<div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><a href="#" target="_blank">
																<img src="http://www.primisoft.com/fields/PRO/TEST_SDL/resources/path.jpg" alt="" border="0" width="170" /></a></div>
																<div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><img src="http://www.interactive-mr.com/mail/images/img_bottom_shadow.jpg" alt="" border="0" width="170" height="17" /></div>
																<div style="font-size:0pt; line-height:0pt; height:20px"><img src="http://www.interactive-mr.com/mail/images/empty.gif" width="1" height="20" style="height:20px" alt="" /></div>


																<div class="h2" style="color:#575556; font-family:Verdana; font-size:16px; line-height:24px; text-align:left; font-weight:normal"><div><b>Vai alla Mappa</b> </div></div>
																<div style="font-size:0pt; line-height:0pt; height:15px"><img src="http://www.interactive-mr.com/mail/images/empty.gif" width="1" height="15" style="height:15px" alt="" /></div>


																<div style="color:#575556;">
																	Rispondi ai nostri sondaggi e raggiungi i forzieri con i premi, attraverso il nostro percorso.
																	<p>&nbsp;</p>
															<div class="leggi">
															<a href="http://millebytes.com/user/1/user_path"/><span style="padding:5px">&nbsp;&nbsp;&nbsp;&nbsp;GUARDA&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
															</div>
																</div>
															</td>
															<td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="35"></td>
															<td valign="top" width="170" class="text" style="color:#a1a1a1; font-family:Verdana; font-size:12px; line-height:18px; text-align:left">
																<div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><a href="#" target="_blank"><img src="http://www.interactive-mr.com/mail/images/regolamento.jpg" alt="" border="0" width="170"  /></a></div>
																<div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><img src="http://www.interactive-mr.com/mail/images/img_bottom_shadow.jpg" alt="" border="0" width="170" height="17" /></div>
																<div style="font-size:0pt; line-height:0pt; height:20px"><img src="http://www.interactive-mr.com/mail/images/empty.gif" width="1" height="20" style="height:20px" alt="" /></div>


																<div class="h2" style="color:#575556; font-family:Verdana; font-size:16px; line-height:24px; text-align:left; font-weight:normal"><div><b>Leggi il regolamento</b></div></div>
																<div style="font-size:0pt; line-height:0pt; height:15px"><img src="http://www.interactive-mr.com/mail/images/empty.gif" width="1" height="15" style="height:15px" alt="" /></div>


																	<div style="color:#575556;">
																	Leggi l'intero regolamento del nostro concorso sulle pagine del Club.
																	<p>&nbsp;</p>
															<div class="leggi">
															<a href="http://millebytes.com/it/regulation"/><span style="padding:5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEGGI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
															</div>
																</div>
															</td>
															<td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="35"></td>
															<td valign="top" width="170" class="text" style="color:#a1a1a1; font-family:Verdana; font-size:12px; line-height:18px; text-align:left">
																<div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><a href="#" target="_blank"><img src="http://www.interactive-mr.com/mail/images/faq.jpg" alt="" border="0" width="170" /></a></div>
																<div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><img src="http://www.interactive-mr.com/mail/images/img_bottom_shadow.jpg" alt="" border="0" width="170" height="17" /></div>
																<div style="font-size:0pt; line-height:0pt; height:20px"><img src="http://www.interactive-mr.com/mail/images/empty.gif" width="1" height="20" style="height:20px" alt="" /></div>


																<div class="h2" style="color:#575556; font-family:Verdana; font-size:16px; line-height:24px; text-align:left; font-weight:normal"><div><b>Scopri di pi&ugrave;!</b></div></div>
																<div style="font-size:0pt; line-height:0pt; height:15px"><img src="http://www.interactive-mr.com/mail/images/empty.gif" width="1" height="15" style="height:15px" alt="" /></div>


															<div style="color:#575556;">
																	Entra nella nostra area FAQ per chiarire tutti i dubbi sul nuovo concorso.
																	<p>&nbsp;</p>
															<div class="leggi">
															<a href="http://millebytes.com/it/faq"/><span style="padding:5px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LEGGI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
															</div>
																</div>
															</td>
														</tr>
													</table>
													<div style="font-size:0pt; line-height:0pt; height:25px"><img src="http://www.interactive-mr.com/mail/images/empty.gif" width="1" height="25" style="height:25px" alt="" /></div>

												</div>
											</td>
											<td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="20"></td>
										</tr>
									</table>
									<div class="img" style="font-size:0pt; line-height:0pt; text-align:left"><img src="http://www.interactive-mr.com/mail/images/content_bottom.jpg" alt="" border="0" width="620" height="20" /></div>
									<!-- END Main Content -->

								</td>
								<td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="1" bgcolor="#c1c1c1"></td>
								<td class="img" style="font-size:0pt; line-height:0pt; text-align:left" width="1" bgcolor="#dfdfdf"></td>
							</tr>
						</table>
					</td>
				</tr>
				<!-- END Content -->
					<!-- Footer -->
				<tr>
					<td>
						<div style="background-image:url('images/footer_top.jpg'); height:80px; border-radius: 0px 0px 10px 10px; collapse:0px" >
						<table style="collapse:0px" width="800px" border="0" cellspacing="0" cellpadding="0">
							<tr>

								<td style="min-width:802px">
									<table width="100%" border="0"  cellspacing="0" cellpadding="0">
									<tr><div style="height:30px;"></div></tr>
										<tr>
											<td class="img" style="font-size:0pt; text-align:left" width="270">
											<div class='footClub'><b>Club Millebytes</b><br/>millebytes@interactive-mr.com</div>
											</td>
											<td width="450"></td>
											<td style="font-size:0pt; text-align:left"  align="right">
												<table border="0" cellspacing="0" cellpadding="0">
													<tr>
													
														<td class="img" style="font-size:0pt; line-height:0pt; text-align:right"><a href="https://twitter.com/Millebytes" target="_blank">
														<img align="right" src="http://www.interactive-mr.com/mail/images/twitter.jpg" alt="" border="0" width="31" height="34" /></a></td>
														<td class="img" style="font-size:0pt; line-height:0pt; text-align:right">
														<a href="https://www.facebook.com/pages/Millebytes/1474771096088455" target="_blank">
														<img align="right" src="http://www.interactive-mr.com/mail/images/facebook.jpg" alt="" border="0" width="31" height="34" /></a></td>
													</tr>
												</table>
											</td>
										
										</tr>
									</table>

								</td>
					
							</tr>
						</table>
						</div>

					</td>
				</tr>
				<!-- END Footer -->


			</table>
		</td>
	</tr>
</table>
</body>
<script src="res/main.js"></script> <!-- Resource jQuery -->
</html>
