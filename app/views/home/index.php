<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/navigation/nav-homepage.php';

// uncomment one time, load website and then comment
// use Repositories\Cms\UserRepository;
// $repository = new UserRepository();
// $repository->userMigration();
// uncomment one time, load website and then comment

?>

<body>
  <header>
    <div class="banner-container">
      <img id="banner-picture" src="/images/banner/HomePageBanner.png" alt="Haarlem Festival" />
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
      <img class="article-picture" src="/images/homepage/collage.png" alt="Event collage">
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

  <div class="home-section-header">
    <h1>Higlighted events</h1>
    <hr id="line">
    <!-- <br> -->
  </div>

  <!-- Slider with events -->
  <div class="HomeSlider-container">
    <button id="LeftButton" onclick="updateCarouselLeft()">
      < </button>
        <div id="slider-container" class="slider-container"></div>
        <button id="RightButton" onclick="updateCarouselRight()">></button>
  </div>

  <!-- Panels with information -->
  <div class="home-section-header">
    <h1>Information panel</h1>
    <hr id="line">
    <!-- <br> -->
  </div>
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

  <script>
    var elements = [];
    const loopNumbers = [0, 4];

    function getSliderData() {
      fetch('/home/fetchSliderData')
        .then(result => result.json())
        .then(data => {
          elements = data;
          fillCarousel();
        })
        .catch((error) => console.log(error))
    }

    function fillCarousel() {
      document.getElementById("slider-container").innerHTML = "";
      for (let index = loopNumbers[0]; index < loopNumbers[1]; index++) {
        var element = document.createElement('div');
        element.classList.add("slider-element")

        var title = document.createElement('h1');
        var img = document.createElement('img');

        title.innerText = elements[index].Name;
        img.classList.add("slider-img")
        if (index < 3)
          img.src = '/images/Culinary/' + elements[index].Restaurant_ID + '.png';
        else
          img.src = '/images/artists/' + elements[index].Artist_ID + '.png';

        element.appendChild(img);
        element.appendChild(title);

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
    getSliderData();
  </script>
</body>

<?php
require __DIR__ . '/../components/footer.php';
?>