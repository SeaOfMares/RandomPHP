<html>
    <body>
<form>
        <?php
            /**
             * I used https://www.javatpoint.com/php-append-to-file for help in appending a line to the txt file
             * I did this because put contents function would delete all previous info of the txt file
             */
            $writer = fopen('Items.txt','a');
            $input = $_POST['name'] . "," . $_POST['PLP'] . ",";
            fwrite($writer,$input);
            fclose($writer);

            $commonFile = file_get_contents('Common.txt');//reads file and returns a string
            $commonStr = explode(',', $commonFile);//seprates the string by ','
            if(count($commonStr) != 0){// if common is not empty then print out arrayu
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
            foreach($itemList as $row){
                echo "<input type = checkbox value = Checked>";
                echo  $row[0] . "\t\t" . $row[1] . "<br>";
            }
        ?>
        <input type = "submit" name = "moving" value = "Move to Top">
        <br>
</form>
            <?php
            if(isset($_POST['moving'])){
                $writer = fopen('Common.txt');
            }
            ?>
    </body>
</html>