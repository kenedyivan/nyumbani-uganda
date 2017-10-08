function addToFavorites(pid, aid){

    var span = document.getElementById("fav-span"+pid);
    span.className = "";

    $.ajax({
        type: 'GET',
        headers: {"cache-control": "no-cache"},
        url: "/add-to-favorites",
        async: true,
        cache: false,
        dataType: "json",
        data: 'property_id=' + pid +'&agent_id='+aid,
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {

            console.log("Error: "+jsonData["error"]+",Status: "+
            jsonData["status"]+"Message: "+jsonData["message"]);

            if(jsonData["error"] == 0 && jsonData["status"] == 1){
                span.style.backgroundColor = "cornflowerblue";

                span.className = "animated bounceIn";

            }

            if(jsonData["error"] == 0 && jsonData["status"] == 2){
                span.style.backgroundColor = "";
                /*s.addClass( "animated bounceIn" );
                s.removeClass( "animated bounceIn" );*/
                span.className = "animated bounceIn";

            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

}


(function(){
    var id = agent;

    $.ajax({
        type: 'GET',
        headers: {"cache-control": "no-cache"},
        url: "/get-favorites",
        async: true,
        cache: false,
        dataType: "json",
        data: 'agent_id='+ id,
        processData: false,
        contentType: false,
        success: function (jsonData, textStatus, jqXHR) {


            var f = jsonData["favorites"];

            for(var i = 0;i < f.length;i++){

                console.log("fav-span"+f[i]);

                var span = document.getElementById("fav-span"+f[i]);
                span.style.backgroundColor = "cornflowerblue";
            }

        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });
})();
