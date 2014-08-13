INDEX.GALLERYSHOWCASE
	{index.gsc.isset.start}			// <?php if(count($this->galleryGroup) > 0) { ?>
	{index.gsc.isset.end}			// <?php } ;?>
	{index.gsc.title}				// <?php echo $this->galleryShowCaseTitle;?>
	{index.gsc.loop.start}			//<?php  foreach($this->galleryGroup as $g)    { ?>
	{index.gsc.loop.end}			//<?php  } ?>
	{index.gsc.loop.title}			// $['TITLE']
	{index.gsc.loop.full}			// $['FULL']
	{index.gsc.loop.image}			// $['IMAGE']