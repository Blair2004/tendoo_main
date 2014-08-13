{header_usermenu}
<header {header_margin}>
	<h3><img src="{site_logo}" alt="{site_name}"></h3>
    <ul>
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
</header>