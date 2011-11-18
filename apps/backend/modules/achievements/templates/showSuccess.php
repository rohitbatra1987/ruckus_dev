<table>
  <tbody>
    <tr>
      <th>Achievement:</th>
      <td><?php echo $achievements->getAchievementId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $achievements->getName() ?></td>
    </tr>
    <tr>
      <th>Ach description:</th>
      <td><?php echo $achievements->getAchDescription() ?></td>
    </tr>
    <tr>
      <th>Ach image:</th>
      <td><?php echo $achievements->getAchImage() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $achievements->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $achievements->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('achievements/edit?achievement_id='.$achievements->getAchievementId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('achievements/index') ?>">List</a>
