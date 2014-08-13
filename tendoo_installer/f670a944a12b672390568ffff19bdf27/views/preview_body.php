<?php echo $lmenu;?>

<section id="content">
<section class="vbox">
	<footer class="footer bg-white b-t">
		<div class="row m-t-sm text-center-xs">
			<div class="col-sm-2" id="ajaxLoading" style="visibility: visible; opacity: 0;"><canvas id="canvas" width="30" height="30"><p>Your browser does not support the canvas element.</p></canvas></div>
			<div class="col-sm-10 text-right text-center-xs">
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
                	<?php echo validation_errors('<p class="error">', '</p>');?>
					<?php echo fetch_error_from_url();?>
					<?php echo output('notice');?>
                    <div class="row">
                    	<div class="col-lg-6">
                        	<div class="panel">
                            	<div class="panel-heading">Aperçu</div>
                                <div class="panel-body">
                                	<form method="post" class="form" role="form" enctype="multipart/form-data">
                                    	<div class="form-group">
                                        	<?php echo tendoo_info('Pour modifier l\'aperçu du thème, veuillez envoyer un nouveau fichier au format "jpg" ou "png". Avec les dimensions 710px en largeur et 200 en hauteur.');?>
                                        </div>
                                    	<div class="form-group">
                                        	<div class="input-group">
                                            	<div class="input-group-btn">
                                                	<input type="submit" value="Envoyer" class="btn <?php echo theme_button_class();?>">
                                                </div>
                                            	<input type="file" name="preview" class="form-control">
                                            </div>
                                        </div>
                                        <hr class="line line-dashed">
                                        <?php
										$image_preview	=	'';
										foreach(array('png','jpg') as $extension)
										{
											if(is_file($module_dir.'/projects/'.$current_project[0]['PROJECT_NAMESPACE'].'/preview.'.$extension))
											{
												$image_preview	=	'/projects/'.$current_project[0]['PROJECT_NAMESPACE'].'/preview.'.$extension;
											}
										}
										if($image_preview != '')
										{
											?>
											<img src="<?php echo module_assets_url($image_preview);?>" alt="preview" style="width:100%;">
                                            <?php
										}
										else
										{
											?>
                                            <span>Aucun aperçu disponible</span>
                                            <?php
										}
										?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                        	<div class="panel">
                            	<div class="panel-heading">Description</div>
                                <div class="panel-body">
                                	<form method="post" role="form">
                                	<?php echo $this->tendoo->getEditor(array(
										'name'			=>	'pj_description',
										'id'			=>	'ckeditor',
										'defaultValue'	=>	$pid_description,
										'height'=>	200
									),$type	=	'editor');?>
                                    	<hr class="line line-dashed">
                                        <input type="submit" class="btn <?php echo theme_button_class();?>" value="Enregistrer">
                                    </form>
                                </div>
                            </div>
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
