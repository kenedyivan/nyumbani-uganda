function suspendAgent(aid){

        var chk = document.getElementById("sus-check"+aid);
        var status;
        if(chk.checked == true) {
            state = 1;
        }else {
            state = 0;
        }

        console.log("Howdy: "+aid);
        console.log("Howdy2: "+state);

        $.ajax({
            type: 'GET',
            headers: {"cache-control": "no-cache"},
            url: "/suspend-agent",
            async: true,
            cache: false,
            dataType: "json",
            data: 'agent_id=' + aid+ '&state=' +state,
            processData: false,
            contentType: false,
            success: function (jsonData, textStatus, jqXHR) {

                console.log("Error: "+jsonData["error"]+", Status: "+jsonData["status"]+", Message: "+jsonData["message"]);


                if(jsonData["error"] == 0 && jsonData["status"] == 1){
                    document.getElementById("sus-check"+aid).checked = true;
                }

                if(jsonData["error"] == 0 && jsonData["status"] == 2){
                    document.getElementById("sus-check"+aid).checked = false;
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
        url: "/get-suspended-agents",
        async: true,
        cache: false,
        dataType: "json",
        data: 'agent_id=',
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {

            console.log('getting suspended agents');

            var f = jsonData["suspended"];

            for(var i = 0;i < f.length;i++){

                console.log("sus-check"+f[i]);

                //var span = document.getElementById("sus-check"+f[i]);
                document.getElementById("sus-check"+f[i]).checked = true;
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
})(window.jQuery);