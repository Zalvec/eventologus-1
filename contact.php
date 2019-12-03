<?php
require_once "lib/autoload.php";
BasicHead();
if (!isset($_SESSION["user"])){
    print LoadTemplate("basic_header");
} else{
    print LoadTemplate("user_header");
}

?>
<body>
    <main class="container">
        <section class="contcontainer">
            <section class="contactform">
                <h1>Stel ons een vraag</h1>
                <p>Wil jij ons contacteren? Vul het onderstaande formulier in en wij antwoorden zo snel mogelijk.</p>
                <form action="contact.php">
                    <div class="invul">
                    <label for="naam">Naam</label>
                    <input type="text" id="naam" name="naam">
                    </div>
                    <div class="invul">
                    <label for="email">Emailadres</label>
                    <input type="email" id="email" name="email">
                    </div>
                    <div class="invul">
                    <label for="vraag">Vraag</label>
                        <textarea name="vraag" id="vraag" cols="30" rows="10"></textarea>
                    </div>
                    <div class="button">
                        <button type="submit">Stel je vraag</button>
                    </div>
                </form>
            </section>
        </section>
    </main>
</body>
<?php
print LoadTemplate("basic_footer");
