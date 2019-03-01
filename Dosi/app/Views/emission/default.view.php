<fieldset>
  <legend>emission</legend>
  <table border="1">
      <tr>
          <th>N° decompte</th>
          <th>Montant acompte</th>
          <th>Montant retenue</th>
          <th>Date envoyee par dosi</th>
          <th>Cumule de paiment</th>
          <th>observation</th>
          <th></th>
      </tr>
      <?php
      foreach ($emission as $em) {
          ?>
          <tr>
              <td><?= $em->numDecompte; ?></td>
              <td><?= $em->mntAcompte; ?></td>
              <td><?= $em->mntRetenue; ?></td>
              <td><?= $em->dateEnvoye; ?></td>
              <td><?= $em->cumulePaiment; ?></td>
              <td><?= $em->observation; ?></td>
              <td>
                  <a href="/emission/edit/<?= $this->_params[0]; ?>/<?= $em->numDecompte; ?>/">edit</a>
                  <a href="/emission/delete/<?= $this->_params[0]; ?>/<?= $em->numDecompte; ?>/">delete</a>
              </td>
          </tr>
          <?php
      }
      ?>
  </table>
</fieldset>
