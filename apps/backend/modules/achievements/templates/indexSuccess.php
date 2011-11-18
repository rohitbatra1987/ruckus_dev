<h1>Achievementss List</h1>

<table>
  <thead>
    <tr>
      <th>Achievement</th>
      <th>Name</th>
      <th>Ach description</th>
      <th>Ach image</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($achievementss as $achievements): ?>
    <tr>
      <td><a href="<?php echo url_for('achievements/show?achievement_id='.$achievements->getAchievementId()) ?>"><?php echo $achievements->getAchievementId() ?></a></td>
      <td><?php echo $achievements->getName() ?></td>
      <td><?php echo $achievements->getAchDescription() ?></td>
      <td><?php echo $achievements->getAchImage() ?></td>
      <td><?php echo $achievements->getCreatedAt() ?></td>
      <td><?php echo $achievements->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('achievements/new') ?>">New</a>
