<li class="dropdown-submenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-puzzle-piece"></i> <span>Tendoo Store</span> </a>
    <ul class="dropdown-menu">
        <li><a href="<?php echo $this->instance->url->site_url('admin/open/modules/'.$module[0]['ID']);?>">Accueil</a></li>
		<li><a href="<?php echo $this->instance->url->site_url('admin/open/modules/'.$module[0]['ID'].'/apps/mine');?>">Mes applications</a></li>
		<li><a href="<?php echo $this->instance->url->site_url('admin/open/modules/'.$module[0]['ID'].'/apps/submit');?>">Soumettre une application</a></li>
        <li><a href="<?php echo $this->instance->url->site_url('admin/open/modules/'.$module[0]['ID'].'/create');?>">Liste des modules Envoy&eacute;es</a></li>    
        <li><a href="<?php echo $this->instance->url->site_url('admin/open/modules/'.$module[0]['ID'].'/page_linker');?>">Param&egrave;tres</a></li>
    </ul>
</li>