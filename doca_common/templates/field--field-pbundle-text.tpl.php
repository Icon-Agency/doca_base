<?php
/**
 * @file
 * Default template implementation to display the value of a field.
 */
?>

<?php foreach ($items as $delta => $item): ?>
  <?php if($variables['element']['#bundle'] == 'view'): ?>
    <div class="layout-max">
      <?php print render($item); ?>
    </div>
  <?php else: ?>
    <?php print render($item); ?>
  <?php endif; ?>
<?php endforeach; ?>
