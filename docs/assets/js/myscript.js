// ALL MY GLOBAL SCRIPTS

// Menu But
$('#sidebarCollapse').on('click', function () {
    $('#sidebar, #content, #navdiv').toggleClass('active');
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
}); 


// login
$('#loginbut').click(function() {
    $('#overlay2, #overlay1, #logindiv').fadeOut(500);
     $("body").fadeOut(200);
        window.location.href='assets/pages/dashboard.php';
});

// When Doc On Scroll
$(document).ready(function(){
  
	$(window).scroll(function(){
	var element= document.getElementById("doccontent");
	var style = window.getComputedStyle(element);
	var propertyvalue = parseInt(style.getPropertyValue('margin-top'));
	var currheight = $(window).scrollTop();
	var sum= propertyvalue - 80;
	if(currheight > sum)
	{
		// console.log("Current marginTop: " + currheight);
		$(".topnav").removeClass("tngradient");
		$(".topnav").addClass("inactive");
	}
	else{
		$(".topnav").addClass("tngradient");
		$(".topnav").removeClass("inactive");
	}

});

});

// Dynamic Time
function showTime(){
	var date = new Date();
	var mm = date.getMonth();
	var dd= date.getDate();
	var yy= date.getFullYear();
	var h = date.getHours();
	var m = date.getMinutes();
	var s = date.getSeconds();
	var timesession = "AM";
	var month;

	if(h==0){
		h=12;
	}

	if(h>12){
		h=h-12;
		timesession = "PM";
	}


	h= (h<10) ? "0" + h : h;
	m= (m<10) ? "0" + m : m;
	s= (s<10) ? "0" + s: s;


if(mm==0){
	month="January";
}
if(mm==1){
	month="February";
}
if(mm==2){
	month="March";
}
if(mm==3){
	month="April";
}
if(mm==4){
	month="May";
}
if(mm==5){
	month="June";
}
if(mm==6){
	month="July";
}
if(mm==7){
	month="August";
}
if(mm==8){
	month="September";
}
if(mm==9){
	month="October";
}
if(mm==10){
	month="November";
}
if(mm==11){
	month="December";
}

	var time = h + ":" + m + ":" + s + " " + timesession;
	var date = month + " " + dd + "," + " " + yy ;


	document.getElementById("timeholder").innerText = time;
	document.getElementById("timeholder").textContent = time;
	document.getElementById("dateholder").innerText = date;
	document.getElementById("dateholder").textContent = date;

	setTimeout(showTime, 1000);
}

showTime();

//When refreshed
$(document).ready(function(){
  $('html, body').animate({
      scrollTop: 0
    }, 500);
    return false;

});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});


$(document).ready(function(){
	$(".add").click(function(){
	    // $("#div1").load("a_add.php");
	   window.location.href='case_add.php';
	});

	$(".userprofile").hover(function(){
	        $(".useropts").slideDown();
	},
	function () {
     $(".useropts").slideUp();
    }
	);


});