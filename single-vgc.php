<?php
global $wpdb;
if (isset($_POST['submit'])) {

    $table = $wpdb->prefix .'vgcshop_orders';
    $wpdb->insert($table,
        [
            'price_card' => $_POST['vgc-value'],
            'receiver_name' => $_POST['receivername'],
            'receiver_phone' => $_POST['receiverphone'],
            'message' => $_POST['message'],
            'sender_name' => $_POST['sendername'],
            'sender_phone' => $_POST['senderphone'],
            'card_id' => $_POST['img_url'],
            'code' => 321,
            'trans_id' => 0,
            'alert' => 0,
            'date_order' => date("Y-m-d h:i:sa"),
            'status' => -2,
        ]);


    function toEnNumber($input)
    {
        $replace_pairs = array(
            '۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9',
            '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'
        );

        return strtr($input, $replace_pairs);
    }
}

?>
<main>
    <div class="cards">
        <div class="row">
            <?php
            $count=0;
            $args = array(
                'post_type'      => 'vgc',
                'posts_per_page' => 10,
            );
            $loop = new WP_Query($args);
            while ( $loop->have_posts() ) {
                $count++;
                $loop->the_post();
                ?>
                <div class="col-sm-4 col-md-3 col-lg-2">
                    <?php the_title(); ?>
                    <img id="sel<?php echo $count;?>" src="<?php the_post_thumbnail_url(); ?>" alt=""
                     class="sel-picture"    onclick="changeImage(<?php echo $count; ?>)">
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <div class="vgc-form row">
        <div id="preview" class="preview_form col-lg-6">
            <article class="vgc-card">
                <div id="displayPic"  class="pic" style="">
                    <span id="donTxt"></span>
                </div>
            </article>

        </div>

        <div class="inputs_form col-lg-6">
            <div class="card-form">
                <form method="post" class="row g-3">
                    <input id="inputPic" name="img_url" type="hidden" value="">
                    <div class="col-12 d-flex flex-column">
                        <label  class="form-label">انتخاب مبلغ اهدایی</label>
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="vgc-option" id="btnradio1" autocomplete="off" value="50000" >
                            <label class="btn btn-outline-primary" for="btnradio1">50,000 تومان</label>

                            <input type="radio" class="btn-check" name="vgc-option" id="btnradio2" autocomplete="off" value="100000">
                            <label class="btn btn-outline-primary" for="btnradio2">100,000 تومان</label>

                            <input type="radio" class="btn-check" name="vgc-option" id="btnradio3" autocomplete="off" value="200000">
                            <label class="btn btn-outline-primary" for="btnradio3">200,000 تومان</label>

                            <input type="radio" class="btn-check" name="vgc-option" id="btnradio4" autocomplete="off" value="500000">
                            <label class="btn btn-outline-primary" for="btnradio4">500,000 تومان</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <label  class="form-label">مبلغ اهدایی به تومان </label>

                        <input id="don_price_input" type="text" class="form-control" placeholder="لطفا مبلغ را به تومان وارد کنید..." name="vgc-value" required="" oninvalid="this.setCustomValidity('وارد کردن مبلغ الزامی است')"  oninput="setCustomValidity('')">
                        <span id="farsi">.</span>
                    </div>

                    <div class="col-12">
                        <label class="form-label">نام گبرنده</label>
                        <input type="text" class="form-control" name="receivername"   required=""
                               oninvalid="this.setCustomValidity('وارد کردن نام گیرنده الزامی است')"
                               oninput="setCustomValidity('')"/>

                    </div>
                    <div class="col-12">
                        <label  class="form-label">موبایل گیرنده </label>
                        <input type="text" class="form-control" name="receiverphone"  required="" oninvalid="this.setCustomValidity('وارد کردن تلفن الزامی است')"  oninput="setCustomValidity('')">
                    </div>
                    <div class="col-12">
                        <label class="form-label">پیام شما</label>
                        <input type="text" class="form-control" name="message"  />
                    </div>

                    <div class="col-12">
                        <label class="form-label">نام فرستنده</label>
                        <input type="text" class="form-control" name="sendername"   required=""
                               oninvalid="this.setCustomValidity('وارد کردن نام گیرنده الزامی است')"
                               oninput="setCustomValidity('')"/>
                    </div>

                    <div class="col-12">
                        <label  class="form-label">موبایل فرستنده</label>
                        <input type="text" class="form-control" name="senderphone"  required="" oninvalid="this.setCustomValidity('وارد کردن تلفن الزامی است')"  oninput="setCustomValidity('')">
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-theme" name="submit"><i class="fal fa-heart"></i><span class="m-1">پرداخت آنلاین</span></button>
                    </div>
                </form>
                <p class="text-danger"></p>

            </div>

        </div>
    </div>




</main>



