<section> {blog_single_isset_start}
    <article>
        <h3>{blog_single_title}</h3>
        <img src="{blog_single_full}" alt="{blog_single_title}"> 
      <small>par <a href="{blog_single_author_profilelink}">{blog_single_author_pseudo}</a></small> 
      {blog_single_category_loop_start} 
      	<small>dans 
          <a href="{blog_single_category_loop_link}">{blog_single_category_loop_title}</a>, 
      </small> 
      {blog_single_category_loop_end} 
      <small> mot clé</small> 
      	{blog_single_keywords_isset_start}
        <ul>
            {blog_single_keywords_loop_start}
            <li><a href="{blog_single_keywords_loop_link}">{blog_single_keywords_loop_title}</a></li>
            {blog_single_keywords_loop_end}
        </ul>
        {blog_single_keywords_isset_end}
        <p>{blog_single_content}</p>
    </article>
    <div id="comments">
        <h4>{blog_single_comments_total} commentaire(s)</h4>
        {blog_single_comments_isset_start}
        <ul>
            {blog_single_comments_loop_start}
            <li> <span><a href="#">{blog_single_comments_loop_author_pseudo}</a></span> </li>
            {blog_single_comments_loop_end}
        </ul>
        {blog_single_comments_isset_end} </div>
    {blog_single_isset_else}
    <h3>article introuvable</h3>
    {blog_single_isset_end} 
</section>
