<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="renderer" content="webkit">
    <title><?php echo $site['title'];?></title>
    <meta name="keywords" content="<?php echo $site['keywords'];?>">
    <meta name="description" content="<?php echo $site['description'];?>">
	<!--[if lt IE 9]><script>window.location.href='http://www.ifeiwu.com/ie-browser-upgrade.html';</script><![endif]-->
	<link rel="apple-touch-icon" href="<?php echo $this->url('data/apple-touch-icon.png');?>">
    <link rel="icon" type="image/png" href="<?php echo $this->url('data/favicon.png');?>">
    	
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/reset.css');?>">
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/swiper.css');?>">
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/animate.css');?>">
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/main.css');?>">
    <?php if ($site['skin']):?>
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/skin/'.$site['skin'].'.css');?>">
    <?php endif;?>
    <?php if ($site['style']):?>
    <link rel="stylesheet" href="<?php echo $this->url('asset/css/'.$site['style'].'.css');?>">
	<?php endif;?>
		
	<script>
	var items = '<?php echo json_encode($items);?>',
	    swiper_options_custom={
	        autoplay: parseInt('<?php echo $site['swiper_autoplay'];?>'),
	        speed: parseInt('<?php echo $site['swiper_speed'];?>'),
	        effect: '<?php echo $site['swiper_effect'];?>',
	        direction: 'horizontal'
	    };
	</script>
	<script src="<?php echo $this->url('asset/js/jquery.js');?>"></script>
	<script src="<?php echo $this->url('asset/js/swiper.js');?>"></script>
	<script src="<?php echo $this->url('asset/js/main.js');?>"></script>
</head>
<body>

	<div class="container">
	    <?php if ($site['logo']):?>
	    <a class="logo">
	    	<img src="<?php echo $this->url('data/'.$site['logo']);?>">
	    </a>
	    <?php endif;?>
	
	    <div id="bgcolor"></div>
	
	    <div id="clone"></div>
	
	    <div class="swiper-container animated">
	        <div class="swiper-wrapper">
	            <?php
				foreach($items as $i=>$item):
	                $image_path = $item['image_path'];
	                $image = $item['image'];
					$utime = $item['utime'];
	            ?>
	            <div class="swiper-slide" data-path="<?php echo $image_path;?>" data-image="<?php echo $image;?>" data-bgcolor="<?php echo $item['bgcolor'];?>" data-utime="<?php echo $utime;?>" data-hash="slide<?php echo $i;?>">
	                <img data-src="<?php echo $this->url($image_path.'/'.$image, $utime);?>" class="swiper-lazy">
	                <div class="swiper-lazy-preloader"></div>
	                <article>
	                    <?php if ($item['title']):?>
	                    <h1 class="animated" style="<?php echo $item['title_color']?'color:'.$item['title_color']:'';?>"><?php echo $item['title'];?></h1>
	                    <?php endif;?>
	                    <?php if ($item['summary']):?>
	                    <p class="animated" style="<?php echo $item['summary_color']?'color:'.$item['summary_color']:'';?>"><?php echo $item['summary'];?></p>
	                    <?php endif;?>
	                    <?php if ($item['url']):?>
	                    <a href="<?php echo $item['url'];?>" target="<?php echo $item['url_target'];?>" style="<?php echo $item['url_title_color']?'color:'.$item['url_title_color']:'';?>" class="animated"><?php echo $item['url_title'];?></a>
	                    <?php endif;?>
	                </article>
	            </div>
	            <?php endforeach;?>
	        </div>
	    </div>
	    <div class="swiper-pagination"></div>
	</div>
	
	<?php
	if ($site['stats_open'] == 1)
	{
		$squery = http_build_query(array(
				'r'=>$this->request->root(),
				'm'=>$site['stats_much'],
				'u'=>$site['stats_unit'],
				'd'=>$site['stats_date']
			)
		);
		
		echo '<script src="' . $this->url('asset/js/stats.js?' . $squery) . '"></script>';
	}
	
	if ($site['stats3_open'] == 1) { echo $this->decode($site['stats3_code']); }
	?>
	
</body>
</html>
