<?php if(count($errors) > 0) : ?>
 <div class="p-1 ml-5 mr-5 error">
 	<?php foreach ($errors as $error) : ?>
 		<p> <?php echo $error; ?> </p>
 	<?php endforeach ?>

 </div>

<?php endif ?>


