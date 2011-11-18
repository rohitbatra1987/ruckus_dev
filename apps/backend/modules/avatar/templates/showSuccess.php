<table>
  <tbody>
    <tr>
      <th>Avatar:</th>
      <td><?php echo $avatar->getAvatarId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $avatar->getName() ?></td>
    </tr>
    <tr>
      <th>Avt image:</th>
      <td><?php echo $avatar->getAvtImage() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $avatar->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $avatar->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('avatar/edit?avatar_id='.$avatar->getAvatarId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('avatar/index') ?>">List</a>
