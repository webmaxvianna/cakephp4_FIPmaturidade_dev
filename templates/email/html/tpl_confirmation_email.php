<div>
    <!-- <?= $this->Html->image('Logo_Inova_Prudente.png', ['alt' => 'Imagem: Fundação Inova Prudente', 'style' => 'height: 80px', 'fullBase' => true]) ?> -->
    <?= $this->Html->image('https://docs.google.com/uc?id=1kQB8oh9JybHAB-YyEWhwMap1Pk96H5xl', ['alt' => 'Imagem: Fundação Inova Prudente', 'style' => 'height: 80px', 'fullBase' => true]) ?>
    <br/>
    <p>
        O endereço de email <b>"<?= $email ?>"</b> ainda não está confirmado com válido em nosso sistema. 
    </p> 
    <p>
        Para que possamos enviar informações e conteúdos dos programas, solicitamos que faça a confirmação do seu endereço de email em nosso sistema. 
        Caso o link não funcione, copie o link e cole na barra de endereço de seu navegador web.
    </p>
    <p>
        Clique no link abaixo para fazer a confirmação do email.<br/>
        <?php
            $root = pathinfo($_SERVER['HTTP_REFERER']);
            $link = $root['dirname'] . '/confirm-email?user='.$username.'&email='.$email;
            // echo $this->Html->link('Confirmação do endereço de email', $link);
            echo $this->Html->link($link, $link);
        ?>    
    </p>
</div>