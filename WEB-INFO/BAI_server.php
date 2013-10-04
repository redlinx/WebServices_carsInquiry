<!--Created by Francis Rey Padao-->
<!--Date Created March 17 2013-->
<?php
    class BAI_server
    {
        public function calculateInsurance($zipcode, $automobile)
        {
            $appKey = $this->checkLocation($zipcode,$automobile);
            
            //echo "<pre>";
            //print_r($appKey);
            //echo "</pre>";
            
            
            if($appKey != null)
            {
                $insuranceTable = $this->generateIsuranceTable();
                $insuranceQuote = $insuranceTable[$appKey[0]][$appKey[1]];
            }
            else
            {
                $insuranceQuote = null;    
            }
            return $insuranceQuote;
        }
        
        public function checkLocation($zipcode,$automobile)
        {
            $zipcodeList = array(1001,1002,1003,1004,1005,1006);
            $automobileList = array(1,2,3,4,5,6);
            
            for($x=0;$x<count($zipcodeList);$x++)
            {
                if($zipcodeList[$x] == $zipcode)
                {
                    $zipcodeKey = $x;
                }
            }
            
            for($x=0;$x<count($automobileList);$x++)
            {
                if($automobileList[$x] == $automobile)
                {
                    $automobileKey = $x;
                }
            }
            
            if(!isset($zipcodeKey) OR !isset($automobileKey))
            {
                $insuranceApplicationDetail = null;
            }
            
            else
            {
                $insuranceApplicationDetail = array($zipcodeKey, $automobileKey);    
            }
            
            return $insuranceApplicationDetail;
        }
        
        public function generateIsuranceTable()
        {
            $initialValue = 10000;
            $initialValue1 = 10000;
            
            for($y=0;$y<6;$y++)
            {
                for($x=0;$x<6;$x++)
                {
                    $insuranceQuote[$x][$y] = $initialValue;
                    $initialValue += 10000;
                }
                $initialValue1 += 10000;
                $initialValue = $initialValue1;
            }
            return $insuranceQuote;
        }
    }
?>