<?php
// 1. Before code, debugger class is include
  require ('debugger.php'); 
  

//2. debugger class is initialized with 2 parameters: 
      //2.1- path/filename.json
      //2.2- Config -> true or false (true -> keep and record the history | false -> record only the last time that it runned)
  $debugger= new Debugger('json/phpDebugger.json',true);
  
// ..... your code ......>>>

  $exempleA="Hello World";
// 3. debugger class will record variables that you would like to see
  $debugger->send('Name variable A',$exempleA); 
 
  $exempleB=array(1,3,5,7,9);
// 3. debugger class will record variables that you would like to see
  $debugger->send('Name array B',$exempleB);
  
// ..... your code ......<<<

4. After code, close and save your data 
  $debugger->close();


