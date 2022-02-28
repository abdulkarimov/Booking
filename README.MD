					# MICRO_SERVICE_BOOKING 
                    
                    
микросервис был создан дл€ бранировани€ кабинетов на определенный срок 

что бы забронировать кабинет нужны данные как :
```json
{

            'user_id' => integer,
            'cabinet_id' => integer,
            'time_start' =>  Y-m-d H:,
            'time_end' => Y-m-d H:i,
}
```
кабинет айди можно получить если не отправить в тело запроса поиска localhost/api/cabinet ( выведитс€ все кабинеты )

если добавить даные как :
```json
{
   	        'number_cabinet' => string,
            'description' => string,
            'status' => boolean,
            'building_id' => 'integer
}
```
то создатьс€ кабинет 

building_id получаетс€ от ссылки localhost/api/building с пустым телом запроса 
```json
заполненый как :
{
            'name' => string,
            'address' => string,
            'lon' => string,
            'lat' => string,
            'city_id' =>  integer,
}
```
создаст  здание в Ѕƒ


city_id получаем с localhost/api/city 
создаем 
```json
{
            'name' => string,
            'country_id' =>  integer,
}
```
coutnry_id получаем с localhost/api/country 
создаем 
```json
{
            'name' => string,
}
```

B crud_controllerе прописана CRUD логика микросервиса 


дл€ получение всех данных с моделей ,тело запроса get должен быть пустым,  ведь иначе запаботает фильтраци€(поиск).
фильтраци€ ждет с тела запроса данные по чему будет фильтравать 

к примеру 
если мы ищем кабинет в определенном городе то просто пишем relation(отношени€) с кабинета до города 
{
	building.city.country.name : almaty 
}


put ждет в себе айди и данные с тела по которым будет искать и измен€ть данные 

delete просто ждет id модели которую нужно удалить 






 
