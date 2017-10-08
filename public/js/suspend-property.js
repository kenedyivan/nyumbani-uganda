function suspendProperty(pid){

        var chk = document.getElementById("sus-check-property"+pid);
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
            url: "/suspend-property",
            async: true,
            cache: false,
            dataType: "json",
            data: 'property_id=' + pid+ '&state=' +state,
            processData: false,
            contentType: false,
            success: function (jsonData, textStatus, jqXHR) {

                console.log("Error: "+jsonData["error"]+", Status: "+jsonData["status"]+", Message: "+jsonData["message"]);


                if(jsonData["error"] == 0 && jsonData["status"] == 1){
                    document.getElementById("sus-check-property"+pid).checked = true;
                }

                if(jsonData["error"] == 0 && jsonData["status"] == 2){
                    document.getElementById("sus-check-property"+pid).checked = false;
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
        url: "/get-suspended-properties",
        async: true,
        cache: false,
        dataType: "json",
        data: 'property_id=',
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {

            console.log('getting suspended properties');

            var f = jsonData["suspended"];

            for(var i = 0;i < f.length;i++){

                console.log("sus-check-property"+f[i]);

                //var span = document.getElementById("sus-check-property"+f[i]);
                document.getElementById("sus-check-property"+f[i]).checked = true;
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
})(window.jQuery);