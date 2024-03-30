document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.animate-on-load .col-md-3');
    let delay = 0;
    cards.forEach(card => {
        card.style.animationDelay = delay + 's';
        delay += 0.3;
    });
});

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    });