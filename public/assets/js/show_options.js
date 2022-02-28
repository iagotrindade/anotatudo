let areaModal = document.querySelectorAll('.note-modal');
let modalOptions = document.querySelectorAll('.note-modal-options');

modalOptions.forEach(e => {
    e.style.display = 'none';
});

areaModal.forEach(e => {
    e.addEventListener('click', () => {
        let key = e.getAttribute('data-key');
        opKey = document.getElementById(key)
        
        if(opKey.style.display == 'none') {
            opKey.style.opacity = 0;
            opKey.style.display = 'flex';
            
            setTimeout(() => {
                opKey.style.opacity = 1;
            }, 50);
        }

        else {
            opKey.style.display = 'none';
        }

    })
});