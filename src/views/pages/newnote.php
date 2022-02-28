<?php
$render('header', ['loggedUser' => $loggedUser]);
?>
<div class="container">
    <main class = "section-area-new-note">
        <div class="form-note-area">
            <form class = "js-validator form-new-note" method="POST" action="<?=$base?>/newnote">
                <div class ="warning-form">Preencha todos os campos!</div>
                <input type="text" placeholder = "Digite o título da sua nota" name="tittle" maxlength = 25>
                <textarea type="text" placeholder = "Digite as suas anotações" name="body"></textarea>
                <div class="buttons-bar">
                    <button class ="button-action-note" type="submit">Salvar</button>
                    <button class ="button-action-note">Download</button>
                    <a class="button-action-note" href="<?=$base?>">Voltar</a>
                    <button class ="button-action-note" type = "reset">Resetar</button>
                </div>
            </form> 
        </div>

    </main>
</div>

<script src = "<?=$base?>/assets/js/form_note_validator.js"></script>