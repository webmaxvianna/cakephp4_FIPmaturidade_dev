<section class="content">
    <div class="error-page mt-5 text-center">
        <h2 class="headline text-danger mr-3">Error</h2>
    
        <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Aconteceu algo de errado.</h3>

            <p>
            Por favor, tente acessar novamente o sistema inserindo seu nome de usuário e sua senha.
            </p>

        </div>
    </div>

    <div class="error-page mt-5 text-center">
        <p>
            <a href="<?= $this->Url->build('/admin/') ?>">Retornar ao sistema</a>
        </p>
    </div>
</section>
