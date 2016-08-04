<?php
// No direct access
defined('_JEXEC') or die; ?>

<table class="table">
<?php foreach($outfitInfo['Outfit']['Members']['Online'] as $member): ?>
  <tr>
    <td><?=$member['character']['name']['first']; ?></td><td><?=$member['rank']; ?></td>
  </tr>
<?php endforeach; ?>
</table>
