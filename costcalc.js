jQuery(document).ready(function() {
    jQuery("#costcalc input[name=cc-calculate]").click(function() {
	var typeOfService = jQuery("#costcalc select[name=cc-type]");
	var nameOfService = jQuery("#costcalc select[name=cc-type] option:selected").text();
	var costOfService = parseInt(typeOfService.val());
	var monthCost = jQuery("#costcalc input[name=cc-monthly-cost]");
	var postRutCost = jQuery("#costcalc input[name=cc-post-rut]");
	var surfaceArea = jQuery("#costcalc input[name=cc-space]");
	var visitsPerMonth = jQuery("#costcalc input[name=cc-per-month]");

	if (costOfService == 0) {
            monthCost.val("För " + nameOfService.toLowerCase() + ", begär offert!");
            postRutCost.val("");
	} else if (costOfService < 0) {
            costOfService = Math.abs(costOfService);
            monthCost.val(nameOfService + " kostar " + costOfService + " kr/tim.");
            postRutCost.val("");
	} else {
            if (!surfaceArea.val().match(/\d+/)) {
		alert("Bostadens yta måste anges i kvadratmeter och enbart siffror.");
		return;
            }
            if (!visitsPerMonth.val().match(/\d+/)) {
		alert("Antal städbesök måste anges i enbart siffror.");
		return;
            }
            var res = costOfService * parseInt(surfaceArea.val()) * parseInt(visitsPerMonth.val());
            monthCost.val(res + " kr");
            postRutCost.val(res / 2 + " kr");
	}
    });
});
