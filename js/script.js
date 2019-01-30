//Удаляем запись при клике по крестику
$("body").on("click", "#responds .del_button", function(e) {
    e.preventDefault();
    var clickedID = this.id.split("-"); //Разбиваем строку (Split работает аналогично PHP explode)
    var DbNumberID = clickedID[1]; //и получаем номер из массива
    var myData = 'recordToDelete='+ DbNumberID; //выстраиваем  данные для POST

    jQuery.ajax({
        type: "POST", // HTTP метод  POST или GET
        url: "response.php", //url-адрес, по которому будет отправлен запрос
        dataType:"text", // Тип данных
        data:myData, //post переменные
        success:function(response){
            // в случае успеха, скрываем, выбранный пользователем для удаления, элемент
            $('#item_'+DbNumberID).fadeOut("slow");
        },
        error:function (xhr, ajaxOptions, thrownError){
            //выводим ошибку
            alert(thrownError);
        }
    });
});