<h1>Avatars List</h1>

<table>
  <thead>
    <tr>
      <th>Avatar</th>
      <th>Name</th>
      <th>Avt image</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($avatars as $avatar): ?>
    <tr>
      <td><a href="<?php echo url_for('avatar/show?avatar_id='.$avatar->getAvatarId()) ?>"><?php echo $avatar->getAvatarId() ?></a></td>
      <td><?php echo $avatar->getName() ?></td>
      <td><?php echo $avatar->getAvtImage() ?></td>
      <td><?php echo $avatar->getCreatedAt() ?></td>
      <td><?php echo $avatar->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('avatar/new') ?>">New</a>
