$(function() {
    $(".videos .video a").on('click' , function() {
        let link = $(this).attr('href');
        $(".modal .modal-body iframe").attr('src' , link);
    });

    $("#upload_btn").on('click' , function(e){
        e.preventDefault();
        if($('#upload_btn').attr('class') != "btn btn-success save_image"){
            $("#image_file").trigger('click');
        } else {
            //For Submit
            $('#form').submit();
        }
    });

    $("#image_file").on('change', function (){

        let image_value = $(this).val();
        $("#upload_btn").html("<i class='fas fa-cloud-upload-alt'></i> Save");
        $("#upload_btn").attr("class" , "btn btn-success save_image");
        $("#upload_btn").css("width" , "100px");

    });

    // Form Submit ajax
    $('#form').on('submit' , function(e){
        e.preventDefault();

        $.ajax({
            url:  '/profile',
            type: 'POST',
            data: new FormData(this),
            datatype: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                 console.log(data);
                $('#message').text(data.message);
                $("#uploaded_image").html(data.uploaded_image);

            },


        });
    });

});
