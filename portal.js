document.addEventListener('DOMContentLoaded', () => {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', () => {
            alert('Formulier succesvol verzonden!');
        });
    });
});