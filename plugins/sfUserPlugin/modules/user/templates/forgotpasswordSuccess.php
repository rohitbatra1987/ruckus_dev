<form action="<?php echo url_for('user/forgotpassword') ?>" method="post"> 
<table> 
  <tbody>
  <tr>
    <td><h1>Forgot Password?</h1></td>
	</tr>
 <tr>
<td> <?php
	echo $sf_user->getFlash('message');
	?>
	</td>
	</tr>
	<tr>
<td>
    Please Enter Your Email Address
	<td>
	</tr>
   <?php 
    echo $form; 
    ?> 
  </tbody>
 </table>
 <input type="submit" value="Submit" id="btnSubmit" /> 
 <br>
</form>

