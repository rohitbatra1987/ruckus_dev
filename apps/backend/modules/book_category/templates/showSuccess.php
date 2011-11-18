<table>
  <tbody>
    <tr>
      <th>Category:</th>
      <td><?php echo $book_category->getCategoryId() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $book_category->getName() ?></td>
    </tr>
    <tr>
      <th>Bk cat description:</th>
      <td><?php echo $book_category->getBkCatDescription() ?></td>
    </tr>
    <tr>
      <th>Bk cat code:</th>
      <td><?php echo $book_category->getBkCatCode() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $book_category->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $book_category->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('book_category/edit?category_id='.$book_category->getCategoryId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('book_category/index') ?>">List</a>
