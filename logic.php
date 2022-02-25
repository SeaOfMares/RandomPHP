<html>
    <body>
<form>
        <?php
            /**
             * I used https://www.javatpoint.com/php-append-to-file for help in appending a line to the txt file
             * I did this because put contents function would delete all previous info of the txt file
             */

            if(!isset($_POST['name']) || !isset($_POST['PLP'])){//checking if input is empty
                $_POST['name'] = "";
                $_POST['PLP'] = "";
            }else{
            $writer = fopen('Items.txt','a');
            $input = $_POST['name'] . "," . $_POST['PLP'] . ",";
            fwrite($writer,$input);
            fclose($writer);
            }
            $commonFile = file_get_contents('Common.txt');//reads file and returns a string
            $commonStr = explode(',', $commonFile);//seprates the string by ','
            if(count($commonStr) != 0){// if common is not empty then print out array
                echo "<h3> Common Items </h3>";
                echo "<h5> Name  PLU</h5>";
                for($i = 0; $i < count($commonStr)-1; $i+=2){
                    echo $commonStr[$i] . " " . $commonStr[$i+1] . "<br>";
                }
            }
            $itemFile = file_get_contents('Items.txt');//reading Items file and storing it as a string
            $str = explode(',', $itemFile);//separating the string by ','
            $itemList = array(array($str[0],$str[1]));//turning the string into a 
            for($i = 2; $i < count($str)-1; $i+=2){
                array_push($itemList,array($str[$i],$str[$i+1]));
            }
            //array_push($itemList,array($_POST['name'],$_POST['PLP']));
            sort($itemList);
            echo "<h3> Items </h3>";
            echo "<h5> Name  PLU</h5>";
            foreach($itemList as $row){
                if (!empty($row[0])){
                
                echo "<input type = checkbox name = Checked>";
                echo  $row[0] . "\t\t" . $row[1] . "<br>";
                }
            }
        ?>
        <input type = "submit" name = "moving" value = "Move to Top">
        <br>
</form>
            <?php
            if(isset($_POST['moving'])){
                $writer = fopen('Common.txt');
                $temp = $_POST['Checked'];
            }
            ?>
    </body>
</html>