// Add event listeners to the buy buttons
var buyButtons = document.getElementsByClassName('buy-button');
for (var i = 0; i < buyButtons.length; i++) {
  buyButtons[i].addEventListener('click', function() {
    window.location.href = 'contacts.php';
  });
}

var customBuyButtons = document.getElementsByClassName('custom-button');
for (var i = 0; i < customBuyButtons.length; i++) {
  customBuyButtons[i].addEventListener('click', function() {
    window.location.href = 'custom.php';
  });
}