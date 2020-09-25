
<?php if (isset($cats)) : ?>
  <?php echo renderTemplate(APP . '/views/Main/include/menu.php', ['cats' => $cats]); ?>

<?php endif; ?>