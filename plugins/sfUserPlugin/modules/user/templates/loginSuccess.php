<form action="<?php echo url_for('user/login') ?>" method="post"> 
<table> 
  <tbody>
   <tr>
    <td><h1>User Login</h1></td>
	</tr>
   <tr>
   <td> 
    <?php
	echo $sf_user->getFlash('message');
	?>
	</td>
	</tr>
   <?php 
    echo $form; 
    ?> 
  </tbody>
 </table>
 <input type="submit" value="Login" id="btnSubmit" /> 
 <br>
 <!--<a href="<?php //echo url_for('@new_user') ?>"> New user </a> | --> <a href="<?php echo url_for('user/forgotpassword') ?>">Forgot Password? </a>
</form>

