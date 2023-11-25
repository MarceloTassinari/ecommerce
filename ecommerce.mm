<map version="1.0.1">
<!-- To view this file, download free mind mapping software FreeMind from http://freemind.sourceforge.net -->
<node CREATED="1697921990254" ID="ID_1540225222" MODIFIED="1700268636275" TEXT="c:\ecommerce">
<node CREATED="1697922091175" ID="ID_1293179688" MODIFIED="1700268643734" POSITION="right" TEXT="index.php">
<node CREATED="1699656808947" ID="ID_1292266980" MODIFIED="1699656821046" TEXT="session_start"/>
<node CREATED="1697922127014" ID="ID_973768055" MODIFIED="1697922134058" TEXT="require_once(&quot;vendor/autoload.php&quot;);">
<node CREATED="1700273339297" ID="ID_546716022" MODIFIED="1700274039850" TEXT="carrega o arquivo c:/ecommerce/vendor/autoload.php&#xa;o c&#xf3;digo herda o escopo de vari&#xe1;veis da linha que a inclus&#xe3;o ocorrer"/>
</node>
<node CREATED="1699657239710" ID="ID_419025672" MODIFIED="1700274299328" TEXT="use \Slim\Slim; (=C:\ecommerce\vendor\slim\slim\index.php)"/>
<node CREATED="1697922168438" ID="ID_1481006146" MODIFIED="1697922174720" TEXT="use \Hcode\Page;"/>
<node CREATED="1697922175758" ID="ID_458473056" MODIFIED="1697922182774" TEXT="use \Hcode\PageAdmin;"/>
<node CREATED="1697922183686" ID="ID_1488327933" MODIFIED="1697922193218" TEXT="use \Hcode\Model\User;"/>
<node CREATED="1700173130131" ID="ID_540788267" MODIFIED="1700173131302" TEXT="use \Hcode\Model\Category;"/>
<node CREATED="1697922213935" ID="ID_505039279" MODIFIED="1700269831970" TEXT="use \Slim\Slim;&#xa;$app = new Slim();">
<node CREATED="1697922370440" ID="ID_1044552232" MODIFIED="1697922371221" TEXT="$app-&gt;config(&apos;debug&apos;, true);"/>
<node CREATED="1697922425022" ID="ID_1554900566" MODIFIED="1697922427366" TEXT="$app-&gt;get(&apos;/&apos;, function()">
<node CREATED="1697922433983" ID="ID_1578890067" MODIFIED="1697922434764" TEXT="$page = new Page();">
<node CREATED="1697922445311" ID="ID_195607423" MODIFIED="1697922445982" TEXT="$page-&gt;setTpl(&quot;index&quot;);"/>
</node>
</node>
<node CREATED="1697922480863" ID="ID_1270316990" MODIFIED="1697922483566" TEXT="$app-&gt;get(&apos;/admin&apos;, function()">
<node CREATED="1697922491686" ID="ID_1021003170" MODIFIED="1697922492373" TEXT="$page = new PageAdmin();">
<node CREATED="1697922497983" ID="ID_501131211" MODIFIED="1697922498576" TEXT="$page-&gt;setTpl(&quot;index&quot;);"/>
</node>
</node>
<node CREATED="1697922511654" ID="ID_285553747" MODIFIED="1697922544086" TEXT="$app-&gt;get(&apos;/admin/login&apos;, function()">
<node CREATED="1697922520047" ID="ID_477856491" MODIFIED="1697922520703" TEXT="$page = new PageAdmin([">
<node CREATED="1697922529246" ID="ID_622844473" MODIFIED="1697922529949" TEXT="$page-&gt;setTpl(&quot;login&quot;);"/>
</node>
</node>
<node CREATED="1697922541383" ID="ID_1705043290" MODIFIED="1697922541945" TEXT="$app-&gt;post(&apos;/admin/login&apos;, function()">
<node CREATED="1697922557526" ID="ID_1274831585" MODIFIED="1697922558308" TEXT="User::login($_POST[&quot;login&quot;], $_POST[&quot;password&quot;]);"/>
<node CREATED="1697922564223" ID="ID_886594088" MODIFIED="1697922564801" TEXT="header(&quot;Location: /admin&quot;);"/>
<node CREATED="1697922569854" ID="ID_158321724" MODIFIED="1697922570432" TEXT="exit;"/>
</node>
<node CREATED="1697922618230" ID="ID_374340737" MODIFIED="1697922619027" TEXT="$app-&gt;run();"/>
</node>
</node>
<node CREATED="1699658645781" FOLDED="true" ID="ID_1119803692" MODIFIED="1700268656315" POSITION="right" TEXT="composer.json">
<node CREATED="1699658695502" ID="ID_1982745415" MODIFIED="1699658772074" TEXT="&quot;autoload&quot;: {&#xa;         &quot;psr-4&quot;: {&#xa;             &quot;Hcode\\&quot;: &quot;vendor\\hcodebr\\php-classes\\src&quot;&#xa;          }&#xa;}"/>
<node CREATED="1699659268020" ID="ID_1571872111" MODIFIED="1699659274327" TEXT="/vendor">
<node CREATED="1699659301212" FOLDED="true" ID="ID_1853787666" MODIFIED="1699659454579" TEXT="autoload.php">
<node CREATED="1699659319493" ID="ID_1424915933" MODIFIED="1699659321300" TEXT="require_once __DIR__ . &apos;/composer/autoload_real.php&apos;;"/>
<node CREATED="1699659332084" ID="ID_555590281" MODIFIED="1699659332959" TEXT="return ComposerAutoloaderInit2ea54c676063654c27789fd170a14135::getLoader();"/>
</node>
</node>
<node CREATED="1699658933181" FOLDED="true" ID="ID_844570800" MODIFIED="1699659451838" TEXT="/vendor/composer">
<node CREATED="1699659003932" ID="ID_503503287" MODIFIED="1699659004799" TEXT="autoload_classmap.php"/>
<node CREATED="1699659012381" ID="ID_207593987" MODIFIED="1699659012865" TEXT="autoload_files.php"/>
<node CREATED="1699659020548" ID="ID_1984745479" MODIFIED="1699659021235" TEXT="autoload_namespaces.php"/>
<node CREATED="1699659029103" ID="ID_1844485692" MODIFIED="1699659030071" TEXT="autoload_psr4.php"/>
<node CREATED="1699659036861" ID="ID_1901159769" MODIFIED="1699659037548" TEXT="autoload_real.php">
<node CREATED="1699659389292" ID="ID_1275774790" MODIFIED="1699659390159" TEXT="class ComposerAutoloaderInit2ea54c676063654c27789fd170a14135"/>
</node>
<node CREATED="1699659045189" ID="ID_754870531" MODIFIED="1699659045767" TEXT="autoload_static.php"/>
<node CREATED="1699659053285" ID="ID_24629333" MODIFIED="1699659053956" TEXT="ClassLoader.php"/>
<node CREATED="1699659063676" ID="ID_134751288" MODIFIED="1699659064323" TEXT="installed.php"/>
<node CREATED="1699659072309" ID="ID_1612664761" MODIFIED="1699659072887" TEXT="InstalledVersions.php"/>
<node CREATED="1699659080540" ID="ID_282155968" MODIFIED="1699659081177" TEXT="platform_check.php"/>
</node>
</node>
<node CREATED="1700268601792" ID="ID_1538677795" MODIFIED="1700268602964" POSITION="right" TEXT="C:\ecommerce\res"/>
<node COLOR="#6600ff" CREATED="1700268670031" ID="ID_569877672" MODIFIED="1700430182860" POSITION="right" TEXT="C:\ecommerce\vendor&#xa;Namespace: Hcode">
<node CREATED="1700268940600" ID="ID_134983908" MODIFIED="1700268942975" TEXT="C:\ecommerce\vendor\bin"/>
<node CREATED="1700268957575" ID="ID_1127452782" MODIFIED="1700268958278" TEXT="C:\ecommerce\vendor\bw"/>
<node CREATED="1700268978080" ID="ID_247078750" MODIFIED="1700268978628" TEXT="C:\ecommerce\vendor\composer">
<node CREATED="1700269222705" ID="ID_795831136" MODIFIED="1700269244421" TEXT="autoload_real.php">
<node CREATED="1700269226104" ID="ID_385804309" MODIFIED="1700269227886" TEXT="class ComposerAutoloaderInit">
<node CREATED="1700269289891" ID="ID_1902112388" MODIFIED="1700269290715" TEXT="private static $loader"/>
<node CREATED="1700269301615" ID="ID_1436310416" MODIFIED="1700269302253" TEXT="public static function loadClassLoader($class)"/>
<node CREATED="1700269381809" ID="ID_176875122" MODIFIED="1700269382496" TEXT="public static function getLoader()">
<node CREATED="1700269460023" ID="ID_861479701" MODIFIED="1700269460977" TEXT="return $loader;"/>
</node>
</node>
</node>
</node>
<node CREATED="1700268986175" ID="ID_1090556476" MODIFIED="1700268986739" TEXT="C:\ecommerce\vendor\hcodebr"/>
<node CREATED="1700268994720" ID="ID_937074816" MODIFIED="1700268995282" TEXT="C:\ecommerce\vendor\phpmailer"/>
<node CREATED="1700269003992" ID="ID_214054486" MODIFIED="1700269004554" TEXT="C:\ecommerce\vendor\psr"/>
<node CREATED="1700269013153" ID="ID_440968542" MODIFIED="1700269013652" TEXT="C:\ecommerce\vendor\rain"/>
<node CREATED="1700269021960" ID="ID_890596893" MODIFIED="1700269022491" TEXT="C:\ecommerce\vendor\slim">
<node CREATED="1700269944641" ID="ID_1832598440" MODIFIED="1700269945656" TEXT="C:\ecommerce\vendor\slim\slim">
<node CREATED="1700274589336" ID="ID_232466945" MODIFIED="1700274598025" TEXT="C:\ecommerce\vendor\slim\slim\slim">
<node CREATED="1700274611233" ID="ID_1063080190" MODIFIED="1700274617218" TEXT="slim.php">
<node COLOR="#6600ff" CREATED="1700274635136" ID="ID_439028502" MODIFIED="1700429859473" TEXT="C:\ecommerce\vendor\slim\slim\slim\slim&#xa;Namespace Slim;"/>
<node CREATED="1700274659096" ID="ID_475626167" MODIFIED="1700274659846" TEXT="class Slim">
<node CREATED="1700275345473" ID="ID_1675188338" MODIFIED="1700275354643" TEXT="Obtendo a inst&#xe2;ncia do aplicativo por nome">
<node CREATED="1700275377433" ID="ID_598481246" MODIFIED="1700275635944" TEXT="public static function getInstance($name = &apos;default&apos;)&#xa;{     return isset(static::$apps[$name]) ? static::$apps[$name] : null;&#xa;}"/>
</node>
<node CREATED="1700275479439" ID="ID_1815465992" MODIFIED="1700275480189" TEXT="Definir o nome do aplicativo Slim">
<node CREATED="1700275505793" ID="ID_1404119249" MODIFIED="1700275545815" TEXT="public function setName($name)&#xa;{        $this-&gt;name = $name;&#xa;         static::$apps[$name] = $this;&#xa;}"/>
</node>
</node>
</node>
</node>
<node CREATED="1700269967857" ID="ID_1459165003" MODIFIED="1700274314160" TEXT="index.php">
<node CREATED="1700270024479" ID="ID_42078650" MODIFIED="1700270025316" TEXT="require &apos;Slim/Slim.php&apos;;">
<node CREATED="1700274458664" ID="ID_992389093" MODIFIED="1700274496322" TEXT="chama C:\ecommerce\vendor\slim\slim\Slim\Slim.php"/>
</node>
<node CREATED="1699657960341" ID="ID_308190400" MODIFIED="1699657961607" TEXT="Slim\Slim::registerAutoloader();"/>
<node CREATED="1699658122853" ID="ID_952181734" MODIFIED="1699658124666" TEXT="$app = new \Slim\Slim();"/>
<node CREATED="1699657302351" ID="ID_425206235" MODIFIED="1699657913719" TEXT="$app-&gt;get(&apos;/&apos;, function () { $template = xxx; echo $template; } );"/>
<node CREATED="1699657490398" ID="ID_642040561" MODIFIED="1699657522648" TEXT="$app-&gt;post(&apos;/post&apos;, function () { echo &apos;This is a POST route&apos;; } );"/>
<node CREATED="1699657558358" ID="ID_1054975603" MODIFIED="1699657584163" TEXT="$app-&gt;put(&apos;/put&apos;, function () { echo &apos;This is a PUT route&apos;; } );"/>
<node CREATED="1699657600982" ID="ID_846220882" MODIFIED="1699657617368" TEXT="$app-&gt;patch(&apos;/patch&apos;, function () { echo &apos;This is a PATCH route&apos;; } );"/>
<node CREATED="1699657627309" ID="ID_1282039167" MODIFIED="1699657652475" TEXT="$app-&gt;delete(&apos;/delete&apos;, function () { echo &apos;This is a DELETE route&apos;; } );"/>
<node CREATED="1699657665541" ID="ID_1905985980" MODIFIED="1699657667370" TEXT="$app-&gt;run();"/>
</node>
</node>
</node>
<node CREATED="1700269031679" ID="ID_799129189" MODIFIED="1700269032340" TEXT="C:\ecommerce\vendor\symfony"/>
<node CREATED="1700269040440" ID="ID_1591311047" MODIFIED="1700269040987" TEXT="C:\ecommerce\vendor\twig"/>
<node CREATED="1700269050479" ID="ID_1641510882" MODIFIED="1700269051028" TEXT="C:\ecommerce\vendor\wavey"/>
<node CREATED="1700268406456" ID="ID_395106444" MODIFIED="1700268859952" TEXT="autoload.php">
<node CREATED="1698356957764" ID="ID_1504360278" MODIFIED="1698356959434" TEXT="require_once __DIR__ . &apos;/composer/autoload_real.php&apos;;"/>
<node CREATED="1698356981196" ID="ID_754751412" MODIFIED="1698356983193" TEXT="return ComposerAutoloaderInit2ea54c676063654c27789fd170a14135::getLoader();"/>
</node>
</node>
<node CREATED="1700268680639" ID="ID_1917809223" MODIFIED="1700268681347" POSITION="right" TEXT="C:\ecommerce\views"/>
<node CREATED="1700268690536" ID="ID_1079342829" MODIFIED="1700268691193" POSITION="right" TEXT="C:\ecommerce\views-cache"/>
</node>
</map>
