
	function voteUp(id) {
	$.ajax({
  		type: "GET",
  		url: "is/voteUp.php",
 		 data: { id: id  }
	})
	.done(function() {
		$("#voted").fadeIn(400).delay(2000).fadeOut(400);
		// alert("You voted up! "+id);
	});

	}

	function voteDown(id) {
		$.ajax({
  		type: "GET",
  		url: "is/voteDown.php",
 		 data: { id: id  }
	})
	.done(function() {
		$("#voted").fadeIn(400).delay(2000).fadeOut(400);
		// alert("You voted down! "+id);
	});
	}

