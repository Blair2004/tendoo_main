<section>
  	{blog_post_isset_start}
  		{blog_post_loop_start}
  		<articles>
          <h3><a href="{blog_post_loop_link}">{blog_post_loop_title}</a></h3>
          <img src="{blog_post_loop_thumb}">
          <p>{blog_post_loop_content[400]}</p>
          <ul>
          {blog_post_loop_category_loop_start}
            <li><a href="{blog_post_loop_category_loop_link}">{blog_post_loop_category_loop_title}</a></li>
          {blog_post_loop_category_loop_end}
          </ul>
  		</articles>
  		{blog_post_loop_end}
  	{blog_post_isset_else}
	<div>Aucun article disponible</div>
  	{blog_post_isset_end}
</section>