<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="Views/modules/css/form.css">
    <?php 
        include 'Views/modules/includes/css_config.php';
    ?>
    
    <title>Cadastrar Noticia</title>
</head>
<body>
    <header>
       <?php 
            include 'Views/modules/includes/header_cadastro.php'
       ?>
    </header>

    <main>
       <section>
           <form action="/salvar" method="post">
                <label for="titulo">Titulo: </label><br>
                <input type="text" name="titulo" id="titulo" required>
                <br><br>
                 
                <label for="categoria">Categoria: </label><br>
                <input type="text" name="categoria" id="categoria" required>
                <br><br>

                <label for="conteudo">Conteudo: </label><br>
                <textarea name="conteudo" id="conteudo" required></textarea>
                <br><br><br>

                <div class="container-button">
                    <button type="submit">Cadastrar Noticia</button>
                </div>
                
           </form>
       </section>
    </main>

    <footer>
        <?php 
            include 'Views/modules/includes/footer.php'
       ?>
    </footer>
</body>
</html>