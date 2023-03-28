<?php
global $table;
global $wpdb;
global $card;



$request_uri=$_SERVER['REQUEST_URI'];

//$uri_parts=explode('/',strtok($request_uri,'?'));
//$uri_code=end($uri_parts);
$pos = strrpos($request_uri, 'vgc/');
$original_string = $pos === false ? $request_uri : substr($request_uri, $pos + 4);
$string_code = str_replace('/', '', $original_string);

var_dump($string_code);

$table='vgcshop_orders';


$card = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$wpdb->prefix}vgcshop_orders WHERE code = %s", $string_code),ARRAY_A);

//var_dump($card);




?>

<?php get_header(); ?>
<div class="container">
    <?php
    foreach ($card as $key => $val) {?>
        <div class="container">
            <img class="vgc-card-view" src="<?php echo $val['card_id']; ?>"/>
            <p>قیمت: <?php echo $val['price_card']; ?></p>
            <p>فرستنده: <?php echo $val['sender_name']; ?></p>
            <p>گیرنده: <?php echo $val['receiver_name']; ?></p>
            <p>پیام: <?php echo $val['message']; ?></p>
        </div>
    <?php
    }
    ?>


</div>



<?php get_footer(); ?>