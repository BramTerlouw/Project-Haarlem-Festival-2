<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-website.php';
?>

<div class="Banner-culinary">
    
<h1 class="culinary-title">The culinary experience</h1>

</div>
<!-- Slider with events -->
<div class="culinary-container">
    <button id="culinary-LeftButton" onclick="RecipeupdateCarouselLeft()"><</button>
    <div id="slider-container" class="slider-container"></div>
    <button id="culinary-RightButton" onclick="RecipeupdateCarouselRight()">></button>
</div>
<div class="Culinary-Header">
    <h1 id="culinaryheader">Culinary</h1>
    <p>The Culinary section of the Haarlem Festival is a festival hosted all over the beautyfull city of Haarlem in the Netherlands. The hidden gem is only 15 minutes away from Amsterdam.This event offers both local and international delicacies. There will be a lot of participating restaurants to go to. More information about the restaurants that will participate and their menu’s will you find on this page. There are also lots of delicous recipes from the restaurant themselfs to cook at home!</p>
</div>

<div class="HomeSlider-container">
    <button id="LeftButton" onclick="updateCarouselLeft()"><</button>
    <div id="slider-container" class="slider-container"></div>
    <button id="RightButton" onclick="updateCarouselRight()">></button>
</div>

<button class="allrestaurant-button" type="button">Click Me!</button>
<div class="Banner-ingridients">
    
<h1 class="ingridients-header">Made with only fresh ingredients from de local community</h1>
<button class="ingridients-button" type="button">Click Me!</button>
</div>

<div class="diversity-header-text">
    <h1 id="Diversity-header">Diversity</h1>
    <p>Haarlem Festival offers a lot of food diversity. This is the reason why it is such a great thing to experience because there is a lot to discover, maybe things you would not come to normally.</p>
</div>

<!-- Panels with Diversity -->
<div class="recipe-grid-container">

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

        // function getSliderData() {
        //     fetch(/api/event/fetchSlider)
        //         .then(result => result.json())
        //         .then(items => {
        //             items.forEach(item => {

        //                 // hier maak je dan het slider element ipv in de functie fillCarousel()

        //             });
        //             console.log(items)
        //         })
        //         .catch(error => console.log(error));
        // }


        var element1 = { title: "Garu de nord"};
        var element2 = { title: "Ratatouille"};
        var element3 = { title: "Tiesto"};
        var element4 = { title: "Rilan & the bombadiers4"};
        var element5 = { title: "Ratatouille" };
        var element6 = { title: "Garu de nord"};
        var element7 = { title: "Ratatouille"};
        var element8 = { title: "Garu de nord8" };
        var element9 = { title: "Ratatouille"};

        var elements = [element1, element2, element3, element4, element5, element6, element7, element8, element9];
        const recipeloopNumbers = [0, 4];

        function RecipefillCarousel() {
            document.getElementById("slider-container").innerHTML = "";
            for (let i = recipeloopNumbers[0]; i < recipeloopNumbers[1]; i++) {
                var element = document.createElement('div');
                element.classList.add("slider-element")

                var Recipetitle = document.createElement('h1');
                var Recipeimg = document.createElement('div');
       
                Recipetitle.innerText = elements[i].title;
                Recipeimg.classList.add("slider-img")
                
                element.appendChild(Recipeimg);
                element.appendChild(Recipetitle);
                document.getElementById("slider-container").appendChild(element);
            }
        };

        function RecipeupdateCarouselLeft() {
            if (recipeloopNumbers[0] > 0) {
              recipeloopNumbers[0] -= 1;
              recipeloopNumbers[1] -= 1;
                RecipefillCarousel();
            }
        }
        function RecipeupdateCarouselRight() {
            if (recipeloopNumbers[1] < elements.length) {
              recipeloopNumbers[0] += 1;
              recipeloopNumbers[1] += 1;
                RecipefillCarousel();
            }
        }
        RecipefillCarousel();
    </script>
    <script>

