document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.animate-on-load .col-md-3');
    let delay = 0;
    cards.forEach(card => {
        card.style.animationDelay = delay + 's';
        delay += 0.3; // Incrementa di 0.1 secondi per ogni card
    });
});