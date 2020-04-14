function addGoodInBasket(id) {
    jQuery.ajax({
        url: `?p=basket&a=ajaxAdd&id=${id}`,
        type: 'get',
        success: function (response) {
            jQuery('#basket').html(response.count);
        }
    });
}