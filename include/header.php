<div class="body">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-sm-6 top-bar-left">
                        <ul class="list-unstyled">
                            <li class="hidden-xs">
                                <i class="glyphicon glyphicon-earphone"></i>
                                <?php
                                $query_phone = 'SELECT value FROM tb_information WHERE name = "phone"';
                                $result_phone = mysqli_query($dbc, $query_phone);
                                if( mysqli_num_rows($result_phone) > 0 ) {
                                    extract( mysqli_fetch_array($result_phone, MYSQLI_ASSOC) );
                                    $array_phone = explode(' ', trim($value));
                                    $stt=0;
                                    foreach ($array_phone as  $value) {
                                        if( $stt == 0 ) {
                                            echo "<a>". $value ."</a>";
                                        } elseif ( $stt == 1 ) {
                                           echo " -<a>". $value ."</a>";
                                       } else {
                                        break;
                                    }
                                    $stt++;
                                }
                            }
                            ?>
                        </li>
                        <li class="hidden-xs hidden-sm hidden-md">
                            <i class="glyphicon glyphicon-envelope"></i>
                            <?php
                            $query_email = 'SELECT value FROM tb_information WHERE name = "email"';
                            $result_email = mysqli_query($dbc, $query_email);
                            if( mysqli_num_rows($result_email) > 0 ) {
                                extract( mysqli_fetch_array($result_email, MYSQLI_ASSOC) );
                                $array_email = explode(' ', trim($value));
                                echo  '<a>'. $array_email[0] .'</a>';
                            }
                            ?>

                        </li>
                    </ul>
                </div>
                <div class="col-xs-12 col-sm-6 top-bar-right pull-right">
                    <ul class="list-unstyled">
                        <li class="hidden-xs hidden-sm"><a href="lien-he.php">Liên hệ</a></li>
                        <li class="hidden-xs"><a href="ban-do.php">Bản đồ</a></li>
                        <!-- <li class="hidden-xs"><a href="huong-dan-mua-hang.php">Hướng dẫn mua hàng</a></li> -->
                        <li><a href="gioi-thieu.php">Giới thiệu</a></li>
                       <!--  <li>
                            Chính sách
                            <i class="caret"></i>
                            <div class="info">
                                <a href="chinh-sach-khach-vip.php">Chính sách khách hàng vip</a>
                                <a href="chinh-sach-giao-hang.php">Chính sách giao hàng</a>
                                <a href="chinh-sach-doi-hang.php">Chính sách đổi hàng</a>
                                <a href="chinh-sach-bao-mat.php">Chính sách bảo mật</a>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- kết thúc top-bar -->
