var CONTEXT_MENU	=	[
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{head}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{head_definition}", cmd: "{head_definition}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{head_title}", cmd: "{head_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{head_keywords}", cmd: "{head_keywords}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{head_description}", cmd: "{head_description}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{head_js_base_tag}", cmd: "{head_js_base_tag}"}
		]
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{form}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{form_isset_start}", cmd: "{form_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{form_isset_end}", cmd: "{form_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{form_type}", cmd: "{form_type}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{form_enctype}", cmd: "{form_enctype}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{form_action}", cmd: "{form_action}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{form_loop_start_end}", cmd: "{form_loop_start_end}"}
		]
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{notice}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{notice_isset_start}", cmd: "{notice_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{notice_isset_end}", cmd: "{notice_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{notice_content}", cmd: "{notice_content}"}
		]
	},
	/*
	
	*/
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{widgets}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widgets_right}", cmd: "{widgets_right}",children : [
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_right_isset_start}", cmd: "{widget_right_isset_start}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_right_isset_end}", cmd: "{widget_right_isset_end}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_right_loop_start}", cmd: "{widget_right_loop_start}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_right_loop_end}", cmd: "{widget_right_loop_end}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_right_loop_title}", cmd: "{widget_right_loop_title}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_right_loop_content}", cmd: "{widget_right_loop_content}"}
			]},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widgets_left}", cmd: "{widgets_left}",children : [
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_left_isset_start}", cmd: "{widget_left_isset_start}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_left_isset_end}", cmd: "{widget_left_isset_end}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_left_loop_start}", cmd: "{widget_left_loop_start}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_left_loop_end}", cmd: "{widget_left_loop_end}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_left_loop_title}", cmd: "{widget_left_loop_title}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_left_loop_content}", cmd: "{widget_left_loop_content}"}
			]},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widgets_bottom}", cmd: "{widgets_bottom}",children : [
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_bottom_isset_start}", cmd: "{widget_bottom_isset_start}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_bottom_isset_end}", cmd: "{widget_bottom_isset_end}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_bottom_loop_start}", cmd: "{widget_bottom_loop_start}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_bottom_loop_end}", cmd: "{widget_bottom_loop_end}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_bottom_loop_title}", cmd: "{widget_bottom_loop_title}"},
				{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{widget_bottom_loop_content}", cmd: "{widget_bottom_loop_content}"}
			]}
		]
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{header}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{header_usermenu}", cmd: "{header_usermenu}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{header_margin}", cmd: "{header_margin}"}
		]
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{menu}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_active_start}", cmd: "{menu_loop_active_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_active_else}", cmd: "{menu_loop_active_else}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_active_end}", cmd: "{menu_loop_active_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_islink_start}", cmd: "{menu_loop_islink_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_islink_end}", cmd: "{menu_loop_islink_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_islink_else}", cmd: "{menu_loop_islink_else}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_start}", cmd: "{menu_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_end}", cmd: "{menu_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_cname}", cmd: "{menu_loop_cname}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_title}", cmd: "{menu_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_link}", cmd: "{menu_loop_link}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_name}", cmd: "{menu_loop_name}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{menu_loop_submenu}", cmd: "{menu_loop_submenu}"}
		]
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{body}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{body_header}", cmd: "{body_header}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{body_module_content}", cmd: "{body_module_content}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{body_footer}", cmd: "{body_footer}"}
		]
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{pagination}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{pagination_isset_start}", cmd: "{pagination_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{pagination_isset_else}", cmd: "{pagination_isset_else}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{pagination_isset_end}", cmd: "{pagination_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{pagination_loop_start}", cmd: "{pagination_loop_start}"},
			
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{pagination_loop_link}", cmd: "{pagination_loop_link}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{pagination_loop_text}", cmd: "{pagination_loop_text}"},			
			
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{pagination_loop_end}", cmd: "{pagination_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{pagination_loop_active_start}", cmd: "{pagination_loop_active_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{pagination_loop_active_else}", cmd: "{pagination_loop_active_else}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{pagination_loop_active_end}", cmd: "{pagination_loop_active_end}"}
		]
	},
	
	{
		uiIcon: "ui-icon-document",
		title	: "{page}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{page_title}", cmd: "{page_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{page_description}", cmd: "{page_description}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{page_keywords}", cmd: "{page_keywords}"}
		]
	},
	{
		uiIcon: "ui-icon-home",
		title	: "{site}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{site_name}", cmd: "{site_name}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{site_logo}", cmd: "{site_logo}"}			
		]
	},
	{
		uiIcon: "ui-icon-star",
		title	: "{tendoo}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{tendoo_version}", cmd: "{tendoo_version}"}	
		]
	},
	{
		uiIcon: "ui-icon-person",
		title	: "{user}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{user_isconnected_start}", cmd: "{user_isconnected_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{user_isconnected_else}", cmd: "{user_isconnected_else}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{user_isconnected_end}", cmd: "{user_isconnected_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{user_email}", cmd: "{user_email}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{user_name}", cmd: "{user_name}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{user_pseudo}", cmd: "{user_pseudo}"}			
		]
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{index_parseCaroussel}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_parseCaroussel}", cmd: "{index_parseCaroussel}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_caroussel_start}", cmd: "{index_caroussel_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_caroussel_end}", cmd: "{index_caroussel_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_caroussel_loop_start}", cmd: "{index_caroussel_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_caroussel_loop_end}", cmd: "{index_caroussel_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_caroussel_loop_title}", cmd: "{index_caroussel_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_caroussel_loop_image}", cmd: "{index_caroussel_loop_image}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_caroussel_loop_content[limit]}", cmd: "{index_caroussel_loop_content[limit]}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_margin}", cmd: "{index_margin}"}
		],
		cmd: "{index_parseCaroussel}"
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{index_parseAboutUs}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_parseAboutUs}", cmd: "{index_parseAboutUs}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_aboutus_isset_start}", cmd: "{index_aboutus_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_aboutus_isset_end}", cmd: "{index_aboutus_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_aboutus_title}", cmd: "{index_aboutus_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_aboutus_content}", cmd: "{index_aboutus_content}"}
		],
		cmd: "{index_parseAboutUs}"
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{index_parseOnTopContent}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_parseOnTopContent}", cmd: "{index_parseOnTopContent}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_isset_start}", cmd: "{index_otc_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_isset_end}", cmd: "{index_otc_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_title}", cmd: "{index_otc_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_start}", cmd: "{index_otc_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_end}", cmd: "{index_otc_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_link}", cmd: "{index_otc_loop_link}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_title}", cmd: "{index_otc_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_thumb}", cmd: "{index_otc_loop_thumb}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_content[limit]}", cmd: "{index_otc_loop_content[limit]}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_datetime}", cmd: "{index_otc_loop_datetime}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_author_pseudo}", cmd: "{index_otc_loop_author_pseudo}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_author_id}", cmd: "{index_otc_loop_author_id}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_author_email}", cmd: "{index_otc_loop_author_email}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_author_thumb}", cmd: "{index_otc_loop_author_thumb}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_author_profilelink}", cmd: "{index_otc_loop_author_profilelink}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_category_loop_start}", cmd: "{index_otc_loop_category_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_category_loop_end}", cmd: "{index_otc_loop_category_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_category_loop_link}", cmd: "{index_otc_loop_category_link}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_otc_loop_category_loop_content}", cmd: "{index_otc_loop_category_content}"},
			
		],
		cmd: "{index_parseOnTopContent}"
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{index_parseGalleryShowCase}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_parseGalleryShowCase}", cmd: "{index_parseGalleryShowCase}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_gsc_isset_start}", cmd: "{index_gsc_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_gsc_isset_end}", cmd: "{index_gsc_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_gsc_title}", cmd: "{index_gsc_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_gsc_loop_start}", cmd: "{index_gsc_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_gsc_loop_end}", cmd: "{index_gsc_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_gsc_loop_title}", cmd: "{index_gsc_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_gsc_loop_full}", cmd: "{index_gsc_loop_full}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_gsc_loop_image}", cmd: "{index_gsc_loop_image}"}
		],
		cmd: "{index_parseGalleryShowCase}"
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{index_parseTabShowCase}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_parseTabShowCase}", cmd: "{index_parseTabShowCase}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tsc_isset_start}", cmd: "{index_tsc_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tsc_isset_end}", cmd: "{index_tsc_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tsc_head_loop_start}", cmd: "{index_tsc_head_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tsc_head_loop_end}", cmd: "{index_tsc_head_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tsc_head_loop_title}", cmd: "{index_tsc_head_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tsc_head_loop_content}", cmd: "{index_tsc_head_loop_content}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tsc_body_loop_start}", cmd: "{index_tsc_body_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tsc_body_loop_end}", cmd: "{index_tsc_body_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tsc_body_loop_title}", cmd: "{index_tsc_body_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tsc_body_loop_content}", cmd: "{index_tsc_body_loop_content}"}
		],
		cmd: "{index_parseTabShowCase}"
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{index_parseTextList}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_parseTextList}", cmd: "{index_parseTextList}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tl_isset_start}", cmd: "{index_tl_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tl_isset_end}", cmd: "{index_tl_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tl_title}", cmd: "{index_tl_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tl_loop_start}", cmd: "{index_tl_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tl_loop_end}", cmd: "{index_tl_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tl_loop_title}", cmd: "{index_tl_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tl_loop_link}", cmd: "{index_tl_loop_link}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_tl_loop_content[limit]}", cmd: "{index_tl_loop_content[limit]}"}
		],
		cmd: "{index_parseTextList}"
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{index_parsePartners}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_parsePartners}", cmd: "{index_parsePartners}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_partners_isset_start}", cmd: "{index_partners_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_partners_isset_end}", cmd: "{index_partners_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_partners_title}", cmd: "{index_partners_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{index_partners_content}", cmd: "{index_partners_content}"}
		],
		cmd: "{index_parsePartners}"
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{blog_post}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_isset_start}", cmd: "{blog_post_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_isset_else}", cmd: "{blog_post_isset_else}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_isset_end}", cmd: "{blog_post_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_start}", cmd: "{blog_post_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_end}", cmd: "{blog_post_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_link}", cmd: "{blog_post_loop_link}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_title}", cmd: "{blog_post_loop_title}"},
			
			// Date time
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_time_year}", cmd: "{blog_post_loop_time_year}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_time_month}", cmd: "{blog_post_loop_time_month}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_time_day}", cmd: "{blog_post_loop_time_day}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_time_hour}", cmd: "{blog_post_loop_time_hour}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_time_min}", cmd: "{blog_post_loop_time_min}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_time_sec}", cmd: "{blog_post_loop_time_sec}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_time_base}", cmd: "{blog_post_loop_time_base}"},			
			// End date time
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_full}", cmd: "{blog_post_loop_full}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_thumb}", cmd: "{blog_post_loop_thumb}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_content[limit]}", cmd: "{blog_post_loop_content[limit]}"},
			// CATEGOIRES
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_category_isset_start}", cmd: "{blog_post_loop_category_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_category_isset_end}", cmd: "{blog_post_loop_category_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_category_loop_start}", cmd: "{blog_post_loop_category_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_category_loop_end}", cmd: "{blog_post_loop_category_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_category_loop_link}", cmd: "{blog_post_loop_category_loop_link}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_category_loop_title}", cmd: "{blog_post_loop_category_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_category_loop_description}", cmd: "{blog_post_loop_category_loop_description}"},
			// Keywords
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_keywords_isset_start}", cmd: "{blog_post_loop_keywords_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_keywords_isset_end}", cmd: "{blog_post_loop_keywords_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_keywords_loop_start}", cmd: "{blog_post_loop_keywords_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_keywords_loop_end}", cmd: "{blog_post_loop_keywords_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_keywords_loop_link}", cmd: "{blog_post_loop_keywords_loop_link}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_keywords_loop_title}", cmd: "{blog_post_loop_keywords_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_post_loop_keywords_loop_description}", cmd: "{blog_post_loop_keywords_loop_description}"},
		],
		cmd: "{blog_post}"
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{blog_single}", 
		children: [
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_isset_start}", cmd: "{blog_single_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_isset_else}", cmd: "{blog_single_isset_else}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_isset_end}", cmd: "{blog_single_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_full}", cmd: "{blog_single_full}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_title}", cmd: "{blog_single_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_time}", cmd: "{blog_single_time}"},
			// Date time
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_time_year}", cmd: "{blog_single_time_year}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_time_month}", cmd: "{blog_single_time_month}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_time_day}", cmd: "{blog_single_time_day}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_time_hour}", cmd: "{blog_single_time_hour}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_time_min}", cmd: "{blog_single_time_min}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_time_sec}", cmd: "{blog_single_time_sec}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_time_base}", cmd: "{blog_single_time_base}"},			
			// End date time
			// CATEGORIES
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_category_isset_start}", cmd: "{blog_single_category_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_category_isset_end}", cmd: "{blog_single_category_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_category_loop_start}", cmd: "{blog_single_category_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_category_loop_end}", cmd: "{blog_single_category_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_category_loop_link}", cmd: "{blog_single_category_loop_link}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_category_loop_title}", cmd: "{blog_single_category_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_category_loop_description}", cmd: "{blog_single_category_loop_description}"},
			// CATEGORY END
			// KEYWORDS
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_keywords_isset_start}", cmd: "{blog_single_keywords_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_keywords_isset_end}", cmd: "{blog_single_keywords_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_keywords_loop_start}", cmd: "{blog_single_keywords_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_keywords_loop_end}", cmd: "{blog_single_keywords_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_keywords_loop_title}", cmd: "{blog_single_keywords_loop_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_keywords_loop_description}", cmd: "{blog_single_keywords_loop_description}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_keywords_loop_link}", cmd: "{blog_single_keywords_loop_link}"},
			// END KEYWORDS
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_author_profilelink}", cmd: "{blog_single_author_profilelink}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_author_id}", cmd: "{blog_single_author_id}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_author_pseudo}", cmd: "{blog_single_author_pseudo}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_author_email}", cmd: "{blog_single_author_email}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_content}", cmd: "{blog_single_content}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_timestamp}", cmd: "{blog_single_timestamp}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_total}", cmd: "{blog_single_comments_total}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_isset_start}", cmd: "{blog_single_comments_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_isset_end}", cmd: "{blog_single_comments_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_isset_else}", cmd: "{blog_single_comments_isset_else}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_loop_start}", cmd: "{blog_single_comments_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_loop_end}", cmd: "{blog_single_comments_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_loop_commentid}", cmd: "{blog_single_comments_loop_commentid}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_loop_author_id}", cmd: "{blog_single_comments_loop_author_id}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_loop_author_pseudo}", cmd: "{blog_single_comments_loop_author_pseudo}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_loop_author_email}", cmd: "{blog_single_comments_loop_author_email}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_loop_timestamp}", cmd: "{blog_single_comments_loop_timestamp}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{blog_single_comments_loop_content}", cmd: "{blog_single_comments_loop_content}"}
		],
		cmd: "{blog_single}"
	},
	{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{unique_parse}", 
		cmd		:	"{unique_parse}"
	},{
		uiIcon: "ui-icon-grip-dotted-vertical",
		title	: "{contact_parse}", 
		children	:	[
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{contact_title}", cmd: "{contact_title}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{contact_details_isset_start}", cmd: "{contact_details_isset_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{contact_details_isset_end}", cmd: "{contact_details_isset_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{contact_form}", cmd: "{contact_form}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{contact_details_loop_start}", cmd: "{contact_details_loop_start}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{contact_details_loop_end}", cmd: "{contact_details_loop_end}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{contact_details_loop_type}", cmd: "{contact_details_loop_type}"},
			{uiIcon: "ui-icon-arrowreturnthick-1-e",title: "{contact_details_loop_content}", cmd: "{contact_details_loop_content}"}
		],
		cmd		:	"{contact_parse}"
	},
];
var TWOTB_ITEMES_CONTEXTMENU	=	{
	
	"{blog_single}"				:		{
		name	:	"{blog_single}",
		items	:	{
			"{blog_single_isset_start}"					:	{name	:	"{blog_single_isset_start}"},
			"{index_partners_isset_start}"			:	{name	:	"{index_partners_isset_start}"},
			"{index_partners_isset_end}"			:	{name	:	"{index_partners_isset_end}"},
			"{index_partners_title}"				:	{name	:	"{index_partners_title}"},
			"{index_partners_content}"					:	{name	:	"{index_partners_content}"}
		}
	},
	"{pagination}"			:		{
		name	:	"{pagination}",
		items	:	{
			"{pagination}"						:	{name	:	"{pagination}"},
			"{pagination_isset_start}"			:	{name	:	"{pagination_isset_start}"},
			"{pagination_isset_else}"			:	{name	:	"{pagination_isset_else}"},
			"{pagination_isset_end}"			:	{name	:	"{pagination_isset_end}"},
			"{pagination_loop_start}"			:	{name	:	"{pagination_loop_start}"},
			"{pagination_loop_end}"				:	{name	:	"{pagination_loop_end}"},
			"{pagination_loop_active_start}"	:	{name	:	"{pagination_loop_active_start}"},
			"{pagination_loop_active_else}"		:	{name	:	"{pagination_loop_active_else}"},
			"{pagination_loop_active_end}"		:	{name	:	"{pagination_loop_active_end}"},
		}
	},
	"{widget_right}"			:		{
		name	:	"{widget_right}",
		items	:	{
			"{widget_right}"					:	{name	:	"{widget_right}"},
			"{widget_right_isset_start}"		:	{name	:	"{widget_right_isset_start}"},
			"{widget_right_isset_end}"			:	{name	:	"{widget_right_isset_end}"},
			"{widget_right_loop_start}"			:	{name	:	"{widget_right_loop_start}"},
			"{widget_right_loop_end}"			:	{name	:	"{widget_right_loop_end}"},
			"{widget_right_loop_title}"			:	{name	:	"{widget_right_loop_title}"},
			"{widget_right_loop_content}"		:	{name	:	"{widget_right_loop_content}"}
		}
	},
	"{widget_left}"			:		{
		name	:	"{widget_left}",
		items	:	{
			"{widget_left}"						:	{name	:	"{widget_left}"},
			"{widget_left_isset_start}"			:	{name	:	"{widget_left_isset_start}"},
			"{widget_left_isset_end}"			:	{name	:	"{widget_left_isset_end}"},
			"{widget_left_loop_start}"			:	{name	:	"{widget_left_loop_start}"},
			"{widget_left_loop_end}"			:	{name	:	"{widget_left_loop_end}"},
			"{widget_left_loop_title}"			:	{name	:	"{widget_left_loop_title}"},
			"{widget_left_loop_content}"		:	{name	:	"{widget_left_loop_content}"}
		}
	},
	"{widget_bottom}"			:		{
		name	:	"{widget_bottom}",
		items	:	{
			"{widget_bottom}"					:	{name	:	"{widget_bottom}"},
			"{widget_bottom_isset_start}"		:	{name	:	"{widget_bottom_isset_start}"},
			"{widget_bottom_isset_end}"			:	{name	:	"{widget_bottom_isset_end}"},
			"{widget_bottom_loop_start}"		:	{name	:	"{widget_bottom_loop_start}"},
			"{widget_bottom_loop_end}"			:	{name	:	"{widget_bottom_loop_end}"},
			"{widget_bottom_loop_title}"		:	{name	:	"{widget_bottom_loop_title}"},
			"{widget_bottom_loop_content}"		:	{name	:	"{widget_bottom_loop_content}"}
		}
	},
	
}



