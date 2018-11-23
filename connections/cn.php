<?php
   $host        = "host = ec2-54-83-8-246.compute-1.amazonaws.com";
   $port        = "port = 5432";
   $dbname      = "dbname = daa5q3bdaegmq7";
   $credentials = "user = vhdzqbelhebxkv password=a6f1d9d7a7e3b7b8bb2fe8d5d0b1ac9704424601e1c782b4e40130b5d41138a3";

   $db = pg_connect("$host $port $dbname $credentials");
   if(!$db) {
      echo "Error : Unable to open database\n";
   }
?>
