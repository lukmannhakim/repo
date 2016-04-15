<?php
error_reporting(E_ERROR);
		session_start();
		//	if(!isset($_SESSION[niy]))
							{
								// header("location:login.html");
							}
							
							 define('VALID','1234');
						include "config/config.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
   
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Sistem Informasi Pengelolaan Nilai SMK Minhajut Thullab </title>

    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" href="style.ie6.css" type="text/css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" href="style.ie7.css" type="text/css" media="screen" /><![endif]-->

    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="script.js"></script>
</head>
<body>
<div id="art-page-background-glare">
        <div id="art-page-background-glare-image">
    <div id="art-main">
        <div class="art-sheet">
            <div class="art-sheet-tl"></div>
            <div class="art-sheet-tr"></div>
            <div class="art-sheet-bl"></div>
            <div class="art-sheet-br"></div>
            <div class="art-sheet-tc"></div>
            <div class="art-sheet-bc"></div>
            <div class="art-sheet-cl"></div>
            <div class="art-sheet-cr"></div>
            <div class="art-sheet-cc"></div>
            <div class="art-sheet-body">
                <div class="art-header">
                    <div class="art-header-center">
                        <div class="art-header-png"></div>
                        <div class="art-header-jpeg"></div>
                    </div>
                    <div class="art-logo">
                     <h1 id="name-text" class="art-logo-name"><a href="#">Sistem Informasi Pengelolaan Nilai</a></h1>
                     <h2 id="slogan-text" class="art-logo-text">SMK Minhajut Thullab Muncar</h2>
                     <h3 class="s">Jalan KH Abdul Mannan KM 02 Sumberberas Muncar</h3>
                    </div>
                </div>
                <div class="art-nav">
                	<div class="l"></div>
                	<div class="r"></div>
                	<ul class="art-menu">
                		<table>
                    
                    <?php
					
				$pegawai=	mysql_fetch_assoc(mysql_query("select * from tbl_karyawan where niy='".mysql_real_escape_string($_SESSION[niy])."'"));
				
					$x=1;
					$menu_q=mysql_query("select * from tbl_menu where titik_kait='0' and id_menu!='0' order by id_menu");
					while($menu=mysql_fetch_assoc($menu_q))
					{
						if($x==1)
						{
						?>
                        <tr>
                        <?php
						}
						$x++;
						if($_SESSION[nis]!='')
							{
								$query="select * from tbl_jabatan where id_jab='14'";
							}
else
{						
$query="select * from tbl_jabatan_pegawai where niy='".mysql_real_escape_string($_SESSION[niy])."' and tajar='".mysql_real_escape_string($_SESSION[tajar])."'";
}
						$jab_q=mysql_query($query);
						
												while($jab=mysql_fetch_assoc($jab_q))
						{
						
							if($_SESSION[nis]!='')
							{
						$jab[id_jab]=14;
							
							}
							$num=mysql_num_rows(mysql_query("select * from tbl_hak_akses where id_menu='$menu[id_menu]' and id_jab='$jab[id_jab]'"));
							$num2=mysql_num_rows(mysql_query("select * from tbl_hak_akses where id_menu='$menu[id_menu]' and id_jab='12'"));
							
							if($num>=1  || $num2>=1)
							{
							
						?>	
                                                      
<td><li><a href="<?php if($menu[type_link]=='url') echo $menu[link]; else echo "index.php?action=view&tbl=$menu[link]";?>" class="active"><span class="l"> </span><span class="r"> </span><span class="t"><img class="gmbr" height="30" src="images/<?php echo $menu[icon]
 ?>" /><?php echo $menu[nama_menu];?></span></a>
 <ul>
<?php 
$submenu_q=mysql_query("select * from tbl_menu where titik_kait='$menu[id_menu]'");	

while($submenu=mysql_fetch_assoc($submenu_q))
{ 
if($_SESSION[nis]!='')
							{
						$jab[id_jab]=14;
							}

							$num3=mysql_num_rows(mysql_query("select * from tbl_hak_akses where id_menu='$submenu[id_menu]' and id_jab='$jab[id_jab]'"));
							$num4=mysql_num_rows(mysql_query("select * from tbl_hak_akses where id_menu='$submenu[id_menu]' and id_jab='12'"));
							
							if($num3>=1  || $num4>=1)
							{
?>

 <li>
<a href="<?php if($submenu[type_link]=='url') echo $submenu[link]; else echo "index.php?action=view&tbl=$submenu[link]";?>"><span class="l"> </span><span class="r"> </span><span class="t"><img class="gmbr" height="30" src="images/<?php echo $submenu[icon]
 ?>" /><?php echo $submenu[nama_menu];?> </span></a>
<ul>
<?php
$subsubmenu_q=mysql_query("select * from tbl_menu where titik_kait='$submenu[id_menu]'");	
while($subsubmenu=mysql_fetch_assoc($subsubmenu_q))
{
	$num5=mysql_num_rows(mysql_query("select * from tbl_hak_akses where id_menu='$subsubmenu[id_menu]' and id_jab='$jab[id_jab]'"));
							$num6=mysql_num_rows(mysql_query("select * from tbl_hak_akses where id_menu='$subsubmenu[id_menu]' and id_jab='12'"));
							
							if($num5>=1  || $num6>=1)
							{
?>
<li>
<a href="<?php if($subsubmenu[type_link]=='url') echo $subsubmenu[link]; else echo "index.php?action=view&tbl=$subsubmenu[link]";?>"><span class="l"> </span><span class="r"> </span><span class="t"><?php echo $subsubmenu[nama_menu];?> </span></a></li>
<?php	
							
							}
}
?>
</ul>
</li>
                                                                     
                                    		
<?php	
						}//end while hak akses
}
?>
 </ul> 
 </li>

                                   
                                     <?php echo "</td>";break;
							}
						}
						if($x==10)
						{
						echo '</tr>';
						$x=1;
						}			
					}
					?>
                    
                    </table>
                 
                    </ul>
                </div>
                <div class="art-content-layout">
                    <div class="art-content-layout-row">
                        <div class="art-layout-cell art-content">
                          <div class="art-post">
                              <div class="art-post-body">
                          		<?php
							//error_reporting(1);
			switch($_GET[action])
			{
				case "input" :
			include "include/input_tbl.php";
				break;
				case "view" :
				include "include/tbl.php";
				break;
				case "edit" :
				include "include/input_tbl.php";
				break;
				case "edit_special" :
				include "include/edit_$_GET[tbl].php";
				break;
				case "special" :
				include "include/$_GET[include].php";
				break;
				case "input_special" :
				include "include/input_$_GET[tbl].php";
				break;
				case "delete" :
				include "include/process.php";
				break;
				default:
				include "lib/slider/slider.php";
				break;
				
				
				
				
			}
						
  
												
														?>
                          
                          		<div class="cleared"></div>
                              </div>
                          </div>
                                                  <div class="cleared"></div>
                        </div>
                    </div>
                </div>
                <div class="cleared"></div>
                <div class="art-footer">
                    <div class="art-footer-t"></div>
                    <div class="art-footer-l"></div>
                    <div class="art-footer-b"></div>
                    <div class="art-footer-r"></div>
                    <div class="art-footer-body">
                         <a href="#" class="art-rss-tag-icon" title="RSS"></a>
                        <div class="art-footer-text">
                            <p><a href="http://www.smkminhajutthullab.sch.id">SMK Minhajut Thullab</a><p>Copyright &copy; 2014. All Rights Reserved.</p>
                        </div>
                		<div class="cleared"></div>
                    </div>
                </div>
        		<div class="cleared"></div>
            </div>
        </div>
        <div class="cleared"></div>
        <p class="art-page-footer">Powered by <a href="http://facebook.com/lucmanedogawa">Lukman Hakim</a> and <a href="http://www.artisteer.com/?p=wordpress_themes">SMK Minhajut Thullab IT Team</a>.</p>
    </div>
        </div>
    </div>
    
    
    
    
    
</body>
</html>
<?php
mysql_close();
?>
