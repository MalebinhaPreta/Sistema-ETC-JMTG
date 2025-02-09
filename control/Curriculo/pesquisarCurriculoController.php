<?php
require_once '../../model/DTO/alunoDTO.php';
require_once '../../model/DAO/alunoDAO.php';

#recebe os valores enviados do formulário via método post e evita sql injection e valida o tipo de dado.
$matricula = filter_input(INPUT_POST, 'Matricula, FILTER_VALIDATE_INT');

$dao = new AlunoDAO();
$matriculaAluno = $dao->getById($matricula);

//echo '<pre>';
//var_dump($idUsu);
?>
<main>
    <section>
        <table>
            <tbody>
                <?php if (!$matriculaAluno) : ?>
                    <tr>
                        <td colspan="4">Não existem usuários com matrícula = <?php echo $matricula; ?></td>
                    </tr>
                <?php else : ?>
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>E-mail</th>
                        </tr>
                    </thead>
                        <tr>
                            <td><?php echo $matriculaAluno['Matricula']; ?></td>
                            <td><?= htmlspecialchars($matriculaAluno['Nome']); ?></td>
                            <td><?= htmlspecialchars($matriculaAluno['CPF']); ?></td>
                            <td><?= htmlspecialchars($matriculaAluno['E-mail']); ?></td>
                        </tr>
                    <?php endif; ?>
            </tbody>
        </table>
    </section>
</main>
<br>

<a class="btn btn-voltar" href="#">Voltar</a>