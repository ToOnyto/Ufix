# README UFIX

## Start the project
Dev :
* yarn install
* composer install
* yarn run encore dev --watch
* php bin/console server:run

Prod :
* yarn run encore production --progress

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
