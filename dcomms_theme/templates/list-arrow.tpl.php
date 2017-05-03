<?php
/**
 * @file
 * Default template implementation of list-arrow component.
 */
?>
<div class="list-arrow">
  <h3 class="list-arrow__heading"><?php print t('Suggested content'); ?></h3>
  <ul class="list-arrow__list">
    <?php foreach($items as $item): ?>
      <li class="list-arrow__item">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 416 416" preserveAspectRatio="xMidYMid meet" xml:space="preserve"><polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "></polygon></svg>
        <?php print $item; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>
