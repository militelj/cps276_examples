<?php/* * @author scottshaper */class MasterPage{     private $title ="";	 	 public function __construct($title="basic page")    {        $this->title = $title;    }    public function docType()    {        $docType = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head>';        return $docType;    }    public function metaData()    {        $metaData = '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta name="Author" content="Scott Shaper" /><meta name="description" content="Learning PHP and MySQL" /><meta name="keywords" content="PHP, MySQL" /><meta name="Language" content="english" /> ';        return $metaData;    }    public function title()    {        $title = '<title>'.$this->title.'</title>';        return $title;    }		public function headerText()	{		$headertxt = "<h1>WEB 250</h1>";		return $headertxt;		}		//to be move to local page on part two discussion	public function navBar()	{		$navBar = '<ul><li><a href="index.php">Home Page</a></li></ul>';		return $navBar;		}		public function css()	{		//change to make more global.                $css = '<link href="admin/css/main.css" rel="stylesheet" type="text/css" />';		return $css;		}		public function footer()	{		$footer = '<div id="footer">Scott Shaper<span class="rightFooter">inp261 &copy; 2011</span></div>';		return $footer;		}}?>