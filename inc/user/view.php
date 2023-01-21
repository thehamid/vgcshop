<?php
global $table;
global $pr_id;
global $wpdb;
global $card;



$request_uri=$_SERVER['REQUEST_URI'];

//$uri_parts=explode('/',strtok($request_uri,'?'));
//$uri_code=end($uri_parts);
$pos = strrpos($request_uri, 'vgc/');
$original_string = $pos === false ? $request_uri : substr($request_uri, $pos + 4);
$string_code = str_replace('/', '', $original_string);


$pr_id='123';
$table='vgcshop_orders';

$card = $wpdb->get_results( $wpdb->prepare(
    " SELECT * FROM {$wpdb->prefix}vgcshop_orders WHERE CODE ={$string_code}"

),ARRAY_A);






?>

<?php get_header(); ?>
<div class="container">
    <?php var_dump($card[0]); ?>
    <h1>Hello  <?php echo $string_code; ?></h1>
    <?php
    foreach ($card as $key => $val) {?>
        <h1>قیمت: <?php echo $val['price_card']; ?></h1>

    <?php
    }
    ?>


</div>



<?php get_footer(); ?>