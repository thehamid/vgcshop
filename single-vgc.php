<?php
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
<!--           <img id="displayPic" src="" class="pic">-->
            <article class="vgc-card">
                <div id="displayPic"  class="pic" style="">
                    <span id="donTxt">20000 تومان</span>
                </div>
            </article>
            <span id="sender" > حمید عزیز این کارت از طرف غلام برای شماست</span>
        </div>

        <div class="inputs_form col-lg-6">
            <div class="card-form">
                <form method="post" class="row g-3">
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
                        <input type="text" class="form-control" name="recivername"   required=""
                               oninvalid="this.setCustomValidity('وارد کردن نام گیرنده الزامی است')"
                               oninput="setCustomValidity('')"/>

                    </div>
                    <div class="col-12">
                        <label  class="form-label">موبایل گیرنده </label>
                        <input type="text" class="form-control" name="reciverphone"  required="" oninvalid="this.setCustomValidity('وارد کردن تلفن الزامی است')"  oninput="setCustomValidity('')">
                    </div>
                    <div class="col-12">
                        <label class="form-label">پیام شما</label>
                        <input type="text" class="form-control" name="message"  />
                    </div>

                    <div class="col-12">
                        <label class="form-label">نام فرستنده</label>
                        <input type="text" class="form-control" name="recivername"   required=""
                               oninvalid="this.setCustomValidity('وارد کردن نام گیرنده الزامی است')"
                               oninput="setCustomValidity('')"/>
                    </div>

                    <div class="col-12">
                        <label  class="form-label">موبایل فرستنده</label>
                        <input type="text" class="form-control" name="reciverphone"  required="" oninvalid="this.setCustomValidity('وارد کردن تلفن الزامی است')"  oninput="setCustomValidity('')">
                    </div>


                    <div class="col-12">
                        <button type="submit" class="btn btn-theme" name="pay"><i class="fal fa-heart"></i><span class="m-1">پرداخت آنلاین</span></button>
                    </div>
                </form>
                <p class="text-danger"><?php echo $error; ?></p>

            </div>

        </div>
    </div>




</main>



