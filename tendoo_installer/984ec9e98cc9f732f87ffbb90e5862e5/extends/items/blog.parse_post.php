BLOG.POST
    	{blog.post.isset.start}				// <?php		if(count($this->blogPost) > 0)		{		?>
        {blog.post.isset.else}				// <?php	}		else if($this->blogPost === FALSE)		{			?>
        {blog.post.isset.end}				// <?php		}		?>
        {blog.post.loop.start}				// <?php foreach($this->blogPost as $p){	?>
		{blog.post.loop.end}				// <?php 		}		?>
		{blog.post.loop.link}				// <?php echo $p['LINK'];?>
		{blog.post.loop.title}				// <?php echo $p['TITLE'];?>
		{blog.post.loop.full}				// <?php echo $p['FULL'];?>
		{blog.post.loop.thumb}				// <?php echo $p['THUMB'];?>
		{blog.post.loop.content[limit]}		// <?php echo word_limiter(strip_tags($p['CONTENT']),50);?>
		{blog.post.loop.category.loop.start}	// Category looping
        {blog.post.loop.category.loop.end}		// Category looping
        {blog.post.loop.category.loop.link}		// <?php echo $p['CATEGORY_LINK'];?>
		{blog.post.loop.category.loop.title}	// <?php echo $p['CATEGORY_TITLE'];?>
		{blog.post.loop.author.pseudo}			// <?php echo $p['AUTHOR']['PSEUDO'];?>
		{blog.post.loop.author.id}				// <?php echo $p['AUTHOR']['ID'];?>
		{blog.post.loop.author.email}			// <?php echo $p['AUTHOR']['EMAIL'];?>
		{blog.post.loop.author.profilelink}		// <?php echo $this->instance->url->site_url(array('account','profile',$p['AUTHOR']['PSEUDO']));?>