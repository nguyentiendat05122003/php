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
