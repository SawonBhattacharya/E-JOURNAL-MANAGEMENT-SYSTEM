<?php if (count($errors) > 0): ?>
		<div class="errors">
			<?php foreach ($errors as $error): ?>
				<p><?php echo $error ?></p>
			<?php endforeach ?>	
		</div>
<?php endif ?>		

<?php if (count($errors_1) > 0): ?>
		<div class="errors">
			<?php foreach ($errors_1 as $error): ?>
				<p><?php echo $error ?></p>
			<?php endforeach ?>	
		</div>
<?php endif ?>		