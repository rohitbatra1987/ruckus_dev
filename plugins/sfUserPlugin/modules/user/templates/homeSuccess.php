<table align="center">
<tr>
<td> <?php
	echo $sf_user->getFlash('message');
	?>
	</td>
	</tr>

<tr>
<td><a href="<?php echo url_for('Progress/index') ?>">Progress</a></td>
</tr>
<tr>
<td><a href="<?php echo url_for('@logout') ?>">Logout</a></td>
</tr>
</table>