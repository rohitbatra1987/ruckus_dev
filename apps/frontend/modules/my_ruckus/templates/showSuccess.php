<table>
  <tbody>
    <tr>
      <th>User:</th>
      <td><?php echo $user->getUserId() ?></td>
    </tr>
    <tr>
      <th>First name:</th>
      <td><?php echo $user->getFirstName() ?></td>
    </tr>
    <tr>
      <th>Last name:</th>
      <td><?php echo $user->getLastName() ?></td>
    </tr>
    <tr>
      <th>Email address:</th>
      <td><?php echo $user->getEmailAddress() ?></td>
    </tr>
    <tr>
      <th>Username:</th>
      <td><?php echo $user->getUsername() ?></td>
    </tr>
    <tr>
      <th>Salt:</th>
      <td><?php echo $user->getSalt() ?></td>
    </tr>
    <tr>
      <th>Pass:</th>
      <td><?php echo $user->getPass() ?></td>
    </tr>
    <tr>
      <th>Is active:</th>
      <td><?php echo $user->getIsActive() ?></td>
    </tr>
    <tr>
      <th>Is super admin:</th>
      <td><?php echo $user->getIsSuperAdmin() ?></td>
    </tr>
    <tr>
      <th>Last login:</th>
      <td><?php echo $user->getLastLogin() ?></td>
    </tr>
    <tr>
      <th>Access token:</th>
      <td><?php echo $user->getAccessToken() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $user->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $user->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Additional emails:</th>
      <td><?php echo $user->getAdditionalEmails() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('my_ruckus/edit?user_id='.$user->getUserId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('my_ruckus/index') ?>">List</a>
