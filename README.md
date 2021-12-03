Guide de mise en marche du projet : <br> <br>
Pour démarrer le projet, il faudra le cloner sur votre machine local via la commande " git clone lien_projet " <br>
Ensuite une fois cloné, installez les dossiers vendors et node_modules si nécessaires, via les commandes " composer install " et " npm install " <br>
Vous pouvez maintenant démarré votre application en local via la commande " php artisan serve " <br>
Testez les APIs maintenant <br>

Deux endpoints sur 3 réalisés : <br>
Les urls sont : <br> <br>
GET : 127.0.0.1:8000/api/client-up-price | Cet URL affichera le client ayant le plus gros total de prix d'articles <br>
GET : http://127.0.0.1:8000/api/client-find/{id} | Cet URL prends en paramètre l'id d'un client, et affiche le total des prix de ses articles <br> <br>

Lien du projet : <br>
https://github.com/nauhand/test_ngser
