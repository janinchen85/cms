<?php
/** "include" includes a specified file and executes it.
* In the event of an error it generates only an (E_WARNING) and allows further program execution.
* "require" is like "include" but in case of error it throws an (E_COMPILE_ERROR) and terminates the program execution.
* "require_once" checks if the file is already included and if so it will not include it again. 
*### require_once ("./api/tpls/tpl_engine.php");  -> to include the template engine
*### require_once ("./api/db/db.php");            -> to include database functions 

* Create an new tpl Object with the desired template name
* Its comfortable to name the object variable the same as the template name 
*    objectname   classname(templatename)
*### $index = new tpl("index");
*### $users = new tpl("users");

*################### If you use the database ##############################################
* Create a new Object of your Database Class
*### $db = new db;

* Call the database connect method to open a new connection
*### $db->connect();

* Assign your desired SQL query to a variable
*### $sql = 'SELECT * FROM users';

* Call the query method with your Database Object and your assigned query as parameter, 
* which executes the desired SQL query and saves the result into a variable.
*    $variable = $object->method($parameter)
*### $result = $db->query($sql);

* For the advanced processing of the data set, the method fetch_array will be used, 
* which stores the results row by row in an array until no further results are available.
*
* while($row = $db->fetch_array($result)){		
*    $users = new tpl("users_list");        -> creates e new Object of the template users_list for every result
*    foreach ($row as $key => $value) {     
*        $users->assign($key, $value);      -> will assign the values for the placeholder
*    }
*    $usersRow[] = $users;                  -> will save it as a new Array row by row (will add the same templatefile)
*}

* Please dont forget to close your SQL Connection
* $db->close();

* To combine the templatefiles a new method will be used
* This will add the Array with all replacements as new template
* $usersListContents = tpl::merge($usersRow);

* Now you can assign the new template as value for your placeholder
* $users->assign("users", $usersListContents);
* $index->assign("content", $usersList->replace());

*##########################################################################################

* Assign the value for a placeholder
* In this case, the following placeholder exists somewhere within the Index.tpl: {$content}
* The word "content" will be replaced with the word "Hello" -> {$hello}
*### $index->assign("content", "Hello");

* Now the associated start and end brackets of the placeholder will be removed
*### $index->replace();

* The revised result of the full template will be displayed
*### $index->show();
*/
require_once ("./api/tpls/tpl_engine.php");
$index = new tpl("index");
$index->assign("content", "Hello");
$index->replace();
$index->show();

?>

