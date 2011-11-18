<h1>Assessment types List</h1>

<table>
  <thead>
    <tr>
      <th>Assessment type</th>
      <th>Short name</th>
      <th>Name</th>
      <th>Description</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($assessment_types as $assessment_type): ?>
    <tr>
      <td><a href="<?php echo url_for('assessment_type/show?assessment_type_id='.$assessment_type->getAssessmentTypeId()) ?>"><?php echo $assessment_type->getAssessmentTypeId() ?></a></td>
      <td><?php echo $assessment_type->getShortName() ?></td>
      <td><?php echo $assessment_type->getName() ?></td>
      <td><?php echo $assessment_type->getDescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('assessment_type/new') ?>">New</a>
