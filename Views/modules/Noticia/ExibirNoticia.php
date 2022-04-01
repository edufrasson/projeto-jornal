<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Views/modules/css/style.css">
    <link rel="stylesheet" href="Views/modules/css/exibir.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Exibir Noticia</title>
</head>
<body>
    <header>
       <?php 
            include 'Views/modules/includes/header.php'
       ?>
    </header>

    <main>
        <section class="container">
            <div class="container-noticias">           
              <?php foreach($dados_noticia as $noticias): ?>  
                <div class="card">
                    <div class="card-title">
                        <?=$noticias->titulo?>
                    </div>
                    <hr width="100%">
                    <div class="card-content">
                        <?=$noticias->conteudo?>
                    </div>
                    <div class="card-link">
                        <div class="card-link-container">
                            <a href="">Acessar</a>                            
                        </div>                        
                    </div>
                    <div class="card-delete">
                        <a href="/deletar?id=<?= $noticias->id?>">
                            <i class='bx bxs-trash-alt'></i>                            
                        </a>
                    </div>
                </div>
                <?php endforeach?>                    
            </div>
        </section>
    </main>

    <footer>
        <?php 
            include 'Views/modules/includes/footer.php'
       ?>
    </footer>
</body>
</html>