var settings = {
    "url": "localhost/almanoos/api/get_city",
    "method": "POST",
    "timeout": 0,
    "headers": {
        "Content-Type": "application/json"
    },
    "data": JSON.stringify({
        "encryption_key": "osama"
    }),
};

$.ajax(settings).done(function (response) {
    console.log(response);
});

$("#package").on("click", function () {
    let cityName = $(this).val();
    console.log('cityName: ', cityName);
})