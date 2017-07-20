<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<? $_SERVER['DOCUMENT_ROOT'] ?>/img/favicon.png">
	<meta property="og:title" content="Технокровля Куртамыш">
	<meta property="og:description" content="Строительный рынок №1 в Куртамыше. Стройматериалы, крепёж, товары для дома, сада и огорода, банные печи, покрытия пола, инструмент и многое другое. Доставка, скидки.">
	<meta property="og:type" content="website">
	<meta property="og:url" content="http://kurt.techno-krovlya.ru/">
	<meta property="og:image" content="http://kurt.techno-krovlya.ru/img/ogimage.jpg">
	<link rel="stylesheet" href="<? $_SERVER['DOCUMENT_ROOT'] ?>/css/libs.min.css?v=1">
	<link rel="stylesheet" href="<? $_SERVER['DOCUMENT_ROOT'] ?>/css/main.css?v=1">
	<link rel="apple-touch-icon" href="<? $_SERVER['DOCUMENT_ROOT'] ?>/img/apple-touch-icon.png">
	<title>Строительный рынок №1 в Куртамыше | Технокровля</title>
	<meta name="description" content="Узнайте цены на стройматериалы (профлист, труба, цемент и др), крепёж, товары для дома, банные печи, покрытия пола, инструмент. Доставка, скидки. Заходите!">
	<meta keywords="технокровля, куртамыш, купить, стоимость">
</head>
<body>

<?
function db_result_to_array($query)
	{
		$res_array = array();
		$count = 0;
		while($row = mysqli_fetch_array($query))
		{
			$res_array[$count] = $row;
			$count++;
		}
		return $res_array;
	}

function get_products()
	{
		$db = mysqli_connect('localhost', 'u12655_kurt', 'shop', 'u12655_shop');
		mysqli_query($db, "SET CHARSET UTF8");
		$query = mysqli_query($db, "SELECT products.prod_id, products.prod_img_folder, products.prod_img_name, products.prod_img_is_vertical, products.prod_name, products.prod_description, products.prod_unit, products.prod_price, products.prod_unit_0, products.prod_price_0, products.prod_dimensions, products.prod_information, products.prod_is_new, products.prod_superprice, products.prod_superprice_date, products.cat_name, categories.cat_id FROM products, categories WHERE products.cat_name = categories.cat_name ORDER BY products.prod_is_new DESC");
		$result = db_result_to_array($query);
		return $result;
	}

function get_managers()
	{
		$db = mysqli_connect('localhost', 'u12655_kurt', 'shop', 'u12655_shop');
		mysqli_query($db, "SET CHARSET UTF8");
		$query = mysqli_query($db, "SELECT * FROM managers");
		$result = db_result_to_array($query);
		return $result;
	}

function get_menu()
	{
		$db = mysqli_connect('localhost', 'u12655_kurt', 'shop', 'u12655_shop');
		mysqli_query($db, "SET CHARSET UTF8");
		$query = mysqli_query($db, "SELECT `cat_id`,`cat_name`,`cat_description`,`cat_order`,`cat_newprod_count` FROM `categories` ORDER BY `cat_order` ASC");
		$result = db_result_to_array($query);
		return $result;
	}

