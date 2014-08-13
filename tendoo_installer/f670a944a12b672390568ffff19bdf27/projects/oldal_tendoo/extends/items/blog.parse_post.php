<section class="posts">
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
              {blog_post_isset_start}
              	{blog_post_loop_start}
                <article class="post">
                    <h3>{blog_post_loop_title}</h3>
                    <ul class="info">
                        <li>
                            <div class="text date">{blog_post_loop_time_base}</div>
                        </li>
                    </ul>
                    <figure> <a href="{blog_post_loop_link}"><img src="{blog_post_loop_thumb}" alt="img"></a> </figure>
                    <div class="content"> {blog_post_loop_content[100]}</div>
                    <div class="btn btn-default"><a href="{blog_post_loop_link}">Lire la suite</a></div>
                </article>
              	{blog_post_loop_end}
              {blog_post_isset_else}
              <h5>Aucun article disponible</h5>
              {blog_post_isset_end}
                <div class="older-posts text-right">
                    <div class="btn btn-primary">Older Articles</div>
                </div>
            </div>
            <div class="col-md-1 hidden-sm"></div>
            <div class="col-md-2 col-sm-3">
                {widgets_right}
            </div>
        </div>
    </div>
</section>