</div>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="icon-menu">
                <img src="image/icon/menu.png">
            </div>
            <div class="col-xs-3 logo-header">
                <a href="index.php">
                 <?php
                 $query_logo_header = 'SELECT value FROM tb_information WHERE name = "logo_header"';
                 $result_logo_header = mysqli_query($dbc, $query_logo_header);
                 if( mysqli_num_rows($result_logo_header) > 0 ) {
                    extract( mysqli_fetch_array($result_logo_header, MYSQLI_ASSOC) );
                    echo  '<img src="'. $value .'">';
                }
                ?>   
            </a>
        </div>
        <div class="hidden-xs col-sm-7 menu-header">
            <ul>
                <?php
                $query_category = "SELECT * FROM tb_category WHERE parent_id=0";
                $result_category = mysqli_query($dbc, $query_category);
                kt_query($query_category, $result_category);
                while ($category = mysqli_fetch_array($result_category, MYSQLI_ASSOC)) {
                    ?>
                    <li>
                        <a style="text-transform: uppercase"
                        href="sp-category.php?category=<?php echo $category['id_category']; ?>"><?php echo $category['name_category']; ?></a>
                        <?php
                        $query_category_c = "SELECT * FROM tb_category WHERE parent_id={$category['id_category']}";
                        $result_category_c = mysqli_query($dbc, $query_category_c);
                        kt_query($query_category_c, $result_category_c);
                        if (mysqli_num_rows($result_category_c) > 0) {
                            ?>
                            <div class="item-menu-header">
                                <div class="container">
                                    <div class="row">
                                        <?php
                                        while ($category_c = mysqli_fetch_array($result_category_c, MYSQLI_ASSOC)) {
                                            ?>
                                            <div class="col-sm-3 item-item-menu-header">
                                                <h4>
                                                    <a href="sp-category.php?category=<?php echo $category_c['id_category']; ?>"><?php echo $category_c['name_category'] ?></a>
                                                </h4>
                                                <?php
                                                $query_category_c1 = "SELECT * FROM tb_category WHERE parent_id={$category_c['id_category']}";
                                                $result_category_c1 = mysqli_query($dbc, $query_category_c1);
                                                kt_query($query_category_c1, $result_category_c1);
                                                while ($category_c1 = mysqli_fetch_array($result_category_c1, MYSQLI_ASSOC)) {
                                                    ?>
                                                    <a href="sp-category.php?category=<?php echo $category_c1['id_category'] ?>"><?php echo $category_c1['name_category'] ?></a>
                                                    <br>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>


                                    </div>

                                </div>
                            </div>
                            <?php
                        } 
                        elseif (mysqli_num_rows($result_category_c) == 1) {
                            ?>
                            <ul class="item-product-sp">
                                <?php
                                while ($category_c = mysqli_fetch_array($result_category_c, MYSQLI_ASSOC)) {
                                    ?>
                                    <li>
                                        <a href="sp-category.php?category=<?php echo $category_c['id_category'] ?>"><?php echo $category_c['name_category'] ?></a>
                                    </li>
                                    <?php
                                }
                                ?>

                            </ul>

                            <?php
                        }
                        ?>

                    </li>
                    <?php
                }
                ?>


            </ul>
        </div>
        <div class="col-xs-7 col-sm-2 pull-right icon-header">
           <span class="cart">

            <?php if(isset($_SESSION['cart']) ){ echo '<span class="quantity-cart">'.count($_SESSION['cart']).'</span>';
        }?>

        <a href="thongtingiohang.php" class="cart-cart"><i
           class="glyphicon glyphicon-shopping-cart"></i></a>
           <div class="item-icon-header">
             Đã chọn
             <span class="soluong">
               <?php
               if (isset($_SESSION['cart']) or !empty($_SESSION['cart'])) {
                  $quantity = 0;
                  foreach ($_SESSION['cart'] as $value) {
                      foreach ($value['quantity'] as $soluong) {
                          $quantity += $soluong;
                      }
                  }
                  echo $quantity;
              } else {
                  echo 0;
              }

              ?>
          </span><span class="sanpham"> Sản phẩm </span> trong giỏ hàng
          <hr>
          <?php
          if (isset($_SESSION['cart']) or !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $value) {
                ?>

                <div class="row product-cart" style="padding-top: 10px"
                product="<?php echo $value['id_product']; ?>">
                <div class="col-xs-5 cart-img ">
                    <a href="product.php?id=<?php echo $value['id_product']; ?>">


                        <img class="img-responsive img-thumbnail" src="
                        <?php
                        $img_product = explode(" ", $value['image_thump']);
                        echo $img_product[0];
                        ?>">
                    </a>
                </div>
                <div class="col-xs-7 information-cart" style="padding: 0"
                soluong="<?php
                $quantity = 0;
                foreach ($value['quantity'] as $soluong) {
                   $quantity += $soluong;
               }
               echo $quantity;
               ?>">
               <div class="title-product"><a
                href="product.php?id=<?php echo $value['id_product']; ?>"><?php echo $value['name_product'] ?></a></div>
                <div class="soluong-gia"><span class="soluong-into">
                   <?php
                   $quantity = 0;
                   foreach ($value['quantity'] as $soluong) {
                    $quantity += $soluong;
                }
                echo $quantity;
                ?>

                <span> x </span></span><span
                class="gia"><?php echo $value['saleprice_product'] ?></span>
            </div>
            <div class="delete-product-cart"><i class="glyphicon glyphicon-trash"></i></div>
        </div>
        <hr>
    </div>

    <?php

}
}
?>


</div>
</span>
<span class="search hidden-xs"><i class="glyphicon glyphicon-search"></i>

  <div class="search-icon-header">
    <form action="tim-kiem.php" method="get">
        <input class="form-control" type="text" name="search_header" placeholder="Tìm kiếm">
    </form>
</div>

</span>

</div>
<div class="item-menu hidden-lg hidden-md hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="list">
                    <ul>
                       <?php
                       $query_category = "SELECT * FROM tb_category WHERE parent_id=0";
                       $result_category = mysqli_query($dbc, $query_category);
                       kt_query($query_category, $result_category);
                       while ($category = mysqli_fetch_array($result_category, MYSQLI_ASSOC)) {
                        ?>
                        <li class="title-menu">
                            <a href="sp-category.php?id<?php echo $category['id_category']; ?>"><?php echo $category['name_category'] ?></a>
                            <ul class="item-title-menu">
                               <?php
                               $query_category_c = "SELECT * FROM tb_category WHERE parent_id={$category['id_category']}";
                               $result_category_c = mysqli_query($dbc, $query_category_c);
                               kt_query($query_category_c, $result_category_c);
                               if (mysqli_num_rows($result_category_c) > 1) {
                                while ($category_c = mysqli_fetch_array($result_category_c, MYSQLI_ASSOC)) {

                                    ?>
                                    <li class="title"><h4><a href="sp-category.php?id<?php echo $category_c['id_category']; ?>"><?php echo $category_c['name_category'] ?></a></h4></li>
                                    <?php
                                    $query_category_c1 = "SELECT * FROM tb_category WHERE parent_id={$category_c['id_category']}";
                                    $result_category_c1 = mysqli_query($dbc, $query_category_c1);
                                    kt_query($query_category_c1, $result_category_c1);
                                    while ($category_c1 = mysqli_fetch_array($result_category_c1, MYSQLI_ASSOC)) {
                                        ?>
                                        <li><a href="sp-category.php?id<?php echo $category_c1['id_category']; ?>"><?php echo $category_c1['name_category'] ?></a></li>
                                        <?php 
                                    }
                                    ?>

                                    <?php
                                }
                            }
                            ?>
                                         <!--    <li class="title"><h4><a hef="#">ÁO VEST NAM</a></li>
                                            <li><a href="#">Áo vest nam Hàn Quốc</a></li>

                                            <li class="title"><h4><a hef="#">ÁO THUN NAM</a></h4></li>
                                            <li><a href="#">Áo thun nam có cổ</a></li>
                                            <li><a href="#">Áo thun nam cổ tròn</a></li>
                                            <li><a href="#">Áo nam cổ tim</a></li>
                                            <li><a href="#">Áo thun nam tay dài</a></li>
                                            <li class="title"><h4><a hef="#">ÁO LEN NAM</a></h4></li>
                                            <li><a href="#">Áo len nam Hàn Quốc</a></li>

                                            <li class="title"><h4><a hef="#">ÁO KHOÁC NAM</a></h4></li>
                                            <li><a href="#">Áo khoác nam da</a></li>
                                            <li><a href="#">Áo khoác nam dù</a></li>
                                            <li><a href="#">Áo khoác nam nỉ</a></li>
                                            <li><a href="#">Áo khoác jean nam</a></li>
                                            <li><a href="#">Áo khoác cardigan nam</a></li> -->
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>
                           <!--          <li class="title-menu">
                                        <a href="">QUẦN NAM</a>
                                        <ul class="item-title-menu">
                                            <li class="title"><h4><a hef="#">quần jean nam</a></h4></li>
                                            <li><a href="#">Quần jean skinny</a></li>
                                            <li><a href="#">Quần jean rách nam</a></li>
                                            <li><a href="#">Quần jean ống đứng</a></li>
                                            <li class="title"><h4><a hef="#">quần jogger nam</a></h4></li>

                                            <li class="title"><h4><a hef="#">quần kaki nam</a></h4></li>
                                            <li><a href="#">Quần kaki ống côn</a></li>
                                            <li class="title"><h4><a hef="#">quần tây nam</a></h4></li>
                                            <li><a href="#">Quần tay ống côn</a></li>

                                            <li class="title"><h4><a hef="#">quần short nam</a></h4></li>
                                            <li><a href="#">Quần short jean</a></li>
                                            <li><a href="#">Quần short thun</a></li>
                                            <li><a href="#">Quần short kaki</a></li>
                                        </ul>


                                    </li>
                                    <li class="title-menu">
                                        <a href="">PHỤ KIỆN NAM</a>
                                        <ul class="item-title-menu">
                                            <li class="title"><h4><a hef="#">ví da nam</a></h4></li>
                                            <li><a href="#">Ví da ngang</a></li>
                                            <li><a href="#">Ví da đứng</a></li>
                                            <li><a href="#">Ví da cầm tay</a></li>
                                            <li class="title"><h4><a hef="#">Thắt lưng nam</a></li>

                                            <li class="title"><h4><a hef="#">nón nam</a></h4></li>
                                            <li><a href="#">Nón lưỡi trai</a></li>
                                            <li><a href="#">Nón snapback/a></li>
                                            <li><a href="#">Nón len nam</a></li>
                                            <li class="title"><h4><a hef="#">Cà vạt & nơ</a></h4></li>

                                            <li class="title"><h4><a hef="#">túi sách nam</a></h4></li>
                                            <li><a href="#">Túi đeo chéo nam</a></li>
                                            <li><a href="#">Túi sách tay nam</a></li>
                                            <li><a href="#">Túi sách da nam</a></li>
                                            <li class="title"><h4><a hef="#">ba lô nam</a></h4></li>
                                            <li class="title"><h4><a hef="#">mắt kính nam</a></h4></li>
                                        </ul>

                                    </li>
                                    <li class="title-menu">
                                        <a href="">GIÀY NAM</a>
                                        <ul class="item-title-menu">
                                            <li><a href="">Giày mọi nam</a></li>
                                            <li><a href="">Giày tây nam</a></li>
                                            <li><a href="">Giày boot nam</a></li>
                                            <li><a href="">Giày thể thao nam</a></li>
                                            <li><a href="">Giày thời trang nam</a></li>
                                            <li><a href="">Giày tăng chiều cao nam</a></li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="title-menu"><a href="">KHUYẾN MÃI<span class="hot">Hot</span></a></li> -->
                                </ul>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

</div><!-- kết thúc header -->
<div class="back-to-top"><i class="glyphicon glyphicon-menu-up"></i></div>
<!---->
<div id="themes">Tùy chỉnh</div>

<div id="themeContainer">
    <div class="wrapper-style">
        <h4>Style Selector <i id="close-themes" class="glyphicon glyphicon-chevron-right"></i></h4>
        <div class="oregional-skins">
            <div class="item-oregional-skins">
                <div id="default" class="item-oregional-skins-x"></div>
                <div id="grey" class="item-oregional-skins-x"></div>
                <div id="white" class="item-oregional-skins-x"></div>


                <div id="yellow" class="item-oregional-skins-x"></div>
                <div id="orange" class="item-oregional-skins-x"></div>
                <div id="pink" class="item-oregional-skins-x"></div>
                <div id="brown" class="item-oregional-skins-x"></div>
                <div id="green" class="item-oregional-skins-x"></div>
                <div id="blue" class="item-oregional-skins-x"></div>
                <div id="purple" class="item-oregional-skins-x"></div>
                <div id="#ffaad4" class="item-oregional-skins-x"></div>
                <div id="#ff56aa" class="item-oregional-skins-x"></div>
                <div id="#ff007f" class="item-oregional-skins-x"></div>
                <div id="#bf005f" class="item-oregional-skins-x"></div>
                <div id="#ff00ff" class="item-oregional-skins-x"></div>
                <div id="#bf00bf" class="item-oregional-skins-x"></div>
                <div id="#7f003f" class="item-oregional-skins-x"></div>


                
                <div id="red" class="item-oregional-skins-x"></div>

            </div>
        </div>
        <div class="time">
            <input type="number" id="minutes" value="0"><span id="point">:</span><input type="number" id="seconds" value="0"><span style="color: white;font-weight: bold;margin-left: 2px;">s</span><button id="save-time">Lưu</button>
            <div id="error" style="margin-top: 5px;"></div>

        </div>
    </div>
</div>

<div class="header-bottom hidden-sm hidden-md hidden-lg">
    <div class="container">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="search">
                            <form class="form-search">
                                <input class="form-control" style="" type="text" name="search"
                                placeholder="Từ khóa tìm kiếm">
                                <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
