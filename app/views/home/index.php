<?php
require __DIR__ . '/../components/head.php';
require __DIR__ . '/../components/nav-homepage.php';
?>
<body>
    <header>
        <div class="banner-container">
            <img id="banner-picture" src="/pictures/HomePageBanner.png" alt="Haarlem Festival"/>
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
            <img src="/pictures/tower.png" alt="Stadhuis haarlem">
        </article>

        <article class="article-flex">
            <img class="article-picture"src="/pictures/collage.png" alt="Event collage">
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
</body>

<?php
require __DIR__ . '/../components/footer.php';
?>