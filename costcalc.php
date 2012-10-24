<?php
/*
Plugin Name: ESS Cost Calc Plugin
Plugin URI: http://ldezign.se/
Description: Form for automatic cost calculation
Author: Daniel Nyström <daniel@nystrom.st>
Version: 1.0
License: MIT
*/

function cc_main() {
?>
<form id="costcalc" action="">
    <h1>Vad kostar det?</h1>
    <hr />
    <div class="cc-column">
        <p>
            Typ av städning:<br />
            <select name="cc-type">
                <optgroup label="Flyttstädning">
                    <option value="-220">Kontorsstädning</option>
                    <option value="40">Byggstädning</option>
                    <option value="-220">Butiksstädning</option>
                    <option value="40">Flyttstädning</option>
                    <option value="-230">Garagestädning</option>
                    <option value="-250">Hemstädning</option>
                    <option value="0">Hotellstädning</option>
                    <option value="40">Storstädning</option>
                    <option value="-220">Trappstädning</option>
                    <option value="-220">Visningsstädning</option>
                </optgroup>
                <optgroup label="Kringtjänster">
                    <option value="-190">Fönsterputsning</option>
                    <option value="45">Golvvård parkett</option>
                    <option value="80">Golvvård vaxolja</option>
                    <option value="56">Golvvård trägolv</option>
                    <option value="35">Golvvård linoleum</option>
                </optgroup>
            </select>
        </p>
        <p>
            Bostadens yta i kvadratmeter:<br />
            <input type="text" name="cc-space" />
        </p>
        <p>
            Antal städbesök per månad:<br />
            <input type="text" name="cc-per-month" />
        </p>
        <p>
            Vilken dag i veckan:<br />
            <select name="cc-day-of-week">
                <option>Måndag</option>
                <option>Tisdag</option>
                <option>Onsdag</option>
                <option>Torsdag</option>
                <option>Fredag</option>
                <option>Lördag</option>
                <option>Söndag</option>
            </select>
        </p>
    </div>
    <div class="cc-column">
        <p>
            <input name="cc-calculate" type="button" value="Beräkna" />
            <input type="reset" value="Rensa" />
        </p>
        <p>
            Ungefärlig kostnad i månaden:<br />
            <input name="cc-monthly-cost" type="text" disabled="disabled" />
        </p>
        <p>
            Du betalar efter RUT-avdrag:<br />
            <input name="cc-post-rut" type="text" disabled="disabled" />
        </p>
        <p>
            <a href="#"><img src="http://url-till-pil" alt="pil" /> Gå vidare till intresseanmälan</a>
        </p>
    </div>
    <div class="cc-clear"></div>
</form>
<?
}

function cc_stylesheets() {
        wp_enqueue_style('costcalc',
			 plugins_url('costcalc.css', __FILE__));
}

function cc_scripts() {
	wp_enqueue_scripts('costcalc',
			   plugins_url('costcalc.js', __FILE__),
			   array('jquery'));
}

add_action('wp_print_styles', 'cc_stylesheets');
add_action('wp_enqueue_scripts', 'cc_scripts');
add_shortcode('costcalc', 'cc_main');

?>