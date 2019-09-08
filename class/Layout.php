<?php

class Layout
{
    protected $css =[];
    protected $js = [];
    protected $companyName = 'Test Company';
    protected $companyDesc =  'Test Description';

    function __construct($companyName=null, $companyDesc = null, $css = null, $js = null)
    {
        $this->setCompanyName($companyName);
        if (!empty($companyDesc)) {
            $this->$companyDesc = $companyDesc;
        }
        if (!empty($css)) {
            $this->addCSS($css);
        }
        if (!empty($js)) {
            $this->addJS($js);
        }
    }

    /**
     * Create the header of the system
     */
    public function header($page = null)
    {
        /**
         * @TODO add favicon
         */
        ?>
            <!DOCTYPE HTML>
            <html lang="en-US">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="description" content="Unicat project">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <?php
                foreach ($this->css as $css){
                    ?><link rel="stylesheet" type="text/css" href="<?= $css ?>"><?php
                }
                ?>
                <title><?=  (isset($page) ? $page : null) ?><?= !empty($this->companyName) ? '-'.$this->companyName : null?></title>
        <?php
        $this->navigationBar();
    }

    /**
     * Create the footer and include the JS needed in the system
     */
    public function footer()
    {
        if (count($this->js) > 0) {
            foreach ($this->js as $js) {
                ?><script src="<?= $js ?>"></script><?php
            }
        }
        ?></body></html><?php
    }

    /**
     * @param $path string / array
     */
    public function addCSS($path)
    {
        if (is_array($path)) {
            foreach ($path as $file) {
                $this->css[] = $file;
            }
        }else{
            $this->css[] = $path;
        }
    }

    /**
     * @param $path string /array
     */
    public function addJS($path)
    {
        if (is_array($path)) {
            foreach ($path as $file) {
                $this->js[] =  $file;
            }
        } else {
            $this->js[] = $path;
        }
    }

    public function loadJS(){
        if(count($this->js)>0){
            foreach ($this->js as $js){
                $html = "<script src='{$js}'></script>";
                print $html;
            }
        }
    }

    /**
     * @param $name string
     */
    public function setCompanyName($name)
    {
        $this->companyName = $name;
    }

    /**
     * @param $desc string
     */
    public function setCompanyDescription($desc)
    {
        $this->companyDesc =  $desc;
    }

    /**
     * @return array
     */
    public function getCSS()
    {
        return $this->css;
    }

    /**
     * @return array
     */
    public function getJS()
    {
        return $this->js;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    public function navigationBar()
    {
        $html = '
        <head>
        <meta charset="UTF-8"> 
        <style>
        .full-img1{    
            max-width: 100%;
            max-height: 150px;
          }
        .full-img2{    
            max-width: 100%;
            max-height: 500px;
          }
          .ad-img
          {   
          margin-left: 10px;
          margin-right: 5px;
          }
           .ad-img2
          {   
          margin-left: 0px;
          margin-right: 10px;
          }
        </style>
     </head>
     
     <body class="size-1520">
        <div class="s-12 m-12 l-12 xl-12 xxl-12">
          <header>

           <div class="line">
              <div class="box">
                <div class="left">
                <div style="width: 80%; margin-top: 5%;">
                        <form  class="customform" method="POST" action="../includes/searchmain.php?page=boardingHouse">
                            <div class="wrap-input100 validate-input m-b-16" style="width: 100%;">
                              <input class="input100" type="text" placeholder="Search Title" name="tags" title="Search form"/>
                              <span class="focus-input100"></span>
                            </div>
                        </form>
                  </div>
                </div>
                 <div class="mid">
                 </div>
                 <div class="right">
                    <div class="margin">
                       <div class="s-12 md-12 l-12">
                          ';
                if(isset($_SESSION["user_id"]))
                {
                echo "<form action='pre-post.php'>";
                }
                else
                {
                echo "<form action='login'>";
                }
        
               $html .= ' <button class="button rounded-btn submit-btn right" type="submit"><i class="icon-sli-flag"></i>Post My AD </button>
                          </form>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <!-- TOP NAV -->  
           <div class="line">
              <nav>
                <p class="nav-text">Menu</p>
                 <div class="top-nav" >
                   <ul class="" style="">
                    <li><a href="index.php"><img src="img/menus/home.png">Home</a></li>
                        <li style="display:inline;"><a href="apartment.php"><img src="img/menus/key2.png">Apartment</a></li>
                        <li style="display:inline;"><a href="boardingHouse.php"><img src="img/menus/key2.png">Boarding House</a></li>
                        <li style="display:inline;"><a href="#"><img src="img/menus/gear.png">Landmarks</a></li>
                        <li style="display:inline;"><a href="#"><img src="img/menus/handshake.png">Reservation</a></li>
                        <li style="display:inline;"> ';
                          if(isset($_SESSION['user_id'])) {
                            $html .= "<a href='includes/logout.php'><img src='img/menus/person12.png'>Sign-out</a>";
                          } else {
                            $html .= "<a href='login'><img src='img/menus/person12.png'>Login</a>";
                          }
               $html .= ' </li> 
                    </ul>
                 </div>
              </nav>
           </div>
        </header>';
        echo $html;
    }
}
