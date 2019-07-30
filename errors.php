<?php  if (count($errors) > 0) : ?>
  	<?php foreach ($errors as $error) : ?>
  	  <p><font color="#DC1345" size="4"><?php echo $error ?></font></p>
  	<?php endforeach ?>
<?php  endif ?>

<?php  if (count($errors) == 0 && isset($_POST['register'])) : ?>
<p><font color="white" size="4"><?php echo "Registration Successful<br/>You Can Login Now" ?></font></p>
<?php  endif ?>

