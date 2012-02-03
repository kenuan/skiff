$(document).ready(function() {
	$("#page").isotope({
		itemSelector: 'article',
		layoutMode: 'fitRows',
		transformsEnabled: false
	});

	$(document).bind('keydown', '/', function() {
		$("#filter input").focus();
		return false;
	});

	// Search filter on dashboard
	$("#filter input").on("keyup", function() {
		var query = $(this).val().trim();
		var searchTerms = query.split(',');
		var regexes = [];

		// Prepare the regexes for each term in the query (separated by commas)
		for (keyword in searchTerms) {
			var searchTerm = searchTerms[keyword].trim();
			if (searchTerm != '') {
				regexes.push(new RegExp('(^|\\s)' + searchTerm, 'i'));
			}
		}

		if (query != '') {
			// Go through each category
			$("article").each(function() {
				projectTitle = $(this).find("h2").html();

				if (matchKeywords(projectTitle, regexes)) {
					$(this).show();
				} else {
					$(this).hide();
				}
			});

			// Relayout
			$("#page").isotope('reLayout');
		} else {
			showAllProjects(false);
		}
	});

	$("#filter input").bind('keydown', 'esc', function() {
		showAllProjects(true);
	});

	$("#filter input").bind('keydown', 'return', function() {
		$(this).blur();
	});

	$("#filter .clear").on("click", function() {
		showAllProjects(true);
	});
});

function showAllProjects(blur) {
	// Clear out the input
	$("#filter input").val('');
	
	// Blur it
	if (blur) $("#filter input").blur();

	// And show all the categories
	$("article").show();

	// Relayout
	$("#page").isotope('reLayout');
}

function matchKeywords(title, regexes) {
	for (i in regexes) {
		if (title.match(regexes[i])) return true;
	}
	return false;
}
