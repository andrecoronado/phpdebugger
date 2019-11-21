<?php
 
// ..... your code ......>>>

  $exempleA="Hello World";
 
 $exempleA=array(1,3,5,7,9);

// 1. call a neww debugger class with all our parametro and it's done.
  $debugger= new Debugger('Test',[$exempleA,$exempleA],true);
  
// ..... your code ......<<<

//2. If you would like to clear the JSON file, you have two ways: 
  //2.1 Write "false" in the last parametro Eg.: $debugger= new Debugger('Test',[$exempleA,$exempleA],false);
  //2.2 Use a function clear:
$debugger->clear();


