function showInBanner(pid){

        var chk = document.getElementById("banner-show-check"+pid);
        var status;
        if(chk.checked == true) {
            state = 1;
        }else {
            state = 0;
        }

        console.log("Howdy: "+pid);
        console.log("Howdy2: "+state);

        $.ajax({
            type: 'GET',
            headers: {"cache-control": "no-cache"},
            url: "/show-in-banner",
            async: true,
            cache: false,
            dataType: "json",
            data: 'property_id=' + pid+ '&state=' +state,
            processData: false,
            contentType: false,
            success: function (jsonData, textStatus, jqXHR) {

                console.log("Error: "+jsonData["error"]+", Status: "+jsonData["status"]+", Message: "+jsonData["message"]);


                if(jsonData["error"] == 0 && jsonData["status"] == 1){
                    document.getElementById("banner-show-check"+pid).checked = true;
                }

                if(jsonData["error"] == 0 && jsonData["status"] == 2){
                    document.getElementById("banner-show-check"+pid).checked = false;
                }

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
}



(function($){

    $.ajax({
        type: 'GET',
        headers: {"cache-control": "no-cache"},
        url: "/get-showing-in-banner",
        async: true,
        cache: false,
        dataType: "json",
        data: 'property_id=',
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {

            console.log('getting showing in banner properties');

            var f = jsonData["banner"];

            for(var i = 0;i < f.length;i++){

                console.log("banner-show-check"+f[i]);

                //var span = document.getElementById("banner-show-check"+f[i]);
                document.getElementById("banner-show-check"+f[i]).checked = true;
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
})(window.jQuery);
