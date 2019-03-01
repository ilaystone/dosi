<fieldset>
  <legend>information</legend>
  <table border="1" onload="calculate();">
      <tr>
          <th>Objet</th>
          <th>Responsable</th>
          <th>AO N°</th>
          <th>Marche n°</th>
          <th>Attributaire</th>
          <th>Date d'ouverture</th>
          <th>Date d'Aprobation</th>
          <th>Approuvé par</th>
          <th>Situation</th>
          <th>Montant HT</th>
          <th>TVA</th>
          <th>Montant Details</th>
          <th>SAV-INT</th>
          <th>SAV revision</th>
          <th>Montant Total</th>
          <th></th>
      </tr>
      <tr>
          <?php
          foreach ($info as $inf) {
              ?>
              <td><?= $inf->object ?></td>
              <td><?= $inf->responsable ?></td>
              <td><?= $inf->aon ?></td>
              <td><?= $inf->numMarche ?></td>
              <td><?= $inf->attributaire ?></td>
              <td><?= $inf->dateOuverture ?></td>
              <td><?= $inf->dateAprobation ?></td>
              <td><?= $inf->approuvePar ?></td>
              <td><?= $inf->situation ?></td>
              <td><?= $inf->montantHT ?></td>
              <td><?= $inf->montantHT * 0.2 ?></td>
              <td><?= $inf->montantHT * 1.2 ?></td>
              <td><?= $inf->montantHT * 0.012 ?></td>
              <td>0</td>
              <td><?= $inf->montantHT * 1.212 ?></td>
              <td>
                  <a href="/info/edit/<?= $this->_params[0] ?>/">edit</a>
                  <a href="/info/delete/<?= $this->_params[0] ?>/">delete</a>
              </td>
              <?php
          }
          ?>
      </tr>
  </table>
</fieldset>
