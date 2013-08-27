<?php
include_once("Base/Php/loc.php");
include_once(LocPhp()."info.php");
include_once(LocPhp()."main.php");
$css = array(LocCss()."main.css");
head("Контакты", null, 5, $css, null);
?>
        <h2>Контакты</h2>
        <p>По любым вопросам, предложениям и отзывам, обращайтесь в службу поддержки Task-Killer. Мы будем рады помочь Вам разобраться в возникших вопросах!</p>
        <p>Электронная почта: <strong><?php echo GetCompEmail(); ?></strong></p>
        <p>Контактный телефон: <strong><?php echo GetCompPhone(); ?></strong></p>
        <p>Аккаунт ВКонтакте: <strong><?php echo GetCompVkontakte(); ?></strong></p>
        <p>ICQ: <strong><?php echo GetCompICQ(); ?></strong></p>
<?php
footer(5, null);
?>