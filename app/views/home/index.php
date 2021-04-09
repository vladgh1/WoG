<?php global $ROOT; ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Workout Generator</title>
	<link rel="stylesheet" href='<?= $ROOT ?>/public/src/css/style.css'>
</head>

<body>

	<?php include '../public/src/components/header.php'; ?>
	<main class="landing-main--container workout-background-image" style="<?php
	$image = json_decode(file_get_contents($ROOT . '/public/data/landing-page.json'));
	echo 'background-image: linear-gradient(to left, rgba(162, 74, 54, 0.87), #a24a3654), url(' . $image->image . ');'?>">
		<div class="motivational-text--container">
			<h1 class="motivational-text"><?php
				$text = json_decode(file_get_contents($ROOT . '/public/data/landing-page.json'));	
				echo $text->text;
			?></h1>
		</div>
		<div class="infoPanel--container">
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut facilis ea ratione ad ab laboriosam quisquam modi eius at, dignissimos magni, possimus porro molestias magnam assumenda hic placeat fugiat sit.
			Maxime soluta accusamus, minima perferendis nostrum id commodi, laudantium illum atque assumenda magni, nihil error? Dolore, officiis. Labore voluptas nobis voluptates? Delectus et est reprehenderit odio aspernatur nostrum eius totam.
			Eius ut, alias aliquam adipisci maiores mollitia veritatis eligendi, hic temporibus, possimus error! Consequuntur ut nihil enim quos, dolorem suscipit perspiciatis odit aliquam blanditiis cum dolore, officiis minus nobis maxime.
			Laboriosam quae veritatis nobis, vero doloremque rem qui officia magnam similique ratione reiciendis maiores temporibus. Adipisci fugiat esse molestias nisi provident. Pariatur doloribus natus praesentium sequi totam accusamus odio repudiandae!
			Voluptates laborum atque aliquam tempora libero necessitatibus! Excepturi nobis ullam illum dolore optio aperiam in delectus minima nam voluptatum, nesciunt labore quibusdam mollitia voluptates dolorem eaque facere cupiditate iusto? Consequatur.
			Labore incidunt totam mollitia perspiciatis repellat placeat, dolor omnis eveniet magni eos distinctio sit, quos accusantium tempore soluta nesciunt! Iure expedita in eaque atque voluptatem dolorem dignissimos incidunt architecto ipsum.
			Quia excepturi deserunt consectetur. Delectus voluptate pariatur, repellat at perferendis ipsam beatae voluptas, similique provident aspernatur eos. Soluta, repellendus at maxime minus itaque labore minima. Deleniti temporibus quod libero ullam.
			Perferendis fugiat beatae, laudantium alias laborum, iure porro non error voluptates dolor, ipsa tenetur accusantium modi. Pariatur excepturi illo in nihil beatae quos ducimus assumenda itaque, blanditiis maxime, esse saepe?
			Nemo, quaerat quo molestiae provident hic qui eum consequuntur recusandae nihil sequi velit possimus fuga officia. Perspiciatis quasi ipsa enim animi explicabo nesciunt nulla ex porro inventore odit, nisi minima!
			Accusamus autem provident fugit magnam. Magni laborum perspiciatis repudiandae vero velit accusamus dignissimos necessitatibus natus sit numquam vitae, dolor consectetur quae quos est culpa eos voluptate obcaecati sed illo dolorum.
			Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis ipsam vero deleniti quia distinctio officiis ratione! Laudantium ipsa modi rem dignissimos sequi mollitia, ut animi doloribus, porro vitae nobis minus.
			Praesentium ipsum deserunt hic eaque deleniti ea quas in ipsam aliquid placeat eius ab magnam eos, odit delectus? Quod quibusdam quo dolorum quam vitae facilis, dolorem eligendi. Ex, velit tempore.
			Repudiandae ad, eligendi quaerat nihil consectetur minus expedita amet autem ipsum consequuntur temporibus totam vero reiciendis itaque? Distinctio quidem, non saepe amet ratione suscipit magni harum earum accusamus expedita quo.
			Nam laudantium fuga soluta vitae animi delectus expedita earum ipsam reiciendis! In rerum quia alias sapiente soluta commodi temporibus itaque ut, sequi veniam animi assumenda a est enim at sunt.
			Consequatur tempore dicta sunt sequi illo veniam corrupti, voluptas nihil sint, earum excepturi, enim perspiciatis fugit tenetur impedit quos. Consequuntur unde perspiciatis ipsum autem quos deleniti dolorem quaerat praesentium eos.
			Illo dolore nam dignissimos enim possimus voluptatibus molestias, ab ex, expedita blanditiis dolorem neque corrupti consequuntur aspernatur facilis incidunt unde eveniet a maiores inventore esse qui? Excepturi delectus error tempore.
			Ex magnam explicabo magni deleniti rem voluptate eos, provident animi, suscipit, laborum numquam est! Modi beatae sapiente cumque omnis quasi possimus id itaque. Minima molestiae architecto deleniti at nisi accusamus.
			Libero, iste ut quam quia quod placeat aliquam molestias voluptatem architecto, animi quisquam nam dolor. Voluptates praesentium debitis reiciendis! Aliquid minima facere molestias tempora veritatis necessitatibus reprehenderit animi autem natus.
			Illum eligendi iure architecto porro dignissimos, nisi est earum animi velit, neque delectus soluta cumque officiis eveniet! Magni ex corporis, nobis beatae accusantium, dolor nisi accusamus dolorum, numquam vitae deleniti?
			Consectetur debitis fugit itaque quasi libero. Consequuntur soluta, modi mollitia corrupti iusto neque possimus, porro, laudantium laboriosam iure libero accusamus doloremque eligendi omnis maiores dicta odio veritatis numquam amet natus!
			A totam incidunt delectus repellendus! Quaerat consectetur, voluptatem culpa inventore, exercitationem voluptas, fuga numquam natus repellat ab temporibus? Quidem non rerum nesciunt aliquid dicta doloremque error ipsa possimus minus totam!
			Commodi corporis quos incidunt, cupiditate ducimus explicabo quasi eum distinctio aliquid odit placeat eos nemo perspiciatis ipsa? Rem et in expedita, qui deserunt, dolor necessitatibus voluptatem odio reiciendis eaque molestiae.
			Facilis, aliquam? A, assumenda, quod ut quasi harum eveniet inventore obcaecati officia nulla voluptas in, at eos impedit dicta unde eaque ea explicabo ipsa qui facilis consectetur delectus rem. Maiores!
			Modi laborum similique quia corporis eius. Quis nihil nam dignissimos rerum, saepe aperiam! Esse similique accusamus debitis atque eos fuga. Deserunt officia perspiciatis dolores aliquid facilis earum debitis dicta vero.
			Consequatur exercitationem amet adipisci, laudantium minima mollitia, non, illum id repellendus voluptas temporibus? Vel error iure dolorem quod voluptatem hic esse totam, fugiat perferendis adipisci repellendus pariatur nihil iusto officia.
		</div>
	</main>

	<footer>
	</footer>
</body>

</html>