<section class="contcontainer beheer">
    <section class="afbeelding">
        <img src="images/@@eve_image@@.jpg" alt="image">
        <a class="verwijder" href="#">Verwijder evenement</a>
    </section>
    <section class="wijzig">
        <form action="lib/eve_wijzig.php" class="wijzigform">
            <div class="invul">
                <label for="eve_naam">Naam</label>
                <input type="text" name="eve_naam" id="eve_naam" placeholder="Naam...">
            </div>
            <div class="invul">
                <fieldset>
                    <legend>Locatie</legend>
                    <label for="loc_straat" hidden>Straat</label>
                    <input id="loc_straat" placeholder="Straat..." name="straat">
                    <label for="loc_nr" hidden>Nummer</label>
                    <input id="loc_nr" placeholder="Huisnr..." name="nummer">
                    <label for="loc_pos_id" hidden>Postcode</label>
                    <select name="loc_pos_id" id='loc_pos_id'>
                        <?php
                        $sql = "select pos_id, pos_code, pos_gemeente from postcode order by pos_code";
                        $data = GetData($sql);
                        foreach ($data as $array){
                            $option = "$array[pos_code], $array[pos_gemeente]";
                            echo "<option value='$array[pos_id]'>$option</option>";}
                        ?>
                    </select>
                    <label for="loc_gebouw" hidden>Gebouw</label>
                    <input id="loc_gebouw" placeholder="Gebouw..." name="gebouw">
                </fieldset>
            </div>
            <div class="invul">
                <fieldset>
                    <legend>Prijs (zonder €-teken)</legend>
                    <label for="eve_minprijs" hidden>Min. prijs</label>
                    <input type="text" name="eve_minprijs" id="eve_minprijs" placeholder="Minimum...">
                    <label for="eve_maxprijs" hidden>Max. prijs</label>
                    <input type="text" name="eve_maxprijs" id="eve_maxprijs" placeholder="Maximum...">
                </fieldset>
            </div>
            <div class="invul">
                <fieldset>
                    <legend>Datum</legend>
                    <label for="eve_begindatum" hidden>Begindatum</label>
                    <input type="date" name="eve_begindatum" id="eve_begindatum" placeholder="Begindatum...">
                    <label for="eve_einddatum" hidden>Einddatum</label>
                    <input type="date" name="eve_einddatum" id="eve_einddatum" placeholder="Einddatum...">
                </fieldset>
            </div>
            <div class="invul">
                <fieldset>
                    <legend>Tijd</legend>
                    <label for="eve_opening" hidden>Beginuur</label>
                    <input type="time" name="eve_opening" id="eve_opening" placeholder="Beginuur...">
                    <label for="eve_sluiting" hidden>Einduur</label>
                    <input type="time" name="eve_opening" id="eve_sluiting" placeholder="Sluituur...">
                </fieldset>
            </div>
            <div class="invul">
                <label for="eve_beschrijving">Beschrijving</label>
                <textarea name="eve_beschrijving" id="eve_beschrijving"></textarea>
            </div>
            <div class="beheerbutton">
                <button type="submit" value="Wijzigingen toepassen">Wijzigingen toepassen</button>
            </div>
        </form>
    </section>
</section>