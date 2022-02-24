					MICRO_SERVICE_BOOKING 

тело запроса country  должнeн содержать поле name в типe string 

а то что касается модели city то его тело долдно содержать 2 поля одно из которых name типа стринг а второе country_id типа int 

также в сервисе имеется модель building который при создание ждет данные как 

{
            'name' => 'sometimes|required|string',
            'address' => 'sometimes|required|string',
            'lon' => 'sometimes|required|string',
            'lat' => 'sometimes|required|string',
            'city_id' =>  'sometimes|required|integer',
}

ко всему прочему были добавлены модели как :

cabinet и booking

где cabinet ждет данные как 
{
   	    'number_cabinet' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|boolean',
            'building_id' => 'required|integer'
}

a booking : 

{

            'user_id' => 'sometimes|required|integer',
            'cabinet_id' => 'sometimes|required|integer',
            'time_start' =>  'sometimes|required|date_format:Y-m-d H:i',
            'time_end' => 'sometimes|required|date_format:Y-m-d H:i',
}


crud_controllerе прописана CRUD логика микросервиса 


для получение всех данных с моделей ,тело запроса get должен быть пустым,  ведь иначе запаботает фильтрация(поиск).
 фильтрация ждет с тела запроса данные по чему будет фильтравать 

к примеру 
если мы ищем кабинет в определенном городе то просто пишем relation(отношения) с кабинета до города 
{
	building.city.country.name : almaty 
}


put ждет в себе айди и данные с тела по которым будет искать и изменять данные 

delete просто ждет id модели которую нужно удалить 

на счет post я описал в начале примеры добовление модели в бд





 
