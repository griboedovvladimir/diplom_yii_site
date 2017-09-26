$(document).ready(function(){


    $('#event1').
    mouseover(function(){
        $('#page1').removeClass('stiker').addClass('stikerin');
    }).
    mouseout(function(){
        // при покидании элемента
        $('#page1').removeClass('stikerin').addClass('stiker');
    });


$('#event2').
mouseover(function(){
    $('#page2').removeClass('stiker').addClass('stikerin2');
}).
mouseout(function(){
    // при покидании элемента
    $('#page2').removeClass('stikerin2').addClass('stiker');
});

    $('#event3').
    mouseover(function(){
        $('#page3').removeClass('stiker').addClass('stikerin3');
    }).
    mouseout(function(){
        // при покидании элемента
        $('#page3').removeClass('stikerin3').addClass('stiker');
    });

    $('#event4').
    mouseover(function(){
        $('#page4').removeClass('stiker').addClass('stikerin4');
    }).
    mouseout(function(){
        // при покидании элемента
        $('#page4').removeClass('stikerin4').addClass('stiker');
    });

    $('#event5').
    mouseover(function(){
        $('#page5').removeClass('stiker').addClass('stikerin5');
    }).
    mouseout(function(){
        // при покидании элемента
        $('#page5').removeClass('stikerin5').addClass('stiker');
    });

    jQuery(document).ready(function($) {
        $('.elements-gride').masonry({
            // options
            itemSelector: '.element-item',
            columnWidth: '.persent-size',
            percentPosition: true
        });
    });



    $('#lab1 p').
    mouseover(function(){
        $('#lab1 img').removeClass('hoverblur').addClass('hoverblurin');
        $('#lab1 p').animate({opacity: "1"}, 300);
    }).
    mouseout(function(){
    $('#lab1 img').removeClass('hoverblurin').addClass('hoverblur');
        $('#lab1 p').animate({opacity: "0"}, 300)
    });

    $('#lab2 p').
    mouseover(function(){
        $('#lab2 img').removeClass('hoverblur').addClass('hoverblurin');
        $('#lab2 p').animate({opacity: "1"}, 300);
    }).
    mouseout(function(){
        $('#lab2 img').removeClass('hoverblurin').addClass('hoverblur');
        $('#lab2 p').animate({opacity: "0"}, 300)
    });

    $('#lab3 p').
    mouseover(function(){
        $('#lab3 img').removeClass('hoverblur').addClass('hoverblurin');
        $('#lab3 p').animate({opacity: "1"}, 700);
    }).
    mouseout(function(){
        $('#lab3 img').removeClass('hoverblurin').addClass('hoverblur');
        $('#lab3 p').animate({opacity: "0"}, 300)
    });

    $('#lab4 p').
    mouseover(function(){
        $('#lab4 img').removeClass('hoverblur').addClass('hoverblurin');
        $('#lab4 p').animate({opacity: "1"}, 700);
    }).
    mouseout(function(){
        $('#lab4 img').removeClass('hoverblurin').addClass('hoverblur');
        $('#lab4 p').animate({opacity: "0"}, 300)
    });

    $('#lab5 p').
    mouseover(function(){
        $('#lab5 img').removeClass('hoverblur').addClass('hoverblurin');
        $('#lab5 p').animate({opacity: "1"}, 300);
    }).
    mouseout(function(){
        $('#lab5 img').removeClass('hoverblurin').addClass('hoverblur');
        $('#lab5 p').animate({opacity: "0"}, 300)
    });

    $('#lab6 p').
    mouseover(function(){
        $('#lab6 img').removeClass('hoverblur').addClass('hoverblurin');
        $('#lab6 p').animate({opacity: "1"}, 300);
    }).
    mouseout(function(){
        $('#lab6 img').removeClass('hoverblurin').addClass('hoverblur');
        $('#lab6 p').animate({opacity: "0"}, 300)
    });


    $(":file").filestyle({placeholder: "No file"});
    // get
    $(":file").filestyle('placeholder');
// set
    $(":file").filestyle('placeholder', 'Файл не выбран');


	$("[data-fancybox]").fancybox({
		// Options will go here
	});

    $('#productAddBtn').click(function() {
        $("#myModalBox").modal('show');
    });
    $('#galleryAddBtn').click(function() {
        $("#myModalBox").modal('show');
    });
    $('#authorization').click(function() {
        $("#myModalBox").modal('show');
    });
    $(function () {
        // инициализировать все элементы на страницы, имеющих атрибут data-toggle="tooltip", как компоненты tooltip
        $('[data-toggle="tooltip"]').tooltip()
    });

});