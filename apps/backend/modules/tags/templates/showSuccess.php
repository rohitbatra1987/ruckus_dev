<table>
  <tbody>
    <tr>
      <th>Tag:</th>
      <td><?php echo $tags->getTagId() ?></td>
    </tr>
    <tr>
      <th>Tag name:</th>
      <td><?php echo $tags->getTagName() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $tags->getCreatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('tags/edit?tag_id='.$tags->getTagId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('tags/index') ?>">List</a>
