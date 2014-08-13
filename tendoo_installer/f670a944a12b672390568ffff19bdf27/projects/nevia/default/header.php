{header_usermenu}
<div id="top-line"></div>
<div class="container">
	<!-- Header -->
	<header id="header">
		<!-- Logo -->
		<div class="ten columns">
			<div id="logo">
				<h1><a href="index-2.html"><img src="{site_logo}" alt="{site_name}"></a></h1>
				<div id="tagline">Template Without Compromises!</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<!-- Social / Contact -->
		<div class="six columns">

			<!-- Social Icons -->
			<ul class="social-icons">
				<li class="twitter"><a href="#">Twitter</a></li>
				<li class="facebook"><a href="#">Facebook</a></li>
				<li class="dribbble"><a href="#">Dribbble</a></li>
				<li class="linkedin"><a href="#">LinkedIn</a></li>
				<li class="rss"><a href="#">RSS</a></li>
			</ul>

			<div class="clearfix"></div>

			<!-- Contact Details -->
			<div class="contact-details">Contact Phone: </div>

			<div class="clearfix"></div>

			<!-- Search -->
			<nav class="top-search">
				<form action="http://vasterad.com/themes/nevia/404-page.html" method="get">
					<button class="search-btn"></button>
					<input class="search-field" onblur="if(this.value=='')this.value='Search';" onfocus="if(this.value=='Search')this.value='';" value="Search" type="text">
				</form>
			</nav>

		</div>
	</header>
	<!-- Header / End -->

	<div class="clearfix"></div>

</div>
<!-- ------------- -->
<nav id="navigation" class="style-1">
    <div class="left-corner"></div>
    <div class="right-corner"></div>
    <ul class="menu" id="responsive">
	  	{menu_loop_start}
        	{menu_loop_active_start}
                {menu_loop_islink_start}
                <li class="active"><a href="{menu_loop_link}" title="{menu_loop_title}">{menu_loop_name}</a>{menu_loop_submenu}</li>
                {menu_loop_islink_else}
                <li class="active"><a href="{menu_loop_cname}" title="{menu_loop_title}">{menu_loop_name}</a>{menu_loop_submenu}</li>
                {menu_loop_islink_end}
			{menu_loop_active_else}
            	{menu_loop_islink_start}
                <li class="active"><a href="{menu_loop_link}" title="{menu_loop_title}">{menu_loop_name}</a>{menu_loop_submenu}</li>
                {menu_loop_islink_else}
                <li class=""><a href="{menu_loop_cname}" title="{menu_loop_title}">{menu_loop_name}</a>{menu_loop_submenu}</li>
                {menu_loop_islink_end}
            {menu_loop_active_end}                
        {menu_loop_end}
    </ul>
</nav>