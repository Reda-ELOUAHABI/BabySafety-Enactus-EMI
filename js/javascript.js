//I'll disactivate this function for now (no confirming cookies anymore)
    // console.log("aaa");
    // if (confirm("Accepte cookies please to continue ")) { }
    // else {
    //     do {
    //         //  alert('confirm again');
    //         //     if (confirm("confirm")) {
    //         //         alert('confirmed');
    //         //     }

    //     }
    //     while (!confirm("Accepte cookies please to continue"))
    // }
    // alert('thanks for \n accepting');
    // var x = prompt("Enter your name", "flan flani");
    // if (x == null || x == "") {
    //     txt = "User Cancelled the prompt . "
    // }
    // else {
    //     txt = "Hello " + x;
    // }
//dark mode option

///////////////// fixed menu on scroll for desktop
if ($(window).width() > 992) {
    $(window).scroll(function(){  
       if ($(this).scrollTop() > 40) {
          $('#navbar_top').addClass("fixed-top");
          // add padding top to show content behind navbar
          $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
        }else{
          $('#navbar_top').removeClass("fixed-top");
           // remove padding top from body
          $('body').css('padding-top', '0');
        }   
    });
  } // end if
 


