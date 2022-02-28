<?php     
    $render('header', ['loggedUser' => $loggedUser,
    'notes' => $notes]);
?>  <div class = "container">
        <div class="info-main-area">
            <h3 class = "info-main">-> Clique em seu nome para editar suas informações!</h3>
            <h3 class = "info-main">-> Clique em Adicionar Nova para criar uma nota!</h3>
            <h3 class = "info-main">-> Clique nas notas para ver as opções!</h3>
        </div>
    </div>
    <main class = "container section-area-notes">
        
        <a href="newnote">
            <div class="note-modal">
                <h2>+</h2>
                <p>Adicionar Nova</p>
            </div>
        </a>

        <?php if (!empty($notes)) {
            foreach($notes as $note){
            echo "<div class = 'area-modal'>
                        <div class='note-modal' data-key = $note->id>
                            <h3>" . $note->tittle . "</h3>
                            <p> Criada em ". date('d/m/Y \á\s H:i', strtotime($note->created)) . "</p>
                            
                        </div>

                        <div class='note-modal-options' id = $note->id>
                            <a class = 'button' href='$note->id/editnote'>Editar</a>
                            <a class = 'button' href='$note->id/delnote' onclick='return confirmDel()'>Excluir</a>
                        </div>
                        
                    </div>";}}
        ?>
    </main>

    <script src = "<?=$base?>/assets/js/show_options.js"></script>
    <script src = "<?=$base?>/assets/js/functions.js"></script>
    <script src = "<?=$base?>/assets/js/js_style.js"></script>

