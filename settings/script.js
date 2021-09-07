function saveSettings(){  
  $.post('/local/services/settings/ajax.php', {
  		//arr: ARR,
  		tickets_active: $('#tickets-active').is(':checked'),
      tickets_payment: $('#tickets-payment').is(':checked'),
  		popup_promo_bottom: $('#popup-promo-bottom').val(),
      admin_email: $('#admin-email').val(),
  		metrics: $('#metrics').val(),

virtual_expo_ghm: $('#virtual-expo-ghm').val(),
virtual_expo_igosheva: $('#virtual-expo-igosheva').val(),
virtual_expo_raisheva: $('#virtual-expo-raisheva').val(),

token_telegram: $('#token-telegram').val()


  	}, function(data){
    // console.log(data);
    // console.log('111111');
    $('#action-result').html(`   Данные сохранены`);
  });
}
