
document.addEventListener("DOMContentLoaded", function() {
  const boxes = document.querySelectorAll('.database-box');
  boxes.forEach(box => {
    box.addEventListener('click', function() {
      const primaryKey = this.getAttribute('data-key');
      fetch('saveAndRedirect.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'key=' + primaryKey,
      })
      .then(response => response.text()) // Expecting text response now
      .then(data => {
        if(data === 'success') {
          window.location.href = '../../Backend/admindashboard.php'; // Adjust the path as needed
        } else {
          alert('Failed to process request.'); // Simple error handling
        }
      })
      .catch(error => console.error('Error:', error));
    });
  });
});

