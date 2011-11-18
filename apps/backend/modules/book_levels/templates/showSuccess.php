<table>
  <tbody>
    <tr>
      <th>Level:</th>
      <td><?php echo $book_levels->getLevelId() ?></td>
    </tr>
    <tr>
      <th>Level code:</th>
      <td><?php echo $book_levels->getLevelCode() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $book_levels->getName() ?></td>
    </tr>
    <tr>
      <th>Level description:</th>
      <td><?php echo $book_levels->getLevelDescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $book_levels->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $book_levels->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('book_levels/edit?level_id='.$book_levels->getLevelId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('book_levels/index') ?>">List</a>
