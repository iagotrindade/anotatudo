<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Anotatudo</title>
    <link rel = "stylesheet" href = "<?=$base;?>/assets/css/style_default.css"/>
    <link rel = "stylesheet" href = "<?=$base;?>/assets/css/style_login.css"/>
    <link rel = "stylesheet" href = "<?=$base;?>/assets/css/style_header.css"/>
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
    </div>
</header>

<div class="container">
    <div class="form-area"> 
        <form class = "form-login"method="POST" action="<?=$base;?>/cadastro">
            <?php if (!empty($flash)): ?>
                <div class="flash"><?php echo $flash;?></div>
            <?php endif;?>
            <input type="name" placeholder="Digite o seu nome completo:" class="input-form" name="name"/>
            <input type="email" placeholder="Digite o seu email:" class="input-form" name="email"/>
            <input type="password" placeholder="Digite a sua senha:" class="input-form" name="password"/>
            <input type="text" placeholder="Digite a sua data de nascimento:" class="input-form" name="birthday" id="birthdate"/>
            <a class = "link-form-login"href="<?=$base;?>/login">Já possui conta? Faça Login!</a>
            <button class="button" type="submit">Criar Conta</button>
        </form>
    </div>
</div>
<script src = "https://unpkg.com/imask"></script>

<script>
    IMask(
        document.getElementById("birthdate"),
        {
            mask:'00/00/0000'
        }
    )
</script>
</body>
</html>