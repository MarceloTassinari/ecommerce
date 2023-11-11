<map version="1.0.1">
<!-- To view this file, download free mind mapping software FreeMind from http://freemind.sourceforge.net -->
<node CREATED="1697921990254" ID="ID_1540225222" MODIFIED="1697922070424" TEXT="ecommerce">
<node CREATED="1699658645781" FOLDED="true" ID="ID_1119803692" MODIFIED="1699659458876" POSITION="right" TEXT="composer.json">
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
<node CREATED="1697922091175" ID="ID_1293179688" MODIFIED="1697922098378" POSITION="right" TEXT="index.php">
<node CREATED="1697922127014" ID="ID_973768055" MODIFIED="1697922134058" TEXT="require_once(&quot;vendor/autoload.php&quot;);">
<node CREATED="1698356957764" ID="ID_1504360278" MODIFIED="1698356959434" TEXT="require_once __DIR__ . &apos;/composer/autoload_real.php&apos;;"/>
<node CREATED="1698356981196" ID="ID_754751412" MODIFIED="1698356983193" TEXT="return ComposerAutoloaderInit2ea54c676063654c27789fd170a14135::getLoader();"/>
</node>
<node CREATED="1699656808947" ID="ID_1292266980" MODIFIED="1699656821046" TEXT="session_start"/>
<node CREATED="1699657239710" ID="ID_419025672" MODIFIED="1699657242180" TEXT="use \Slim\Slim;">
<node CREATED="1699657960341" ID="ID_308190400" MODIFIED="1699657961607" TEXT="Slim\Slim::registerAutoloader();"/>
<node CREATED="1699658122853" ID="ID_952181734" MODIFIED="1699658124666" TEXT="$app = new \Slim\Slim();"/>
<node CREATED="1699657302351" ID="ID_425206235" MODIFIED="1699657913719" TEXT="$app-&gt;get(&apos;/&apos;, function () { $template = xxx; echo $template; } );"/>
<node CREATED="1699657490398" ID="ID_642040561" MODIFIED="1699657522648" TEXT="$app-&gt;post(&apos;/post&apos;, function () { echo &apos;This is a POST route&apos;; } );"/>
<node CREATED="1699657558358" ID="ID_1054975603" MODIFIED="1699657584163" TEXT="$app-&gt;put(&apos;/put&apos;, function () { echo &apos;This is a PUT route&apos;; } );"/>
<node CREATED="1699657600982" ID="ID_846220882" MODIFIED="1699657617368" TEXT="$app-&gt;patch(&apos;/patch&apos;, function () { echo &apos;This is a PATCH route&apos;; } );"/>
<node CREATED="1699657627309" ID="ID_1282039167" MODIFIED="1699657652475" TEXT="$app-&gt;delete(&apos;/delete&apos;, function () { echo &apos;This is a DELETE route&apos;; } );"/>
<node CREATED="1699657665541" ID="ID_1905985980" MODIFIED="1699657667370" TEXT="$app-&gt;run();"/>
</node>
<node CREATED="1697922168438" ID="ID_1481006146" MODIFIED="1697922174720" TEXT="use \Hcode\Page;"/>
<node CREATED="1697922175758" ID="ID_458473056" MODIFIED="1697922182774" TEXT="use \Hcode\PageAdmin;"/>
<node CREATED="1697922183686" ID="ID_1488327933" MODIFIED="1697922193218" TEXT="use \Hcode\Model\User;"/>
<node CREATED="1697922213935" ID="ID_505039279" MODIFIED="1699656879241" TEXT="use \Slim\Slim;&#xa;$app = new Slim();">
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
</node>
</map>
