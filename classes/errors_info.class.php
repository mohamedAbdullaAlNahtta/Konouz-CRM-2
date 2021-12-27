<?php

class errors_info{

    public $error_list = array("Error_count"=>0); 




    private function get_error_message($errormessage){
        
        $this->error_list["error_mes"][]=$errormessage;    
        
    }
    public function multi_check_if_there_error($res){

        $arr_len = count($res);

        for ($i=0; $i < $arr_len; $i++) { 
            $this->check_if_there_error($res[$i]);
        }
        $errors_messs =(array) $this->error_list["error_mes"];
        $this->error_list["error_mes"]=implode(", and ",$errors_messs);
        

    }

    public function check_if_there_error($res){

        if (is_array($res)) {
            
            if ($res[0] !== true){
                $this->error_list["Error_count"]++ ;
                $this->get_error_message($res);
                return $this->error_list;
            }else{
                return false;
            }

        }else{

            if ($res !== true){
                $this->error_list["Error_count"]++ ;
                $this->get_error_message($res);
                return $this->error_list;
            }else{
                return false;
            }

        }
        

    }
     
}







?>