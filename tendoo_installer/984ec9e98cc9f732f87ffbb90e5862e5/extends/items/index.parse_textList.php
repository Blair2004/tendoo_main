INDEX.LISTTEXT
		{index.lt.isset.start}				// <?php if(count($this->listText) > 0)		{		?>
		{index.lt.isset.end}				// <?php }		?>
		{index.lt.title}					// <?php echo $this->textListTitle;?>
		{index.lt.loop.start}				// <?php foreach($this->listText as $t)	{	?>
		{index.lt.loop.end}					// <?php }	?>
		{index.lt.loop.title}				// <?php echo $t['TITLE'];?>
		{index.lt.loop.link}				// <?php echo $t['LINK'];?>
		{index.lt.loop.text[limit]}			// <?php echo word_limiter($t['CONTENT'],$limit);?>