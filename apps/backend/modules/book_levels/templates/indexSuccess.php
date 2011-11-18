<h1>Book levelss List</h1>

<table>
  <thead>
    <tr>
      <th>Level</th>
      <th>Level code</th>
      <th>Name</th>
      <th>Level description</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($book_levelss as $book_levels): ?>
    <tr>
      <td><a href="<?php echo url_for('book_levels/show?level_id='.$book_levels->getLevelId()) ?>"><?php echo $book_levels->getLevelId() ?></a></td>
      <td><?php echo $book_levels->getLevelCode() ?></td>
      <td><?php echo $book_levels->getName() ?></td>
      <td><?php echo $book_levels->getLevelDescription() ?></td>
      <td><?php echo $book_levels->getCreatedAt() ?></td>
      <td><?php echo $book_levels->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('book_levels/new') ?>">New</a>
