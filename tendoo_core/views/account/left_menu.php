<aside class="aside <?php echo theme_class();?> <?php echo get_user_data( 'admin-left-menu-status' );?> b-r" id="nav">
    <section class="vbox">
        <header class="dker nav-bar"> 
        	<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="body"> 
            	<i class="fa fa-reorder"></i> 
			</a> 
            <span href="#" class="nav-brand <?php echo theme_class();?>">
            	<img style="max-height:30px;" src="<?php echo $this->instance->url->img_url('logo_minim.png');?>" alt="logo">
            </span> 
            <a class="btn btn-link visible-xs" data-toggle="class:show" data-target=".nav-user"> 
            	<i class="fa fa-comment-alt"></i>
			</a> 
		</header>
        <?php
		$redirective	=	urlencode($this->instance->url->request_uri());
		?>
        <footer class="footer bg-gradient hidden-xs"> 
			<a data-intro="Cliquez-ici pour ouvrir la fenêtre des applications installées. Utilisez cette fenêtre pour rapidment accéder aux différentes applications." data-step="10" data-position="top" href="javascript:void(0)" class="showAppTab btn btn-sm pull-right"> 
				<i class="fa fa-th-large"></i> 
			</a> 
			<a href="#nav" data-toggle="class:nav-vertical" class="btn btn-sm btn-link m-l-n-sm"> 
				<i class="fa fa-arrows-h"></i> 
			</a> 
		</footer>
        <section>
            <nav class="nav-primary">
                <ul class="nav">
                    <li> <a href="<?php echo $this->instance->url->site_url('account');?>"> <i class="fa fa-home"></i> <span>Profil</span> </a> </li>
                    <li> <a href="<?php echo $this->instance->url->site_url('account/messaging');?>"> 
                    <?php
					$unread	=	$this->instance->users_global->getUnreadMsg();
					if($unread > 0)
					{
                    ?><b class="badge bg-danger pull-right"><?php echo $unread;;?></b> 
                    <?php
					}
                    ?>
                    <i class="fa fa-envelope"></i><span>Messagerie</span> </a> </li>
                    <li> <a href="<?php echo $this->instance->url->site_url('account/update');?>"> <i class="fa fa-edit"></i> <span>Modifier</span> </a> </li>
                    <?php
					if($this->instance->users_global->isAdmin())
					{
					?>
                    <li> <a href="<?php echo $this->instance->url->site_url('admin');?>"> <i class="fa fa-dashboard"></i> <span>Admin.</span> </a> </li>
                    <?php
					}
					?>
                    <li> <a href="<?php echo $this->instance->url->site_url('index');?>"> <i class="fa fa-sign-out"></i> <span>Retour</span> </a> </li>
                </ul>
            </nav>
        </section>
    </section>
</aside>