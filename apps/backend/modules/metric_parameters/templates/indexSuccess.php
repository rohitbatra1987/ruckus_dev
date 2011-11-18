<h1>Metric parameterss List</h1>

<table>
  <thead>
    <tr>
      <th>Metric</th>
      <th>Name</th>
      <th>Mtr description</th>
      <th>Mtr data type</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($metric_parameterss as $metric_parameters): ?>
    <tr>
      <td><a href="<?php echo url_for('metric_parameters/show?metric_id='.$metric_parameters->getMetricId()) ?>"><?php echo $metric_parameters->getMetricId() ?></a></td>
      <td><?php echo $metric_parameters->getName() ?></td>
      <td><?php echo $metric_parameters->getMtrDescription() ?></td>
      <td><?php echo $metric_parameters->getMtrDataType() ?></td>
      <td><?php echo $metric_parameters->getCreatedAt() ?></td>
      <td><?php echo $metric_parameters->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('metric_parameters/new') ?>">New</a>
