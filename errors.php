<?php  if (count($errors) > 0) : ?>
	<div class="error w-50 mx-auto fixed-top" style="z-index:999;">
  	<?php foreach ($errors as $error) : ?>
  	  <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
		<?php echo $error ?>
		<button type="button" class="btn close float-end" style="vertical-align: middle; font-size:10px;" data-bs-dismiss="alert" aria-label="Close">
			<i class="fa-solid fa-x"></i>
		</button>
	  </div>
  	<?php endforeach ?>
  </div>
<?php  endif ?>