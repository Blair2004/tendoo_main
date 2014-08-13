<html>
	<head>
		<meta charset="utf-8">
        <meta name="description" content="<?php echo get_page('description');?>">
		<meta name="keywords" content="<?php echo $this->instance->tendoo->getKeywords();?>">
		<script>
			var site_url	=	'<?php echo $this->instance->url->site_url();?>';
			var base_url	=	'<?php echo $this->instance->url->main_url();?>';
		</script>
		<title><?php echo get_page('title');?></title>
		<?php echo output('css');?>
		<?php echo output('js');?>        
	</head>
