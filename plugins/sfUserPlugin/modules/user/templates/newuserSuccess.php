<form action="<?php echo url_for('@new_user') ?>" method="post"> 
  <table>
    <tr>
    <td><h1>New User</h1></td>
	</tr>
    <?php
	echo $sf_user->getFlash('message');
	?>
    <?php echo $form ?>
	
    <tfoot>
	  <tr>
        <td colspan="2">
         <?php
         $captcha=new reCaptcha();
         $error = null;
         $publickey = "6LfLkscSAAAAAMK-TGcFnUOTgbDmdVC-A_4CT57h";
         echo $captcha->recaptcha_get_html($publickey, $error);
        ?>
		 <br>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="register" value="Submit" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>