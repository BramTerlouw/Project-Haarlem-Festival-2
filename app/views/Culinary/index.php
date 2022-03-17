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
    <button id="LeftButton" onclick="updateCarouselLeft()"><</button>
    <div id="culinary-slider-container" class="slider-container"></div>
    <button id="RightButton" onclick="updateCarouselRight()">></button>
</div>

<!-- Button to go to instant go to the restaurant page -->
<button class="allrestaurant-button" onclick="window.location.href='/hf/culinary/restaurants'" type="button">All Restaurants</button>

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

  <div class="recipe-grid-item">
    <button class="recipe-button" type="button">French</button>
  </div>
  <div class="recipe-grid-item">
    <button class="recipe-button" type="button">Dutch</button>
  </div>
  <div class="recipe-grid-item">
    <button class="recipe-button" type="button">European</button>
  </div>
  <div class="recipe-grid-item">
    <button class="recipe-button" type="button">Fish & Seafood</button>
  </div>
  <div class="recipe-grid-item">
    <button class="recipe-button" type="button">Click Me!</button>
  </div>
  <div class="recipe-grid-item">
    <button class="recipe-button" type="button">Click Me!</button>
  </div>
  <div class="recipe-grid-item">
    <button class="recipe-button" type="button">Click Me!</button>
  </div>
  <div class="recipe-grid-item">
    <button class="recipe-button" type="button">Click Me!</button>
  </div>
  <div class="recipe-grid-item">
    <button class="recipe-button" type="button">Click Me!</button>
  </div>

  
</div>
<script>

function getSliderData() {
          fetch('/hf/culinary/fetchSliderdata')
              .then(result => result.json())
              .then(restaurants => {
                restaurants.forEach(restaurant => {
                    var element = document.createElement('div');
                    element.classList.add("slider-element")

                     var title = document.createElement('h1');
                     var img = document.createElement('div');
                     var text = document.createElement('p');
                     var button = document.createElement('button');
                     var type = document.createElement('p');

                     button.classList.add("culinary-slider-button")
                      
                     button.innerText = "Make Reservation";
                     title.innerText = restaurant.Name;
                     img.classList.add("slider-img")
                     text.innerHTML = restaurant.Summary;
                     type.innerHTML = restaurant.Type;
                      
                     element.appendChild(img);
                     element.appendChild(title);
                     element.appendChild(text);
                     element.appendChild(type);
                     element.appendChild(button);
                     document.getElementById("culinary-slider-container").appendChild(element);
                  });
                  console.log(restaurants);
                  
              })
              .catch(error => console.log(error));
        }

//Function for scrolling the carousel to the left
function updateCarouselLeft() {
    if (loopNumbers[0] > 0) {
        loopNumbers[0] -= 1;
        loopNumbers[1] -= 1;
        fillCarousel();
    }
}
//Function for scrolling the carousel to the right
function updateCarouselRight() {
    if (loopNumbers[1] < elements.length) {
        loopNumbers[0] += 1;
        loopNumbers[1] += 1;
        fillCarousel();
    }
}
//fillCarousel();
getSliderData();

</script>
<?php
require __DIR__ . '/../components/footer.php';
?>