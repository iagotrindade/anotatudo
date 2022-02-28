let areaModals = document.querySelectorAll('.area-modal');
let containerNotes = document.querySelector('.section-area-notes');
let addNote = document.querySelectorAll('.note-modal');


if(areaModals.length < 5  && window.innerWidth >= 750) {
    containerNotes.style.justifyContent = 'flex-start';
    areaModals.forEach(element => {
        element.style.margin = '20px 15px 20px 15px';
    });
    addNote[0].style.margin = '20px 20px';
}

else if (window.innerWidth <= 640) {
    containerNotes.style.justifyContent = 'center';
}

else {
    containerNotes.style.justifyContent = 'space-between';
}