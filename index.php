<html>
    <body>
        <?php
        session_start(); 
        $itemList = array(); 
        array_push($itemList,array("DragonFruit","56415"));
        array_push($itemList,array("Apples","14210"));
        array_push($itemList,array("Bannas","01248"));
        ?>
        <h1> Store</h1>
        <form method = "post">
        <h3> Enter the item name </h3>
        <input type = "text" name = "name"> <br>
        <h3> Enter the PLP Number </h3>
        <input type = "text" name = "PLP"> <br>
        <br>
        <input type = "submit" name = "add" value = "add">
        </form>
        <h3> </h3>
        <?php 
        if(isset($_POST['add'])){
            array_push($itemList,array($_POST['name'],$_POST['PLP']));
            foreach($itemList as $row){
                echo  $row[0] . "\t\t" . $row[1] . "<br>";
            }
        }
        ?>
        
        

    </body>
</html>