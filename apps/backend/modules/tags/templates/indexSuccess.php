<h1>Tagss List</h1>

<table>
  <thead>
    <tr>
      <th>Tag</th>
      <th>Tag name</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tagss as $tags): ?>
    <tr>
      <td><a href="<?php echo url_for('tags/show?tag_id='.$tags->getTagId()) ?>"><?php echo $tags->getTagId() ?></a></td>
      <td><?php echo $tags->getTagName() ?></td>
      <td><?php echo $tags->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tags/new') ?>">New</a>
