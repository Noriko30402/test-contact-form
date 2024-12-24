document.getElementById('js-delete-button').addEventListener('click', () => {
  document.getElementById('js-delete-modal').classList.remove('hidden');
  document.getElementById('js-overlay').classList.remove('hidden');
});

document.getElementById('js-cancel-button').addEventListener('click', () => {
  document.getElementById('js-delete-modal').classList.add('hidden');
  document.getElementById('js-overlay').classList.add('hidden');
});

document.getElementById('js-overlay').addEventListener('click', () => {
  document.getElementById('js-delete-modal').classList.add('hidden');
  document.getElementById('js-overlay').classList.add('hidden');
});
