




$(document).ready(function () {
    var options = {
        url: "json/cities.json",
        getValue: "name",
        list: {
            match: {
                enabled: true
            }
        }
    };
    $(".auto-complete").easyAutocomplete(options);

    $("#calculate-rate").on("submit", function (e) {
        e.preventDefault();
        $.ajax({
            url: "api/rates",
            data: {
                from_city: $("#from_city").val().trim(),
                to_city: $("#to_city").val().trim(),
                weight: $("#weight").val().trim(),
                volume: $("#volume").val().trim()
            },
            dataType: "JSON",
            method: "POST",
            success: function (data, status) {
                console.log(status);
                console.log(data);
            }
        })
    });
});