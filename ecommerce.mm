<map version="1.0.1">
<!-- To view this file, download free mind mapping software FreeMind from http://freemind.sourceforge.net -->
<node CREATED="1697921990254" ID="ID_1540225222" MODIFIED="1697922070424" TEXT="ecommerce">
<node CREATED="1697922091175" ID="ID_1293179688" MODIFIED="1697922098378" POSITION="right" TEXT="index.php">
<node CREATED="1697922127014" ID="ID_973768055" MODIFIED="1697922134058" TEXT="require_once(&quot;vendor/autoload.php&quot;);">
<node CREATED="1698356957764" ID="ID_1504360278" MODIFIED="1698356959434" TEXT="require_once __DIR__ . &apos;/composer/autoload_real.php&apos;;"/>
<node CREATED="1698356981196" ID="ID_754751412" MODIFIED="1698356983193" TEXT="return ComposerAutoloaderInit2ea54c676063654c27789fd170a14135::getLoader();"/>
</node>
<node CREATED="1697922158054" ID="ID_207855943" MODIFIED="1697922167561" TEXT="use \Slim\Slim;"/>
<node CREATED="1697922168438" ID="ID_1481006146" MODIFIED="1697922174720" TEXT="use \Hcode\Page;"/>
<node CREATED="1697922175758" ID="ID_458473056" MODIFIED="1697922182774" TEXT="use \Hcode\PageAdmin;"/>
<node CREATED="1697922183686" ID="ID_1488327933" MODIFIED="1697922193218" TEXT="use \Hcode\Model\User;"/>
<node CREATED="1697922213935" ID="ID_505039279" MODIFIED="1697922214888" TEXT="$app = new Slim();">
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
