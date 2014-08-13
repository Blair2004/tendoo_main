<header class="navbar navbar-inverse">
    <div class="normal-color with-slider">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
					  <a class="navbar-brand" href="/index.php"><img src="{site_logo}" alt="img"></a>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="navbar-collapse collapse navbar-right">
                        <ul class="nav navbar-nav social-nav">
                            <li><a href="#"><i class="entyp-twitter-1"></i></a></li>
                            <li><a href="#"><i class="entyp-facebook-1"></i></a></li>
                            <li><a href="#"><i class="entyp-gplus-1"></i></a></li>
                            <li><a href="#"><i class="entyp-pinterest"></i></a></li>
                            <li><a href="#"><i class="entyp-dribbble-1"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="inverse-color">
        <div class="container">
            <div class="row">
                <div class="navbar-collapse collapse">
                    <div class="col-sm-3 visible-xs">
                        <form action="#">
                            <div class="input-group header-search">
                                <input class="form-control" name="s" type="text">
                                    <span class="input-group-btn">
                                      <button class="btn btn-default" type="submit"><i class="entyp-search-1"></i></button>
                                    </span>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-11">
                        <ul class="nav navbar-nav main-nav">
						  	{menu_loop_start}
						  		{menu_loop_islink_start}
						  			{menu_loop_active_start}
							<li class="active">
                                <a href="{menu_loop_link}">{menu_loop_name}</a>{menu_loop_submenu}
                            </li>
						  			{menu_loop_active_else}
						  	<li>
                                <a href="{menu_loop_link}">{menu_loop_name}</a>{menu_loop_submenu}
                            </li>
						  			{menu_loop_active_end}
						  		{menu_loop_islink_else}
						  			{menu_loop_active_start}
							<li class="active">
                                <a href="{menu_loop_cname}">{menu_loop_name}</a>{menu_loop_submenu}
                            </li>
						  			{menu_loop_active_else}
						  	<li>
                                <a href="{menu_loop_cname}">{menu_loop_name}</a>{menu_loop_submenu}
                            </li>
						  			{menu_loop_active_end}
						  		{menu_loop_islink_end}
						  	{menu_loop_end}
                        </ul>
                    </div>
                    <div class="col-sm-1 hidden-xs text-right">
                        <button class="btn search-trigger" type="submit"><i class="entyp-search-1"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="top: 100%;" class="search-wrap">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <form action="#">
                        <input class="form-control" placeholder="Recherche ..." name="s" type="text">
                        <input value="Submit" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>