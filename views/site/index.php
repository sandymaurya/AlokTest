<?php
use app\models\TicketModel;
$this->title = "Title";
?>
<!--Buy Starts Here-->
<div class="buy-g" id="buy">
    <div class="container">
        <div class="buy-g-top">
            <h3>
                <span style="font-family:verdana,geneva,sans-serif">
                    <strong>
                        <span style="color:#FF0000"> Vegas Pawn Stars Vip Tour - Rated #1 Tour in Las Vegas by Tour Advisor</span>
                    </strong>
                </span>
            </h3>
        </div>
        <div class="row buy-g-row">
            <div class="col-md-4 buy-g-col">
                <!--Slider 2 Starts Here-->
                <div id="top" class="callbacks_container">
                    <ul class="rslides" id="slider2">
                        <?php
                        $images = $model->getSlider2Images();
                        foreach ($images as $img) {
                            echo(@'<li>
                                    <div class="shirt-slide">
                                        <img alt="" src="' . $img['url'] .
                                '" style="height:' . $img['height'] . 'px; width:' . $img['width'] . 'px"/>
                                    </div>
                                 </li>');
                        }
                        ?>
                    </ul>
                </div>
                <!--Slider 2 Ends Here-->
            </div>
            <?php
            echo $this->render('partials/_buyPartial', ['model' => $model]);
            ?>
            <!-- Tabs -->
        </div>
    </div>
</div>

<!-- Buy Ends Here -->
<?php
    echo $this->render('partials/_savePartial');
    echo $this->render('partials/_featuresPartial');
    echo $this->render('partials/_reviewsPartial');
?>
