<h1>Activity parameterss List</h1>

<table>
  <thead>
    <tr>
      <th>Assessment</th>
      <th>Activity type</th>
      <th>Ass description</th>
      <th>Ass data type</th>
      <th>Name</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($activity_parameterss as $activity_parameters): ?>
    <tr>
      <td><a href="<?php echo url_for('activity_parameters/show?assessment_id='.$activity_parameters->getAssessmentId()) ?>"><?php echo $activity_parameters->getAssessmentId() ?></a></td>
      <td><?php echo $activity_parameters->getActivityTypeId() ?></td>
      <td><?php echo $activity_parameters->getAssDescription() ?></td>
      <td><?php echo $activity_parameters->getAssDataType() ?></td>
      <td><?php echo $activity_parameters->getName() ?></td>
      <td><?php echo $activity_parameters->getCreatedAt() ?></td>
      <td><?php echo $activity_parameters->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('activity_parameters/new') ?>">New</a>
