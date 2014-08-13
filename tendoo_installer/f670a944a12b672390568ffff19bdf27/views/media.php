<?php echo $lmenu;?>

<section id="content">
<section class="vbox">
	<footer class="footer bg-white b-t">
		<div class="row m-t-sm text-center-xs">
			<div class="col-sm-2" id="ajaxLoading" style="visibility: visible; opacity: 0;"><canvas id="canvas" width="30" height="30"><p>Your browser does not support the canvas element.</p></canvas></div>
			<div class="col-sm-10 text-right text-center-xs">
				<input controller_save_edits="" type="button" data-dismiss="modal" class="btn btn-sm bg-dark" value="Sauvegardez vos modifications">
			</div>
		</div>
	</footer>
<?php echo $inner_head;?>
<section class="scrollable" id="pjax-container">
    <section class="hbox stretch"> 
        <!-- .aside -->
        <aside class="aside">
            <section class="vbox">
                <section>
                    <section>
                        <section id="mail-nav" class="hidden-xs">
                            <?php include(MODULES_DIR.$module[0]['ENCRYPTED_DIR'].'/views/menu_plus.php');?>
                        </section>
                    </section>
                </section>
            </section>
        </aside>
        <!-- /.aside --> 
        <!-- .aside -->
        <aside class="bg-light lter">
            <section class="vbox">
                <section class="scrollable wrapper">
                    <header class="header">
						<?php echo tendoo_info('Veuillez envoyer un fichier compressé au format "ZIP" contenant les fichiers que vous souhaitez décompressé dans le répertoire que vous aurez sélectionné');?>
                        <form class="fileLoader" role="form" method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button name="repository" type="button" select class="btn btn-default dropdown-toggle" data-toggle="dropdown">Décompresser dans <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)" value="css">Dossier CSS</a></li>
                                        <li><a href="javascript:void(0)" value="js">Dossier Js</a></li>
                                        <li><a href="javascript:void(0)" value="images">Dossier Image</a></li>
                                        <li><a href="javascript:void(0)" value="fonts">Dossier Fonts</a></li>
                                    </ul>
                                </div>
                                <!-- /btn-group -->
                                <input type="file" class="form-control" name="file_zip">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">Envoyer</button>
                                </span> 
							</div>
                        </form>
                        <br>
                        <?php echo $this->notice->parse_notice();?>  <?php echo fetch_error_from_url();?> <?php echo validation_errors(); ?> </header>
                    <hr class="line line-dashed">
						<div class="panel panel-warning explorer_panel">
							<div class="panel-heading">Explorer un répertoire</div>
							<div class="panel-body">
								<form action="?o=ajax&action=load_dir&pid=<?php echo $current_project[0]['ID'];?>" class="" method="post" fExplorer>
									<div class="row">
										<div class="col-lg-12">
											<div class="input-group">
												<span class="input-group-btn">
													<button class="btn btn-default" type="submit">Charger le dossier</button>
												</span>
												<select name="dossier" class="form-control">
													<option value="css">css</option>
													<option value="js">js</option>
													<option value="images">images</option>
                                                    <option value="fonts">fonts</option>
												</select>
											</div><!-- /input-group -->
										</div><!-- /.col-lg-6 -->
									</div>
								</form>
								<hr class="line line-dashed">
								<script type="text/javascript">
								$(document).ready(function(){
									var ms	=	new media(<?php echo $current_project[0]['ID'];?>);
								});
								</script>
							</div>
						</div>
                </section>
            </section>
        </aside>
        <!-- /.aside --> 
        <!-- .aside --> 
        <!-- /.aside --> 
    </section>
    <section> </section>
    <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="body"> </a> </section>
