	{contact.parse}							// <?php $this->parseContact();?>
    	{contact.title}						// <?php echo $this->contactTitle;?>
    	{contact.details.isset.start}		// <?php if(count($this->contactAddressItems) > 0)	{	?>    	
        {contact.details.isset.end}			// <?php }	?>    	
        {contact.form}						// <?php $this->parseForm($this->contactHeader['ACTION'],$this->contactHeader['ENCTYPE'],$this->contactHeader['METHOD']);?>
        {contact.details.loop.start} 		// 
        {contact.details.loop.end}
        {contact.details.loop.type}			// <?php echo $c['TYPE'];?>
        {contact.details.loop.content}		// <?php echo $c['CONTENT'];?>
