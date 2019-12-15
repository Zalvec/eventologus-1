<h2 class="maintitle">Evenement aanmaken</h2>

<section class="contcontainer beheer">

    <section class="wijzig">
        <form action="lib/aanmaken.php" method="post" id="eve_aanmaken" enctype="multipart/form-data" class="aanmaakform">

            <input type="hidden" id="formname" name="formname" value="eve_form">
            <input type="hidden" id="tablename" name="tablename" value="evenement">
            <input type="hidden" id="pkey" name="pkey" value="eve_id">

            <div class="invul">
                <label for="eve_naam">Naam</label>
                <input type="text" name="eve_naam" id="eve_naam" placeholder="Naam..." required>
            </div>
            <div class="invul">
                <fieldset>
                    <legend>Locatie</legend>
                    <label for="loc_straat" hidden>Straat</label>
                    <input id="loc_straat" placeholder="Straat..." name="loc_straat" required>
                    <label for="loc_nr" hidden>Nummer</label>
                    <input id="loc_nr" placeholder="Huisnr..." name="loc_nr">
                    <select name="loc_pos_id" id='loc_pos_id' required>
                        <?php
                        $sql = "select pos_id, pos_code, pos_gemeente from postcode order by pos_code";
                        $data_pos = GetData($sql);
                        ?>
                        <option value='' disabled selected>Selecteer de postcode..</option>
                        <?php
                        foreach ($data_pos as $array){
                            $option = "$array[pos_code], $array[pos_gemeente]";
                            echo "<option value='$array[pos_id]'>$option</option>";}
                        ?>
                    </select>
                    <label for="loc_gebouw" hidden>Gebouw</label>
                    <input id="loc_gebouw" placeholder="Gebouw..." name="loc_gebouw">
                </fieldset>
            </div>
            <div class="invul">
                <fieldset>
                    <legend>Prijs (zonder €-teken)</legend>
                    <div class="checkbox">
                        <input type="checkbox" name="check" id="check" value="Gratis" onclick="disableMyText()">
                        <label for="check">Gratis</label>
                    </div>
                    <label for="eve_minprijs" hidden>Min. prijs</label>
                    <input type="text" name="eve_minprijs" id="eve_minprijs" placeholder="Minimum..." required>
                    <label for="eve_maxprijs" hidden>Max. prijs</label>
                    <input type="text" name="eve_maxprijs" id="eve_maxprijs" placeholder="Maximum..." required>
                </fieldset>
            </div>
            <div class="invul">
                <fieldset>
                    <legend>Datum</legend>
                    <label for="eve_begindatum" hidden>Begindatum</label>
                    <input type="date" name="eve_begindatum" id="eve_begindatum" placeholder="Begindatum..." required>
                    <label for="eve_einddatum" hidden>Einddatum</label>
                    <input type="date" name="eve_einddatum" id="eve_einddatum" placeholder="Einddatum..." required>
                </fieldset>
            </div>
            <div class="invul">
                <fieldset>
                    <legend>Tijd</legend>
                    <label for="eve_opening" hidden>Beginuur</label>
                    <input type="time" name="eve_opening" id="eve_opening" placeholder="Beginuur..." required>
                    <label for="eve_sluiting" hidden>Einduur</label>
                    <input type="time" name="eve_sluiting" id="eve_sluiting" placeholder="Sluituur..." required>
                </fieldset>
            </div>
            <div class="invul">
                <fieldset class="socialemedia">
                    <legend>Links</legend>
                    <div class="linksdiv">
                        <div>
                            <label for="Website">Website</label>
                            <input type="text" name="Website" id="Website" placeholder="www.website.com" >
                            <label for="Tickets">Ticket</label>
                            <input type="text" name="Tickets" id="Tickets" placeholder="www.ticket.com">
                            <label for="Facebook">Facebook</label>
                            <input type="text" name="Facebook" id="Facebook" placeholder="www.facebook.com">
                        </div>
                        <div>
                            <label for="Instagram">Instagram</label>
                            <input type="text" name="Instagram" id="Instagram" placeholder="www.instagram.com">
                            <label for="Twitter">Twitter</label>
                            <input type="text" name="Twitter" id="Twitter" placeholder="www.twitter.com">
                            <label for="Youtube">Youtube</label>
                            <input type="text" name="Youtube" id="Youtube" placeholder="www.youtube.com">
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="invul">
                <legend>Categorie</legend>
                <select name="cev_cat_id" id='cev_cat_id' required>
                    <?php
                    $sql = "select * from categorie order by cat_naam";
                    $data_cat = GetData($sql);
                    ?>
                    <option value='' disabled selected>Selecteer de categorie..</option>
                    <?php
                    foreach ($data_cat as $array){
                        $option = "$array[cat_naam]";
                        echo "<option value='$array[cat_id]'>$option</option>";}
                    ?>
                </select>
            </div>
            <div class="invul">
                <label for="eve_beschrijving">Beschrijving</label>
                <textarea name="eve_beschrijving" id="eve_beschrijving" required></textarea>
            </div>

            <div class="invul">
                <label for="eve_image">Afbeelding</label>
                <img src="images/placeholder.png" onclick="triggerClick()" id="display">
                <input type="file" name="eve_image" onchange="displayImage(this)" id="eve_image">
            </div>

            <div class="check">
                <input type="checkbox" name="GDPR" id="GDPR" required>
                <label for="GDPR">Ik ga akkoord met de GDPR voorwaarden</label>
            </div>
            <div class="check">
                <input type="checkbox" name="algemene_voorwaarden" id="algemene_voorwaarden" required>
                <label for="algemene_voorwaarden">Ik ga akkoord met de algemene voorwaarden</label>
            </div>

            <div class="beheerbutton">
                <button type="submit" name="aanmaakbutton" value="Aanmaken">Evenement aanmaken</button>
            </div>
        </form>
    </section>
</section>

<script src="js/scripts.js"></script>