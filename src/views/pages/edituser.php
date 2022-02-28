<?php
    $render('header', ['loggedUser' => $loggedUser]);
?>

<div class="container">
    <div class="form-area"> 
        <form class = "form-login"method="POST" action="<?=$base;?>/<?=$loggedUser->id?>/edit_user">
            <?php if (!empty($_SESSION['flash'])): ?>
                <div class="flash"><?php echo $_SESSION['flash'];?></div>
                
            <?php $_SESSION['flash'] = ''; endif;?>
            <input type="name" placeholder="Digite o seu nome completo:" class="input-form" name="newName" value = "<?=$loggedUser->name?>"/>
            <input type="email" placeholder="Digite o seu email:" class="input-form" name="newEmail" value = "<?=$loggedUser->email?>"/>
            <input type="text" placeholder="Digite a sua data de nascimento:" class="input-form" name="newBirthday" id="birthdate" value = "<?=$loggedUser->birthday?>"/>
            <input type="password" placeholder="Digite a sua senha:" class="input-form" name="password"/>
            <button class="button" type="submit">Atualizar</button>
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