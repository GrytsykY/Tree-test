<ul>
  <?php foreach ($cats as $cat) : ?>
    <li class="ele <?php if ($cat['children']) :  ?> eled <?php endif; ?>">
      <a id="Add" href="<?= BLOG ?>/main/edit?edit=<?= $cat['id'] ?>">
        <?= $cat['title'] ?>
      </a></li>
    <table>
      <tr>
        <td>
          <form class="formAdd" action="<?= BLOG ?>/main/add" method="POST">
            <input class='form-control name' id='name' type='text' name='title' placeholder='Enter the title' required />
        </td>
        <td>
          <input id='pid' type='hidden' name='pid' value="<?= $cat['id'] ?>">
          <button class='form-control formAdd' id="formAdd" type='submit'>+</button>
        </td>
        </form>

        <td>
          <form id="formDelete" action="<?= BLOG ?>/main/delete" method="POST">
            <input type='hidden' name='del' value="<?= $cat['id'] ?>" />
            <button class='form-control' id="del" type='submit'>-</button>
          </form>
        </td>
      </tr>
    </table>
    <?php if (count($cat['children']) > 0) :  ?>

      <?php echo renderTemplate(APP . '/views/Main/include/menu.php', ['cats' => $cat['children']]); ?>
    <?php endif; ?>

  <?php endforeach; ?>
</ul>