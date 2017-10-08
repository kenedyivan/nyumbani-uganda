
function addProperty(){

    var formData = new FormData(document.getElementById("add-form"));
    formData.append('_token',$('#token').val());
    formData.append('file',$('#arr').val());

        $.ajax({
            type: 'POST',
            headers: {"cache-control": "no-cache"},
            url: "/agent/add-new-property",
            async: true,
            cache: false,
            dataType: "json",
            enctype: "multipart/form-data",
            data: formData,
            processData: false,
            contentType: false,
            success: function (jsonData, textStatus, jqXHR) {

                console.log("Success: "+jsonData["success"]);

                if(jsonData["success"]){
                    window.location="/agent/add-payment";
                }else{
                    console.log("Redirection failure");
                }



            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });


}
