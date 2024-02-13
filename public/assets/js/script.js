function keepOnlyNumbers(input) {
    return input.replace(/\D/g, "");
}

var inputField = document.getElementById("nip");
var inputField1 = document.getElementById("phone");
var inputField2 = document.getElementById("nrp");

inputField.addEventListener("input", function () {
    inputField.value = keepOnlyNumbers(inputField.value);
});
inputField1.addEventListener("input", function () {
    inputField1.value = keepOnlyNumbers(inputField1.value);
});
inputField2.addEventListener("input", function () {
    inputField1.value = keepOnlyNumbers(inputField1.value);
});

var update = function (event) {
    var new_photo = document.getElementById("new_photo");
    var avatar = document.getElementById("avatar");
    new_photo.src = URL.createObjectURL(event.target.files[0]);
    new_photo.onload = function () {
        URL.revokeObjectURL(new_photo.src);
        new_photo.classList.remove("hidden");
        avatar.classList.add("hidden");
        photo.classList.remove(
            "bg-red-200 border-2 border-red-300 shadow-red-100"
        );
        photo.classList.add(
            "bg-blue-200 border border-blue-300 shadow-blue-100"
        );
    };
    check_photo.classList.add(
        "bg-blue-200 border border-blue-300 shadow-blue-100"
    );
    checklist.classList.remove("hidden");
    checklist1.classList.remove("hidden");
};

$(document).ready(function () {
    $("#nip").on("keyup", function (e) {
        if ($("#nip").val() == "") {
            $(".check1").addClass("hidden");
            $(".x1").removeClass("hidden");
            $("#nip").removeClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
            $("#nip").addClass(
                "bg-red-200 border border-red-300 shadow shadow-red-200"
            );
        } else {
            $(".check1").removeClass("hidden");
            $(".x1").addClass("hidden");
            $("#nip").removeClass(
                "bg-red-200 border border-red-300 shadow shadow-red-200"
            );
            $("#nip").addClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
        }
    });
    $("#username").on("keyup", function (e) {
        if ($("#username").val() == "") {
            $(".check2").addClass("hidden");
            $(".x2").removeClass("hidden");
            $("#username").removeClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
            $("#username").addClass(
                "bg-red-200 border border-red-300 shadow shadow-red-200"
            );
        } else {
            $(".check2").removeClass("hidden");
            $(".x2").addClass("hidden");
            $("#username").removeClass(
                "bg-red-200 border border-red-300 shadow shadow-red-200"
            );
            $("#username").addClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
        }
    });
    $("#name").on("keyup", function (e) {
        if ($("#name").val() == "") {
            $(".check3").addClass("hidden");
            $(".x3").removeClass("hidden");
            $("#name").removeClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
            $("#name").addClass(
                "bg-red-200 border border-red-300 shadow shadow-red-200"
            );
        } else {
            $(".check3").removeClass("hidden");
            $(".x3").addClass("hidden");
            $("#name").removeClass(
                "bg-red-200 border border-red-300 shadow shadow-red-200"
            );
            $("#name").addClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
        }
    });
    $("#email").on("keyup", function (e) {
        if ($("#email").val() == "") {
            $(".check4").addClass("hidden");
            $(".x4").removeClass("hidden");
            $("#email").removeClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
            $("#email").addClass(
                "bg-red-200 border border-red-300 shadow shadow-red-200"
            );
        } else {
            $(".check4").removeClass("hidden");
            $(".x4").addClass("hidden");
            $("#email").removeClass(
                "bg-red-200 border border-red-300 shadow shadow-red-200"
            );
            $("#email").addClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
        }
    });
    $("#phone").on("keyup", function (e) {
        if ($("#phone").val() == "") {
            $(".check5").addClass("hidden");
            $(".x5").removeClass("hidden");
            $("#phone").removeClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
            $("#phone").addClass(
                "bg-red-200 border border-red-300 shadow shadow-red-200"
            );
        } else {
            $(".check5").removeClass("hidden");
            $(".x5").addClass("hidden");
            $("#phone").removeClass(
                "bg-red-200 border border-red-300 shadow shadow-red-200"
            );
            $("#phone").addClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
        }
    });
    $("#password").on("keyup", function (e) {
        if ($("#password").val() != "") {
            $("#password").removeClass(
                "bg-slate-200 border border-slate-300 shadow shadow-slate-200"
            );
            $("#password").addClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
        } else {
            $("#password").addClass(
                "bg-slate-200 border border-slate-300 shadow shadow-slate-200"
            );
            $("#password").removeClass(
                "bg-blue-200 border border-blue-300 shadow shadow-blue-200"
            );
        }
    });

    $(".eye").on("click", function (e) {
        $("#password").attr("type", "text");
        $(".eye-closed").removeClass("hidden");
        $(".eye").addClass("hidden");
    });

    $(".eye-closed").on("click", function (e) {
        $("#password").attr("type", "password");
        $(".eye").removeClass("hidden");
        $(".eye-closed").addClass("hidden");
    });
});
