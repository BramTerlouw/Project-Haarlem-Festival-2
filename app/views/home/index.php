<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-homepage.php';
?>
<body>
    <header>
        <div class="banner-container">
            <img id="banner-picture" src="/images/banner/HomePageBanner.png" alt="Haarlem Festival"/>
            <div class="banner-text">
                <h1>Haarlem Festival</h1>
            </div>
        </div>
    </header>
    <section class="article-container">
        <article class="article-flex">
            <div class="article-text-flex">
                <H1>Haarlem</H1>
                <p>
                Haarlem is a charming city featuring great culture, cafés, shops and restaurants. There’s plenty to keep you entertained. 
                With its ancient buildings, cobbled streets and winding waterways, the medieval city of Haarlem is one of the most photogenic destinations in the Netherlands. 
                </p>
            </div>
            <img src="/images/homepage/tower.png" alt="Stadhuis haarlem">
        </article>

        <article class="article-flex">
            <img class="article-picture"src="/images/homepage/collage.png" alt="Event collage">
            <div id="events" class="article-text-flex">
                <H1>Events</H1>
                <p>
                Haarlem festival consists of 4 different and equally unique events. The event where jazz bands perform who previously played in Haarlem is the                    
                Altough Haarlem is not globaly know for its culinary tradition there is lots of restaurants that are worth visting during the festival. 
                A new addition to the Haarlem Festival is the. This is the place where the best house and techno DJ’s will perform. Events are accessible for young and old! 
                </p>
            </div>
        </article>
        <iframe class="maps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9740.631211986733!2d4.638269004165772!3d52.385689594738665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5ef72791fbe05%3A0xb9ff4e7f864bbd34!2sHaarlem!5e0!3m2!1snl!2snl!4v1644465584655!5m2!1snl!2snl" allowfullscreen="" loading="lazy"></iframe>
    </section>


    <!-- Bottom of page -->

    <div class="Socialmedia">
    <h1>Higlighted events</h1>
    <hr id="line">
    <br>
</div>
<!-- Slider with events -->
<div class="HomeSlider-container">
    <button id="LeftButton" onclick="updateCarouselLeft()"><</button>
    <div id="slider-container" class="slider-container"></div>
    <button id="RightButton" onclick="updateCarouselRight()">></button>
</div>

<!-- Panels with information -->
<div class="grid-container">

  <div class="grid-item">
    <i class="fa fa-cloud"></i>
      <div>
        <h2>Several Events</h2>
        <p>Dance, Jazz and Culinary events spread over haarlem</p>
      </div>
  </div>

  <div class="grid-item">
    <i class="fa fa-cloud"></i>
      <div>
        <h2>Local dishes</h2>
        <p>Enjoy the smells and flavors from haarlem</p>
      </div>
  </div>

  <div class="grid-item">
    <i class="fa fa-cloud"></i>
      <div>
        <h2>Public transport</h2>
        <p>Haarlem is only 15 minutes from Amsterdam and all venues are accesible by PT.</p>
      </div>
  </div>

  <div class="grid-item">
    <i class="fa fa-cloud"></i>
    <div>
        <h2>International artists</h2>
        <p>Everyone with it's own unique style</p>
    </div>
  </div>

  <div class="grid-item">
  <i class="fa fa-cloud"></i>
    <div>
      <h2>Cool locations</h2>
      <p>More modern venues but also older monumental venues</p>
    </div>
  </div>

  <div class="grid-item">
  <i class="fa fa-cloud"></i>
    <div>
      <h2>Meet new people</h2>
        <p>Meet the friendly people of Haarlem and make new friends!</p>
    </div>
  </div>
</div>

<!-- social media Feed -->
<div class="Socialmedia">
    <h1>#HaarlemFestival</h1>
    <h3>use  the # and get featured!</h3>
    <hr id="line">
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
</body>

<?php
require __DIR__ . '/../components/footer.php';
?>