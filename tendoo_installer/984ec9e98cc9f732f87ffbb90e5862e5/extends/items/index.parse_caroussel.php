{index.caroussel.start} 	// <?php if(count($this->carousselElement) > 0)	{ ?>
		{index.caroussel.end} 		// <?php } ?>
		{index.caroussel.loop.start}	// <?php foreach($this->carousselElement as $c)	{	?>
		{index.caroussel.loop.end}		// <?php }	?>
		{index.caroussel.loop.title} // <?php echo $c['LINK'];?>
		{index.caroussel.loop.image} // <?php echo $c['IMAGE'];?> Image du Caroussel
		{index.caroussel.loop.title} // <?php echo $c['TITLE'];?>
		{index.caroussel.loop.text[limit]} <?php echo word_limiter(strip_tags($c['CONTENT']),$limit);?> //