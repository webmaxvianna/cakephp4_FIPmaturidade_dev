<div>
    <!-- <?= $this->Html->image('Logo_Inova_Prudente.png', ['alt' => 'Imagem: Fundação Inova Prudente', 'style' => 'height: 80px', 'fullBase' => true]) ?> -->
    <?= $this->Html->image('https://docs.google.com/uc?id=1kQB8oh9JybHAB-YyEWhwMap1Pk96H5xl', ['alt' => 'Imagem: Fundação Inova Prudente', 'title' => 'Fundação Inova Prudente', 'style' => 'height: 80px', 'fullBase' => true]) ?>
    <br/>
    <p>
        O endereço de email <b>"<?= $email ?>"</b> ainda não está confirmado como válido em nosso sistema. 
    </p> 
    <p>
        Para que possamos enviar informações e conteúdos, solicitamos que faça a confirmação do seu endereço de email em nosso sistema. 
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
    <P>
        Caso o link não funcione, copie e cole o link na barra de endereço de seu navegador web.
    </P>
    <p>
        <small><i>Favor não responder a esse email. Esta é uma mensagem automática.<i></small>
    </p>
</div>