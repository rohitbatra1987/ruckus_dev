<table>
  <tbody>
    <tr>
      <th>Metric:</th>
      <td><?php echo $metric_parameters->getMetricId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $metric_parameters->getName() ?></td>
    </tr>
    <tr>
      <th>Mtr description:</th>
      <td><?php echo $metric_parameters->getMtrDescription() ?></td>
    </tr>
    <tr>
      <th>Mtr data type:</th>
      <td><?php echo $metric_parameters->getMtrDataType() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $metric_parameters->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $metric_parameters->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('metric_parameters/edit?metric_id='.$metric_parameters->getMetricId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('metric_parameters/index') ?>">List</a>
