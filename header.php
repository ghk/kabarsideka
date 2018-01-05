<!DOCTYPE HTML>

<html>

<head>
    <title>Kabar Desa</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/css/kabar.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/font-awesome-4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,300i,400,600,600i,700" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.js"></script>
</head>

<body>

    <!-- Header -->
    <header id="header">
        <div class="container">
            <div class="top">
                <div class="logo">
                    <a href="index.html">
                        <img src="<?php echo get_bloginfo('template_directory'); ?>/res/sidekalogo.png">
                        <p>KABAR DESA</p>
                    </a>
                </div>
                <div class="download">
                    <a href="//sideka.id"><i class="fa fa-download"></i> Sideka</a>
                </div>
                <div id="custom-search-input">
					<form role="search" method="get" id="searchform" action="/">
						<div class="input-group">
							<input type="text" class="search-query form-control" placeholder="Cari kabar" name="s" id="s" value="<?php echo get_search_query() ?>"/>
							<span class="input-group-btn">
							<button class="btn btn-danger" type="button">
								<span class=" glyphicon glyphicon-search"></span>
							</button>
							</span>
						</div>
					</form>
                </div>
            </div>

			<?php
				$cat_classes = array();
				$nav_title = "Kabar Desa";
				if(is_category()){
					$category = get_category(get_query_var('cat'));
					$cat_classes[$category->slug] = 'active';
					$nav_title = $category->name;
				}
			?>
            <div id="categories" class="navbar navbar-default " role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><?php echo $nav_title; ?></a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse navbar-menubuilder">
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="/">Beranda</a>
                            </li>
                            <li class='<?php echo $cat_classes['produk']?>'><a href="/kategori/produk">Produk Desa</a>
                            </li>
                            <li class='<?php echo $cat_classes['potensi']?>'><a href="/kategori/potensi">Potensi Desa</a>
                            </li>
                            <li class='<?php echo $cat_classes['dana-desa']?>'><a href="/kategori/dana-desa">Penggunaan Dana Desa</a>
                            </li>
                            <li class='<?php echo $cat_classes['seni-kebudayaan']?>'><a href="/kategori/seni-kebudayaan">Seni dan Kebudayaan</a>
                            </li>
                            <li class='<?php echo $cat_classes['tokoh']?>'><a href="/kategori/tokoh">Tokoh Masyarakat</a>
                            </li>
                            <li class='<?php echo $cat_classes['lingkungan']?>'><a href="/kategori/lingkungan">Lingkungan</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>