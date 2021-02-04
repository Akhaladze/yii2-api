<?php
namespace frontend\view; 
use yii\helpers\Html;
use Yii;
use yii\helpers\BaseUrl;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
//use cybercog\yii\googleanalytics\widgets\GATracking;
use akiraz2\blog\models\BlogPost;

$this->beginPage() ?>
<!DOCTYPE html>
<html ⚡ lang="<?= Yii::$app->language ?>">
<head>
<?php $this->head() ?>
<meta charset='<?= Yii::$app->charset ?>'>
<meta http-equiv='X-UA-Compatible' content='IE=edge'>
<meta name='viewport' content='width=device-width, minimum-scale=1, initial-scale=1'>
<meta name="amp-google-client-id-api" content="googleanalytics">
<link rel="manifest" href="/manifest.json">
<link rel="preload" as="script" href="https://cdn.ampproject.org/v0.js">
<link rel="preconnect dns-prefetch" href="https://fonts.gstatic.com/" crossorigin>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<style amp-boilerplate="">body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate="">body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

<script async custom-element="amp-install-serviceworker" src="https://cdn.ampproject.org/v0/amp-install-serviceworker-0.1.js"></script>
 
<script custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js" async=""></script>
<script custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js" async=""></script>
<script custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js" async=""></script>
<script custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js" async=""></script>
<script custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js" async=""></script>



<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">


<style amp-custom="">

