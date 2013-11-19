
$(document).ready(function() {

	//search bar
	$(".sbar").click(function() {
			if ($(".sbar").val() == "Search"){
				$(".sbar").val(""); 
			}
		});
		
	//slider
	$(".rslides").responsiveSlides({
			auto: true,
			 pager: true,
			speed:800,
			//maxwidth:800,
			namespace: "centered-btns"
		});	
		

	//user dashboard
	var account = "<h1>Your Account</h1><h2>Account Info</h2><div><p><span>Username: </span>Student</p><p><span>Account Number: </span>#00001</p><p><span>Account Level: </span><a href='admin.php'>Administrator</a></p><p><span>Total Number of Orders: </span>250</p></div>";
		
	$("#user").html(account); 
	
		$(".order").click(function() {
				$("#user").html("<h1>Track Orders</h1><p>No orders available.</p>");
			});
		$(".orderh").click(function() {
				$("#user").html("<h1>Order History</h1><p>No order history available.<p>");
			});
		$(".dash").click(function() {
		//console.log('dash click');
				$("#user").html(account);
				
			});
		
		
	//admin dashboard
	/*var myurl = 'http://sulley.cah.ucf.edu/~ar400093/dig4530c/group3/cpanel.php?action=processp';
			var currenturl = window.location;
			if(myurl == currenturl) {
				console.log('fired');
				$('#mmake').show();
				$('#superuser').hide();
			}
			else{
			$('#mpro').hide();
			$('#musers').hide();
			$('#mmake').hide(); //Add products form 
			}

			$('.see').click(function () {
				console.log('fired');
				$('#superuser').hide();
				$('.show').hide();
				$('#m' + $(this).attr('id')).show();
			});

			$('.super').click(function () {
				$('#mpro').hide();
				$('#musers').hide();
				$('#mmake').hide();
				$('#superuser').show();
			});
			*/
			
			/*var myurl = 'http://sulley.cah.ucf.edu/~ar400093/dig4530c/group3/cpanel.php?action=processp';
			var currenturl = window.location;
			if(myurl == currenturl) {
				console.log('fired');
				$('#mmake').show();
				$('#superuser').hide();
			}
			*/
		//cart
		
	/*	if (('#cart') == 'Your cart is empty. Start shopping!') {
			$('#cbtn').hide();
		}
		else {
			$('#cbtn').show();
		}*/
		
		$("#submitReview").click(function(){
			$("#loader").html("&nbsp;<img src='img/gear.gif' />");
  			// alert("button press!");

			var id = $('#pid').val();
			var authorName = $('#author-name').val();
			var review = $('#review').val();
			// alert(id+"\n"+authorName+"\n"+review);

			$.ajax({
			type: "POST",
			url: "is/review.php",
			data: { id: id, name: authorName, review: review }
			})
			.done(function( msg ) {
			$( "#data-response" ).html( msg );
			$("#loader").html(" ");
			$("#reviewLeft").fadeIn(400).delay(2000).fadeOut(400);
			$('#author-name').val("");
			$('#review').val("");
			});
		}); //end submit function
		
});

// KD Adding js

function copy_ship_info(f) {
  if(billing.checkbilling.checked == true) {
   	billing.billing_firstname.value = shipping.shipping_firstname.value; //(works within same form)
	
	billing.billing_lastname.value=shipping.shipping_lastname.value;
	billing.billing_address.value=shipping.shipping_address.value;
	billing.billing_city.value=shipping.shipping_city.value;
	billing.billing_phone.value=shipping.shipping_phone.value;
	billing.billing_zip.value=shipping.shipping_zip.value;
	
	state_object="document.billing.billing_state";
	document.billing.billing_state.value=document.shipping.shipping_state.value;
	
	console.log('You Checked');
   // f.billing_lastname.value = f.shippingcity.value;
  }
  
  else {
	console.log('You Un Checked');
	document.billing.billing_firstname.value=""; <!-- billing/form name?.input name-->
	document.billing.billing_lastname.value="";
	document.billing.billing_address.value="";
	document.billing.billing_city.value="";
	document.billing.billing_phone.value="";
	document.billing.billing_zip.value="";	
	}

}


function function_qty() {

	var qty = document.getElementById('qty').value;
	console.log('Was Clicked');
	//document.getElementById('qty').value = ''; //Clears text field on button click
	
	if (qty == "") { //check if there is value inside
	console.log('There is nothing inside');
	//return false;
	}	
	
	else {
	console.log ('there is value inside')
	//new infor = typed up info 
	//Takes typed info from text input one and places in the other
	 document.getElementById('qty2').value = document.getElementById('qty').value;
	 //Keep in same box
	 document.getElementById('qty').value = document.getElementById('qty').value;
	//return true;
	}
	

}

/* 	var query=function_qty();
	if(parseFloat(qty) == NaN)
	{
	   console.log("query is a string");
	}
	else{
	   console.log("query is numeric");
	}
	*/