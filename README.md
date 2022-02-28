# Booking
					# MICRO_SERVICE_BOOKING 
                    
                    
микросервис был создан для бранирования кабинетов на определенный срок 

что бы забронировать кабинет нужны данные как :
```json
{
     "user_id" : "{integer}",
     "cabinet_id" : "{integer}",
     "time_start" : "Y-m-d H:i",
     "time_end" : "Y-m-d H:i",
}
```
кабинет айди можно получить если не отправить в тело запроса поиска [localhost/api/cabinet](http://localhost:8000/api/cabinet) ( выведится все кабинеты )

если добавить даные как :
```json
{
   	    "number_cabinet" : "string",
            "description" : "string",
            "status" : "boolean",
            "building_id" : "{integer}"
}
```
то создаться кабинет 

building_id получается от ссылки  [localhost/api/building](http://localhost/api/building) с пустым телом запроса.

заполненый как :
```json
{
            "name" : "string",
            "address" : "string",
            "lon" : "string",
            "lat" : "string",
            "city_id" : "{integer}",
}
```
создаст  здание в БД

city_id получаем с  [localhost/api/city](http://localhost/api/city)  

создаем 
```json
{
             "name" : "string",
            "country_id" : "{integer}"
}
```
coutnry_id получаем с  [ localhost/api/country](http://localhost/api/country)  

создаем 
```json
{
   "name" : "string",
}
```

B crud_controllerе прописана CRUD логика микросервиса 


для получение всех данных с моделей ,тело запроса get должен быть пустым,  ведь иначе запаботает фильтрация(поиск).
фильтрация ждет с тела запроса данные по чему будет фильтравать 

к примеру 
если мы ищем кабинет в определенном городе то просто пишем relation(отношения) с кабинета до города 
```json
{
	"building.city.country.name" : "almaty"
}
```

put ждет в себе айди и данные с тела по которым будет искать и изменять данные 

delete просто ждет id модели которую нужно удалить 


