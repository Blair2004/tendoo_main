<body cz-shortcut-listen="true" id="backgroundLogin">
	<section class="hbox stretch">
		<section class="vbox">
			<footer id="footer"> 
				<div class="text-center padder clearfix"> 
					<p> 
						<small><a href="https://github.com/Blair2004/tendoo-cms"><?php echo get('core_version');?></a>
						© 2014</small> 
					</p>
				</div>
			</footer>
            <img src="<?php echo img_url($this->instance->tendoo->getBackgroundImage());?>" style="width:100%;float:left">
			<section id="content" class="scrollable wrapper-md animated fadeInUp"> 
				<a class="nav-brand" href="<?php echo $this->instance->url->main_url();?>"><h3><img style="max-height:80px;margin-top:-3px;" src="<?php echo $this->instance->url->img_url("logo_4.png");?>"> </h3></a>
				<?php echo $body;?>
				 
			</section>
			<!-- footer -->
		</section>
	</section>
</body>
</html>