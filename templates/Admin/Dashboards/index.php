<h1>Hello World!</h1>
<p>
    <?php
        $root = pathinfo($_SERVER['HTTP_REFERER']);
        $link = $root['dirname'] . '/confirm-email';
        echo $link;
        echo '<br/>';
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        $link2 = $actual_link . '/confirm-email?user=';
        echo $link2;
    ?>
</p>