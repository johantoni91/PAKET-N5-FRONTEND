import Quagga from "quagga";
Quagga.init(
    {
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector("#barcode"), // Or '#yourElement' (optional)
        },
        decoder: {
            readers: ["code_128_reader"],
        },
    },
    function (err) {
        if (err) {
            console.log(err);
            return;
        }
        console.log("Initialization finished. Ready to start");
        Quagga.start();
    }
);

(function ($) {
    "use strict";
    //Menu
    $(".navbar-toggle").on("click", function (event) {
        $(this).toggleClass("open");
        $("#navigation").slideToggle(400);
    });

    $(".navigation-menu>li").slice(-2).addClass("last-elements");

    $(".menu-arrow,.submenu-arrow").on("click", function (e) {
        if ($(window).width() < 992) {
            e.preventDefault();
            $(this)
                .parent("li")
                .toggleClass("open")
                .find(".submenu:first")
                .toggleClass("open");
        }
    });

    // Smooth scroll
    $(".navbar-nav a, .scrollbtn").on("click", function (event) {
        var $anchor = $(this);
        $("html, body")
            .stop()
            .animate(
                {
                    scrollTop: $($anchor.attr("href")).offset().top - 0,
                },
                3000,
                "easeInOutExpo"
            );
        event.preventDefault();
    });

    // Add scroll class
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 50) {
            $(".sticky").addClass("nav-sticky");
        } else {
            $(".sticky").removeClass("nav-sticky");
        }
    });

    //Scrollspy
    $(".navbar-nav").scrollspy({
        offset: 20,
    });
})(jQuery);
