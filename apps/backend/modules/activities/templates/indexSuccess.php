<h1>Activitiess List</h1>

<table>
  <thead>
    <tr>
      <th>Activity</th>
      <th>Book</th>
      <th>Activity type</th>
      <th>Name</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($activitiess as $activities): ?>
    <tr>
      <td><a href="<?php echo url_for('activities/show?activity_id='.$activities->getActivityId()) ?>"><?php echo $activities->getActivityId() ?></a></td>
      <td><?php echo $activities->getBookId() ?></td>
      <td><?php echo $activities->getActivityTypeId() ?></td>
      <td><?php echo $activities->getName() ?></td>
      <td><?php echo $activities->getCreatedAt() ?></td>
      <td><?php echo $activities->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('activities/new') ?>">New</a>
