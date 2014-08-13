<li class="dropdown-submenu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
	<i class="icon-desktop"></i> <span>Modus Menu</span> </a> 
    <ul class="dropdown-menu">
        <li> <a href="<?php echo $this->instance->url->site_url('admin/themes/config/'.$theme_details['ID'].'/index');?>">Param&egrave;tres</a> </li>
        <li> <a href="<?php echo $this->instance->url->site_url('admin/themes/config/'.$theme_details['ID'].'/about');?>">A propos de <?php echo $theme_details['HUMAN_NAME'];?></a> </li>
    </ul>
</li>