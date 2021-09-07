# Bitrix-Setings
// в директори local/php_interface/settings.set

// в директори local/services/buildmenu/index.php
// в директори local/services/buildmenu/script.js
// в директори local/services/buildmenu/style.css


// в директори local/services/settings/index.php
// в директори local/services/settings/script.js
// в директори local/services/settings/ajax.php





<script>


function feedback_submit(){
    if ($('#check-email').is(":checked"))
    {
     var checkEmail = $('#check-email').val();
    }

    if ($('#check-phone').is(":checked"))
    {
     var checkPhone = $('#check-phone').val();
    }

  $.post('/local/services/form.php', {
    iblock: 41,
    theme: 'Обратная связь',
    name: $('#name').val(),
    email: $('#email').val(),
    phone: $('#phone').val(),
    message: $('#message').val(),
    check_email: checkEmail,
    check_phone: checkPhone
  }, function(data){
    data = JSON.parse(data);
    console.log(data);
    //$('#gallery ul.month').html(data);

  });
}

</script>


