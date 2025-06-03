document.addEventListener('DOMContentLoaded', () => {
  const eventCards = document.querySelectorAll('.event-card');
  eventCards.forEach(card => {
    card.addEventListener('click', () => {
      const modalId = card.getAttribute('data-modal');
      document.getElementById(modalId).classList.remove('hidden');
    });
  });

  const closeButtons = document.querySelectorAll('[onclick^="closeModal"]');
  closeButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      const modalId = e.target.getAttribute('onclick').replace('closeModal(', '').replace(')', '');
      document.getElementById(modalId).classList.add('hidden');
    });
  });
});

function closeModal(modalId) {
  document.getElementById(modalId).classList.add('hidden');
}