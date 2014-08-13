{index.le.start}				// <?php if(count($this->lastestElements) > 0){		?>
        {index.le.end}					// <?php 	}	?>
        {index.loop.start}				// <?php foreach($this->lastestElements as $c)	{ $date	=	$this->instance->date->time($c['DATETIME'],TRUE);	?>
        {index.loop.end}				// <?php }	?>
        {index.loop.link}				// <?php echo $c['LINK'];?>
        {index.loop.thumb}				// <?php echo $c['THUMB'];?>
        {index.loop.title}				// <?php echo $c['TITLE'];?>
        {index.loop.datetime}			// <?php echo $c['DATETIME'];?>
        {index.loop.date.day}			// <?php echo $date['d'];?>
        {index.loop.date.hour}			// <?php echo $date['h'];?>
        {index.loop.date.sec}			// <?php echo $date['i'];?>
        {index.loop.date.year}			// <?php echo $date['y'];?>
        {index.loop.date.monthfull}		// <?php echo $date['month'];?>
        {index.loop.date.month}			// <?php echo $date['m'];?>
        {index.loop.content[limit]}		// <?php echo word_limiter(strip_tags($c['CONTENT']),$limit);?>