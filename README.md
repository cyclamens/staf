# Blog pour un écrivain
Il s'agit de créer une application de blog pour un écrivain qui souhaite innover et publier en ligne par épisode sur son site.
Ce blog, il souhaite le concevoir sans utiliser de wordpress, uniquement en utilisant de fonctionnalités simples.
Cette application sera développée en php avec une base de données MySQL.
Elle doit fournir une interface frontend (lecture des billets) et une interface backend (administration des billets pour l'écriture).
On doit y retrouver tous les éléments d'un CRUD :

## Create : création de billets
## Read : lecture de billets
## Update : mise à jour de billets
## Delete : suppression de billets
Chaque billet doit permettre l'ajout de commentaires, qui pourront être modérés dans l'interface d'administration au besoin.
Les lecteurs doivent pouvoir "signaler" les commentaires pour que ceux-ci remontent plus facilement dans l'interface d'administration 
pour être modérés.

L'interface d'administration sera protégée par mot de passe. La rédaction de billets se fera dans une interface WYSIWYG basée sur TinyMCE,
pour que l'auteur n'ait pas besoin de rédiger son histoire en HTML.

Le code sera construit sur une architecture MVC, en développant autant que possible en orienté objet(au minimum le modéle).
