$(document).ready(function(){
	var href = window.location.href;
	var hr_arr = href.split("searchquick.php");	
	var original_href = hr_arr[0]+"droppable_function.php";
	//alert(original_href);
	
	$("#basketItemsWrap li:first").hide();
	//alert(window.location.host);
	
	
	$(".productPriceWrapRight a img").click(function() {
															 	
		
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
		
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST", 
		
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToBasket", uid: userid},  
		success: function(theResponse) {
				
			
			if( $("#productID_" + productIDVal).length > 0){
				$("#productID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#productID_" + productIDVal).before(theResponse).remove();
				});				
				$("#productID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#productID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap li:first").before(theResponse);
				$("#basketItemsWrap li:first").hide();
				$("#basketItemsWrap li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});
	
	
	
	$("#basketItemsWrap li img").live("click", function(event) { 		
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
		
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromBasket", uid: userid},  
		success: function(theResponse) {
			
			$("#productID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	
	//music started
	$("#basketItemsWrap1 li:first").hide();
	
	$(".productPriceWrapRight1 a img").click(function() {
		  	
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToMusic", uid: userid},  
		success: function(theResponse) {
			
			if( $("#musicID_" + productIDVal).length > 0){
				$("#musicID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#musicID_" + productIDVal).before(theResponse).remove();
				});				
				$("#musicID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#musicID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap1 li:first").before(theResponse);
				$("#basketItemsWrap1 li:first").hide();
				$("#basketItemsWrap1 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});
	
	
	
	$("#basketItemsWrap1 li img").live("click", function(event) { 
		
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromMusic", uid: userid},  
		success: function(theResponse) {
			
			$("#musicID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//music ended
	
	//interest started
	$("#basketItemsWrap2 li:first").hide();
	
	$(".productPriceWrapRight2 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToInterest", uid: userid},  
		success: function(theResponse) {
			
			if( $("#interestID_" + productIDVal).length > 0){
				$("#interestID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#interestID_" + productIDVal).before(theResponse).remove();
				});				
				$("#interestID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#interestID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap2 li:first").before(theResponse);
				$("#basketItemsWrap2 li:first").hide();
				$("#basketItemsWrap2 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});
	
	
	
	$("#basketItemsWrap2 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromInterest", uid: userid},  
		success: function(theResponse) {
			
			$("#interestID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//interst ended
	
	//Favourite Read started
	$("#basketItemsWrap3 li:first").hide();
	
	$(".productPriceWrapRight3 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToRead", uid: userid},  
		success: function(theResponse) {
			
			if( $("#readID_" + productIDVal).length > 0){
				$("#readID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#readID_" + productIDVal).before(theResponse).remove();
				});				
				$("#readID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#readID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap3 li:first").before(theResponse);
				$("#basketItemsWrap3 li:first").hide();
				$("#basketItemsWrap3 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});
	
	
	
	$("#basketItemsWrap3 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromRead", uid: userid},  
		success: function(theResponse) {
			
			$("#readID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Favourite Read ended
	
	//Cuisine started
	$("#basketItemsWrap4 li:first").hide();
	
	$(".productPriceWrapRight4 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToCuisine", uid: userid},  
		success: function(theResponse) {
			
			if( $("#cuisineID_" + productIDVal).length > 0){
				$("#cuisineID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#cuisineID_" + productIDVal).before(theResponse).remove();
				});				
				$("#cuisineID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#cuisineID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap4 li:first").before(theResponse);
				$("#basketItemsWrap4 li:first").hide();
				$("#basketItemsWrap4 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});
	
	
	
	$("#basketItemsWrap4 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromCuisine", uid: userid},  
		success: function(theResponse) {
			
			$("#cuisineID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Cuisine ended
	
	//Dress started
	$("#basketItemsWrap5 li:first").hide();
	
	$(".productPriceWrapRight5 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToDress", uid: userid},  
		success: function(theResponse) {
			
			if( $("#dressID_" + productIDVal).length > 0){
				$("#dressID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#dressID_" + productIDVal).before(theResponse).remove();
				});				
				$("#dressID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#dressID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap5 li:first").before(theResponse);
				$("#basketItemsWrap5 li:first").hide();
				$("#basketItemsWrap5 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});
	
	
	
	$("#basketItemsWrap5 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromDress", uid: userid},  
		success: function(theResponse) {
			
			$("#dressID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Dress ended
	
	//Fitness started
	$("#basketItemsWrap6 li:first").hide();
	
	$(".productPriceWrapRight6 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToFitness", uid: userid},
		success: function(theResponse) {
			
			if( $("#fitnessID_" + productIDVal).length > 0){
				$("#fitnessID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#fitnessID_" + productIDVal).before(theResponse).remove();
				});				
				$("#fitnessID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#fitnessID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap6 li:first").before(theResponse);
				$("#basketItemsWrap6 li:first").hide();
				$("#basketItemsWrap6 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap6 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromFitness", uid: userid},  
		success: function(theResponse) {
			
			$("#fitnessID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Fitness ended
	
	
	//Search Quick started
	//Quick Search Caste Started	
	$("#basketItemsWrap34 li:first").hide();	
	$(".productPriceWrapRight34 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addTosqcast", uid: userid},
		success: function(theResponse) {
			
			if( $("#sqcastID_" + productIDVal).length > 0){
				$("#sqcastID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#sqcastID_" + productIDVal).before(theResponse).remove();
				});				
				$("#sqcastID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#sqcastID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap34 li:first").before(theResponse);
				$("#basketItemsWrap34 li:first").hide();
				$("#basketItemsWrap34 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}			
		}  
		});
	});	
	
	$("#basketItemsWrap34 li img").live("click", function(event) { 														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];	
		$("#notificationsLoader").html('<img src="images/loader.gif">');	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromsqCast", uid: userid},  
		success: function(theResponse) {			
			$("#sqcastID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});		
	});
	//Quick Search Cast Ended
	
	//Quick Search Subcast Started	
	$("#basketItemsWrap35 li:first").hide();	
	$(".productPriceWrapRight35 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addTosqsubcast", uid: userid},
		success: function(theResponse) {
			
			if( $("#sqsubcastID_" + productIDVal).length > 0){
				$("#sqsubcastID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#sqsubcastID_" + productIDVal).before(theResponse).remove();
				});				
				$("#sqsubcastID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#sqsubcastID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap35 li:first").before(theResponse);
				$("#basketItemsWrap35 li:first").hide();
				$("#basketItemsWrap35 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}			
		}  
		});
	});	
	
	$("#basketItemsWrap35 li img").live("click", function(event) { 														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];	
		$("#notificationsLoader").html('<img src="images/loader.gif">');	
		$.ajax({
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromsqSubcast", uid: userid},  
		success: function(theResponse) {			
			$("#sqsubcastID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});		
	});
	//Quick Search Subcast Ended	
	
	//Social Community started
	$("#basketItemsWrap7 li:first").hide();
	
	$(".productPriceWrapRight7 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToSocial", uid: userid},
		success: function(theResponse) {
			
			if( $("#socialID_" + productIDVal).length > 0){
				$("#socialID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#socialID_" + productIDVal).before(theResponse).remove();
				});				
				$("#socialID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#socialID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap7 li:first").before(theResponse);
				$("#basketItemsWrap7 li:first").hide();
				$("#basketItemsWrap7 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap7 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromSocial", uid: userid},  
		success: function(theResponse) {
			
			$("#socialID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Social Community ended
	
	//Marital Status started
	$("#basketItemsWrap8 li:first").hide();
	
	$(".productPriceWrapRight8 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToMarital", uid: userid},
		success: function(theResponse) {
			
			if( $("#maritalID_" + productIDVal).length > 0){
				$("#maritalID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#maritalID_" + productIDVal).before(theResponse).remove();
				});				
				$("#maritalID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#maritalID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap8 li:first").before(theResponse);
				$("#basketItemsWrap8 li:first").hide();
				$("#basketItemsWrap8 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap8 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromMarital", uid: userid},  
		success: function(theResponse) {
			
			$("#maritalID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Marital Status ended
	
	//Mangalik Status started
	$("#basketItemsWrap9 li:first").hide();
	
	$(".productPriceWrapRight9 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToMangalik", uid: userid},
		success: function(theResponse) {
			
			if( $("#mangalikID_" + productIDVal).length > 0){
				$("#mangalikID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#mangalikID_" + productIDVal).before(theResponse).remove();
				});				
				$("#mangalikID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#mangalikID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap9 li:first").before(theResponse);
				$("#basketItemsWrap9 li:first").hide();
				$("#basketItemsWrap9 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap9 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromMangalik", uid: userid},  
		success: function(theResponse) {
			
			$("#mangalikID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Mangalik Status ended
	
	//Work In Country started
	$("#basketItemsWrap10 li:first").hide();
	
	$(".productPriceWrapRight10 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToWork", uid: userid},
		success: function(theResponse) {
			
			if( $("#workID_" + productIDVal).length > 0){
				$("#workID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#workID_" + productIDVal).before(theResponse).remove();
				});				
				$("#workID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#workID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap10 li:first").before(theResponse);
				$("#basketItemsWrap10 li:first").hide();
				$("#basketItemsWrap10 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap10 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromWork", uid: userid},  
		success: function(theResponse) {
			
			$("#workID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Work In Country ended
	
	//Occupation started
	$("#basketItemsWrap11 li:first").hide();
	
	$(".productPriceWrapRight11 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToOccu", uid: userid},
		success: function(theResponse) {
			
			if( $("#occuID_" + productIDVal).length > 0){
				$("#occuID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#occuID_" + productIDVal).before(theResponse).remove();
				});				
				$("#occuID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#occuID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap11 li:first").before(theResponse);
				$("#basketItemsWrap11 li:first").hide();
				$("#basketItemsWrap11 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap11 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromOccu", uid: userid},  
		success: function(theResponse) {
			
			$("#occuID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Occupation ended
	//Advance Search started
	//Marital Status started
	$("#basketItemsWrap12 li:first").hide();
	
	$(".productPriceWrapRight12 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvMarital", uid: userid},
		success: function(theResponse) {
			
			if( $("#advmaritalID_" + productIDVal).length > 0){
				$("#advmaritalID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advmaritalID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advmaritalID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advmaritalID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap12 li:first").before(theResponse);
				$("#basketItemsWrap12 li:first").hide();
				$("#basketItemsWrap12 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap12 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvMarital", uid: userid},  
		success: function(theResponse) {
			
			$("#advmaritalID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Marital Status ended
	
	//Residence Country started
	$("#basketItemsWrap13 li:first").hide();
	
	$(".productPriceWrapRight13 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToResidence", uid: userid},
		success: function(theResponse) {
			
			if( $("#residenceID_" + productIDVal).length > 0){
				$("#residenceID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#residenceID_" + productIDVal).before(theResponse).remove();
				});				
				$("#residenceID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#residenceID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap13 li:first").before(theResponse);
				$("#basketItemsWrap13 li:first").hide();
				$("#basketItemsWrap13 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap13 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromResidence", uid: userid},  
		success: function(theResponse) {
			
			$("#residenceID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Residence Country ended
	
	//Residence Status started
	$("#basketItemsWrap14 li:first").hide();
	
	$(".productPriceWrapRight14 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToResstatus", uid: userid},
		success: function(theResponse) {
			
			if( $("#resstatusID_" + productIDVal).length > 0){
				$("#resstatusID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#resstatusID_" + productIDVal).before(theResponse).remove();
				});				
				$("#resstatusID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#resstatusID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap14 li:first").before(theResponse);
				$("#basketItemsWrap14 li:first").hide();
				$("#basketItemsWrap14 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap14 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromResstatus", uid: userid},  
		success: function(theResponse) {
			
			$("#resstatusID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Residence Status ended
	
	//Residence State started
	$("#basketItemsWrap15 li:first").hide();
	
	$(".productPriceWrapRight15 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToResstate", uid: userid},
		success: function(theResponse) {
			
			if( $("#resstateID_" + productIDVal).length > 0){
				$("#resstateID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#resstateID_" + productIDVal).before(theResponse).remove();
				});				
				$("#resstateID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#resstateID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap15 li:first").before(theResponse);
				$("#basketItemsWrap15 li:first").hide();
				$("#basketItemsWrap15 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap15 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromResstate", uid: userid},  
		success: function(theResponse) {
			
			$("#resstateID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();
		
		}  
		});  
		
	});
	//Residence State ended
	
	//Residence City started
	$("#basketItemsWrap16 li:first").hide();
	
	$(".productPriceWrapRight16 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToRescity", uid: userid},
		success: function(theResponse) {
			
			if( $("#rescityID_" + productIDVal).length > 0){
				$("#rescityID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#rescityID_" + productIDVal).before(theResponse).remove();
				});				
				$("#rescityID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#rescityID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap16 li:first").before(theResponse);
				$("#basketItemsWrap16 li:first").hide();
				$("#basketItemsWrap16 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap16 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromRescity", uid: userid},  
		success: function(theResponse) {
			
			$("#rescityID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Residence City ended
	
	//Advance Mangalik started
	$("#basketItemsWrap17 li:first").hide();
	
	$(".productPriceWrapRight17 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvmang", uid: userid},
		success: function(theResponse) {
			
			if( $("#advmangID_" + productIDVal).length > 0){
				$("#advmangID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advmangID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advmangID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advmangID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap17 li:first").before(theResponse);
				$("#basketItemsWrap17 li:first").hide();
				$("#basketItemsWrap17 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap17 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvmang", uid: userid},  
		success: function(theResponse) {
			
			$("#advmangID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Mangalik ended
	
	//Advance Social Community started
	$("#basketItemsWrap18 li:first").hide();
	
	$(".productPriceWrapRight18 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvsocial", uid: userid},
		success: function(theResponse) {
			
			if( $("#advsocialID_" + productIDVal).length > 0){
				$("#advsocialID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advsocialID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advsocialID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advsocialID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap18 li:first").before(theResponse);
				$("#basketItemsWrap18 li:first").hide();
				$("#basketItemsWrap18 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap18 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvsocial", uid: userid},  
		success: function(theResponse) {
			
			$("#advsocialID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Social Community ended
	
	//Advance Work In Country started
	$("#basketItemsWrap19 li:first").hide();
	
	$(".productPriceWrapRight19 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvwic", uid: userid},
		success: function(theResponse) {
			
			if( $("#advwicID_" + productIDVal).length > 0){
				$("#advwicID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advwicID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advwicID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advwicID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap19 li:first").before(theResponse);
				$("#basketItemsWrap19 li:first").hide();
				$("#basketItemsWrap19 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap19 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvwic", uid: userid},  
		success: function(theResponse) {
			
			$("#advwicID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Work In Country ended
	
	//Advance Work In State started
	$("#basketItemsWrap20 li:first").hide();
	
	$(".productPriceWrapRight20 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvwis", uid: userid},
		success: function(theResponse) {
			
			if( $("#advwisID_" + productIDVal).length > 0){
				$("#advwisID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advwisID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advwisID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advwisID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap20 li:first").before(theResponse);
				$("#basketItemsWrap20 li:first").hide();
				$("#basketItemsWrap20 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap20 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvwis", uid: userid},  
		success: function(theResponse) {
			
			$("#advwisID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Work In State ended
	
	//Advance Work In City started
	$("#basketItemsWrap21 li:first").hide();
	
	$(".productPriceWrapRight21 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvcity", uid: userid},
		success: function(theResponse) {
			
			if( $("#advcityID_" + productIDVal).length > 0){
				$("#advcityID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advcityID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advcityID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advcityID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap21 li:first").before(theResponse);
				$("#basketItemsWrap21 li:first").hide();
				$("#basketItemsWrap21 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap21 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvcity", uid: userid},  
		success: function(theResponse) {
			
			$("#advcityID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Work In City ended
	
	//Advance Occupation started
	$("#basketItemsWrap22 li:first").hide();
	
	$(".productPriceWrapRight22 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvoccu", uid: userid},
		success: function(theResponse) {
			
			if( $("#advoccuID_" + productIDVal).length > 0){
				$("#advoccuID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advoccuID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advoccuID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advoccuID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap22 li:first").before(theResponse);
				$("#basketItemsWrap22 li:first").hide();
				$("#basketItemsWrap22 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap22 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvoccu", uid: userid},  
		success: function(theResponse) {
			
			$("#advoccuID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Occupation ended
	
	//Advance Occupation Status started
	$("#basketItemsWrap23 li:first").hide();
	
	$(".productPriceWrapRight23 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvoccs", uid: userid},
		success: function(theResponse) {
			
			if( $("#advoccsID_" + productIDVal).length > 0){
				$("#advoccsID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advoccsID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advoccsID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advoccsID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap23 li:first").before(theResponse);
				$("#basketItemsWrap23 li:first").hide();
				$("#basketItemsWrap23 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap23 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvoccs", uid: userid},  
		success: function(theResponse) {
			
			$("#advoccsID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Occupation Status ended
	
	
	//Advance Diet started
	$("#basketItemsWrap24 li:first").hide();
	
	$(".productPriceWrapRight24 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvdiet", uid: userid},
		success: function(theResponse) {
			
			if( $("#advdietID_" + productIDVal).length > 0){
				$("#advdietID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advdietID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advdietID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advdietID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap24 li:first").before(theResponse);
				$("#basketItemsWrap24 li:first").hide();
				$("#basketItemsWrap24 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap24 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvdiet", uid: userid},  
		success: function(theResponse) {
			
			$("#advdietID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Diet ended
	
	
	
	//Advance smoke status started
	$("#basketItemsWrap25 li:first").hide();
	
	$(".productPriceWrapRight25 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvsmok", uid: userid},
		success: function(theResponse) {
			
			if( $("#advsmokID_" + productIDVal).length > 0){
				$("#advsmokID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advsmokID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advsmokID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advsmokID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap25 li:first").before(theResponse);
				$("#basketItemsWrap25 li:first").hide();
				$("#basketItemsWrap25 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap25 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvsmok", uid: userid},  
		success: function(theResponse) {
			
			$("#advsmokID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance smoke status ended
	
	
	
	
	//Advance drink status started
	$("#basketItemsWrap26 li:first").hide();
	
	$(".productPriceWrapRight26 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvdrnk", uid: userid},
		success: function(theResponse) {
			
			if( $("#advdrnkID_" + productIDVal).length > 0){
				$("#advdrnkID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advdrnkID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advdrnkID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advdrnkID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap26 li:first").before(theResponse);
				$("#basketItemsWrap26 li:first").hide();
				$("#basketItemsWrap26 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap26 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvdrnk", uid: userid},  
		success: function(theResponse) {
			
			$("#advdrnkID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance drink status ended
	
	
	
	//Advance Body Type started
	$("#basketItemsWrap27 li:first").hide();
	
	$(".productPriceWrapRight27 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvbdtp", uid: userid},
		success: function(theResponse) {
			
			if( $("#advbdtpID_" + productIDVal).length > 0){
				$("#advbdtpID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advbdtpID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advbdtpID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advbdtpID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap27 li:first").before(theResponse);
				$("#basketItemsWrap27 li:first").hide();
				$("#basketItemsWrap27 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap27 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvbdtp", uid: userid},  
		success: function(theResponse) {
			
			$("#advbdtpID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Body Type ended
	
	//Advance Complexion started
	$("#basketItemsWrap28 li:first").hide();
	
	$(".productPriceWrapRight28 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvcomp", uid: userid},
		success: function(theResponse) {
			
			if( $("#advcompID_" + productIDVal).length > 0){
				$("#advcompID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advcompID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advcompID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advcompID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap28 li:first").before(theResponse);
				$("#basketItemsWrap28 li:first").hide();
				$("#basketItemsWrap28 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap28 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvcomp", uid: userid},  
		success: function(theResponse) {
			
			$("#advcompID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Complexion ended
	
	//Advance Special Case started
	$("#basketItemsWrap29 li:first").hide();
	
	$(".productPriceWrapRight29 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvspec", uid: userid},
		success: function(theResponse) {
			
			if( $("#advspecID_" + productIDVal).length > 0){
				$("#advspecID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advspecID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advspecID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advspecID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap29 li:first").before(theResponse);
				$("#basketItemsWrap29 li:first").hide();
				$("#basketItemsWrap29 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap29 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvspec", uid: userid},  
		success: function(theResponse) {
			
			$("#advspecID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Special Case ended
	
	//Advance Special Case started
	$("#basketItemsWrap30 li:first").hide();
	
	$(".productPriceWrapRight30 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvlang", uid: userid},
		success: function(theResponse) {
			
			if( $("#advlangID_" + productIDVal).length > 0){
				$("#advlangID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advlangID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advlangID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advlangID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap30 li:first").before(theResponse);
				$("#basketItemsWrap30 li:first").hide();
				$("#basketItemsWrap30 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap30 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvlang", uid: userid},  
		success: function(theResponse) {
			
			$("#advlangID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Special Case ended
	
	//Advance Language Started	
	$("#basketItemsWrap30 li:first").hide();
	
	$(".productPriceWrapRight30 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvlang", uid: userid},
		success: function(theResponse) {
			
			if( $("#advlangID_" + productIDVal).length > 0){
				$("#advlangID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advlangID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advlangID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advlangID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap30 li:first").before(theResponse);
				$("#basketItemsWrap30 li:first").hide();
				$("#basketItemsWrap30 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}
			
		}  
		});  
		
	});	
	
	$("#basketItemsWrap30 li img").live("click", function(event) { 
														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvlang", uid: userid},  
		success: function(theResponse) {
			
			$("#advlangID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});  
		
	});
	//Advance Language ended
	
	//Advance Caste Started	
	$("#basketItemsWrap31 li:first").hide();	
	$(".productPriceWrapRight31 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvcaste", uid: userid},
		success: function(theResponse) {
			
			if( $("#advcasteID_" + productIDVal).length > 0){
				$("#advcasteID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advcasteID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advcasteID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advcasteID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap31 li:first").before(theResponse);
				$("#basketItemsWrap31 li:first").hide();
				$("#basketItemsWrap31 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}			
		}  
		});
	});	
	
	$("#basketItemsWrap31 li img").live("click", function(event) { 														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];	
		$("#notificationsLoader").html('<img src="images/loader.gif">');	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvcaste", uid: userid},  
		success: function(theResponse) {			
			$("#advcasteID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});		
	});
	//Advance Caste ended
	
	//Advance SubCaste Started	
	$("#basketItemsWrap32 li:first").hide();	
	$(".productPriceWrapRight32 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvSubcaste", uid: userid},
		success: function(theResponse) {
			
			if( $("#advsubcasteID_" + productIDVal).length > 0){
				$("#advsubcasteID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#advsubcasteID_" + productIDVal).before(theResponse).remove();
				});				
				$("#advsubcasteID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#advsubcasteID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap32 li:first").before(theResponse);
				$("#basketItemsWrap32 li:first").hide();
				$("#basketItemsWrap32 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}			
		}  
		});
	});	
	
	$("#basketItemsWrap32 li img").live("click", function(event) { 														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];	
		$("#notificationsLoader").html('<img src="images/loader.gif">');	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvSubcaste", uid: userid},  
		success: function(theResponse) {			
			$("#advsubcasteID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});		
	});
	//Advance SubCaste ended
	
	//Advance Education Started	
	$("#basketItemsWrap33 li:first").hide();	
	$(".productPriceWrapRight33 a img").click(function() {
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];
	
		$("#notificationsLoader").html('<img src="images/loader.gif">');
	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "addToAdvEdu", uid: userid},
		success: function(theResponse) {
			
			if( $("#adveducationID_" + productIDVal).length > 0){
				$("#adveducationID_" + productIDVal).animate({ opacity: 0 }, 500, function() {
					$("#adveducationID_" + productIDVal).before(theResponse).remove();
				});				
				$("#adveducationID_" + productIDVal).animate({ opacity: 0 }, 500);
				$("#adveducationID_" + productIDVal).animate({ opacity: 1 }, 500);
				$("#notificationsLoader").empty();			
			} else {
				$("#basketItemsWrap33 li:first").before(theResponse);
				$("#basketItemsWrap33 li:first").hide();
				$("#basketItemsWrap33 li:first").show("slow");  
				$("#notificationsLoader").empty();			
			}			
		}  
		});
	});	
	
	$("#basketItemsWrap33 li img").live("click", function(event) { 														
		var productIDValSplitter 	= (this.id).split("_");
		var productIDVal 			= productIDValSplitter[1];
		var userid 					= productIDValSplitter[2];	
		$("#notificationsLoader").html('<img src="images/loader.gif">');	
		$.ajax({  
		type: "POST",  
		url: "http://90.0.0.150/php/DemoMatrimony/english/droppable_function.php",  
		data: { productID: productIDVal, action: "deleteFromAdvEdu", uid: userid},  
		success: function(theResponse) {			
			$("#adveducationID_" + productIDVal).hide("slow",  function() {$(this).remove();});
			$("#notificationsLoader").empty();		
		}  
		});		
	});
	//Advance Education ended

//Advance Search ended
});
