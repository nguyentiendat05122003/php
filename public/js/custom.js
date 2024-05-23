$(document).ready(function () {
    function getTypeOfBrand() {
        var option = $("#brand").val();
        $.ajax({
            url: "/get-data/" + option,
            type: "GET",
            success: function (data) {
                $("#typeBrand").empty();
                $.each(data, function (key, value) {
                    $("#typeBrand").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.name +
                            "</option>"
                    );
                });
            },
        });
    }
    $("#brand").change(getTypeOfBrand);
    getTypeOfBrand();
});

function readURL(input) {
    var url = input.value;
    var ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
    if (
        input.files &&
        input.files[0] &&
        (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")
    ) {
        document.querySelector(".dz-message").style.display = "none";
        document.querySelector("#img").style.display = "block";
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#img").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        $("#img").attr("src", "/assets/no_preview.png");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    var dropdown = document.getElementById("product-name");
    var dropdownProvider = document.getElementById("provider-name");
    var dropdownSize = document.getElementById("size-name");
    var inputSize = document.getElementById("sizeName");
    var inputColor = document.getElementById("colorName");
    var dropdownColor = document.getElementById("color-name");
    var input = document.getElementById("nameProduct");
    var inputProvider = document.getElementById("nameProvider");

    dropdown.addEventListener("change", function () {
        var selectedOption = dropdown.options[dropdown.selectedIndex];
        console.log(selectedOption);
        console.log(input);
        if (selectedOption.value !== "0") {
            input.value = selectedOption.innerText;
        } else {
            input.value = "";
        }
    });
    dropdownProvider.addEventListener("change", function () {
        var selectedOption =
            dropdownProvider.options[dropdownProvider.selectedIndex];
        if (selectedOption.value !== "0") {
            inputProvider.value = selectedOption.innerText;
        } else {
            inputProvider.value = "";
        }
    });
    dropdownSize.addEventListener("change", function () {
        var selectedOption = dropdownSize.options[dropdownSize.selectedIndex];
        if (selectedOption.value !== "0") {
            inputSize.value = selectedOption.innerText;
        } else {
            inputSize.value = "";
        }
    });

    dropdownColor.addEventListener("change", function () {
        var selectedOption = dropdownColor.options[dropdownColor.selectedIndex];
        if (selectedOption.value !== "0") {
            inputColor.value = selectedOption.innerText;
        } else {
            inputColor.value = "";
        }
    });
});
