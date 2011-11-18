<h1>Book categorys List</h1>

<table>
  <thead>
    <tr>
      <th>Category</th>
      <th>Name</th>
      <th>Bk cat description</th>
      <th>Bk cat code</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($book_categorys as $book_category): ?>
    <tr>
      <td><a href="<?php echo url_for('book_category/show?category_id='.$book_category->getCategoryId()) ?>"><?php echo $book_category->getCategoryId() ?></a></td>
      <td><?php echo $book_category->getName() ?></td>
      <td><?php echo $book_category->getBkCatDescription() ?></td>
      <td><?php echo $book_category->getBkCatCode() ?></td>
      <td><?php echo $book_category->getCreatedAt() ?></td>
      <td><?php echo $book_category->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('book_category/new') ?>">New</a>
