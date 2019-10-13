<?php

class Layout
{
    protected $css = [];
    protected $js = [];
    protected $companyName = 'Test Company';
    protected $companyDesc = 'Test Description';

    function __construct($companyName = null, $companyDesc = null, $css = null, $js = null)
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
                foreach ($this->css as $css) {
                    ?><link rel="stylesheet" type="text/css" href="<?= $css ?>"><?php
                }
                ?>
                <title><?= (isset($page) ? $page : null) ?><?= !empty($this->companyName) ? '-'.$this->companyName : null ?></title>
            </head>
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
        } else {
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
                $this->js[] = $file;
            }
        } else {
            $this->js[] = $path;
        }
    }

    public function loadJS()
    {
        if (count($this->js) > 0) {
            foreach ($this->js as $js) {
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
        $this->companyDesc = $desc;
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
        $topLeftButton = '';
        if (!isset($_SESSION['customer_email'])) {
            $topLeftButton = "Welcome: Guest";
        } else {
            $topLeftButton = "Welcome: ".$_SESSION['customer_email']."";
        }
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

           <div id="top"><!-- Top Begin -->

       <div class="container"><!-- container Begin -->

           <div class="col-md-6 offer"><!-- col-md-6 offer Begin -->

               <a href="#" class="btn btn-success btn-sm">
                   '.$topLeftButton.'
               </a>


           </div><!-- col-md-6 offer Finish -->

           <div class="col-md-6"><!-- col-md-6 Begin -->

               <ul class="menu"><!-- cmenu Begin -->
                   <li>
                       <a href="checkout.php">';
        if (isset($_SESSION['user_id'])) {
            $html .= "<a href='includes/logout.php'>Sign-out</a>";
        } else {
            $html .= "<a href='login'>Register | Login</a>";
        }

        $html .= '</a>
                   </li>

               </ul><!-- menu Finish -->

           </div><!-- col-md-6 Finish -->

       </div><!-- container Finish -->

   </div><!-- Top Finish -->

   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->

       <div class="container"><!-- container Begin -->

           <div class="navbar-header"><!-- navbar-header Begin -->

               <a href="index.php" class="navbar-brand home"><!-- navbar-brand home Begin -->

                   <h3 class="hidden-xs">Stop And Stay</h3>
                   <h3 class="visible-xs">Stop And Stay</h3>

               </a><!-- navbar-brand home Finish -->

               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                   <span class="sr-only">Toggle Navigation</span>

                   <i class="fa fa-align-justify"></i>

               </button>

               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                   <span class="sr-only">Toggle Search</span>

                   <i class="fa fa-search"></i>

               </button>

           </div><!-- navbar-header Finish -->

           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->

               <div class="padding-nav"><!-- padding-nav Begin -->

                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->

                       <li class="active">
                           <a href="index.php">Home</a>
                       </li>
                       <li class="active">
                           <a href="boardingHouse.php">Boarding House</a>
                       </li>
                       <li class="active">
                           <a href="apartment.php">Apartment</a>
                       </li>';
        if (isset($_SESSION['user_id'])) {
            if ($_SESSION['role'] == 1) {
                $html .= ' <li class="active">
                           <a href="myAccount.php">My Account</a>
                       </li>';
            }
            $html .= ' <li class="active">
                           <a href="messages.php">Message</a>
                       </li>';
            if ($_SESSION['role'] == 1) {
                $html .= ' <li class="active">
                           <a href="manageProp.php">My Properties</a>
                       </li>';
            }
        }

        $html .= '<li class="active">
                           <a href="#">Contact Us</a>
                       </li>

                   </ul><!-- nav navbar-nav left Finish -->

               </div><!-- padding-nav Finish -->';

        if (isset($_SESSION["user_id"])) {
            if ($_SESSION['role'] == 1) {
                $html .= '<a href="pre-post.php" class="btn navbar-btn btn-primary right">';
            }
        } else {
            $html .= '<a href="login" class="btn navbar-btn btn-primary right">';
        }
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 1) {
                $html .= '<span style="color: #ffffff">Post my Ads</span>';
            }
        } else {
            $html .= '<span style="color: #ffffff">Post my Ads</span>';
        }
        $html .= '</a><div class="navbar-collapse collapse right">
               </div><!-- navbar-collapse collapse right Finish -->
           </div><!-- navbar-collapse collapse Finish -->
       </div><!-- container Finish -->
   </div><!-- navbar navbar-default Finish -->
        </header>';
        echo $html;
    }
}