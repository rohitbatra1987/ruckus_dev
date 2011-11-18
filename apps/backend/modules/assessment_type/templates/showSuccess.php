<table>
  <tbody>
    <tr>
      <th>Assessment type:</th>
      <td><?php echo $assessment_type->getAssessmentTypeId() ?></td>
    </tr>
    <tr>
      <th>Short name:</th>
      <td><?php echo $assessment_type->getShortName() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $assessment_type->getName() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $assessment_type->getDescription() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('assessment_type/edit?assessment_type_id='.$assessment_type->getAssessmentTypeId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('assessment_type/index') ?>">List</a>
