$(document).ready(function () {
    $('#summernote').summernote({
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });

    $(function () {
        bsCustomFileInput.init();
    });


    //Initialize Select2 Elements
    $('.select2').select2()


    // Autoloading function to add the listeners:
    var elem = document.querySelectorAll(".deleteBtn");

    for (var i = 0; i < elem.length; i++) {
        elem[i].addEventListener("click", function (e) {
            //e => event
            if (!confirm("Do you really want to do this?")) {
                e.preventDefault(); // ! => don't want to do this
            }
        })
    }

});
