<?php echo $lmenu;?>

<section id="content">
<section class="vbox">
	<footer class="footer bg-white b-t">
		<div class="row m-t-sm text-center-xs">
			<div class="col-sm-2" id="ajaxLoading" style="visibility: visible; opacity: 0;"><canvas id="canvas" width="30" height="30"><p>Your browser does not support the canvas element.</p></canvas></div>
			<div class="col-sm-10 text-right text-center-xs">
				<input controller_save_edits="" type="button" id="start_compilation" class="btn btn-sm bg-dark" value="Lancer la compilation du thème">
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
                    <hr class="line line-dashed">
                    <div class="row">
                        <div class="col-lg-8">
                            <section class="panel">
                                <div class="panel-heading">Compiler le thème</div>
                                <div class="panel-body">
                                    <?php echo tendoo_warning('En exécutant le procéssus de compilation, s\'il existe une version précédente, elle sera écrasée par la nouvelle compilation du thème. Cette action est irreversible. N\'intérrompez pas le procéssus de compilation');?>
                                    <div id="compile_status">
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-lg-4">
                        	<section class="panel">
                                <div class="panel-heading">Status</div>
                                <div class="panel-body">
                                    <?php
										if($isCompiled)
										{
											echo tendoo_info('Ce thème possède déjà une version compilé, pour la télécharger, cliquer sur le lien suivant');
											?>
                                            <a href="<?php echo $this->url->main_url().MODULES_DIR.$module[0]['ENCRYPTED_DIR'].'/projects/'.$current_project[0]['PROJECT_NAMESPACE'].'_compiled.zip';?>">Télécharger la version compilée</a>
                                            <?php
										}
										else
										{
											?>
                                            Lancez le procéssus de compilation pour télécharger le thème.
                                            <?php
										}
									?>
                                </div>
                            </section>
                        </div>
                        <script type="text/javascript">
							var compile	=	new media(<?php echo $current_project[0]['ID'];?>);
						</script>
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
