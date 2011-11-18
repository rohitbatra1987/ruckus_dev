<h1>Book seriess List</h1>

<table>
  <thead>
    <tr>
      <th>Series</th>
      <th>Name</th>
      <th>Series icon</th>
      <th>Srs description</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($book_seriess as $book_series): ?>
    <tr>
      <td><a href="<?php echo url_for('book_series/show?series_id='.$book_series->getSeriesId()) ?>"><?php echo $book_series->getSeriesId() ?></a></td>
      <td><?php echo $book_series->getName() ?></td>
      <td><?php echo $book_series->getSeriesIcon() ?></td>
      <td><?php echo $book_series->getSrsDescription() ?></td>
      <td><?php echo $book_series->getCreatedAt() ?></td>
      <td><?php echo $book_series->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('book_series/new') ?>">New</a>
