<fieldset>
  <legend>Bordeau des prix</legend>
  <table border="1">
      <tr>
          <th>num</th>
          <th>designation</th>
          <th>unite</th>
          <th>prix unitaire</th>
          <th>prix total</th>
          <th></th>
      </tr>
      <?php
      foreach ($bp as $l) {
          ?>
          <tr>
              <td><?= $l->numMission; ?></td>
              <td><?= $l->designation; ?></td>
              <td><?= $l->unite; ?></td>
              <td><?= $l->prixUnitaire; ?></td>
              <td><?= $l->prixTotal; ?></td>
              <td>
                  <a href="/bp/edit/<?= $this->_params[0] ?>/<?= $l->numMission; ?>">edit</a>
                  <a href="/bp/delete/<?= $this->_params[0] ?>/<?= $l->numMission; ?>">delete</a>
              </td>
          </tr>
          <?php
      }
      ?>
  </table>
  <br>
  <table border="1">
      <tr>
          <th>num Mission</th>
          <th>delais</th>
      </tr>
      <?php
      foreach ($bp as $l) {
          ?>
          <tr>
              <td><?= $l->numMission; ?></td>
              <td><?= $l->delais; ?></td>
          </tr>
          <?php
      }
      ?>
  </table>
</fieldset>
</body>
</html>
