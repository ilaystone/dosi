<fieldset>
    <legend>facture</legend>
    <table border="1">
        <tr>
            <th>n° facture</th>
            <th>n° prix</th>
            <th>designation</th>
            <th>unité</th>
            <th>QTE</th>
            <th>%</th>
            <th>P.U.H.T</th>
            <th>montants(Dh)</th>
            <th></th>
        </tr>
        <?php
        foreach ($factures as $fact) {
            ?>
            <tr>
                <td><?= $fact->numFacture; ?></td>
                <td><?= $fact->numPrix; ?></td>
                <td><?= $fact->designation; ?></td>
                <td><?= $fact->u; ?></td>
                <td><?= $fact->qte; ?></td>
                <td><?= $fact->percent; ?></td>
                <td><?= $fact->puht; ?></td>
                <td><?= $fact->mnt; ?></td>
                <td>
                    <a href="/facture/edit/<?= $this->_params[0]; ?>/<?= $fact->numPrix; ?>/<?= $fact->numFacture ?>">edit</a>
                    <a href="/facture/delete/<?= $this->_params[0]; ?>/<?= $fact->numPrix; ?>/<?= $fact->numFacture ?>">delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</fieldset>
