    {index.otc.isset.start} 		// <?php if(count($this->onTopContent) > 0){ ?>
    {index.otc.isset.end} 			// <?php } ?>
    {index.otc.title} 				// <?php $this->onTopContentTitle;?>
    {index.otc.loop.start} 			// <?php foreach($this->onTopContent as $c)	{ ?>
    {index.otc.loop.end} 			// <?php } ?>
    {index.otc.loop.link} 			// <?php echo $c['LINK'];?>
    {index.otc.loop.title} 			// <?php echo $c['TITLE'];?>
    {index.otc.loop.thumb} 			// <?php echo $c['THUMB'];?>
    {index.otc.loop.content[limit]} // <?php echo word_limiter($c['CARTEGORY'],$limit);?>
    {index.otc.loop.datetime} 		// <?php echo $c['DATETIME'];?>
    // Author
    {index.otc.loop.author.pseudo} 	// <?php echo $c['AUTHOR']['PSEUDO'];?>
    {index.otc.loop.author.id} 		// <?php echo $c['AUTHOR']['ID'];?>
    {index.otc.loop.author.email} 	// <?php echo $c['AUTHOR']['EMAIL'];?>
    {index.otc.loop.author.thumb} 	// <?php echo $c['AUTHOR']['THUMB'];?> // Tendoo 0.9.8
    {index.otc.loop.author.profilelink}	// 
    // category
    {index.otc.loop.category.loop.start} 	// Boucle des catégories
    {index.otc.loop.category.loop.end} 		// Boucle des catégories fin
    {index.otc.loop.category.link} 			// <?php echo $category_child['LINK'];?>
    {index.otc.loop.category.text} 			// <?php echo $category_child['TEXT'];?>