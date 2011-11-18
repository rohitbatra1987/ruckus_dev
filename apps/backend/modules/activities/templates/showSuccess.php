<table>
  <tbody>
    <tr>
      <th>Activity:</th>
      <td><?php echo $activities->getActivityId() ?></td>
    </tr>
    <tr>
      <th>Book:</th>
      <td><?php echo $activities->getBookId() ?></td>
    </tr>
    <tr>
      <th>Activity type:</th>
      <td><?php echo $activities->getActivityTypeId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $activities->getName() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $activities->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $activities->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('activities/edit?activity_id='.$activities->getActivityId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('activities/index') ?>">List</a>
