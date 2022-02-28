<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anotatudo</title>
    <link rel = "stylesheet" href = "<?=$base;?>/assets/css/style_default.css"/>
    <link rel = "stylesheet" href = "<?=$base;?>/assets/css/style_header.css"/>
    <link rel = "stylesheet" href = "<?=$base;?>/assets/css/style_index.css"/>
    <link rel = "stylesheet" href = "<?=$base;?>/assets/css/style_login.css"/>
    <link rel = "stylesheet" href = "<?=$base;?>/assets/css/style_new.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa+One&family=Exo:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
</head>
<body>
    
    <header>
        <div class="container">
            <div class="header-area">
                <h1>
                    <a href = "<?=$base;?>/">ANOTATUDO</a>
                </h1>
            </div>
            <nav class="action-bar">
                <div class="user-area">
                    <p>
                        Bem-Vindo <a href="<?=$base?>/edit_user"><?=$loggedUser->name;?></a> / <a href="logout">Sair</a>
                    </p>
                </div>
                <div class="filter">
                    <ul class="menu-area">
                        
                        <li>
                            <a href="<?=$base?>">Home</a>
                        </li>
                        <li>
                            <a href="<?=$base?>/edit_user">Perfil</a>
                        </li>
                        <li>
                            <a href="about">Sobre</a>
                        </li>
                        <li>
                            <a href="contact    ">Contato</a>
                        </li>
                    </ul>
                </div>

                <div class="menu-mobile">
                        <div class="menu--icon">
                            <div></div>
                            <div></div>
                            <div></div> 
                        </div>
                </div>
            </nav>
        </div>
    </header>

    <script>
        let filter = document.querySelector('.filter');
        let menuBtn = document.querySelector('.menu-mobile');
        let menu = document.querySelector('.menu-area');

        if(window.innerWidth <= 750) {
            filter.style.display = 'none'
            filter.style.width = '0';
        }
        

        menuBtn.addEventListener('click', () => {
            if (filter.style.display === 'none') {
                filter.style.display = 'initial';
                filter.style.position = 'absolute';
                filter.style.backgroundColor = 'rgba(28, 28, 28, 0.6)';
                filter.style.height = '100vh';
                filter.style.paddingTop = '90px';   
                
                setTimeout(() => {
                    filter.style.width = '180px';
                }, 50);
            }

            else {
                menu.style.marginRight = '0';
                filter.style.width = '0';
                setTimeout(() => {
                    filter.style.display = 'none';
                }, 1000);
            }
        });
    </script>
