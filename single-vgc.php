<?php
global $wpdb;
global $result;
global $short_url;
$result=0;
global $result_check;
if (isset($_POST['submit'])) {

    $short_url=generateRandomString(5);
    $table = $wpdb->prefix .'vgcshop_orders';
    $result_check=$wpdb->insert($table,
        [
            'price_card' => $_POST['vgc-value'],
            'receiver_name' => $_POST['receivername'],
            'receiver_phone' => $_POST['receiverphone'],
            'message' => $_POST['message'],
            'sender_name' => $_POST['sendername'],
            'sender_phone' => $_POST['senderphone'],
            'card_id' => $_POST['img_url'],
            'code' =>$short_url ,
            'trans_id' => 0,
            'alert' => 0,
            'date_order' => date("Y-m-d h:i:sa"),
            'status' => -2,
        ]);

    if($result_check){
        //successfully inserted.
        $result=1;
    }else{
        //something gone wrong
        $result=0;
    }





    function toEnNumber($input)
    {
        $replace_pairs = array(
            '۰' => '0', '۱' => '1', '۲' => '2', '۳' => '3', '۴' => '4', '۵' => '5', '۶' => '6', '۷' => '7', '۸' => '8', '۹' => '9',
            '٠' => '0', '١' => '1', '٢' => '2', '٣' => '3', '٤' => '4', '٥' => '5', '٦' => '6', '٧' => '7', '٨' => '8', '٩' => '9'
        );

        return strtr($input, $replace_pairs);
    }
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<main>
    <?php if($result==0){ ?>
<!--  new form code multi step-->
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12">
                    <form method="post" id="regForm">
                        <h1 id="register">Donate</h1>
                        <div class="all-steps" id="all-steps"> <span class="step"></span> <span class="step"></span> <span class="step"></span> <span class="step"></span> </div>
                        <div class="tab">
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
                            </div>
                            </div>

                        </div>
                        <div class="tab">
                            <p><input placeholder="First Name" oninput="this.className = ''" name="first"></p>
                            <p><input placeholder="Last Name" oninput="this.className = ''" name="last"></p>
                            <p><input placeholder="Email" oninput="this.className = ''" name="email"></p>
                            <p><input placeholder="Phone" oninput="this.className = ''" name="phone"></p>
                            <p><input placeholder="Street Address" oninput="this.className = ''" name="address"></p>
                            <p><input placeholder="City" oninput="this.className = ''" name="city"></p>
                            <p><input placeholder="State" oninput="this.className = ''" name="state"></p>
                            <p><input placeholder="Country" oninput="this.className = ''" name="country"></p>

                        </div>
                        <div class="tab">
                            <p><input placeholder="Credit Card #" oninput="this.className = ''" name="email"></p>
                            <p>Exp Month
                                <select id="month">
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select></p>
                            <p>Exp Year
                                <select id="year">
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select></p>

                            <p><input placeholder="CVV" oninput="this.className = ''" name="phone"></p>
                        </div>

                        <div class="thanks-message text-center" id="text-message"> <img src="https://i.imgur.com/O18mJ1K.png" width="100" class="mb-4">
                            <h3>Thanks for your Donation!</h3> <span>Your donation has been entered! We will contact you shortly!</span>
                        </div>
                        <div style="overflow:auto;" id="nextprevious">
                            <div style="float:left;"> <button type="button" id="prevBtn" onclick="nextPrev(-1)">قبلی</button> <button type="button" id="nextBtn" onclick="nextPrev(1)">بعدی</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>




<!--old form code-->
    <div class="order">


    <div class="vgc-form row">



            <div class="card-form">
                <form method="post" class="row g-3">


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

    </div>
    <?php } else if($result==1){ ?>
    <div class="result">
        <div class="message">کارت مهربانی شما با موفقیت ثبت شد</div>
        <h3>نمایش کارت</h3>
        <a href="<?php echo home_url();?>/vgc/<?php echo $short_url; ?>" >لینک کارت</a>
    </div>
    <?php } ?>

</main>



