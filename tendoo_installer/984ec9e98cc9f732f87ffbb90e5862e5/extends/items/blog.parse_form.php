{form.isset.start}			// <?php	if(count($this->currentForm) > 0)		{		?>
        {form.isset.end}			// <?php	}	?>
    	{form.type}					//	<?php echo $this->formType;?>
        {form.enctype}				// <?php echo $this->formEnctype;?>
        {form.action}				// <?php echo $this->formAction;?>
        {form.loop}					// <?php foreach($this->currentForm as $c){	echo $c;}?>