$products = get_products();
$menu = get_menu();
?>

	<nav>
		<div class="nav-logo" onclick="$('[class *= cat-]').removeClass('product-hidden');"><?php include ($_SERVER['DOCUMENT_ROOT'].'/img/svg/logo.svg'); ?></div>
		<div class="nav-description">Строительный рынок в Куртамыше, ул. Лесная, 1<br>9:00-17:00 по будням, 9:00-14:00 сб-вс</div>

		<div class="nav-menu-icon" onclick="$('#dropdown-menu').toggleClass('dropdown-menu-visible')"><?php include ($_SERVER['DOCUMENT_ROOT'].'/img/svg/menu-icon.svg'); ?>
		</div>
		<a href="tel:+79225650008" class="nav-call-button" onclick="yaCounter35253215.reachGoal('call-button'); return true;">Позвонить</a>

		<div class="nav-iconset">
			<div class="nav-map-icon" onclick="$('#map').addClass('flex-popup')">
				<div class="icon"><?php include ($_SERVER['DOCUMENT_ROOT'].'/img/svg/map.svg'); ?></div>
				<div class="desc">Схема<br>проезда</div>
			</div>
			<div class="nav-callback-icon" onclick="$('#callback').addClass('flex-popup')">
				<div class="icon"><?php include ($_SERVER['DOCUMENT_ROOT'].'/img/svg/callback.svg'); ?></div>
				<div class="desc">Обратный<br>звонок</div>
			</div>
			<div class="nav-odnoklassniki-icon" onclick="location.href='https://ok.ru/tehnokrovla';">
				<div class="icon"><?php include ($_SERVER['DOCUMENT_ROOT'].'/img/svg/odnoklassniki.svg'); ?></div>
				<div class="desc">Группа<br>в соцсетях</div>
			</div>
		</div>

		<div class="nav-telephone">8 922 565-00-08</div>
	</nav>

	<div class="dropdown-menu" id="dropdown-menu" ondblclick="$('#dropdown-menu').removeClass('dropdown-menu-visible')">
		<div class="categories">
			<div class="caption">Категории:</div>
			<?php foreach($menu as $item): ?>
					<a onclick="$('[class *= cat-]').addClass('product-hidden'); $('.cat-<?=$item['cat_id']?>').removeClass('product-hidden'); $('#dropdown-menu').removeClass('dropdown-menu-visible')"" title="<?=$item['cat_description']?>" href="#<?=$item['cat_id']?>">
						<?=$item['cat_name']?>
						<? if($item['cat_newprod_count'] != 0) {?><span class="newprod_count">+<?=$item['cat_newprod_count']?></span><?}?>
					</a>
			<? endforeach; ?>
		</div>
		<div class="contacts">
			<div class="telephones">
				<div class="shop-name">Технокровля</div>
				<div class="shop-telephone">8 922 565-00-08</div>
				<div class="shop-name">Крепёж</div>
				<div class="shop-telephone">8 922 561-25-55</div>
				<div class="shop-name">Баня/сауна</div>
				<div class="shop-telephone">8 922 561-27-77</div>
				<div class="shop-name">Интерьер</div>
				<div class="shop-telephone">8 922 565-00-08</div>
				<div class="shop-name">Дом-сад-огород</div>
				<div class="shop-telephone">8 908 005-61-66</div>
			</div>
			<div class="address">
				<div class="contacts-icon"><?php include ($_SERVER['DOCUMENT_ROOT'].'/img/svg/map.svg'); ?></div>
				<span>Куртамыш, Лесная, 1</span>
			</div>
			<div class="opening-hours">
				<div>9:00&mdash;17:00 пн-пт</div>
				<div>9:00&mdash;14:00 сб-вс</div>
			</div>
			<div class="mail">
				tehnokrovla-kurtamysh<span class="at"></span>mail.ru
			</div>
		</div>
	</div>

			
	<section class="shop" id="shop">
		<div class="wrapper flex">

			<? foreach($products as $item): ?>

			<div id="product-<?=$item['prod_id']?>" class="product cat-<?=$item['cat_id']?> <? if($item['prod_superprice'] != 0) echo 'product-superprice'?>">
				<div class="img product-img <? if($item['prod_img_is_vertical'] != 0) echo 'product-img-vertical'?>"><a href="img/products/<?=$item['prod_img_folder']?>/<?=$item['prod_img_name']?>.jpg" class="image-link"><img src="img/products/<?=$item['prod_img_folder']?>/<?=$item['prod_img_name']?>.jpg" alt="<?=$item['prod_name']?>"></a></div>
				<h3 <? if($item['prod_is_new'] != 0) { ?> class="prod-is-new" <?}?> ><?=$item['prod_name']?></h3>
				<p><?=$item['prod_description']?></p>
				<? if($item['prod_dimensions'] != '') { ?>
					<p class="dimensions"><img class="prod-desc-svg-icon" src="img/svg/dimensions.svg" alt="icon">
					<?=$item['prod_dimensions']?></p>
				<?}?>
				<? if($item['prod_information'] != '') { ?>
					<p class="information"><img class="prod-desc-svg-icon" src="img/svg/information.svg" alt="icon">
					<?=$item['prod_information']?></p>
				<?}?>
				<!-- ЗДЕСЬ ОБЫЧНАЯ ЦЕНА, без акции -->
				<? if($item['prod_superprice'] == 0.00) {?>
					<div class="product-price">
						<div class="price">
							<div class="caption"><?=$item['prod_unit']?></div>
							<div class="cost"><?=$item['prod_price']?></div>
						</div>
						<div class="button-place">
							<button data-product="<?=$item['prod_name']?> - <?=$item['prod_price']?> руб." onclick="
								$('#order').addClass('flex-popup'); 
								$('#product-name').attr('value', $(this).attr('data-product')); 
								$('.manager').hide();
								$('.manager[data-cat *= \'<?=$item['cat_name']?>\']').show();
								">Заказать</button>
						</div>
					</div>
					<? if($item['prod_price_0'] != 0.00) {?>
						<div class="product-price">
							<div class="price">
								<div class="caption"><?=$item['prod_unit_0']?></div>
								<div class="cost"><?=$item['prod_price_0']?></div>
							</div>
							<div class="button-place">
								<button data-product="<?=$item['prod_name']?> - <?=$item['prod_price_0']?> руб." onclick="
								$('#order').addClass('flex-popup'); 
								$('#product-name').attr('value', $(this).attr('data-product')); 
								$('.manager').hide();
								$('.manager[data-cat *= \'<?=$item['cat_name']?>\']').show();
								">Заказать</button>
								
							</div>
						</div>
					<?}?>
				<?}?>
			<!--Это акционная сниженная цена-->
				<? if($item['prod_superprice'] != 0.00) {?>
				<div class="product-price">
					<div class="price">
						<div class="caption"><?=$item['prod_unit']?></div>
						<div class="cost-striked"><?=$item['prod_price']?></div>
						<div class="cost-special"><?=$item['prod_superprice']?></div>
					</div>
					<div class="button-place">
						<button data-product="<?=$item['prod_name']?> - <?=$item['prod_superprice']?> руб." onclick="
								$('#order').addClass('flex-popup'); 
								$('#product-name').attr('value', $(this).attr('data-product')); 
								$('.manager').hide();
								$('.manager[data-cat *= \'<?=$item['cat_name']?>\']').show();
								">Заказать</button>
					</div>
				</div>

				<?}?>

				<? if($item['prod_superprice_date'] != '') { ?>
					<p class="superprice-date"><img class="prod-desc-svg-icon" src="img/svg/promo.svg" alt="icon">
					Акция действует до: <?=$item['prod_superprice_date']?></p>
				<?}?>

			</div>

		<? endforeach; ?>

		</div>
	</section>
	
	<section class="additional-services">
		<div class="as">
			<div class="as-icon"><?php include ($_SERVER['DOCUMENT_ROOT'].'/img/svg/list.svg'); ?></div>
			<div class="as-desc">
				<div class="as-desc-caption"><a href="<?$_SERVER['DOCUMENT_ROOT']?>/pages/delivery.php">Доставка</a></div>
				<div class="as-desc-text">от 300 рублей</div>
			</div>
		</div>
		<div class="as">
			<div class="as-icon"><?php include ($_SERVER['DOCUMENT_ROOT'].'/img/svg/dumbbell.svg'); ?></div>
			<div class="as-desc">
				<div class="as-desc-caption">Разгрузка</div>
				<div class="as-desc-text">300 рублей</div>
			</div>
		</div>
	</section>


	<footer>
		<div class="footer-left-column">
			<div class="video">
				<iframe src="https://www.youtube.com/embed/DKsMNSS2sBs" frameborder="0" allowfullscreen></iframe>
			</div>
		</div>
		<div class="footer-right-column">
			<h2>Строительный рынок Технокровля в Куртамыше &mdash; всё в одном месте</h2>
			<p>Профнастил, металлочерепица, сайдинг виниловый и металлический, утеплитель &laquo;Изба&raquo;, KNAUF, техноплекс, гидро-ветроизоляция
			пароизоляция, рубероид, биполь, джут, грунтовка, серпянка, штукатурка, шпаклевка гипсовая и финишная. Цемент ПЦ-400 и ПЦ-500, кирпич силикатный облицовочный, шамотный, печной.	Шифер плоский и 8-волновый.	Гипсокартон, фанера, ДСП, ДВП, ОСП. Труба профильная, уголок, арматура, швеллер, лист плоский. Трубы печные, выходы вентиляционные, водосточные системы (пластиковые и металлические). Тротуарная плитка, кольца ж/б для септиков</p>
			<p>Кованые ворота, козырьки, теплицы, мангалы, оградки, качели, скамейки, беседки, палисад, печи</p>
	
			<h4>&laquo;Крепёж&raquo;</h4>
			<p>Метизы, такелаж, отрезные круги, перфорация, ручной инструмент, замки, монтажная пена, герметик, перчатки и др.</p>
			
			<h4>&laquo;Интерьер&raquo;</h4>
			<p>Линолеум, панели ПВХ, плинтуса, стеновые панели, уголки</p>
			
			<h4>&laquo;Дом/сад/огород&raquo;</h4>
			<p>Мотокультиваторы, триммеры, сварочные инверторы и маски, электроды, водонагреватели, сантехника, батареи, унитазы, раковины, фитинги, трубы, электроинструмент, компрессоры, бетоносмесители, инструмент для сада и огорода.</p>
			
			<h4>&laquo;Баня/сауна&raquo;</h4>
			<p>Теплушки, двери, доска пола, плитка фасадная, сухие жаростойкие смеси, эмали, банные печи, котлы, дымоходы, терракотовая плитка, банные камни, принадлежности для сауны, банные двери, окна, вагонка и т.д.</p>

			<p>Монтаж кровли, фасада. Доставка, разгрузка, оплата на месте. Кредит, рассрочка без переплаты. Монтаж кровли, фасада, ворот. Консультация. Договор, гарантия, сервис. Мы официальные представители и партнеры заводов «Металл Профиль», «Союз Профиль», «Технониколь», «Велюкс», Shinglas. Быстрая работа с рекламациями.</p>
			<p><em>Сайт носит информационный характер и не является публичной офертой. Технокровля, 2017</em></p>

			<p>Отправляя форму, Вы соглашаетесь с <a href="<?$_SERVER['DOCUMENT_ROOT']?>/pages/politics.php" rel="nofollow" target="_blank">политикой конфиденциальности</a></p>
		</div>
	</footer>
	
	<section>
		<div class="popup" id="order">
			<div class="inner">
				<div class="close-button" onclick="$('#order').removeClass('flex-popup')">&times;</div>
				<div class="caption">Оформить заказ</div>
				<form action="mailer.php" method="post" onsubmit="yaCounter35253215.reachGoal('goal-order'); return true;">
					<input required type="text" id="product-name" value="Название товара" name="product" readonly>
					<input required type="text" placeholder="Имя" name="name">
					<input required type="text" placeholder="Телефон или эл. почта" name="telephone" required>
					<input type="submit" value="Отправить">
				</form>
				<div class="politics">
					Отправляя форму, Вы соглашаетесь с <a href="<?$_SERVER['DOCUMENT_ROOT']?>/pages/politics.php" rel="nofollow" target="_blank">политикой конфиденциальности</a>
				</div>
				<!--<div class="yourmanager">
					<div class="caption-managers">Менеджеры</div>
					<? foreach($managers as $item): ?>
					<div class="manager" data-cat="<?=$item['manager_category']?> <?=$item['manager_category_0']?> <?=$item['manager_category_1']?> <?=$item['manager_category_2']?>">
						<div class="photo">
							<img src="img/managers/<?=$item['manager_img']?>.jpg" alt="<?=$item['manager_name']?>">
						</div>
						<div class="information">
							<div class="name"><?=$item['manager_name']?></div>
							<div class="telephone"><?=$item['manager_telephone']?></div>
							<div class="social"><?=$item['manager_social_link']?></div>
						</div>
					</div>
					<? endforeach; ?>

				</div>-->
			</div>
		</div>
				
		<div class="popup" id="callback">
			<div class="inner">
				<div class="close-button" onclick="$('#callback').removeClass('flex-popup')">&times;</div>
				<div class="caption">Обратный звонок</div>
				<form action="mailer.php" method="post" onsubmit="yaCounter35253215.reachGoal('goal-callback'); return true;">
					<input required type="text" placeholder="Имя" name="name">
					<input required type="text" placeholder="Телефон" name="telephone" required>
					<textarea name="product" rows="3">Ваш вопрос</textarea>
					<input type="submit" value="Отправить">
					Отправляя форму, Вы соглашаетесь с <a href="<?$_SERVER['DOCUMENT_ROOT']?>/pages/politics.php" rel="nofollow" target="_blank">политикой конфиденциальности</a>
				</form>
			</div>
		</div>

		<div class="popup" id="map">
			<div class="inner">
				<div class="close-button" onclick="$('#map').removeClass('flex-popup')">&times;</div>
				<div class="caption">Схема проезда</div>
				<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3ANsIY9-puYqtAkTL_S39aId-JzBaUFHnd&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
			</div>
		</div>

	</section>

