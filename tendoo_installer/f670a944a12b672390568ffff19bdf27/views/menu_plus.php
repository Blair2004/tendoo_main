<aside class="aside">
	<section class="vbox">
		<section>
			<section class="">
				<section id="mail-nav" class="hidden-xs">
					<ul class="nav nav-pills nav-stacked no-radius">
						<hr class="line line-dashed">
						<li> <a href="<?php echo $this->url->site_url(array('admin','open','modules',$module[0]['ID']));?>"> <i class="fa fa-home"></i> Mes projets </a> </li>
						<hr class="line line-dashed">
						<li> <a href="<?php echo $this->url->site_url(array('admin','open','modules',$module[0]['ID'],'edit_project',$current_project[0]['ID']));?>"> <i class="fa fa-smile-o"></i> Entête & Prototype </a> </li>
						<li> <a href="<?php echo $this->url->site_url(array('admin','open','modules',$module[0]['ID'],'items',$current_project[0]['ID']));?>"> <i class="fa fa-hand-o-right"></i> Items & Enfants </a> </li>
						<li> <a href="<?php echo $this->url->site_url(array('admin','open','modules',$module[0]['ID'],'media',$current_project[0]['ID']));?>"> <i class="fa fa-search"></i> Explorateur de fichier </li>
                        <li> <a href="<?php echo $this->url->site_url(array('admin','open','modules',$module[0]['ID'],'preview',$current_project[0]['ID']));?>"> <i class="fa fa-picture-o"></i> Aperçu / Description</li>
						<hr class="line line-dashed">
						<li> <a href="<?php echo $this->url->site_url(array('admin','open','modules',$module[0]['ID'],'compile',$current_project[0]['ID']));?>"> <i class="fa fa-compress"></i> Compiler le thème </a> </li>
						<li> <a href="<?php echo $this->url->site_url(array('admin','open','modules',$module[0]['ID'],'download',$current_project[0]['ID']));?>"> <i class="fa fa-download"></i> Télécharger le thème </a> </li>
						<li> <a href="<?php echo $this->url->site_url(array('admin','open','modules',$module[0]['ID'],'test',$current_project[0]['ID']));?>"> <i class="fa fa-flask"></i> Tester le thème </a> </li>
					</ul>
				</section>
			</section>
		</section>
	</section>
</aside>