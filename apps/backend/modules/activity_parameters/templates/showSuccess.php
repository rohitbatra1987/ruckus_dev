<table>
  <tbody>
    <tr>
      <th>Assessment:</th>
      <td><?php echo $activity_parameters->getAssessmentId() ?></td>
    </tr>
    <tr>
      <th>Activity type:</th>
      <td><?php echo $activity_parameters->getActivityTypeId() ?></td>
    </tr>
    <tr>
      <th>Ass description:</th>
      <td><?php echo $activity_parameters->getAssDescription() ?></td>
    </tr>
    <tr>
      <th>Ass data type:</th>
      <td><?php echo $activity_parameters->getAssDataType() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $activity_parameters->getName() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $activity_parameters->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $activity_parameters->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('activity_parameters/edit?assessment_id='.$activity_parameters->getAssessmentId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('activity_parameters/index') ?>">List</a>
