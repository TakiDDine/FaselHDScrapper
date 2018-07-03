





<form action="" method="post">
    <H3>للحصول على روابط تحميل فيلم</H3>
    <input type="text" name="url" />
    <input type="submit">
    <input type="hidden" name="movie">
</form>



<form action="" method="post">
    <H3>للحصول على روابط تحميل موسم مسلسل</H3>
    <p>مثال لرابط</p>
    <p>https://www.faselhd.com/episodes?serie=36758</p>
    <input type="text" name="url" />
    <input type="submit">
    <input type="hidden" name="serie">
</form>


<?php




ini_set('max_execution_time', 1200);


/* جالب الروابط للتحميل من موقع فاصل اعلاني 
 يتم جلب روابط التحميل مباشرة من رابط الموسم 
على سبيل المثال هذا الرابط 
https://www.faselhd.com/episodes?serie=4274
بكل بساطة نضع الرابط في $base 

*/


if(isset($_POST['movie'])){
    
include_once 'simple_html_dom.php';


                //base url
                $base = $_POST['url'];

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_URL, $base);
                curl_setopt($curl, CURLOPT_REFERER, $base);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                $str = curl_exec($curl);
                curl_close($curl);

                // Create a DOM object
                $html_base = new simple_html_dom();

                // Load HTML from a string
                $html_base->load($str);
        
        
                foreach($html_base->find(".download_direct_link") as $element) {    

                        //base url
                        $base = $element->href;

                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                        curl_setopt($curl, CURLOPT_HEADER, false);
                        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($curl, CURLOPT_URL, $base);
                        curl_setopt($curl, CURLOPT_REFERER, $base);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                        $str = curl_exec($curl);
                        curl_close($curl);

                        // Create a DOM object
                        $html_base = new simple_html_dom();

                        // Load HTML from a string
                        $html_base->load($str);

                        foreach($html_base->find(".other_servers a") as $element) {          
                                echo '<pre>';
                                print_r($element->href);
                                echo '</pre>';
                        } 
                }
        
     
    

    $html_base->clear(); 
    unset($html_base);
}



if(isset($_POST['serie'])) {
    

include_once 'simple_html_dom.php';


    //base url
    $base = $_POST['url'];

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_URL, $base);
    curl_setopt($curl, CURLOPT_REFERER, $base);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $str = curl_exec($curl);
    curl_close($curl);

    // Create a DOM object
    $html_base = new simple_html_dom();

    // Load HTML from a string
    $html_base->load($str);
    
    //get all category links
    foreach($html_base->find(".one-movie .movie-wrap a") as $element) {
        
        
                //base url
                $base = $element->href;

                $curl = curl_init();
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($curl, CURLOPT_URL, $base);
                curl_setopt($curl, CURLOPT_REFERER, $base);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                $str = curl_exec($curl);
                curl_close($curl);

                // Create a DOM object
                $html_base = new simple_html_dom();

                // Load HTML from a string
                $html_base->load($str);
        
        
                foreach($html_base->find(".download_direct_link") as $element) {    

                        //base url
                        $base = $element->href;

                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
                        curl_setopt($curl, CURLOPT_HEADER, false);
                        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($curl, CURLOPT_URL, $base);
                        curl_setopt($curl, CURLOPT_REFERER, $base);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
                        $str = curl_exec($curl);
                        curl_close($curl);

                        // Create a DOM object
                        $html_base = new simple_html_dom();

                        // Load HTML from a string
                        $html_base->load($str);

                        foreach($html_base->find(".other_servers a") as $element) {          
                                echo '<pre>';
                                print_r($element->href);
                                echo '</pre>';
                        } 
                }
        
     
    }

    $html_base->clear(); 
    unset($html_base);
}
