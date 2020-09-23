<div>
    <!-- <?= $this->Html->image('Logo_Inova_Prudente.png', ['alt' => 'Imagem: Fundação Inova Prudente', 'style' => 'height: 80px', 'fullBase' => true]) ?> -->
    <?= $this->Html->image('https://docs.google.com/uc?id=1kQB8oh9JybHAB-YyEWhwMap1Pk96H5xl', ['alt' => 'Imagem: Fundação Inova Prudente', 'title' => 'Fundação Inova Prudente', 'style' => 'height: 80px', 'fullBase' => true]) ?>
    <br/>
    <p>Olá!</p>
    <p>
        Foi criado ,em nosso Sistema de Maturidade, um perfil de "<?= $funcao ?>" para <?= $nome ?>. Abaixo estão as informações necessárias para ter acesso ao sistema.
    </p> 
    <p>
        <strong>Nome de usuário: </strong><?= $username ?><br/>
        <strong>Senha: </strong>123456<br/>
        <span style="color: red">É recomendado que faça a alteração da senha logo no primeiro acesso.</span>
    </p>
    <p>
        IMPORTANTE:<br/>
        Para que possamos enviar informações e conteúdos dos programas, solicitamos que faça a confirmação do seu endereço de email em nosso sistema. 
    </p>
    <p>
        Clique no link abaixo para fazer a confirmação do email.<br/>
        <?php
            $root = pathinfo($_SERVER['HTTP_REFERER']);
            $root = explode("/admin", $root['dirname']);
            $link = $root[0] . '/admin/users/confirm-email?user='.$username.'&email='.$email;
            echo $this->Html->link($link, $link);
        ?>    
    </p>
    <p>
        Caso o link não funcione, copie e cole o link na barra de endereço de seu navegador web.   
    </p>
    <p>
        <small><i>Favor não responder a esse email. Esta é uma mensagem automática.<i></small>
    </p>
</div>