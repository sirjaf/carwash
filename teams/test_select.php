<select>
    <?php
        while ($a <= 10) {
            echo "<option>$a</option>";
            $a++;
        }    
    ?>
    <input type=\"text\" name=\"tournament_id\" value=\"$team_tournament\" placeholder=\"Tournament\"><br />
</select>