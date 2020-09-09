<h1>INFO</h1>

Role management codeigniter 3 using php, and javascript role management is made to make it easier for developers to create websites to provide access to each menu

<h1>GUIDE!</h1>

how to use ?
- clone or download 
- import database into the phpmyadmin 
- open config folder in <code>application/config/config.php</code>
  
  <pre>
    <code>
      $config['base_url'] = 'http://localhost/role-management'; //enter the name of the folder your are using  
    </code>
    
 - database configuration in folder <code>application/config/database.php</code>
 - open the <code>database.php</code> then enter the name according to the database that you imported earlier
   <pre>
      <code>
          $db['default'] = array(
            'dsn'	=> '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',                 <= enter your database password if any
            'database' => 'role-management',  <= enter your database name if any
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt' => FALSE,
            'compress' => FALSE,
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE
          );
      </code>
