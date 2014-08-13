<?php echo $tendoo_left_menu;?>
<section id="content">
    <section class="vbox"><?php echo $tendoo_head;?>
        
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
                <section class="wrapper w-f"> 
				<?php echo output('notice');?> 
				
                	<div class="panel">
                    	<div class="panel-heading">
                        	A propos de <?php echo $theme_details['HUMAN_NAME'];?>
                        </div>
                        <div class="panel-body">
                        
                        </div>
                    </div>
                </section>
            </section>
        </section>
	</section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
