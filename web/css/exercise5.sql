SELECT c.first_name, c.last_name, a.address, ct.city
     FROM customer c
       INNER JOIN address a
       ON c.address_id = a.address_id
      INNER JOIN city ct
      ON a.city_id = ct.city_id
     WHERE a.district = 'California';

SELECT f.title
FROM film f
INNER JOIN film_actor fa ON fa.film_id = f.film_id
INNER JOIN actor a ON a.actor_id = fa.actor_id
WHERE a.first_name = 'John';

SELECT city, count(address) b
from address a 
inner join city c using(city_id)
group by 1
HAving b > 1;

SELECT a.city_id, a.address, ad.address
FROM address a
INNER JOIN address ad ON a.city_id = ad.city_id
WHERE a.address != ad.address