<!-- JSON-LD -->
<script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "Home Goods Store",
  "name": "Технокровля Куртамыш",
  "url": "kurt.techno-krovlya.ru",
  "logo": "kurt.techno-krovlya.ru/img/logo.jpg",
  "image": "kurt.techno-krovlya.ru/img/image.jpg",
  "description": "Строительный рынок №1 в Куртамыше. Товары для дома, бани, огорода. Стройматериалы, кованые изделия.",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "ул. Лесная, 1",
    "addressLocality": "Куртамыш",
    "addressRegion": "Курганская область",
    "addressCountry": "Россия"
  },
  "hasMap": "https://yandex.ru/maps/20683/kurtamysh/?whatshere%5Bpoint%5D=64.429966%2C54.934014&whatshere%5Bzoom%5D=17&mode=whatshere",
  "openingHours": "Mo 09:00-17:00 Tu 09:00-17:00 We 09:00-17:00 Th 09:00-17:00 Fr 09:00-17:00 Sa 09:00-14:00",
  "contactPoint": {
    "@type": "PostalAddress",
    "telephone": "89225650008"
  }
}
</script>

<script src="js/libs.min.js"></script>

<script type="text/javascript"> 
	if (navigator.userAgent.indexOf('Safari') != -1 && 
	    navigator.userAgent.indexOf('Chrome') == -1) {
	        document.body.className += " safari";
	    }
</script>
<script>
	$(document).ready(function() {
	  $('.image-link').magnificPopup({type:'image'});
	});
</script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter35253215 = new Ya.Metrika({
                    id:35253215,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/35253215" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->


</body>
</html>