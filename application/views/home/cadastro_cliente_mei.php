<main class = "container">
    <header class = "row text-center">
        <h1 class = 'col'>Cadastro Passo 1</h1>
    </header>
    <section class = "row">
        <article class = 'col text-center'>
            <header class = "row justify-content-center">
                <h1 class = "col-6 text-hide" style = 'background-image : url("<?=base_url()?>res/img/mei-img.png");  background-repeat: no-repeat; text-center width: 256px; height: 256px;'>
                    Imagem de mei
                </h1>
            </header>
            <a href="<?=site_url('homepage/cadastrar/mei')?>">Desejo ser um MEI</a>
            <p class ='text-justify'>
                Com uma conta de micro empreendedor individual (MEI), você poderá definir cidades que 
                trabalha e serviços que presta, assim clientes poderão solicitar seus serviços.
                Nada impede também de um solicitar serviços de outros MEIs. Ou seja você terá acesso 
                a todas as funcionalidades que um cliente comum tem. Como também fornecer seus serviços
                a terceiros.
            </p>
        </article>
        <article  class = 'col text-center'>
            <header class = "row justify-content-center">
                <h1 class = "col-5 w-100 text-hide" style = 'background-image : url("<?=base_url()?>res/img/cliente-img.png");  background-repeat: no-repeat; text-center width: 256px; height: 256px;'>
                    Imagem de cliente
                </h1>
            </header>
            <a href="<?=site_url('homepage/cadastrar/cliente')?>">Desejo ser um Cliente</a>
            <p class = 'text-justify'>
                Com uma conta de Cliente você poderá solicitar serviços a MEIs. Definir endereços comuns 
                que solicita serviços e contatos para auxiliar nesse processo. Ou seja, clientes têm seu 
                conjunto de funcionalidades relacionadas a solicitação de serviços, cancelamento, conclusão,
                e visualização de histórico.
            </p>
        </article>
    </section>
</main>
