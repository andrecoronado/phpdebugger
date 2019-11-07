<?php 

class Debugger {
        private $pathFile; //path and file where the JSON will be save
        private $past; //true or false | true -> keep and record the history | false -> record only the last time that it runned
        private $jsonDataFinal= array(); // array with date from all compilation
        private $jsonDataInitial= array(); // array with data only in this compilation
        private $n; //count how many times did it run, if $past = true
        
//exemple: $debugger= new Debugger('json/phpDebugger.json',true);
        public function __construct($path, $past) {
            // 1- the path file is record    
            $this->pathFile=$path;
            $this->past=$past;

            if($this->past)
            {
                // 2- the old file is open and convert from json to array, if $past=true
                $oldFile=json_decode(file_get_contents($this->pathFile));

                // 3- the old array is record if $past=true
                $n=0;
                foreach ($oldFile as $value)
                {
                    $this->jsonDataFinal+=['p-'.$n => $value];
                    $n++;
                }
                $this->n=$n;
            } 

            // 4- get the current datetime and put in a initial array   
            $now = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
            $date = $now->format('Y-m-d H:i:s');
            $this->jsonDataInitial+=['Start' => $date];               
        }

//exemple: $debugger->send('Name variable or array',$array);
        public function send($text,$data){
            // 5- the data is record in a initial array
            $this->jsonDataInitial+=[$text => $data];   
        }

//exemple: $debugger->close();
        public function close(){
            // 6- the data is record in a final array
            if($this->past)
            {
                $n=$this->n;
                $this->jsonDataFinal+=['p-'.$n => $this->jsonDataInitial];   
            }
            else 
            {
                $this->jsonDataFinal=[$this->jsonDataInitial];                  
            }

            // 7- the json is save in a file that was indicate in the first step
            file_put_contents($this->pathFile, json_encode($this->jsonDataFinal));
        }
    }
