<h1>Activity types List</h1>

<table>
  <thead>
    <tr>
      <th>Activity type</th>
      <th>Name</th>
      <th>Act type description</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($activity_types as $activity_type): ?>
    <tr>
      <td><a href="<?php echo url_for('activity_type/show?activity_type_id='.$activity_type->getActivityTypeId()) ?>"><?php echo $activity_type->getActivityTypeId() ?></a></td>
      <td><?php echo $activity_type->getName() ?></td>
      <td><?php echo $activity_type->getActTypeDescription() ?></td>
      <td><?php echo $activity_type->getCreatedAt() ?></td>
      <td><?php echo $activity_type->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('activity_type/new') ?>">New</a>
