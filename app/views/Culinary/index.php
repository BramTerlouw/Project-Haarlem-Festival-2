<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>

<!-- Banner at the top of the page -->
<div class="Banner-culinary">
  <h1 class="culinary-title">The culinary experience</h1>
</div>

<!-- Header with information about the event -->
<div class="Culinary-Header">
  <h1 id="culinaryheader">Culinary</h1>
  <p>The Culinary section of the Haarlem Festival is a festival hosted all over the beautyfull city of Haarlem in the Netherlands. The hidden gem is only 15 minutes away from Amsterdam.This event offers both local and international delicacies. There will be a lot of participating restaurants to go to. More information about the restaurants that will participate and their menu’s will you find on this page. There are also lots of delicous recipes from the restaurant themselfs to cook at home!</p>
</div>

<!-- Slider with restaurants -->
<div class="HomeSlider-container">
  <button id="LeftButton" onclick="updateCarouselLeft()"><
    </button>
      <div id="culinary-slider-container" class="slider-container"></div>
      <button id="RightButton" onclick="updateCarouselRight()">></button>
</div>

<!-- Button to go to instant go to the restaurant page -->
<div class="culinary-allrestaurants-button">
  <button class="allrestaurant-button" onclick="window.location.href='/hf/culinary/restaurants'" type="button">All Restaurants</button>
</div>

<!-- Banner with quote -->
<div class="Banner-ingridients">
  <h1 class="ingridients-header">Made with only fresh ingredients from de local community</h1>
</div>

<div class="diversity-header-text">
  <h1 id="Diversity-header">Diversity</h1>
  <p>Haarlem Festival offers a lot of food diversity. This is the reason why it is such a great thing to experience because there is a lot to discover, maybe things you would not come to normally.</p>
</div>

<!-- Panels with Diversity -->
<div class="recipe-grid-container">
  <? foreach ($types as $type) { ?>
    <div class="recipe-grid-item">
    <a class="recipe-button" href="/hf/culinary/restaurants?type=<? echo $type['Type'] ?>"><? echo $type['Type'] ?></a>
  </div>
  <? } ?>


</div>
<script>
  var elements = [];
  var loopnumbers = 0;

  function getSliderData() {
    fetch('/hf/culinary/fetchSliderdata')
      .then(result => result.json())
      .then(restaurants => {
        elements = restaurants;
        fillCarousel();
      })
      .catch(error => console.log(error));
  }

  function fillCarousel() {
    document.getElementById("culinary-slider-container").innerHTML = "";
    for (let index = loopnumbers; index < (loopnumbers + 3); index++) {
      var element = document.createElement('div');
      element.classList.add("slider-element")

      var descContainer = document.createElement('div');
      descContainer.classList.add('culinary-slider-descContainer');

      var typeContainer = document.createElement('div');
      typeContainer.classList.add('culinary-slider-typeContainer')

      var title = document.createElement('h2');
      var typeTitle = document.createElement('h2');
      var img = document.createElement('div');
      var text = document.createElement('p');
      var button = document.createElement('button');
      var type = document.createElement('p');

      button.classList.add("culinary-slider-button")
      button.addEventListener("click", function() { openForm(elements[index].Restaurant_ID);});
      img.classList.add("slider-img")
      
      button.innerText = "Make Reservation";
      typeTitle.innerHTML = "Type";
      title.innerText = elements[index].Name;
      text.innerHTML = elements[index].Summary;
      type.innerHTML = elements[index].Type;

      element.appendChild(img);
      element.appendChild(title);

      descContainer.appendChild(text);
      element.appendChild(descContainer);

      typeContainer.appendChild(typeTitle);
      typeContainer.appendChild(type);
      element.appendChild(typeContainer);

      element.appendChild(button);
      document.getElementById("culinary-slider-container").appendChild(element);

    }
  }

  function openForm(id) {
    window.location.href='/hf/culinary/reservationForm?id=' + id;
  }

  //Function for scrolling the carousel to the left
  function updateCarouselLeft() {
    if (loopnumbers > 0) {
      loopnumbers -= 1;
      fillCarousel();
    }
  }
  //Function for scrolling the carousel to the right
  function updateCarouselRight() {
    if ((loopnumbers + 4) < elements.length) {
      loopnumbers += 1;
      fillCarousel();
    }
  }
  getSliderData();
</script>
<?php
require __DIR__ . '/../components/footer.php';
?>