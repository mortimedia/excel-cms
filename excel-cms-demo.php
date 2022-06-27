<!doctype html>
<html lang="en-gb">

    <head>
		<title>Nail Salon</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes" />
		<meta http-equiv="x-ua-compatible" content="IE=Edge">
		<meta charset="utf-8">
        
        
        <style>
            * { margin: 0px; padding: 0px; }
            :root {
            --hotpink: #FF277A;
            }
            
            html { font-family: "Open Sans", arial, helvetica, sans-serif; color: #2e2e2e; }
            body { font-size: 1.125rem; }
            body { height: 100%; display: flex; flex-direction: column; text-align: center; }
            body > * { padding: 50px 20px; }
            main { flex: 1; }
            header, footer { background: #eee; }
            
            h2 { font-size: 1.75rem; color: var(--hotpink); }
            ul, li { list-style-type: none; }
            img { display: block; margin: 0 auto; }
            address { line-height: 150%; }
            
            .promo { color: #fff; background: var(--hotpink); padding: 10px; }
            .tagline { margin: 20px 0; font-weight: bold; color: var(--hotpink); }
            ul { max-width: 500px; margin: 20px auto; }
            li { text-align: left; margin-bottom: 10px; }
            .pricelist li.title { border: none; font-weight: bold; flex-direction: column; color: var(--hotpink); }
            .pricelist li.title:nth-child(1n+2) { margin-top: 20px; }
            .pricelist li.title span { display: block; font-weight: normal; padding-bottom: 10px; }
             li:not(.title) span { float: right; text-align: right; }
             li span.notes { width: 100%; text-align: left; font-style: oblique; padding-top: 5px; }
            .socials { display: flex; max-width: 288px; justify-content: space-evenly; margin-top: 30px; }
            
            ul.dotleader li { display: flex; flex-wrap: wrap; }
            ul.dotleader li i { background: radial-gradient(circle, #000 1px, transparent 1px) repeat-x;
                background-size: 12px 2px; background-position: center calc(50% + 2px); flex-grow: 1; margin: 0 10px; }

            .today { font-weight: bold; }
            .opening-special { margin-bottom: 20px; font-style: oblique; }

            <?
            // make todays opening hours bold
            echo '.opening-hours li:nth-child(' . (date("w")+1) . ') { font-weight:bold; }';
            ?>
        </style>
	</head>


    <?
        // open info.xml and get all data into an array
        $siteInfo = simplexml_load_file("info.xml");
        $prices = simplexml_load_file("pricelist.xml");
    ?>
    

	<body>
        <? if (!empty($siteInfo->promotion)) echo '<p class="promo">' . $siteInfo->promotion . '</p>'; ?>
        <header>
            
            <img class="logo" src="images/demo-logo.png" alt="logo: The Nail Salon" width="195" height="134" />
            <? if (!empty($siteInfo->tagline)) echo '<p class="tagline">' . $siteInfo->tagline . '</p>'; ?>
            <address>
                <? echo $siteInfo->address . "<br/>" . $siteInfo->phonenumber; ?>
            </address>
        </header>
        
        
        <main>
            <h2>Pricelist</h2>
            <ul class="pricelist dotleader">
            
            
                <?
                    foreach ($prices as $item) {
                        // get each item tag from pricelist
                        $desc = (trim($item));
                        $price = (string)$item['price'];
                        $notes = (string)$item['notes'];
                        
                        // check for title tags (* at start and end)
                        $isTitle = "";
                        if (substr($desc, 0, 1) == "*" && substr($desc, -1) == "*") $isTitle = ' class="title"';
                        echo "<li {$isTitle}>" . str_replace("*", "", $desc) . "<i></i>";
                        // show price and notes if exist
                        if ($price !== "") echo '<span>' . $price . '</span>';
                        if ($notes !== "") echo "<span class='notes'>{$notes}</span>";
                        echo '</li>' . PHP_EOL;
                    }
                ?>
            </ul>
        </main>
        
        
        <footer>
            <h2>Opening Hours</h2>
            <ul class="opening-hours dotleader">
                <li>Sunday<i></i><span><? echo $siteInfo->sunday; ?></span></li>
                <li>Monday<i></i><span><? echo $siteInfo->monday; ?></span></li>
                <li>Tuesday<i></i><span><? echo $siteInfo->tuesday; ?></span></li>
                <li>Wednesday<i></i><span><? echo $siteInfo->wednesday; ?></span></li>
                <li>Thursday<i></i><span><? echo $siteInfo->thursday; ?></span></li>
                <li>Friday<i></i><span><? echo $siteInfo->friday; ?></span></li>
                <li>Saturday<i></i><span><? echo $siteInfo->saturday; ?></span></li>
            </ul>
            
            <? if (!empty($siteInfo->openingnote)) echo '<p class="opening-special">' . $siteInfo->openingnote . '</p>'; ?>
            
            <? if (!empty($siteInfo->openingnote)) echo '<p class="email"><a href="mailto:' . $siteInfo->contactemail . '">' . $siteInfo->contactemail . '</a></p>'; ?>

            <ul class="socials">
                <? if (!empty($siteInfo->twitter)) echo '<li><a href="https://www.twitter.com/' . $siteInfo->twitter . '"><img class="logo" src="images/twitter.png" alt="logo: Twitter"  width="50" height="50" /></a></li>'; ?>
                
                <? if (!empty($siteInfo->facebook)) echo '<li><a href="https://www.facebook.com/' . $siteInfo->facebook . '"><img class="logo" src="images/facebook.png" alt="logo: Facebook"  width="50" height="50" /></a></li>'; ?>
                
                <? if (!empty($siteInfo->instagram)) echo '<li><a href="https://www.instagram.com/' . $siteInfo->instagram . '"><img 
                class="logo" src="images/instagram.png" alt="logo: Instagram"  width="50" height="50" /></a></li>'; ?>
                
                <? if (!empty($siteInfo->tiktok)) echo '<li><a href="https://www.tiktok.com/' . $siteInfo->tiktok . '"><img class="logo" src="images/tiktok.png" alt="logo: Tiktok"  width="50" height="50" /></a></li>'; ?>
                
                <? if (!empty($siteInfo->youtube)) echo '<li><a href="https://www.youtube.com/c/' . $siteInfo->youtube . '"><img class="logo" src="images/youtube.png" alt="logo: Youtube"  width="50" height="50" /></a></li>'; ?>
            </ul>                
        </footer>
    
    
	</body>
</html>