html{font-family:sans-serif;line-height:1.15;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}article,aside,footer,header,nav,section{display:block}h1{font-size:2em;margin:.67em 0}figcaption,figure,main{display:block}figure{margin:1em 40px}hr{box-sizing:content-box;height:0;overflow:visible}pre{font-family:monospace,monospace;font-size:1em}a{background-color:transparent;-webkit-text-decoration-skip:objects}a:active,a:hover{outline-width:0}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}b,strong{font-weight:inherit;font-weight:bolder}code,kbd,samp{font-family:monospace,monospace;font-size:1em}dfn{font-style:italic}mark{background-color:#ff0;color:#000}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}audio,video{display:inline-block}audio:not([controls]){display:none;height:0}img{border-style:none}svg:not(:root){overflow:hidden}button,input,optgroup,select,textarea{font-family:sans-serif;font-size:100%;line-height:1.15;margin:0}button,input{overflow:visible}button,select{text-transform:none}[type=reset],[type=submit],button,html [type=button]{-webkit-appearance:button}[type=button]::-moz-focus-inner,[type=reset]::-moz-focus-inner,[type=submit]::-moz-focus-inner,button::-moz-focus-inner{border-style:none;padding:0}[type=button]:-moz-focusring,[type=reset]:-moz-focusring,[type=submit]:-moz-focusring,button:-moz-focusring{outline:1px dotted ButtonText}fieldset{border:1px solid silver;margin:0 2px;padding:.35em .625em .75em}legend{box-sizing:border-box;color:inherit;display:table;max-width:100%;padding:0;white-space:normal}progress{display:inline-block;vertical-align:baseline}textarea{overflow:auto}[type=checkbox],[type=radio]{box-sizing:border-box;padding:0}[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}details,menu{display:block}summary{display:list-item}canvas{display:inline-block}[hidden],template{display:none}.h00{font-size:3.75rem}.h0{font-size:3.5rem}.h1{font-size:2rem}.h2{font-size:1.5rem}.h3{font-size:1.25rem}.h4{font-size:1rem}.h5{font-size:.875rem}.h6{font-size:.75rem}.font-family-inherit{font-family:inherit}.font-size-inherit{font-size:inherit}.text-decoration-none{text-decoration:none}.bold{font-weight:700;font-weight:600}.regular{font-weight:400}.italic{font-style:italic}.caps{text-transform:uppercase;letter-spacing:0}.left-align{text-align:left}.center{text-align:center}.right-align{text-align:right}.justify{text-align:justify}.nowrap{white-space:nowrap}.break-word{word-wrap:break-word}.line-height-1{line-height:1}.line-height-2{line-height:1.4}.line-height-3{line-height:1.6}.line-height-4{line-height:2}.list-style-none{list-style:none}.underline{text-decoration:underline}.truncate{max-width:100%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.list-reset{list-style:none;padding-left:0}.inline{display:inline}.block{display:block}.inline-block{display:inline-block}.table{display:table}.table-cell{display:table-cell}.overflow-hidden{overflow:hidden}.overflow-scroll{overflow:scroll}.overflow-auto{overflow:auto}.clearfix:after,.clearfix:before{content:" ";display:table}.clearfix:after{clear:both}.left{float:left}.right{float:right}.fit{max-width:100%}.max-width-1{max-width:40rem}.max-width-2{max-width:52rem}.max-width-3{max-width:72rem}.max-width-4{max-width:88rem}.border-box{box-sizing:border-box}.align-baseline{vertical-align:baseline}.align-top{vertical-align:top}.align-middle{vertical-align:middle}.align-bottom{vertical-align:bottom}.m0{margin:0}.mt0{margin-top:0}.mr0{margin-right:0}.mb0{margin-bottom:0}.ml0,.mx0{margin-left:0}.mx0{margin-right:0}.my0{margin-top:0;margin-bottom:0}.m1{margin:1rem}.mt1{margin-top:1rem}.mr1{margin-right:1rem}.mb1{margin-bottom:1rem}.ml1,.mx1{margin-left:1rem}.mx1{margin-right:1rem}.my1{margin-top:1rem;margin-bottom:1rem}.m2{margin:1.5rem}.mt2{margin-top:1.5rem}.mr2{margin-right:1.5rem}.mb2{margin-bottom:1.5rem}.ml2,.mx2{margin-left:1.5rem}.mx2{margin-right:1.5rem}.my2{margin-top:1.5rem;margin-bottom:1.5rem}.m3{margin:3rem}.mt3{margin-top:3rem}.mr3{margin-right:3rem}.mb3{margin-bottom:3rem}.ml3,.mx3{margin-left:3rem}.mx3{margin-right:3rem}.my3{margin-top:3rem;margin-bottom:3rem}.m4{margin:4rem}.mt4{margin-top:4rem}.mr4{margin-right:4rem}.mb4{margin-bottom:4rem}.ml4,.mx4{margin-left:4rem}.mx4{margin-right:4rem}.my4{margin-top:4rem;margin-bottom:4rem}.mxn1{margin-left:calc(1rem * -1);margin-right:calc(1rem * -1)}.mxn2{margin-left:calc(1.5rem * -1);margin-right:calc(1.5rem * -1)}.mxn3{margin-left:calc(3rem * -1);margin-right:calc(3rem * -1)}.mxn4{margin-left:calc(4rem * -1);margin-right:calc(4rem * -1)}.m-auto{margin:auto}.mt-auto{margin-top:auto}.mr-auto{margin-right:auto}.mb-auto{margin-bottom:auto}.ml-auto,.mx-auto{margin-left:auto}.mx-auto{margin-right:auto}.my-auto{margin-top:auto;margin-bottom:auto}.p0{padding:0}.pt0{padding-top:0}.pr0{padding-right:0}.pb0{padding-bottom:0}.pl0,.px0{padding-left:0}.px0{padding-right:0}.py0{padding-top:0;padding-bottom:0}.p1{padding:1rem}.pt1{padding-top:1rem}.pr1{padding-right:1rem}.pb1{padding-bottom:1rem}.pl1{padding-left:1rem}.py1{padding-top:1rem;padding-bottom:1rem}.px1{padding-left:1rem;padding-right:1rem}.p2{padding:1.5rem}.pt2{padding-top:1.5rem}.pr2{padding-right:1.5rem}.pb2{padding-bottom:1.5rem}.pl2{padding-left:1.5rem}.py2{padding-top:1.5rem;padding-bottom:1.5rem}.px2{padding-left:1.5rem;padding-right:1.5rem}.p3{padding:3rem}.pt3{padding-top:3rem}.pr3{padding-right:3rem}.pb3{padding-bottom:3rem}.pl3{padding-left:3rem}.py3{padding-top:3rem;padding-bottom:3rem}.px3{padding-left:3rem;padding-right:3rem}.p4{padding:4rem}.pt4{padding-top:4rem}.pr4{padding-right:4rem}.pb4{padding-bottom:4rem}.pl4{padding-left:4rem}.py4{padding-top:4rem;padding-bottom:4rem}.px4{padding-left:4rem;padding-right:4rem}.col{float:left}.col,.col-right{box-sizing:border-box}.col-right{float:right}.col-1{width:8.33333%}.col-2{width:16.66667%}.col-3{width:25%}.col-4{width:33.33333%}.col-5{width:41.66667%}.col-6{width:50%}.col-7{width:58.33333%}.col-8{width:66.66667%}.col-9{width:75%}.col-10{width:83.33333%}.col-11{width:91.66667%}.col-12{width:100%}@media (min-width:40.06rem){.sm-col{float:left;box-sizing:border-box}.sm-col-right{float:right;box-sizing:border-box}.sm-col-1{width:8.33333%}.sm-col-2{width:16.66667%}.sm-col-3{width:25%}.sm-col-4{width:33.33333%}.sm-col-5{width:41.66667%}.sm-col-6{width:50%}.sm-col-7{width:58.33333%}.sm-col-8{width:66.66667%}.sm-col-9{width:75%}.sm-col-10{width:83.33333%}.sm-col-11{width:91.66667%}.sm-col-12{width:100%}}@media (min-width:52.06rem){.md-col{float:left;box-sizing:border-box}.md-col-right{float:right;box-sizing:border-box}.md-col-1{width:8.33333%}.md-col-2{width:16.66667%}.md-col-3{width:25%}.md-col-4{width:33.33333%}.md-col-5{width:41.66667%}.md-col-6{width:50%}.md-col-7{width:58.33333%}.md-col-8{width:66.66667%}.md-col-9{width:75%}.md-col-10{width:83.33333%}.md-col-11{width:91.66667%}.md-col-12{width:100%}}@media (min-width:72.06rem){.lg-col{float:left;box-sizing:border-box}.lg-col-right{float:right;box-sizing:border-box}.lg-col-1{width:8.33333%}.lg-col-2{width:16.66667%}.lg-col-3{width:25%}.lg-col-4{width:33.33333%}.lg-col-5{width:41.66667%}.lg-col-6{width:50%}.lg-col-7{width:58.33333%}.lg-col-8{width:66.66667%}.lg-col-9{width:75%}.lg-col-10{width:83.33333%}.lg-col-11{width:91.66667%}.lg-col-12{width:100%}}.flex{display:-ms-flexbox;display:flex}@media (min-width:40.06rem){.sm-flex{display:-ms-flexbox;display:flex}}@media (min-width:52.06rem){.md-flex{display:-ms-flexbox;display:flex}}@media (min-width:72.06rem){.lg-flex{display:-ms-flexbox;display:flex}}.flex-column{-ms-flex-direction:column;flex-direction:column}.flex-wrap{-ms-flex-wrap:wrap;flex-wrap:wrap}.items-start{-ms-flex-align:start;align-items:flex-start}.items-end{-ms-flex-align:end;align-items:flex-end}.items-center{-ms-flex-align:center;align-items:center}.items-baseline{-ms-flex-align:baseline;align-items:baseline}.items-stretch{-ms-flex-align:stretch;align-items:stretch}.self-start{-ms-flex-item-align:start;align-self:flex-start}.self-end{-ms-flex-item-align:end;align-self:flex-end}.self-center{-ms-flex-item-align:center;-ms-grid-row-align:center;align-self:center}.self-baseline{-ms-flex-item-align:baseline;align-self:baseline}.self-stretch{-ms-flex-item-align:stretch;-ms-grid-row-align:stretch;align-self:stretch}.justify-start{-ms-flex-pack:start;justify-content:flex-start}.justify-end{-ms-flex-pack:end;justify-content:flex-end}.justify-center{-ms-flex-pack:center;justify-content:center}.justify-between{-ms-flex-pack:justify;justify-content:space-between}.justify-around{-ms-flex-pack:distribute;justify-content:space-around}.justify-evenly{-ms-flex-pack:space-evenly;justify-content:space-evenly}.content-start{-ms-flex-line-pack:start;align-content:flex-start}.content-end{-ms-flex-line-pack:end;align-content:flex-end}.content-center{-ms-flex-line-pack:center;align-content:center}.content-between{-ms-flex-line-pack:justify;align-content:space-between}.content-around{-ms-flex-line-pack:distribute;align-content:space-around}.content-stretch{-ms-flex-line-pack:stretch;align-content:stretch}.flex-auto{-ms-flex:1 1 auto;flex:1 1 auto;min-width:0;min-height:0}.flex-none{-ms-flex:none;flex:none}.order-0{-ms-flex-order:0;order:0}.order-1{-ms-flex-order:1;order:1}.order-2{-ms-flex-order:2;order:2}.order-3{-ms-flex-order:3;order:3}.order-last{-ms-flex-order:99999;order:99999}.relative{position:relative}.absolute{position:absolute}.fixed{position:fixed}.top-0{top:0}.right-0{right:0}.bottom-0{bottom:0}.left-0{left:0}.z1{z-index:1}.z2{z-index:2}.z3{z-index:3}.z4{z-index:4}.border{border-style:solid;border-width:1px}.border-top{border-top-style:solid;border-top-width:1px}.border-right{border-right-style:solid;border-right-width:1px}.border-bottom{border-bottom-style:solid;border-bottom-width:1px}.border-left{border-left-style:solid;border-left-width:1px}.border-none{border:0}.rounded{border-radius:4px}.circle{border-radius:50%}.rounded-top{border-radius:4px 4px 0 0}.rounded-right{border-radius:0 4px 4px 0}.rounded-bottom{border-radius:0 0 4px 4px}.rounded-left{border-radius:4px 0 0 4px}.not-rounded{border-radius:0}.hide{position:absolute;height:1px;width:1px;overflow:hidden;clip:rect(1px,1px,1px,1px)}@media (max-width:40rem){.xs-hide{display:none}}@media (min-width:40.06rem) and (max-width:52rem){.sm-hide{display:none}}@media (min-width:52.06rem) and (max-width:72rem){.md-hide{display:none}}@media (min-width:72.06rem){.lg-hide{display:none}}.display-none{display:none}*{box-sizing:border-box}body{background:#fff;color:#323a43;font-family:Source Sans Pro,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,sans-serif;min-width:100%;overflow-x:hidden;font-smooth:always;-webkit-font-smoothing:antialiased}main{max-width:100%;margin:0 auto}p{padding:0;margin:0}.ampstart-accent{color:#003f93}#content:target{margin-top:calc(0px - 3.5rem);padding-top:3.5rem}.ampstart-title-lg{font-size:2rem;line-height:3.5rem;letter-spacing:.06rem}.ampstart-title-md{font-size:1.5rem;line-height:2.5rem;letter-spacing:.06rem}.ampstart-title-sm{font-size:1.25rem;line-height:2;letter-spacing:.06rem}.ampstart-subtitle,body{line-height:1.6;letter-spacing:normal}.ampstart-subtitle{color:#003f93;font-size:1rem}.ampstart-byline,.ampstart-caption,.ampstart-hint,.ampstart-label{font-size:.875rem;color:#4f4f4f;line-height:1.4;letter-spacing:.06rem}.ampstart-label{text-transform:uppercase}.ampstart-footer,.ampstart-small-text{font-size:.75rem;line-height:1;letter-spacing:.06rem}.ampstart-card{box-shadow:0 1px 1px 0 rgba(0,0,0,.14),0 1px 1px -1px rgba(0,0,0,.14),0 1px 5px 0 rgba(0,0,0,.12)}.h1,h1{font-size:2rem;line-height:3.5rem}.h2,h2{font-size:1.5rem;line-height:2.5rem}.h3,h3{font-size:1.25rem;line-height:2}.h4,h4{font-size:1rem;line-height:1.6}.h5,h5{font-size:.875rem;line-height:1.4}.h6,h6{font-size:.75rem;line-height:1}h1,h2,h3,h4,h5,h6{margin:0;padding:0;font-weight:400;letter-spacing:.06rem}a,a:active,a:visited{color:inherit}.ampstart-btn{font-family:inherit;font-weight:inherit;font-size:1rem;line-height:1.4;padding:.7em .8em;text-decoration:none;white-space:nowrap;word-wrap:normal;vertical-align:middle;cursor:pointer;background-color:#323a43;color:#fff;border:1px solid #fff}.ampstart-btn:visited{color:#fff}.ampstart-btn-secondary{background-color:#fff;color:#000;border:1px solid #000}.ampstart-btn-secondary:visited{color:#000}.ampstart-btn:active .ampstart-btn:focus{opacity:.8}.ampstart-btn[disabled],.ampstart-btn[disabled]:active,.ampstart-btn[disabled]:focus,.ampstart-btn[disabled]:hover{opacity:.5;outline:0;cursor:default}.ampstart-dropcap:first-letter{color:#000;font-size:2rem;font-weight:600;float:left;overflow:hidden;line-height:2rem;margin-left:0;margin-right:.5rem}.ampstart-initialcap{padding-top:1.5rem;margin-top:3rem}.ampstart-initialcap:first-letter{color:#000;font-size:2rem;font-weight:600;margin-left:-2px}.ampstart-pullquote{border:none;border-left:4px solid #323a43;font-size:1.25rem;padding-left:3rem}@media (min-width:40.06rem){.sm-p0{padding:0}.sm-pt0{padding-top:0}.sm-pr0{padding-right:0}.sm-pb0{padding-bottom:0}.sm-pl0,.sm-px0{padding-left:0}.sm-px0{padding-right:0}.sm-py0{padding-top:0;padding-bottom:0}.sm-p1{padding:1rem}.sm-pt1{padding-top:1rem}.sm-pr1{padding-right:1rem}.sm-pb1{padding-bottom:1rem}.sm-pl1,.sm-px1{padding-left:1rem}.sm-px1{padding-right:1rem}.sm-py1{padding-top:1rem;padding-bottom:1rem}.sm-p2{padding:1.5rem}.sm-pt2{padding-top:1.5rem}.sm-pr2{padding-right:1.5rem}.sm-pb2{padding-bottom:1.5rem}.sm-pl2,.sm-px2{padding-left:1.5rem}.sm-px2{padding-right:1.5rem}.sm-py2{padding-top:1.5rem;padding-bottom:1.5rem}.sm-p3{padding:3rem}.sm-pt3{padding-top:3rem}.sm-pr3{padding-right:3rem}.sm-pb3{padding-bottom:3rem}.sm-pl3,.sm-px3{padding-left:3rem}.sm-px3{padding-right:3rem}.sm-py3{padding-top:3rem;padding-bottom:3rem}.sm-p4{padding:4rem}.sm-pt4{padding-top:4rem}.sm-pr4{padding-right:4rem}.sm-pb4{padding-bottom:4rem}.sm-pl4,.sm-px4{padding-left:4rem}.sm-px4{padding-right:4rem}.sm-py4{padding-top:4rem;padding-bottom:4rem}}@media (min-width:52.06rem){.md-p0{padding:0}.md-pt0{padding-top:0}.md-pr0{padding-right:0}.md-pb0{padding-bottom:0}.md-pl0,.md-px0{padding-left:0}.md-px0{padding-right:0}.md-py0{padding-top:0;padding-bottom:0}.md-p1{padding:1rem}.md-pt1{padding-top:1rem}.md-pr1{padding-right:1rem}.md-pb1{padding-bottom:1rem}.md-pl1,.md-px1{padding-left:1rem}.md-px1{padding-right:1rem}.md-py1{padding-top:1rem;padding-bottom:1rem}.md-p2{padding:1.5rem}.md-pt2{padding-top:1.5rem}.md-pr2{padding-right:1.5rem}.md-pb2{padding-bottom:1.5rem}.md-pl2,.md-px2{padding-left:1.5rem}.md-px2{padding-right:1.5rem}.md-py2{padding-top:1.5rem;padding-bottom:1.5rem}.md-p3{padding:3rem}.md-pt3{padding-top:3rem}.md-pr3{padding-right:3rem}.md-pb3{padding-bottom:3rem}.md-pl3,.md-px3{padding-left:3rem}.md-px3{padding-right:3rem}.md-py3{padding-top:3rem;padding-bottom:3rem}.md-p4{padding:4rem}.md-pt4{padding-top:4rem}.md-pr4{padding-right:4rem}.md-pb4{padding-bottom:4rem}.md-pl4,.md-px4{padding-left:4rem}.md-px4{padding-right:4rem}.md-py4{padding-top:4rem;padding-bottom:4rem}}@media (min-width:72.06rem){.lg-p0{padding:0}.lg-pt0{padding-top:0}.lg-pr0{padding-right:0}.lg-pb0{padding-bottom:0}.lg-pl0,.lg-px0{padding-left:0}.lg-px0{padding-right:0}.lg-py0{padding-top:0;padding-bottom:0}.lg-p1{padding:1rem}.lg-pt1{padding-top:1rem}.lg-pr1{padding-right:1rem}.lg-pb1{padding-bottom:1rem}.lg-pl1,.lg-px1{padding-left:1rem}.lg-px1{padding-right:1rem}.lg-py1{padding-top:1rem;padding-bottom:1rem}.lg-p2{padding:1.5rem}.lg-pt2{padding-top:1.5rem}.lg-pr2{padding-right:1.5rem}.lg-pb2{padding-bottom:1.5rem}.lg-pl2,.lg-px2{padding-left:1.5rem}.lg-px2{padding-right:1.5rem}.lg-py2{padding-top:1.5rem;padding-bottom:1.5rem}.lg-p3{padding:3rem}.lg-pt3{padding-top:3rem}.lg-pr3{padding-right:3rem}.lg-pb3{padding-bottom:3rem}.lg-pl3,.lg-px3{padding-left:3rem}.lg-px3{padding-right:3rem}.lg-py3{padding-top:3rem;padding-bottom:3rem}.lg-p4{padding:4rem}.lg-pt4{padding-top:4rem}.lg-pr4{padding-right:4rem}.lg-pb4{padding-bottom:4rem}.lg-pl4,.lg-px4{padding-left:4rem}.lg-px4{padding-right:4rem}.lg-py4{padding-top:4rem;padding-bottom:4rem}}body{line-height:1.4}.travel-flip{transition:transform .1s;transform:rotate(0)}.travel-flip-flipped{transform:rotate(180deg)}@keyframes a{0%{opacity:0;transform:translateY(2rem)}to{opacity:1;transform:none}}.travel-object-cover,.travel-object-cover>img{-o-object-fit:cover;object-fit:cover}amp-img.rounded img{border-radius:4px}amp-img.circle img{border-radius:50%}.travel-no-focus:focus{outline:none}.travel-type-active,.travel-type-active:visited{color:#fd68ae}.travel-type-artistic,.travel-type-artistic:visited{color:#32dada}.travel-type-drinks,.travel-type-drinks:visited{color:#4e93f8}.travel-type-fashion,.travel-type-fashion:visited{color:#f1c363}.travel-type-food,.travel-type-food:visited{color:#aa5efd}.travel-type-music,.travel-type-music:visited{color:#ec8936}.travel-type-nature,.travel-type-nature:visited{color:#14b52a}.travel-type-nightlife,.travel-type-nightlife:visited{color:#e83a3a}.travel-type-tours,.travel-type-tours:visited{color:#0ece9e}.travel-type-water,.travel-type-water:visited{color:#3abee8}.travel-badge{padding:4px 10px;color:#8f98a3;border:1px solid #e3e5e8;border-radius:4px;background:#fff;margin-left:.5rem}.travel-badge.green{color:#47b074;border-color:transparent;background:rgba(71,176,116,.2)}.travel-block-list{min-height:1px;min-width:1px;position:static}.travel-block-list [role=list]{position:static;height:auto;width:auto;display:-ms-flexbox;display:flex}.travel-block-list:after{content:" ";display:inline}.travel-border-gray{border-color:#e3e5e8}.ampstart-btn{transition:box-shadow .25s,transform .25s;line-height:1.125rem;padding:.5rem 1rem;border-color:transparent}.ampstart-btn[disabled]{opacity:.5;cursor:default}.ampstart-btn:not([disabled]):hover{transform:scale(1.02) translateY(-2%);box-shadow:0 .4rem 2rem rgba(50,58,67,.4)}.ampstart-btn:not([disabled]):focus{outline:none;box-shadow:none}.ampstart-btn.bold{font-weight:600}.travel-overflow-container{display:inline-block;min-width:100vw;padding-left:calc((100vw - 72rem) / 2);padding-right:calc((100vw - 72rem) / 2)}.travel-date-input{line-height:1.125rem;padding:.5rem 1rem;padding-left:calc(.5rem * 2.5 + 1.2em)}.travel-date-input .travel-icon{position:absolute;left:0;top:0;box-sizing:content-box;padding:.5rem 1rem}.travel-date-input.input-dark .travel-date-input-label,.travel-date-input.input-dark .travel-icon{color:hsla(0,0%,100%,.75)}.travel-date-input input{opacity:0;border:none;background:none;font:inherit;line-height:1.125rem;height:1.125rem;margin-bottom:calc(1.125rem * -1);width:8rem;color:inherit}.travel-date-input-touched input,.travel-date-input input:focus{opacity:1}.travel-date-input input:focus{outline:none}.travel-date-input-touched input~.travel-date-input-label,.travel-date-input input:focus~.travel-date-input-label{opacity:0}.travel-date-input-touched input[disabled],.travel-date-input input[disabled]~.travel-date-input-label,.travel-date-input input[disabled]~.travel-icon{opacity:.5}.travel-date-input input::-webkit-datetime-edit-fields-wrapper{padding:0}.travel-date-input input::-webkit-clear-button,.travel-date-input input::-webkit-inner-spin-button{display:none}.travel-date-input input::-webkit-calendar-picker-indicator{opacity:0;padding:0;position:absolute;top:0;left:0;width:100%;height:100%;cursor:pointer}.travel-fade-right{overflow:hidden;white-space:nowrap;position:relative}.travel-fade-right:after{content:"";display:block;position:absolute;top:0;right:0;bottom:0;width:1rem;background:linear-gradient(270deg,#fff 0,hsla(0,0%,100%,0))}.travel-inline-list{position:static;min-height:10px}.travel-inline-list,.travel-inline-list [role=list],.travel-inline-list [role=listitem]{display:inline}.travel-inline-list [role=list]{position:static}.travel-inline-list:after{content:" ";display:inline}.travel-input-group>.travel-input{border-right-width:0}.travel-input-group>a,.travel-input-group>button{border-left-width:0;cursor:pointer;background-color:#fff;border:1px solid transparent}.travel-input-group-sep{width:0;height:1.375rem;border-left-width:1px;border-left-style:solid;margin:0 -.5px;pointer-events:none}.travel-input-group>.travel-input:focus,.travel-input-group>.travel-link:focus{outline:none;border-bottom:.125rem solid;border-bottom-color:#e3e5e8}.travel-input-range{display:block;color:inherit;background-color:transparent;margin-top:calc((5px - 1.5rem) * .5);margin-bottom:calc((5px - 1.5rem) * .5);-webkit-appearance:none}.travel-input-range::-webkit-slider-thumb{position:relative;width:1.5rem;height:1.5rem;cursor:pointer;margin-top:calc((5px - 1.5rem) * .5);border-radius:calc(1.5rem * .5);background-color:#fff;box-shadow:0 .25rem .75rem rgba(50,58,67,.2);-webkit-appearance:none}.travel-input-range:focus::-webkit-slider-thumb{box-shadow:0 .25rem .75rem rgba(50,58,67,.2),0 0 0 3px rgba(0,0,0,.25)}.travel-input-range::-moz-range-thumb{width:1.5rem;height:1.5rem;cursor:pointer;border-radius:calc(1.5rem * .5);border-color:transparent;border-width:0;background-color:#fff;box-shadow:0 .25rem .75rem rgba(50,58,67,.2)}.travel-input-range:focus::-moz-range-thumb{box-shadow:0 .25rem .75rem rgba(50,58,67,.2),0 0 0 3px rgba(0,0,0,.25)}.travel-input-range::-webkit-slider-runnable-track{margin-top:calc((1.5rem - 5px) * .5);margin-bottom:calc((1.5rem - 5px) * .5);height:5px;cursor:pointer;border-radius:calc(5px * .5);background-color:#47b074}.travel-input-range::-moz-range-track{height:5px;cursor:pointer;border-radius:calc(5px * .5);background-color:#47b074}.travel-input-range:focus{outline:none}.travel-input-range::-moz-focus-outer{border:0}.travel-input-range-shape{color:#67e497}.travel-input-icon>.travel-input{padding-left:calc(.5rem * 2.5 + 1.2em)}.travel-input-icon>.travel-input+.travel-icon{position:absolute;left:0;top:0;box-sizing:content-box;padding:.5rem 1rem}.travel-input-icon>.travel-input-big{padding-left:calc(1.25rem * 1.5 + 1.2em)}.travel-input-icon>.travel-input-big+.travel-icon{padding:1rem 1.25rem}.travel-input-icon>.travel-input-clear+.travel-icon,.travel-input-icon>.travel-input-dark+.travel-icon{color:hsla(0,0%,100%,.4)}.travel-input{padding:.5rem 1rem;line-height:1.125rem;background-color:#fff;border-width:1px;border-style:solid;color:inherit}.travel-input:not(.border){border-color:transparent}.travel-input-clear{color:#fff;background:none;border-color:hsla(0,0%,100%,.4)}.travel-input-big{padding:1rem 1.25rem}.travel-input-dark{background:rgba(0,0,0,.2)}.travel-input::-webkit-input-placeholder{color:#8f98a3}.travel-input-dark::-webkit-input-placeholder{color:currentColor;opacity:.75}.travel-input-clear::-webkit-input-placeholder{color:inherit;opacity:.4}.travel-link,.travel-link:visited{color:#8b58e3;text-decoration:none;font-family:inherit;transition:color .15s ease-in}.travel-link:hover{color:#b99aef}.travel-link:focus{outline:none;border-bottom:2px solid rgba(50,58,67,.2)}.travel-link.gray,.travel-link.gray:visited{color:#8f98a3}.travel-link.gray:hover{color:#b4b4b4}.travel-list-selector [option]{padding:6px 12px;border-radius:4px;background:#fff;white-space:nowrap;margin-bottom:3px}.travel-list-selector [option]:focus{outline:none}.travel-list-selector [option][selected]{cursor:pointer;outline:none;background:rgba(71,176,116,.2)}.travel-overlay-fx-scale{transition:transform .1s ease-out;transform-origin:50vw 50vw}.travel-overlay-fx-scale.travel-overlay-fx-scale-active{transition:transform .2s ease-out;transform:scale(.95)}@media (min-width:52.06rem){.travel-overlay-fx-scale.travel-overlay-fx-scale-active{transform:none}}.travel-pane{position:relative;z-index:1;pointer-events:none}.travel-pane-overflow{opacity:0;transition:opacity .1s}.travel-pane-content{background-color:#fff;transform:translateY(-100%);transition:transform .1s ease-out}.travel-pane-visible .travel-pane-overflow{transition:opacity .2s;opacity:1}.travel-pane-visible .travel-pane-content{transition:transform .2s ease-out;transform:translate(0);pointer-events:all}.travel-pill{border-radius:1em;padding:2px 8px;color:#fff;background-color:#8a59e3}.travel-row-selector{overflow-y:hidden;overflow-x:auto;white-space:nowrap}.travel-row-selector [option]{display:inline-block;color:#8f98a3;padding-top:1rem}.travel-row-selector [option]:not(:last-of-type){margin-right:2rem}.travel-row-selector [option][selected]{color:#47b074;cursor:pointer;outline:none}.travel-row-selector [option]:after{content:"\2022";display:block;text-align:center;opacity:0}.travel-row-selector [option][selected]:after{opacity:.5}.travel-row-selector [option]:focus{outline:none}.travel-shadow,.travel-shadow-hover{box-shadow:0 .4rem 1.1rem rgba(50,58,67,.12)}.travel-shadow-hover{transition:box-shadow .25s,transform .25s}.travel-shadow-hover:not([disabled]):focus,.travel-shadow-hover:not([disabled]):hover{transform:scale(1.02) translateY(-2%);box-shadow:0 .4rem 2rem rgba(50,58,67,.4)}.h1.line-height-2,.h2.line-height-2,.h3.line-height-2,.h4.line-height-2,.h5.line-height-2,.h6.line-height-2,h1.line-height-2,h2.line-height-2,h3.line-height-2,h4.line-height-2,h5.line-height-2,h6.line-height-2{line-height:1.4}.travel-city-selector{margin:-6px}.travel-city-selector amp-selector{-ms-flex:auto;flex:auto}.travel-city-selector [option]{position:relative;padding:6px;padding-right:32px}.travel-city-selector [option],.travel-city-selector [option]>span{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center}.travel-city-selector [option][selected]{cursor:pointer;outline:none}.travel-city-selector [option] amp-img{width:38px;height:38px;margin-right:10px;background:#e3e5e8;position:relative;transition:transform .3s ease-in-out}.travel-city-selector [option] amp-img img{opacity:.5;transition:opacity .15s step-start .15s,transform .15s step-start .15s}.travel-city-selector [option]:after,.travel-city-selector [option]:before{width:18px;height:18px;position:absolute;right:3px;top:0;bottom:0;margin:auto}.travel-city-selector [option]:before{content:"";display:block;border-radius:4px;border:1px solid #e3e5e8;transition:border-color .3s}.travel-city-selector [option]:focus:before{border-color:#a480e3}.travel-city-selector [option]:after{content:"";background:url(/img/travel/icon/checkmark-purple.png) no-repeat 50% 50%;background-size:contain;text-align:center;display:block;opacity:0;-webkit-clip-path:polygon(0 0,0 0,0 100%,0 100%);clip-path:polygon(0 0,0 0,0 100%,0 100%);transition:none;font-family:"sans-serif"}.travel-city-selector [option][selected]:after{opacity:1;-webkit-clip-path:polygon(0 0,100% 0,100% 100%,0 100%);clip-path:polygon(0 0,100% 0,100% 100%,0 100%);transition:-webkit-clip-path .3s ease-in;transition:clip-path .3s ease-in;transition:clip-path .3s ease-in,-webkit-clip-path .3s ease-in;display:block}.travel-city-selector [option][selected] amp-img{transform:rotateY(180deg)}.travel-city-selector [option][selected] amp-img img{opacity:1;transform:scaleX(-1)}.travel-city-selector [option]:focus{outline:none}.travel-city-selector-img{transition:transform .3s}.travel-city-selector [option]:focus .travel-city-selector-img,.travel-city-selector [option]:hover .travel-city-selector-img{transform:scale(1.2)}.travel-filter-bar{animation:a .4s .05s ease-in-out both}.travel-filter-bar-collapse{height:0;overflow:hidden}.travel-overlay-footer,.travel-overlay-header{background-color:#fff}.travel-overlay-reset-btn{cursor:pointer;color:#8f98a3}@keyframes b{10%,90%{opacity:1;transform:translate3d(-1px,0,0)}20%,80%{transform:translate3d(2px,0,0)}30%,50%,70%{opacity:.5;transform:translate3d(-4px,0,0)}40%,60%{transform:translate3d(4px,0,0)}}.travel-filters-reset{animation:b .82s cubic-bezier(.36,.07,.19,.97) both;transform:translateZ(0);-webkit-backface-visibility:hidden;backface-visibility:hidden;perspective:1000px}.travel-filters-apply-btn{background-color:#8b58e3;color:#fff}.travel-filters-reset-btn{background-color:#fff;color:#323a43}.travel-filter-results-heading{color:#8f98a3;letter-spacing:.2em}.travel-filters-text{color:#8f98a3}.travel-filters-results-text{color:#8b58e3}.travel-icon{display:inline-block;vertical-align:-23%;height:1.2em;width:1.2em;background-position:50% 50%;background-repeat:no-repeat;background-size:auto 1.2em}.travel-icon-logo{color:#fff}.travel-img-icon-checkmark-purple{background-image:url(/img/travel/icon/checkmark-purple.png)}.travel-img-icon-map-pin-outline-gray{background-image:url(/img/travel/icon/map-pin-outline-gray.png)}.travel-img-icon-map-pin-transparent{background-image:url(/img/travel/icon/map-pin-transparent.png)}.travel-img-icon-plane-landing-transparent{background-image:url(/img/travel/icon/plane-landing-transparent.png)}.travel-img-icon-plane-taking-off-transparent{background-image:url(/img/travel/icon/plane-taking-off-transparent.png)}.travel-img-icon-sad-face-gray{background-image:url(/img/travel/icon/sad-face-gray.png)}.travel-img-icon-star-green{background-image:url(/img/travel/icon/star-green.png)}.travel-img-icon-star-silver{background-image:url(/img/travel/icon/star-silver.png)}.travel-like-heart-solid{background:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewbox='0 0 100 100'><path fill='%23FB52A2' d='M50,88.8652765 C76.6666667,70.4615567 90,53.8959001 90,39.1683068 C90,17.0769168 63.1171875,3.83663909 50,27.6306647 C38.875,3.83663909 10,17.0769168 10,39.1683068 C10,53.8959001 23.3333333,70.4615567 50,88.8652765 Z'/></svg>") no-repeat 50% 50%;background-size:contain;-ms-flex:1;flex:1}.travel-like-heart-white{background:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewbox='0 0 100 100'><path fill='white' d='M50,88.8652765 C76.6666667,70.4615567 90,53.8959001 90,39.1683068 C90,17.0769168 63.1171875,3.83663909 50,27.6306647 C38.875,3.83663909 10,17.0769168 10,39.1683068 C10,53.8959001 23.3333333,70.4615567 50,88.8652765 Z'/></svg>") no-repeat 50% 50%;background-size:contain;-ms-flex:1;flex:1}.travel-like-heart-outline{background:url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewbox='0 0 100 100'><path fill='none' stroke='white' stroke-width='5' d='M50,88.8652765 C76.6666667,70.4615567 90,53.8959001 90,39.1683068 C90,17.0769168 63.1171875,3.83663909 50,27.6306647 C38.875,3.83663909 10,17.0769168 10,39.1683068 C10,53.8959001 23.3333333,70.4615567 50,88.8652765 Z'/></svg>") no-repeat 50% 50%;background-size:contain;-ms-flex:1;flex:1}.travel-like input{clip:rect(0 0 0 0)}.travel-like-hearts{width:2rem;height:2rem;background:rgba(0,0,0,.15);cursor:pointer}.travel-like-hearts:before{content:"";display:block;position:absolute;top:0;right:0;bottom:0;left:0;border-radius:50%;border:1px solid hsla(0,0%,100%,.5);transform:scale(0)}.travel-like-heart-tiny{width:40%;height:40%;opacity:0}.travel-like-heart-tiny:first-child{top:10%;left:55%;animation-delay:.15s}.travel-like-heart-tiny:nth-child(2){top:-5%;left:30%;animation-delay:.25s}.travel-like-heart-tiny:nth-child(3){top:-25%;left:65%;animation-delay:.32s}.travel-like-heart{top:12%;right:12%;bottom:12%;left:12%}.travel-like-heart.travel-like-heart-solid,.travel-like-heart.travel-like-heart-white{opacity:0;transform:translateZ(0) scale(1)}.travel-like-heart.travel-like-heart-outline{transition:opacity .1s;transform:translateZ(0) scale(1)}.travel-like input:checked+.travel-like-hearts:before{animation:1.2s e both}.travel-like input:checked+.travel-like-hearts>.travel-like-heart-tiny{animation-duration:.6s;animation-name:f}.travel-like input:checked+.travel-like-hearts>.travel-like-heart.travel-like-heart-outline{opacity:0}.travel-like input:checked+.travel-like-hearts>.travel-like-heart.travel-like-heart-solid{animation:1.2s c both cubic-bezier(.445,.05,.55,.95)}.travel-like input:checked+.travel-like-hearts>.travel-like-heart.travel-like-heart-white{animation:1.2s d both}@keyframes c{0.00%{transform:translateZ(0) scale(0);opacity:1}14.68%{transform:translateZ(0) scale(1.26)}31.75%{transform:translateZ(0) scale(.94)}48.81%{transform:translateZ(0) scale(1.01);opacity:1}65.87%{transform:translateZ(0) scale(1)}80%{transform:translateZ(0) scale(1);opacity:0}to{transform:translateZ(0) scale(1);opacity:0}}@keyframes d{48%{opacity:0}49%{opacity:1}to{opacity:1}}@keyframes e{0%{transform:translateZ(0) scale(0);opacity:0}30%{opacity:1}40%{transform:translateZ(0) scale(1.2)}50%{transform:translateZ(0) scale(1.2);opacity:0}to{transform:translateZ(0) scale(1.2);opacity:0}}@keyframes f{0%{transform:translate3d(-50%,0,0) scale(0);opacity:1}to{transform:translate3d(-50%,-100%,0) scale(1);opacity:0}}:root .travel-popular .travel-results-result{animation:none}.travel-popular-tilt-left,.travel-popular-tilt-right{display:inline-block;position:relative;perspective:1000px;perspective-origin:50% calc(100% + 4rem)}.travel-popular-tilt-left .travel-results-result{transform-origin:0 0;transform:rotateY(-15deg)}.travel-popular-tilt-right .travel-results-result{transform-origin:100% 0;transform:rotateY(15deg)}.travel-popular-tilt-left:before,.travel-popular-tilt-right:before{content:"";display:block;position:absolute;top:3rem;right:3rem;bottom:2rem;left:3rem;box-shadow:0 0 2.2rem 2.2rem rgba(50,58,67,.2)}.travel-popular-tilt-left:before{transform-origin:2rem calc(100% + 2rem);transform:translateY(.28rem) rotate(2.5deg)}.travel-popular-tilt-right:before{transform-origin:calc(100% + 2rem) calc(100% + 2rem);transform:translateY(.28rem) rotate(-2.5deg)}.travel-results-result{animation:a .4s ease-in-out both;animation-delay:.11s}.travel-results-result-link{border-radius:4px}.travel-results-result-link amp-img{background-color:#e3e5e8}.travel-results-result-text{color:#323a43}.travel-results-result-subtext{color:#8f98a3}.travel-results-result-stars{color:#e3e5e8}.travel-results-result-stars.green{color:#47b074}.travel-results-result-flags,.travel-results-result-like{pointer-events:none}.travel-results-result-flags>*,.travel-results-result-like>*{pointer-events:all}.travel-results-result-flags,.travel-results-result-like,.travel-results-result-link{transition:transform .2s}.travel-results-result-link:focus,.travel-results-result:hover .travel-results-result-link{outline:none}.travel-results-result-link:focus,.travel-results-result-link:focus~.travel-results-result-flags,.travel-results-result-link:focus~.travel-results-result-like,.travel-results-result:hover .travel-results-result-flags,.travel-results-result:hover .travel-results-result-like,.travel-results-result:hover .travel-results-result-link{transform:translateY(-.5rem)}.travel-results-navbar{margin-top:-4rem;margin-right:-4rem;margin-left:-4rem;background-color:#8b58e3;color:#fff;animation:a .4s ease-in-out both}.travel-results-navbar-icon{line-height:1}.travel-results-navbar-subheading{letter-spacing:.2em}@media (min-width:52.06rem){.travel-results-navbar-icon{line-height:inherit}}.travel-search{background-color:#8b58e3}.travel-search-heading{color:#fff}.travel-search .travel-link{background-color:#fff}@media (min-width:40.06rem){.travel-header .travel-icon-logo{margin:inherit}}.travel-type-selector{margin:-6px}.travel-type-selector [option]{padding:6px;position:relative}.travel-type-selector-active,.travel-type-selector-inactive{height:38px;padding-left:12px;padding-right:10px;border-radius:19px;border:2px solid #e3e5e8;cursor:pointer;min-width:0;transition:border-color .3s}.travel-type-selector [option]:focus .travel-type-selector-inactive,.travel-type-selector [option][selected] .travel-type-selector-inactive{border-color:currentColor}.travel-type-selector [option]:focus:not(:hover) .travel-type-selector-active{border-color:rgba(0,0,0,.25)}.travel-type-selector-active{transition-delay:.3s}.travel-type-selector-active:after,.travel-type-selector-inactive:after{content:"+";display:block;width:1rem;height:1rem;line-height:1rem;text-align:center;font-size:1.6em;transition:transform .1s ease-out}.travel-type-selector-content{overflow:hidden;text-overflow:ellipsis}.travel-type-selector [option] svg.travel-icon{margin-right:10px;transition:transform .3s}.travel-type-selector-active{margin-top:6px;margin-left:6px;background:currentColor;border-color:currentColor;opacity:0;-webkit-clip-path:circle(0 at 0 50%);clip-path:circle(0 at 0 50%);transition:opacity .4s,-webkit-clip-path .4s;transition:clip-path .4s,opacity .4s;transition:clip-path .4s,opacity .4s,-webkit-clip-path .4s}.travel-type-selector [option]:hover .travel-type-selector-active{opacity:.75;-webkit-clip-path:circle(40px at 0 50%);clip-path:circle(40px at 0 50%)}.travel-type-selector [option][selected] .travel-type-selector-active,.travel-type-selector [option][selected]:hover .travel-type-selector-active{opacity:1;-webkit-clip-path:circle(142% at 0 50%);clip-path:circle(142% at 0 50%)}.travel-type-selector [option][selected]:hover .travel-type-selector-active{opacity:1;-webkit-clip-path:circle(calc(142% - 36px) at 0 50%);clip-path:circle(calc(142% - 36px) at 0 50%)}.travel-type-selector-active .travel-type-selector-content,.travel-type-selector-active:after{color:#fff}.travel-type-selector [option][selected]{outline:none;cursor:pointer}.travel-type-selector [option]:hover .travel-type-selector-active:after,.travel-type-selector [option]:hover .travel-type-selector-inactive:after,.travel-type-selector [option][selected] .travel-type-selector-active:after,.travel-type-selector [option][selected] .travel-type-selector-inactive:after{transform:rotate(45deg)}.travel-type-selector [option][selected]:hover:not(:focus) .travel-type-selector-active:after,.travel-type-selector [option][selected]:hover:not(:focus) .travel-type-selector-inactive:after{transform:rotate(0deg)}.travel-type-selector [option]:focus{outline:none}


 :root {
    --color-bg-light: #FAFAFC;
    --autosuggest-width: 300px;
    --space-1: .5rem;  
    --space-2: 1rem;  
    --box-shadow-1: 0 1px 1px 0 rgba(0,0,0,.14), 0 1px 1px -1px rgba(0,0,0,.14), 0 1px 5px 0 rgba(0,0,0,.12);
  }
  #auto-suggest {
    position: absolute;
    width: var(--autosuggest-width);
    overflow-x: hidden;
    z-index: 100;
    box-shadow: var(--box-shadow-1);
    background-color: var(--color-bg-light);
  }
  #auto-suggest [option] {
    padding: var(--space-1);
  }

 
  .preview-container {
    min-width: 320px;
    padding: var(--space-2);
  }
  
  .amp-sidebar-toolbar-target-shown {
      display: none;
    }
	
