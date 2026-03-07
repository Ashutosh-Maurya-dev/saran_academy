document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('queryForm');
  if (!form) return;

  form.addEventListener('submit', (event) => {
    const phone = document.getElementById('phone').value.trim();
    const phoneValid = /^\d{10}$/.test(phone);

    if (!phoneValid) {
      event.preventDefault();
      alert('Please enter a valid 10-digit phone number.');
    }
  });
});
