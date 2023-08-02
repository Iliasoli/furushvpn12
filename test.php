<button onclick="hideShow()">Click me!</button>

<div id="elementToHide" style="display: none;">
  This element will be hidden when the button is clicked.
</div>

<div id="elementToShow">
  This element will be shown when the button is clicked.
</div>

<script>
function hideShow() {
  var elementToHide = document.getElementById("elementToHide");
  var elementToShow = document.getElementById("elementToShow");

  var isButtonClicked = localStorage.getItem("isButtonClicked");

  if (isButtonClicked === null) {
    localStorage.setItem("isButtonClicked", "true");
    elementToHide.style.display = "block";
    elementToShow.style.display = "none";
  } else {
    elementToHide.style.display = "none";
    elementToShow.style.display = "block";
    localStorage.removeItem("isButtonClicked");
  }
}
</script>
