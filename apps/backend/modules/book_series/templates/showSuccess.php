<table>
  <tbody>
    <tr>
      <th>Series:</th>
      <td><?php echo $book_series->getSeriesId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $book_series->getName() ?></td>
    </tr>
    <tr>
      <th>Series icon:</th>
      <td><?php echo $book_series->getSeriesIcon() ?></td>
    </tr>
    <tr>
      <th>Srs description:</th>
      <td><?php echo $book_series->getSrsDescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $book_series->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $book_series->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('book_series/edit?series_id='.$book_series->getSeriesId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('book_series/index') ?>">List</a>
