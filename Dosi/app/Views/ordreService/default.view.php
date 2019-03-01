<fieldset>
  <legend>ordre de service</legend>
  <table border="1">
      <tr>
          <th>num</th>
          <th>date OS</th>
          <th>type OS</th>
          <th>etape</th>
          <th>remarque</th>
          <th></th>
      </tr>
      <?php
      foreach ($ordreService as $os) {
          ?>
          <tr>
              <td><?= $os->num; ?></td>
              <td><?= $os->dateOS; ?></td>
              <td><?= $os->typeOS; ?></td>
              <td><?= $os->etape; ?></td>
              <td><?= $os->remarque; ?></td>
              <td>
                  <a href="/ordreService/edit/<?= $this->_params[0] ?>/<?= $os->etape; ?>/<?= $os->num; ?>">edit</a>
                  <a href="/ordreService/delete/<?= $this->_params[0] ?>/<?= $os->etape; ?>/<?= $os->num; ?>">delete</a>
              </td>
          </tr>
          <?php
      }
      ?>
  </table>
</fieldset>
