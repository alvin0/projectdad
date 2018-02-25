<?php $this->start();?>

	<h2>Page Title</h2>
	<p>This is the title text of the page</p>

<?php $this->end('content');?>


<!-- Extend the layout template -->
<?php $this->extend('admin/index');?>