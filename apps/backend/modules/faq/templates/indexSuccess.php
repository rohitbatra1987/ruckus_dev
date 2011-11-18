<h1>Faqs List</h1>

<table>
  <thead>
    <tr>
      <th>Faq</th>
      <th>Faq title</th>
      <th>Faq description</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($faqs as $faq): ?>
    <tr>
      <td><a href="<?php echo url_for('faq/show?faq_id='.$faq->getFaqId()) ?>"><?php echo $faq->getFaqId() ?></a></td>
      <td><?php echo $faq->getFaqTitle() ?></td>
      <td><?php echo $faq->getFaqDescription() ?></td>
      <td><?php echo $faq->getCreatedAt() ?></td>
      <td><?php echo $faq->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('faq/new') ?>">New</a>
