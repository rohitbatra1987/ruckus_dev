<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
<?php  //if ($sf_user->getGuardUser() != ""): ?>
<?php  //if (!$sf_user->getGuardUser()->getIsSuperAdmin()): ?>
<?php //echo 'You are not allowed to access backend. Your privileges are limited for frontend only'; ?>


<?php //exit;?>
<?php //else: ?>

<?php //endif; ?>
<?php //endif; ?>

    <div id="bg">&nbsp;</div>
    <div id="page">         
        <div id="logo">
            <h1><a href="#">PLP</a></h1>
            <p class="description">Personalised Learning Program</p>
        </div>			          					
        <div id="main"><div id="main2"><div id="main3">	
                    <?php if($sf_user->isAuthenticated()):?>
                    <div id="menu"><div id="menu2">
                            <ul>                               
                                <li><a href="<?php echo url_for('@logout') ?>">Logout</a></li>
                            </ul>
                    </div></div>
                    <?php endif; ?>
                    <?php if($sf_user->hasCredential('SuperAdministrator') && $sf_user->isAuthenticated()):?>
                    <div id="sidebar"><div id="sidebar2">
                            <h2>User Management</h2>
                            <ul>
                            <li><a href="<?php //echo url_for('sf_guard_user/index') ?>">User Management</a></li>
                            </ul>
                            <h2>Book Management</h2>
                            <ul>
                                <li><span>&raquo;</span><a href="<?php echo url_for('book_category/index') ?>">Book Category Management</a></li>
                                <li><span>&raquo;</span><a href="<?php echo url_for('book_levels/index') ?>">Book Levels Management</a></li>
                                <li><span>&raquo;</span><a href="<?php echo url_for('book_series/index') ?>">Book Series Management</a></li>
                                <li><span>&raquo;</span><a href="<?php echo url_for('book/index') ?>">Book Management</a></li>
                                <li><span>&raquo;</span><a href="<?php echo url_for('metric_parameters/index') ?>">Metric Management</a></li>
                            </ul>
                            <h2>Activity Management</h2>
                            <ul>
                                <li><span>&raquo;</span><a href="<?php echo url_for('activity_type/index') ?>">Activity Type Management</a></li>
                                <li><span>&raquo;</span><a href="<?php echo url_for('activities/index') ?>">Activity Management</a></li>
                                <li><span>&raquo;</span><a href="<?php echo url_for('activity_parameters/index') ?>">Activity Parameters</a></li>
                                <li><span>&raquo;</span><a href="<?php echo url_for('assessment_type/index') ?>">Assessment Type</a></li>
                            </ul>
                            <h2>Badge Management</h2>
                            <ul>
                                <li><span>&raquo;</span><a href="<?php echo url_for('badge/index') ?>">Badge Management</a></li>
                            </ul>
							<h2>Utility Management</h2>
                            <ul>
                                
							    <li><span>&raquo;</span><a href="<?php echo url_for('avatar/index') ?>">Avatar</a></li>
								<li><span>&raquo;</span><a href="<?php echo url_for('faq/index') ?>">FAQ's</a></li>
                            </ul>
                    </div></div>
                    <?php elseif(!$sf_user->hasCredential('SuperAdministrator') && $sf_user->isAuthenticated()):?>
                    <p>This section is only for Super Administrators</p> 
                    <?php endif;?>
                    
                    <div id="content">
                        <?php echo $sf_content ?>
                    </div><!-- content -->                  
                    <div class="clearing">&nbsp;</div>
        </div></div></div><!-- main --><!-- main2 --><!-- main3 -->
        <div id="footer">
            <p>Copyright &copy; 2011</p>
        </div>
    </div><!-- page -->
</body>
</html>