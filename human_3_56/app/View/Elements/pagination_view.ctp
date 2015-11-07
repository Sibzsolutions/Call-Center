<div class="pagination_box">
<?php 
	
	if($this->Session->check('limit_pagination') == 1)
	{
		$limit_pagination = $this->Session->read('limit_pagination');
		
		if(($this->paginator->counter(array('format' => '{:count}')))>$limit_pagination) 
		{
			?>
			<div id="spinner" style="display: none; align:center;">
			<?php echo $this->Html->image("indicator.gif", array('id' => 'busy-indicator')); ?>
			</div>
			<?php $this->paginator->options(array('update' => '#one_form','before' => $this->Js->get('#spinner')->effect('fadeIn', array('buffer' => false)),'complete' => $this->Js->get('#spinner')->effect('fadeOut', array('buffer' => false))));?>
			<div class="showing_box">Showing Page <?php echo $this->paginator->counter(); ?></div>
			<br />
			<?php echo $this->paginator->prev(); ?> – &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $this->paginator->numbers(array('separator'=>' | ')); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<?php echo $this->paginator->next('Next Page'); ?>
			<?php echo $this->Js->writeBuffer();
		}
	}
	else
	{
	?>
	<div id="spinner" style="display: none; align:center;">
	<?php echo $this->Html->image("indicator.gif", array('id' => 'busy-indicator')); ?>
	</div>
	<?php $this->paginator->options(array('update' => '#one_form','before' => $this->Js->get('#spinner')->effect('fadeIn', array('buffer' => false)),'complete' => $this->Js->get('#spinner')->effect('fadeOut', array('buffer' => false))));?>
	Showing Page <?php echo $this->paginator->counter(); ?>
	<br />
	<?php echo $this->paginator->prev(); ?> – &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo $this->paginator->numbers(array('separator'=>' | ')); ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<?php echo $this->paginator->next('Next Page'); ?>
	<?php echo $this->Js->writeBuffer();
	}	
?>
</div>