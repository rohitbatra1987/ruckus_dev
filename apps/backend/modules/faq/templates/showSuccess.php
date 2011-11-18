<table>
  <tbody>
    <tr>
      <th>Faq:</th>
      <td><?php echo $faq->getFaqId() ?></td>
    </tr>
    <tr>
      <th>Faq title:</th>
      <td><?php echo $faq->getFaqTitle() ?></td>
    </tr>
    <tr>
      <th>Faq description:</th>
      <td><?php echo $faq->getFaqDescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $faq->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $faq->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('faq/edit?faq_id='.$faq->getFaqId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('faq/index') ?>">List</a>
