<table>
  <tbody>
    <tr>
      <th>Activity type:</th>
      <td><?php echo $activity_type->getActivityTypeId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $activity_type->getName() ?></td>
    </tr>
    <tr>
      <th>Act type description:</th>
      <td><?php echo $activity_type->getActTypeDescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $activity_type->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $activity_type->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('activity_type/edit?activity_type_id='.$activity_type->getActivityTypeId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('activity_type/index') ?>">List</a>