/* Blog stype	*/



  header {
        position: fixed;
        z-index: 2000;
        width: 100%;
        background-color: grey;
        opacity: 0.7;
        color: white;
		text-align: left;
		vertical-align: middle;
    }

.content {
	
	line-height: 1.6rem;
    font-weight: 400;
	margin: 5px;
    color: #48525c;
    display: block;
    margin-top: 1.1em;
    margin-bottom: 0;
    font-size: 1rem;	
}

.q_clasic_ {
	
	line-height: 1.2rem;
    font-weight: 200;
	font-size: 0.8rem;
	margin: 0px;
    color: #48525c;
    display: block;
    margin-top: 1.1em;
    margin-bottom: 0;
   
}

.breadcrumbs {
    display: flex;
    align-items: center;
    font-family: Poppins,sans-serif;
    font-weight: 700;
    font-size: .8125rem;
	margin:5px;
	opacity: 0.9;
}	
	
.breadcrumbs .pointer {
    display: flex;
    align-items: center;
    font-family: Arial;
    font-weight: 300;
    font-size: .8125rem;
	margin:0px;
	padding:0px;
	color: green;
}	
	
	
.breadcrumbs a {
    font-weight: 700;
    text-decoration: none;
    /* color: #005af0;*/
    color: black;
}



