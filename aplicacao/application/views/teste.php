


<p><?=anchor('bacia/criar', 'Criar Bacia Hidrográfica') ?></p>

<table border="1">
    <thead>
        <tr>
            <th>
                Nome da Bacia
            </th>
            <th>
                Ações
            </th>
        </tr>
    </thead>
    <tbody>
        <?php if ($bacias != false): ?>
        <?php foreach ($bacias as $bacia): ?>
            <tr>
            <td>
                <?=$bacia->nome ?>
            </td>
            <td>
               
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Não há registros cadastrados!</p>
        <?php endif ?>
    </tbody>
</table>
