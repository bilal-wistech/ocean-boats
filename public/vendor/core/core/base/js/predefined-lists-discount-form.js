$(document).ready(function() {
    $(document).on('click', '#generate-code-btn', function(e) {
        e.preventDefault();
        var randomCode = generateRandomCode(8);
        $('#discount-code-input').val(randomCode);
    });

    function generateRandomCode(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }
    $('.predefined_list_discount').select2({
        placeholder: "Select a predefined list",
        allowClear: true
    });
});