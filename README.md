# README UFIX

## Start the project
Dev :
* yarn install
* composer install
* yarn run encore dev --watch
* php bin/console server:run

Prod :
* yarn run encore production --progress

## Initialize database
* Changer vos infos dans .env à la ligne DATABASE_URL
* php bin/console doctrine:database:create
* php bin/console doctrine make:migration
* php bin/console doctrine:migrations:migrate
* php bin/console doctrine fixtures:load
    ->ajoute les données initiales dans la BDD
* Si migrations:migrate ne marche pas, supprimer les tables de la bdd SAUF la table migration_versions

## Naming of commits 

### Adding
* Adding a file : "add [file_name]"
* Adding code : 
    * Function : "add [function_name] [precision]"
    * Documentation : "add documentation [precision]" 

### Removing
* Removing a file : "delete [file_name]"
* Remove code : 
    * Function : "remove [function_name] [precision]"
    * Documentation : "remove documentation [precision]" 

### Editing
* Editing a file : "fixed [file_name]"
* Editing code : 
    * Function : "editing [function_name] [precision]"
    * Documentation : "editing documentation [precision]" 

### Merge/Conflicts
* Merge conflict : "fix conflict"