h1 {
    text-decoration: none;
    align-items: center;
    font-family: Arial;
    font-weight: 300;
   /* font-size: 1.8125rem; */
	margin:0px;
	padding:0px;
	color: black;
	margin:5px;

}

h2 {
	font-weight: 400;
    text-decoration: none;
    align-items: center;
    font-family: Arial;
    font-weight: 300;
    font-size: 1.8125rem;
	margin:0px;
	padding:0px;
	color: black;
	margin:10px;
	
	
}

h3 {
	font-weight: 400;
    text-decoration: none;
    align-items: center;
    font-family: Arial;
    font-weight: 300;
    font-size: 1.8125rem;
	margin:0px;
	padding:0px;
	color: black;
	margin:10px;
}

h4 {
	font-weight: 400;
    text-decoration: none;
    align-items: center;
    font-family: Arial;
    font-weight: 300;
    font-size: 1.8125rem;
	margin:0px;
	padding:0px;
	color: black;
	margin:10px;
}
	

	
</style>











<?php 

if (isset($_GET['id'])) {
	if (isset($_GET['id'])) {
		$BlogPost = BlogPost::findOne($_GET['id']);
	//	$url_ = 'https://space-warriors.com/' . $_GET['id'] . '-' . $BlogPost['slug'];
		$url_ = 'https://space-warriors.com' . $_SERVER['REQUEST_URI'];
		Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => $url_]);
		}

} else { 

	$url_ = 'https://space-warriors.com' . $_SERVER['REQUEST_URI'];
	Yii::$app->view->registerLinkTag(['rel' => 'canonical', 'href' => $url_]);
		
	//echo $this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);
}?>
<?=Html::csrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>

