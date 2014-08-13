BLOG.SINGLE
    	{blog.single.isset.start}			// <?php if(count($this->singleBlogPost) > 0)		{	?>
        {blog.single.isset.else}			// <?php		}		else if($this->singleBlogPost	===	false)		{			?>
        {blog.single.isset.end}				// <?php 		}		?>
        {blog.single.full}					// <?php echo $this->singleBlogPost['FULL'];?>
        {blog.single.title}					// <?php echo $this->singleBlogPost['TITLE'];?>
        {blog.single.time}					// <?php echo $this->instance->date->time($this->singleBlogPost['TIMESTAMP']);?>
        {blog.single.category.loop.start}	// Category Looping Start
        {blog.single.category.loop.end}		// end category looping.
        {blog.single.author.profilelink}	// <?php echo $this->instance->url->site_url(array('account','profile',$this->singleBlogPost['AUTHOR']['PSEUDO']));?>
        {blog.single.author.pseudo}			// <?php echo $this->singleBlogPost['AUTHOR']['PSEUDO'];?>
        {blog.single.author.id}				// <?php echo $this->singleBlogPost['AUTHOR']['ID'];?>
        {blog.single.author.email}			// <?php echo $this->singleBlogPost['AUTHOR']['EMAIL'];?>
        {blog.single.content}				// <?php echo $this->singleBlogPost['CONTENT'];?>
        {blog.single.timestamp}				// <?php echo  $this->singleBlogPost['TIMESTAMP'];?>
        {blog.single.comments.total}		// <?php echo $this->TT_SBP_comments;?>
        {blog.single.comments.isset.start}	// <?php	if($this->TT_SBP_comments > 0)			{;?>
        {blog.single.comments.isset.end}	// <?php	};?>
        {blog.single.comments.loop.start}	// <?php $commentID	=	1;	foreach($this->SBP_comments as $s)	{;?>
		{blog.single.comments.loop.start}	// <?php };?>
        {blog.single.comments.loop.id}		// <?php echo $commentID;?>
        {blog.single.comments.loop.author.pseudo}	// <?php echo $s['AUTHOR']['PSEUDO'] ;?>OR <?php echo $s['AUTHOR'] ;?>
        {blog.single.comments.loop.author.id}	// <?php echo $s['AUTHOR']['ID'] ;?>OR <?php NULL ;?>
        {blog.single.comments.loop.author.email}	// <?php echo $s['AUTHOR']['EMAIL'] ;?>OR <?php NULL ;?>
        {blog.single.comments.loop.timestamp}	// <?php echo $s['TIMESTAMP'];?>
        {blog.single.comments.loop.content}	// <?php echo $s['CONTENT'];?>