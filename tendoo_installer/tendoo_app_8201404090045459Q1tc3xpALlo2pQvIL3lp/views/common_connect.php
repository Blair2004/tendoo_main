<?php echo '<?php 
';?>
$tendoo_core_warning		=	array();
$tendoo_themes_warning		=	array();
$tendoo_modules_warning		=	array();
$tendoo_security_warning	=	array();
<?php
if((int)$tendoo_cms_lastest > (int)$tracked_site_url)
{
?>
$tendoo_core_warning[]		=	array(
	'title'					=>	'Une nouvelle version de Tendoo est disponible',
	'content'				=>	'Votre version de Tendoo n\'est plus à jour, 
								t&eacutel&eacute;charger la version '.$tendoo_cms_lastest['version'].', ou proc&eacute;dez à la mise à jour du system',
	'thumb'					=>	FALSE,
	'date'					=>	"20 Avril 2014",
	'link'					=>	'https://github.com/Blair2004/tendoo-cms'
);
<?php
}
?>
$tendoo_core_warning[]		=	array(
	'title'					=>	'Tendoo passe à la version 0.9.8',
	'content'				=>	'Une nouvelle version de tendoo est désormais disponible, beaucoup de bugs ont été corrigés, télécharger cette version maintenant.',
	'thumb'					=>	'http://127.0.0.1/frameworks/todo/images/avatar.jpg',
	'date'					=>	"20 Avril 2014",
	'link'					=>	'https://github.com/Blair2004/tendoo-cms'
);