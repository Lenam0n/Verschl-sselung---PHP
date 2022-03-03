<?php

$specialChars = [' ',',',';',':','!','"','\'','ä','ö','ü','ß','?'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/script.js"></script>
    <title>Cesar</title>
</head>
<body>
    <div class="header-content"></div>

    <div class="card col">
        <form action="" method="post" class="col">
            <h2>Text Verschlüsseln</h2>
            <input type="text" name="encrypt" placeholder="Enter Text" value="">
            <button type="submit" value="">Verschlüsseln</button>

            <?php 
                if(isset($_POST['encrypt'])){
                    $text = strtolower($_POST['encrypt']);
                    $array = str_split($text);

                    echo '<div class="answer"><p style="margin:0;"><b>Dein Wort lautet:</b></p></div>';

                    foreach($array as $char){
                        if (in_array($char , $specialChars)){
                            echo $char;
                        }
                        else{
                            echo toChar(toNum($char)+ 1);
                        }

                    }
                }
    
            ?>

        </form>
        
        <form action="" method="post" class="col">
            <h2>Text Entschlüsseln</h2>
            <input type="text" name="decrypt" placeholder="Enter Text" value="">
            <button type="submit" value="">Entschlüsseln</button>

            <?php 
                if(isset($_POST['decrypt'])){
                    $text = strtolower($_POST['decrypt']);
                    $array = str_split($text);

                    echo '<div class="answer"><p style="margin:0;"><b>Dein Entschlüsseltes Wort lautet:</b></p>';

                    foreach($array as $char){
                        if (in_array($char , $specialChars)){
                            echo $char;
                        }
                        else{
                        echo toChar(toNum($char)- 1);
                        }
                    }
                }
    
            ?>

        </form>
        <form action=""  class="reset" method="post">
            <div>
                <button name="reset" type="submit">Reset Text</button>
                
                <?php
                if(isset($_POST['reset'])){
                    if(isset($_POST['decrypt'])){
                        $_POST['decrypt'] = null;
                    }
                    if(isset($_POST['encrypt'])){
                        $_POST['encrypt'] = null;
                    }
                }
                
                ?>

            </div>
        </form>
    </div>

</body>
</html>

<?php 

function toNum($data) {
    $alphabet = array(
    'a','b','c','d','e',
    'f','g','h','i','j',
    'k','l','m','n','o',
    'p','q','r','s','t',
    'u','v','w','x','y',
    'z'
);
$alpha_flip = array_flip($alphabet);
$return_value = -1;
$length = strlen($data);
for ($i = 0; $i < $length; $i++) {
    $return_value +=
        ($alpha_flip[$data[$i]] + 1) * pow(26, ($length - $i - 1));
}
return $return_value;
}

function toChar($number) {
    if($number < 0){
        $number = $number + 26;
    }

    if($number > 25){
        $number = $number = 26;
    }
    $alphabet = array(
    'a','b','c','d','e',
    'f','g','h','i','j',
    'k','l','m','n','o',
    'p','q','r','s','t',
    'u','v','w','x','y',
    'z'
);

return $alphabet[$number];
}

?>