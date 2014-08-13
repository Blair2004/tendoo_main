<?php echo $lmenu;?>

<section id="content">
    <section class="vbox"><?php echo $inner_head;?>
        <footer class="footer bg-white b-t">
            <div class="row m-t-sm text-center-xs">
                <div class="col-sm-2" id="ajaxLoading"> </div>
                <div class="col-sm-6 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                    </ul>
                </div>
                <div class="col-sm-4"> <a class="btn btn-sm btn-primary pull-right" href="javascript:void(0)" id="submit_changes">Cr&eacute;er le projet</a> </div>
                <script>
				$('#submit_changes').bind('click',function(){
					$('.create_projet_form').submit();
				});
				</script>
            </div>
        </footer>
        <section class="scrollable" id="pjax-container">
            <header>
                <div class="row b-b m-l-none m-r-none">
                    <div class="col-sm-4">
                        <h4 class="m-t m-b-none"><?php echo get_page('title');?></h4>
                        <p class="block text-muted"><?php echo get_page('description');?></p>
                    </div>
                </div>
            </header>
            <section class="vbox">
                <section class="wrapper"> <?php echo output('notice');?>  <?php echo fetch_error_from_url();?> <?php echo validation_errors() ? tendoo_error(validation_errors()): ''; ?>
                    <section class="panel">
                        <div class="panel-heading">Nouveau projet</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-9">
                                    <section class="tab-pane active" id="basic">
                                        <form class="form-horizontal create_projet_form" method="POST">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Nom du thème</label>
                                                <div class="col-sm-4">
                                                    <input name="theme_name" placeholder="theme sans nom" class="bg-focus form-control" data-required="true" type="text" value="<?php echo set_value('theme_name'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Auteur du thème</label>
                                                <div class="col-sm-4">
                                                    <input name="theme_author" placeholder="Par défaut : <?php echo $this->users_global->current('PSEUDO');?>" class="bg-focus form-control" type="text" value="<?php echo set_value('theme_author'); ?>" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Espacenom du thème</label>
                                                <div class="col-sm-4">
                                                    <input name="theme_namespace" placeholder="theme_sans_nom" class="bg-focus form-control" value="<?php echo set_value('theme_namespace'); ?>">
                                                    <span>Sans espace ni caractère sp&eacute;cial.<br />Ne commence pas par un chiffre.</span>
                                                    <div class="line line-dashed m-t-lg"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Version du thème</label>
                                                <div class="col-sm-4">
                                                    <input value="<?php echo set_value('theme_app_vers'); ?>" name="theme_app_vers" placeholder="par défaut : 0.1" class="form-control" type="text" >													
                                                    <span>Exemple : 0.1, 0.2 ... 1.5, 2.9 et non 1.1.20 ou 2.1b</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Compatible avec Tendoo</label>
                                                <div class="col-sm-4">
                                                    <select name="theme_tendoo_vers" class="form-control">
                                                        <option value="0.98">0.98</option>
                                                        <!--<option value="0.98">0.99</option>-->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Descrition du thème</label>
                                                <div class="col-sm-5">
                                                    <textarea name="theme_description" placeholder="Par défaut : ce thème n'a pas de description" rows="5" data-trigger="keyup" data-rangelength="[20,200]"  class="form-control parsley-validated"><?php echo set_value('theme_description'); ?></textarea>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
<a href="javascript:void(0)" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
</section>