// function getSliderData() {
//     fetch(/api/event/fetchSlider)
//         .then(result => result.json())
//         .then(items => {
//             items.forEach(item => {

//                 // hier maak je dan het slider element ipv in de functie fillCarousel()

//             });
//             console.log(items)
//         })
//         .catch(error => console.log(error));
// }


var element1 = { title: "Garu de nord", description: "Dutch guitarist Ferdi Lancee and saxophone player Barend Fransen started working together in 2001, when they started writing lounge music in Belgium", type: "loremipsum, Lorempisum, Loremipsum" };

var element2 = { title: "Ratatouille", description: "Ratatouille. The successful Michelin restaurant in Haarlem of chef Jozua Jaring is - just like Ratatouille - a mix of French cuisine.", type: "loremipsum, Lorempisum, Loremipsum" };
var element3 = { title: "Tiesto", description: "Tijs Verwest, known professionally as Tiësto. Is a Dutch DJ. He was voted the greatest DJ of all time in 2010/2011. His most famous songs are “Business”, “Lethal Industry” and “Love comes again”. ", type: "loremipsum, Lorempisum, Loremipsum" };
var element4 = { title: "Rilan & the bombadiers", description: "With a sold out first clubtour, a booming festival season and tracks that have already been featured in a number of big Hollywood productions, (Netflix / HULU / FOX: Shooter, Shut Eye and Rosewood).  optio autem quam unde." };
var element5 = { title: "el5", description: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut dignissimos fugit veritatis quaerat tenetur! Veniam blanditiis atque iusto, excepturi corporis esse optio autem quam unde.", type: "loremipsum, Lorempisum, Loremipsum" };
var element6 = { title: "el6", description: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut dignissimos fugit veritatis quaerat tenetur! Veniam blanditiis atque iusto, excepturi corporis esse optio autem quam unde.", type: "loremipsum, Lorempisum, Loremipsum" };
var element7 = { title: "el7", description: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut dignissimos fugit veritatis quaerat tenetur! Veniam blanditiis atque iusto, excepturi corporis esse optio autem quam unde.", type: "loremipsum, Lorempisum, Loremipsum"};
var element8 = { title: "el8", description: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut dignissimos fugit veritatis quaerat tenetur! Veniam blanditiis atque iusto, excepturi corporis esse optio autem quam unde.", type: "loremipsum, Lorempisum, Loremipsum"};

var element9 = { title: "el9", description: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut dignissimos fugit veritatis quaerat tenetur! Veniam blanditiis atque iusto, excepturi corporis esse optio autem quam unde.", type: "loremipsum, Lorempisum, Loremipsum" };

var elements = [element1, element2, element3, element4, element5, element6, element7, element8, element9];
const loopNumbers = [0, 4];

function fillCarousel() {
    document.getElementById("slider-container").innerHTML = "";
    for (let i = loopNumbers[0]; i < loopNumbers[1]; i++) {
        var element = document.createElement('div');
        element.classList.add("slider-element")

        var title = document.createElement('h1');
        var img = document.createElement('div');
        var text = document.createElement('p');
        var button = document.createElement('button');
        var type = document.createElement('p');
        
        button.innerText = "test";
        title.innerText = elements[i].title;
        img.classList.add("slider-img")
        text.innerHTML = elements[i].description;
        type.innerHTML = elements[i].type
        
        element.appendChild(img);
        element.appendChild(title);
        element.appendChild(text);
        element.appendChild(type);
        element.appendChild(button);
        document.getElementById("slider-container").appendChild(element);
    }
};

function updateCarouselLeft() {
    if (loopNumbers[0] > 0) {
        loopNumbers[0] -= 1;
        loopNumbers[1] -= 1;
        fillCarousel();
    }
}
function updateCarouselRight() {
    if (loopNumbers[1] < elements.length) {
        loopNumbers[0] += 1;
        loopNumbers[1] += 1;
        fillCarousel();
    }
}
fillCarousel();
</script>
<?php
require __DIR__ . '/../components/footer.php';
?>