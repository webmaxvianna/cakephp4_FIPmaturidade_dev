<div>
    <!-- <?= $this->Html->image('Logo_Inova_Prudente.png', ['alt' => 'Imagem: Fundação Inova Prudente', 'style' => 'height: 80px', 'fullBase' => true]) ?> -->
    <?= $this->Html->image('https://docs.google.com/uc?id=1kQB8oh9JybHAB-YyEWhwMap1Pk96H5xl', ['alt' => 'Imagem: Fundação Inova Prudente', 'style' => 'height: 80px', 'fullBase' => true]) ?>
    <br/>
    <p>Olá!</p>
    <p>
        Foi solicitado a alteração de senha para <b>"<?= $username ?>"</b>.  
    </p> 
    <p>
        Para voltar a ter acesso ao sistema é necessário que faça a alteração de sua senha por meio do link abaixo. 
        Caso o link não funcione, copie o link e cole na barra de endereço de seu navegador web.
    </p>
    <p>
        Link para alteração de senha:<br/>
        <?php
            $root = pathinfo($_SERVER['HTTP_REFERER']);
            $link = $root['dirname'] . '/reset-password?token='.$hash.'&email='.$email;
            // echo $this->Html->link('Redefinir senha de acesso', $link);
            echo $this->Html->link($link, $link);
        ?>
    </p>
</div>