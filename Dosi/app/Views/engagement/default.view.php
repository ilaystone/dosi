<fieldset>
  <legend>engagement</legend>
  <table border="1">
      <tr>
          <th>Année</th>
          <th>Rubrique</th>
          <th>Report</th>
          <th>consolidation</th>
          <th>nouveau CP</th>
          <th>total CP</th>
          <th>CE</th>
          <th></th>
      </tr>
      <?php
      foreach ($engagement as $e) {
          ?>
          <tr>
              <td><?= $e->annee; ?></td>
              <td><?= $e->rubrique; ?></td>
              <td><?= $e->report; ?></td>
              <td><?= $e->consolidation; ?></td>
              <td><?= $e->ncp; ?></td>
              <td><?= $e->tcp; ?></td>
              <td><?= $e->ce; ?></td>
              <td>
                  <a href="/engagement/edit/<?= $this->_params[0]; ?>/<?= $e->rubrique; ?>">edit</a>
                  <a href="/engagement/delete/<?= $this->_params[0] ?>/<?= $e->rubrique; ?>">delete</a>
              </td>
          </tr>
          <?php
      }
      ?>
  </table>
</fieldset>
