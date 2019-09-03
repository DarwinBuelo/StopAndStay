<?php
class view_ads
{
    const ADS_LOCATION_LEFT = 0; 
    const ADS_LOCATION_RIGHT = 1;
    const ADS_LOCATION_HEADER = 2; 
    public static function viewingAds($conn,$adsLocation)
    {
        $adsql= "SELECT * FROM tbl_ads where ad_stat=1 and ads_location = ".$adsLocation;
        $adres=mysqli_query($conn,$adsql);
        while(!empty($adrow=mysqli_fetch_array($adres)))
        {
            $html = '';
            if($adsLocation != 2){
                echo '<br>';
            }
            $html .= '<div class="ad-img">';
            $html .= '<img src="ads/imgs/'.$adrow['ad_image'].'" alt="">';
            $html .= '</div>';
            echo $html;
            if($adsLocation != 2){
                echo '<br>';
            }
        }
    }
}
//EOF