</head>
<body>
<?php $this->beginBody() ?>

<amp-install-serviceworker 
	src="/sw.js"
    data-iframe-src="/install-sw.html"
    layout="nodisplay">
</amp-install-serviceworker>



 <header class="ampstart-headerbar fixed flex justify-start items-center align-middle top-0 left-0 right-0 md-pt0">

	<p class="p1">

    <div role="button" aria-label="open sidebar" on="tap:header-sidebar.toggle" tabindex="0" class="ampstart-navbar-trigger  absolute "><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="block"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path></svg>
    </div>

	
	
	<label>
	  Поиск
	  <input [value]="city"
		on="input-debounced: AMP.setState({
				  filteredCities: event.value.length == 0 ?
					[]:
					queries.filter(city =>
					   city.toLowerCase().indexOf(event.value.toLowerCase()) >= 0
					)
			   })"/>
	</label>
		 
	<amp-selector on="select:AMP.setState({
							city: event.targetOption,
							filteredCities: []
						 })"
	  keyboard-select-mode="focus">
	  <amp-list id="auto-suggest"
		items="."
		layout="fixed-height"
		height="0"
		[src]="filteredCities"
		[height]="filteredCities.length * 34">
		<template type="amp-mustache">
		  <div option="{{.}}"><a href="/?tags={{.}}">{{.}}</a></div>
		</template>
	  </amp-list>
	</amp-selector>

