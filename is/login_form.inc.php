<?php
if (!isset($login_errors)){
	$login_errors = array();
	}
require_once('./is/form_functions.inc.php');
?>
<?php
if ($page_type == 'admin'){ // Form action depends on $page_type
	echo "<form action='admin.php' method='post' accept-charset='utf-8'>";
	}
elseif ($page_type == 'super'){
	echo "<form action='super.php' method='post' accept-charset='utf-8'>";
	}
else {
	echo "<form action='login.php' method='post' accept-charset='utf-8'>";
	}
?>
	<ul>
		<li>
			<label for="username"><strong>Username</strong></label>
			<?php create_form_input('username', 'text', $login_errors); ?>
		</li>
		<li>
			<label for="pass"><strong>Password</strong></label>
			<?php create_form_input('pass', 'password', $login_errors); ?>
		</li>
	</ul>
	<ul class="btn-list">
		<li>
			<input class="generic-btn" type="submit" value="Login" />
		</li>
	</ul>
	<?php 
	if (array_key_exists('login', $login_errors)){
		echo '<div class="error">'.$login_errors['login'].'</div>';
		}
	?>
</form>