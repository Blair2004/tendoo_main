<section>
  <h4>{page_title}</h4>
  	{blog_post_isset_start}
  		{blog_post_loop_start}
  		<articles>
          <h3><a href="{blog_post_loop_link}">{blog_post_loop_title}</a></h3>
          <img src="{blog_post_loop_thumb}">
          <p>{blog_post_loop_content[400]}</p>
          <span> le {blog_post_loop_time_base}</span>
          <ul>
          {blog_post_loop_category_loop_start}
            <li><a href="{blog_post_loop_category_loop_link}">{blog_post_loop_category_loop_title}</a></li>
          {blog_post_loop_category_loop_end}
          </ul>
          {blog_post_loop_keywords_isset_start}
          <span>Mots clés</span>
          <ul>
            {blog_post_loop_keywords_loop_start}
            	<li><a href="{blog_post_loop_keywords_loop_link}">{blog_post_loop_keywords_loop_title}</a></li>
            {blog_post_loop_keywords_loop_end}            
          </ul>
          {blog_post_loop_keywords_isset_end}
  		</articles>
  		{blog_post_loop_end}
  	{blog_post_isset_else}
	<div>Aucun article disponible</div>
  	{blog_post_isset_end}
</section>