</p>

</div>
  </header>


<!-- Start Sidebar -->
<amp-sidebar id="header-sidebar" class="ampstart-sidebar px1 flex-column justify-content items-center justify-center" layout="nodisplay">
 <div class="flex justify-start items-center ampstart-sidebar-header">
    <div role="button" aria-label="close sidebar" on="tap:header-sidebar.toggle" tabindex="0" class="ampstart-navbar-trigger items-start">✕</div>
  </div>
  <nav class="ampstart-sidebar-nav ampstart-nav">
    <ul class="list-reset m0 p0 ampstart-label">
<amp-list 
	src="/v1/post/search?"
	width="180" 
	height="750"
	>
	
					<template type="amp-mustache">
							{{#allcategories}}
								<li class="ampstart-nav-item "><a class="ampstart-nav-link" href="/{{redirect_url}}">{{title}}</a></li>
							{{/allcategories}}
					</template>	
</amp-list>
	
		
	
    </ul>
  </nav>

 

<h3 class="h7 block pt3">Мы в соцсетях</h3>
<ul class="ampstart-social-follow list-reset flex justify-around items-center flex-wrap m0 mb4">
    <li>
        <a href="https://www.facebook.com/spacewarriorscom" target="_blank" class="inline-block p1" aria-label="Link to SW Facebook"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="23.6" viewBox="0 0 56 55"><title>Facebook</title><path d="M47.5 43c0 1.2-.9 2.1-2.1 2.1h-10V30h5.1l.8-5.9h-5.9v-3.7c0-1.7.5-2.9 3-2.9h3.1v-5.3c-.6 0-2.4-.2-4.6-.2-4.5 0-7.5 2.7-7.5 7.8v4.3h-5.1V30h5.1v15.1H10.7c-1.2 0-2.2-.9-2.2-2.1V8.3c0-1.2 1-2.2 2.2-2.2h34.7c1.2 0 2.1 1 2.1 2.2V43" class="ampstart-icon ampstart-icon-fb"></path></svg></a>
    </li>
   
</ul>

    <ul class="ampstart-sidebar-faq list-reset m0">
        <li class="ampstart-faq-item"><a href="/about" class="text-decoration-none">О нас</a></li>
     
        
    </ul>
</amp-sidebar>
<!-- End Sidebar -->
  <!-- End Navbar -->
    
<?=$content?>
    
<!-- Footer -->
<footer class="travel-footer overflow-hidden">

  <div class="relative bg-black">

    <!-- Angle -->
    <div class="travel-footer-angle-block absolute top-0 bottom-0 right-0 xs-hide sm-hide"></div>
    <div class="travel-footer-angle absolute xs-hide sm-hide"></div>
    <!--/ Angle -->

    <!-- Right column -->
    <div class="travel-newsletter-signup">
      <header class="max-width-3 mx-auto px1 md-px2">
        <h4 class="travel-footer-right-column-heading travel-spacing-none h2 mb3 blue">Хотите быть в курсе последних событий?</h4>
        <div class="h4 bold mb1">Подпишитесь на нашу рассылку!</div>
      </header>
      <div class="relative">
        <div class="travel-footer-input-bg bg-black absolute right-0 left-0 md-hide lg-hide"></div>
        <div class="max-width-3 mx-auto px1 md-px2 relative">
          <div class="travel-input-group flex items-center col-12 rounded travel-shadow">
            <input class="travel-input travel-input-big block col-12 flex-auto rounded-left" type="text" name="email" placeholder="Ваша@почтовый.адрес">
            <span class="travel-input-group-sep travel-border-gray relative z1 block"></span>
            <button type="button" class="travel-link travel-input-big nowrap rounded-right">
              Подписаться
            </button>
          </div>
        </div>
      </div>
    </div>
    <!--/ Right column -->

    <!-- Left column -->
    <div class="max-width-3 mx-auto px1 md-px2">
      <div class="flex pt3 md-pt4 col-12 md-col-6 pr3">
        <div class="col-2">
          <a href="/" class="inline-block h2 line-height-1 circle white">
<svg class="travel-icon travel-icon-logo h2" viewBox="0 0 100 100">
<g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-width="7.5"><circle cx="50" cy="50" r="45"></circle>
<path d="M20.395 83.158c-2.37-10.263-.79-18.553 4.737-24.87 8.29-9.472 17.763-1.183 26.052-9.472 8.29-8.29 2.37-18.948 10.658-26.053 5.526-4.737 12.237-6.316 20.132-4.737M39.084 95c-2.788-10.2-1.912-17.304 2.627-21.316 6.808-6.017 14.956-.68 24.088-9.623 9.13-8.94 3.062-17.133 10.255-23.534 4.795-4.267 10.282-5.668 16.46-4.203"></path></g></svg>          </a>
            
        </div>
        <div class="col-5">
          <h4 class="travel-spacing-none mb2 h3 gray bold">Space Warriors</h4>
          <div class="line-height-4 mb4">
            <a href="/about" class="travel-link block gray">Кто мы</a>
            
          </div>
        </div>
        <div class="col-5">
          <h4 class="travel-spacing-none mb2 h3 gray bold">Мы рядом</h4>
          <div class="line-height-4 mb4">
           
            <a href="https://www.facebook.com/spacewarriorscom/" class="travel-link block gray">Facebook</a>
            <a href="https://www.youtube.com/c/GeorgiyAkhaladze" class="travel-link block gray">YouTube</a>
            <a href="https://www.linkedin.com/in/georgiy-akhaladze/" class="travel-link block gray">LinkedIn</a>
            <a href="google.com/+GeorgiyAkhaladze" class="travel-link block gray">GooglePlus</a>
            <a href="https://github.com/Akhaladze" class="travel-link block gray">GitHub</a>
            
          </div>
        </div>
      </div>
      <div class="py3 gray">
        &copy; Copyright <?=date("Y")?>
      </div>
    </div>
    <!--/ Left column -->
  </div>
</footer>
<!--/ Footer  -->
        </div>
      </div>
</section>    
    
<amp-analytics type="googleanalytics">
<script type="application/json">
{
  "vars": {
    "account": "UA-119121537-2"
  },
  "triggers": {
    "trackPageview": {
      "on": "visible",
      "request": "pageview"
    }
  }
}
</script>
</amp-analytics>
<?php /*
        
<amp-analytics type="metrika">           
<script type="application/json">                
{  
"vars": {               
	"counterId": "50986358", 
    "yaParams":  { 
					"key": "value",
				"__ymu": {"user_param_key": "user_param_value"}
				}                    
	},
	
	"triggers": {
	
		"notBounce": {
					"on": "timer", 
					"timerSpec": {                               
					"immediate": false,  
					"interval": 15,        
					"maxTimerLength": 16  
					
					},                       
	
	"request": "notBounce"    
                    },                      
	
					"halfScroll": {       
					"on": "scroll",         
					"scrollSpec": {        
					"verticalBoundaries": 
					[   
					50               
					]                           
					},                         

	
	"request": "reachGoal",       
					"vars": {                    
					"goalId": "halfScrollGoal"      
					}                      
					},                      

	
					"partsScroll": {         
					"on": "scroll",          
					"scrollSpec": {           
					"verticalBoundaries": [   
					25,                         
					90                      
					]                         
					},
		"request": "reachGoal",     
			"vars": {                  
			"goalId": "partsScrollGoal"  
				}                   
			}                 
		}            
	}          
</script>
</amp-analytics>  
*/?>
  </body>

<?php $this->endBody() ?>

<?php $this->endPage() ?>
</html>