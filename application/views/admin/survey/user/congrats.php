
<html>
<head>
	<title>TC Surveys</title>
	<!-- Semantic -->
                    <link href="<?php echo base_url('semantic/components/table.css'); ?>" rel="stylesheet">
                    <link href="<?php echo base_url('semantic/components/modal.css'); ?>" rel="stylesheet">
                    <link href="<?php echo base_url('semantic/css/semantic.css'); ?>" rel="stylesheet">
                    <link href="<?php echo base_url('semantic/css/style.css'); ?>" rel="stylesheet">
                    <link href="<?php echo base_url('dtables/media/css/jquery.dataTables.css'); ?>" rel="stylesheet">
                    <link href="<?php echo base_url('semantic/src/definitions/modules/modal.less'); ?>" rel="stylesheet/less">
                    <link href="<?php echo base_url('semantic/src/definitions/modules/dropdown.less'); ?>" rel="stylesheet/less">
                    <link href="<?php echo base_url('semantic/components/form.css'); ?>" rel="stylesheet/less">
                    <link href="<?php echo base_url('semantic/components/grid.css'); ?>" rel="stylesheet/less">
                    <link href="<?php echo base_url('semantic/components/dropdown.css'); ?>" rel="stylesheet/less">
                    <link rel="stylesheet/less" type="text/css" href="<?php echo base_url('semantic/src/definitions/modules/dropdown.less'); ?>"/>
                    <link rel="icon" type="image/png" href="<?php echo base_url ('semantic/imgs/favicon-16x16.png'); ?>" sizes="16x16">
                    <link rel="icon" type="image/png" href="<?php echo base_url('semantic/imgs/favicon-32x32.png'); ?>" sizes="32x32">
                    <link rel="icon" type="image/png" href="<?php echo base_url ('semantic/imgs/android-chrome-192x192.png'); ?>" sizes="192x192">
                    <meta name="msapplication-TileColor" content="#da532c">
                    <meta name="msapplication-TileImage" content="<?php echo base_url('semantic/imgs/mstile-144x144.png');?>">
                    <meta name="theme-color" content="#ffffff">
			
                    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
                    <script type="text/javascript" src="<?php echo base_url('semantic/js/jquery.js'); ?>"></script>
                    <script type="text/javascript" src="<?php echo base_url('semantic/js/semantic.js'); ?>"></script>
                    <script type="text/javascript" src="<?php echo base_url('semantic/components/modal.js'); ?>"></script>
                    <script type="text/javascript" src="<?php echo base_url('semantic/js/login.js'); ?>"></script>
                    <script type="text/javascript" src="<?php echo base_url('semantic/fullPage/jquery.fullPage.js'); ?>"></script>
                    <script type="text/javascript" src="<?php echo base_url('semantic/fullPage/vendors/jquery.slimscroll.min.js'); ?>"></script>

	
	
	
	
	
	
	
<script type ="text/javascript">
        $(document).ready(function(){

                $('.button').popup({
                            inline   : true,
                            hoverable: true,
                            position : 'bottom center',
                                    delay: {
                                    show: 100,
                                    hide: 50
                                    }
                });
        });
</script>

</head>

    <body>

    <div id="fullpage">

                <div class="section " id="congrats_section">
                            <div class="intro">
                            <h2>Thank you for taking our survey</h2>
                                    
									
                                    <a class="ui large circular red  icon button" id="hm" data-content="TC Surveys Home" href="<?php echo base_url('index.php/user/student');?>"> 
									<i class="home icon" > </i>
									</a>
                                  
                                    <a class="ui large circular facebook icon button" id="fb" data-content="Like us on Facebook"  href="https://www.facebook.com/todayscarolinian" >
                                    <i class="facebook icon" ></i>
                                    </a>

                                    <a class="ui large circular red  icon button" id="tcweb" data-content="Visit the TC Website" href="http://todayscarolinian.net/">
                                    <i class="world icon"></i>
                                    </a>

                                    <a class="ui large circular twitter icon button" id="tw" data-content="Follow us on Twitter" href="https://twitter.com/todaysusc" >
                                    <i class="twitter icon" ></i>
                                    </a>
                            </div>
                </div>


    </div>


    </body>
</html>