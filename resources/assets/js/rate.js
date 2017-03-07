




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
            url: "/api/rates",
            data: {
                from_city: trim($("#from_city").val()),
                to_city: trim($("#to_city").val()),
                weight: trim($("#weight").val()),
                volume: trim($("#volume").val())
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