INDEX.TABSHOWCASE
		{index.tsc.isset.start}			// <?php		if(count($this->tabShowCase) > 0)		{		?>
		{index.tsc.isset.end}			// <?php		}		?>
		{index.tsc.head.loop.start}			// <?php	foreach($this->tabShowCase as $s)	{;?>
		{index.tsc.head.loop.end}			// <?php 		}		?>
		{index.tsc.head.title}			// <?php echo $s['TITLE'];?>
		{index.tsc.head.title}			// <?php echo $s['CONTENT'];?>
		{index.tsc.body.loop.start}			// <?php	foreach($this->tabShowCase as $s)	{;?>
		{index.tsc.body.loop.end}			// <?php 		}		?>
		{index.tsc.body.text}			// <?php echo $s['CONTENT'];?>
		{index.tsc.body.title}			// <?php echo $s['TITLE'];?>