$this->installSession();
$this->appType('THEME');
$this->appVers(<?php echo $theme_app_vers;?>);
$this->appTendooVers(<?php echo $theme_tendoo_vers;?>);
$this->appTableField(array(
	'NAMESPACE'		=> "<?php echo $theme_namespace;?>",
	'HUMAN_NAME'	=> "<?php echo $theme_human_name;?>",
	'AUTHOR'		=> "<?php echo $theme_author;?>",
	'DESCRIPTION'	=> "<?php echo $theme_description;?>",
	'TENDOO_VERS'	=> <?php echo $theme_tendoo_vers;?> 
));