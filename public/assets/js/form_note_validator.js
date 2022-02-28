//Verify Forms
let validator = {
    handleSubmit:(event) => {
        event.preventDefault();

        let input = form.querySelector('input');
        let textarea = form.querySelector('textarea');
        let inputTittle = input;
        let inputDesc = textarea;

        if (inputTittle.value === '' || inputDesc.value === '') {
            warningForm.style.display = 'flex';
        }   

        else {
            warningForm.style.display = 'none';
            form.submit();
        }
    }
};

let form = document.querySelector('.js-validator');
let warningForm = document.querySelector('.warning-form');
form.addEventListener('submit', validator.handleSubmit);
    