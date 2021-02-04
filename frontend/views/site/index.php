<?php
/* @var $this yii\web\View */
$this->title = 'Space Warriors - официальный сайт ордена';
Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => 'На нашем сайте вы всегда найдете актуальную и полезную информацию о самых актуальных проблемах в мире ИТ. Будь на белой стороне'
]);
Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Kali Linux, Yii2, windows, linux, asterisk'
]);
?>


<section class="relative z2">
  <header class="travel-header absolute top-0 right-0 left-0">
    <div class="px1 md-px2 py1 md-py2 flex justify-between items-center">
       <a href="/" class="travel-icon-logo mx-auto inline-block circle">
<svg class="travel-icon travel-icon-logo h2" viewBox="0 0 100 100"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-width="7.5"><circle cx="50" cy="50" r="45"></circle><path d="M20.395 83.158c-2.37-10.263-.79-18.553 4.737-24.87 8.29-9.472 17.763-1.183 26.052-9.472 8.29-8.29 2.37-18.948 10.658-26.053 5.526-4.737 12.237-6.316 20.132-4.737M39.084 95c-2.788-10.2-1.912-17.304 2.627-21.316 6.808-6.017 14.956-.68 24.088-9.623 9.13-8.94 3.062-17.133 10.255-23.534 4.795-4.267 10.282-5.668 16.46-4.203"></path></g></svg>        </a>
    </div>
  </header>
</section>


<!-- Hero -->
<div class="travel-hero-bg absolute col-12">
    <amp-img class="travel-hero-bg-img absolute" src="https://space-warriors.com/img/travel/hero-2.jpg" height="80vmax" noloading=""></amp-img>
    <amp-img class="travel-hero-bg-img absolute" src="https://space-warriors.com/img/travel/hero-3.jpg" height="80vmax" noloading=""></amp-img>
    <amp-img class="travel-hero-bg-img absolute" src="https://space-warriors.com/img/travel/hero-1.jpg" height="80vmax" noloading=""></amp-img>
</div>

<section class="travel-hero relative">
  <div class="travel-hero-content max-width-3 mx-auto absolute top-0 left-0 right-0 flex self-end items-center">
    <div class="travel-hero-content-inner relative px1 md-px2 flex-auto self-end">
      <header>
        <h1 class="travel-hero-heading mb2 line-height-1">Книга <br class="md-hide lg-hide"> рецептов</h1>
        <h2 class="travel-hero-subheading line-height-2 bold xs-hide sm-hide">Space Warriors - просто о сложном!</h2>
      </header>
      <!-- Search Form -->
      <div class="travel-hero-search">
        <label class="travel-input-icon travel-shadow flex col-12 relative rounded">
          <input class="travel-input travel-input-big travel-input-clear border block col-12 rounded" list="locations" type="text" name="query" placeholder="Напиши ключевое слово, например: 1c" on="
              change:AMP.setState({
                fields_query: event.value,
                fields_query_live: event.value,
                fields_query_edited: query_query != event.value
              });
              input-debounced:AMP.setState({
                fields_query_live: event.value
              });
            " value="" [value]="fields_query">
<svg class="travel-icon" viewBox="0 0 74 100"><path fill="currentColor" d="M40.18 95.404A3.944 3.944 0 0 1 37 97a3.944 3.944 0 0 1-3.18-1.596C28.268 87.787 5 54.66 5 34.334 5 17.027 19.327 3 37 3c17.673 0 32 14.028 32 31.333 0 20.327-23.267 53.454-28.82 61.07zM37 14.75c-11.046 0-20 8.768-20 19.583 0 10.816 8.954 19.584 20 19.584s20-8.768 20-19.584c0-5.193-2.107-10.174-5.858-13.847-3.75-3.672-8.838-5.736-14.142-5.736z"></path></svg>        </label>

        <amp-list layout="flex-item" src="/v1/post/search?" [src]="'/v1/post/search?&input=' + fields_query_live">
          <template type="amp-mustache">
            <datalist id="locations">
              {{#predictions}}
              <option value="{{description}}">
              {{/predictions}}
            </option>
			</datalist>
          </template>
        </amp-list>
          <div class="p2"> &nbsp; </div>
<?php /*
        <div class="travel-hero-search-dates flex my2 justify-around">
          <label class="travel-date-input relative bold flex-auto" [class]="'travel-date-input relative bold flex-auto' + (fields_departure ? ' travel-date-input-touched' : '')">
            <input class="block relative p0 z1" type="date" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="yyyy-mm-dd" name="departure" on="
                change:AMP.setState({
                  fields_departure: true,
                  fields_departure_edited: true
                })
              ">
<svg class="travel-icon" viewBox="0 0 100 100"><path fill="currentColor" d="M7.93 79.476h84.32v8.876H7.93v-8.876zm86.848-41.538c-.932-3.55-4.615-5.68-8.165-4.704l-23.566 6.302L32.427 11l-8.566 2.263 18.374 31.82-22.056 5.902-8.743-6.834L5 45.883l8.077 14.023 3.417 5.903 7.1-1.91 23.566-6.3 19.305-5.148 23.565-6.302c3.594-1.02 5.68-4.66 4.748-8.21z"></path></svg>            <div class="travel-date-input-label">
              Departure
            </div>
          </label>
          <label class="travel-date-input relative bold flex-auto" [class]="'travel-date-input relative bold flex-auto' + (fields_return ? ' travel-date-input-touched' : '')">
            <input class="block relative p0 z1" type="date" placeholder="yyyy-mm-dd" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="yyyy-mm-dd" name="return" on="
                change:AMP.setState({
                  fields_return: true,
                  fields_return_edited: true
                })
              " disabled="" [disabled]="!fields_departure">
<svg class="travel-icon" viewBox="0 0 100 100"><path fill="currentColor" d="M7.929 79.476h84.32v8.876H7.929v-8.876zm81.693-15.409c1.03-3.523-1.03-7.246-4.576-8.238L61.6 49.094 50.051 8.863l-8.508-2.471-.64 36.737-21.946-6.3-3.974-10.361-6.407-1.831-.3 16.18-.11 6.82 7.069 2.021 23.445 6.735 19.199 5.53 23.445 6.736c3.607.976 7.269-1.069 8.298-4.592z"></path></svg>            <div class="travel-date-input-label">
              Return
            </div>
          </label>
        </div>
*/?>
        <a href="/blog/" class="ampstart-btn travel-input-big rounded center bold white block col-12" on="
            tap:AMP.setState({
                ui_reset: false,
                ui_filterPane: false,
                query_query: fields_query,
                fields_query_edited: false,
                query_category_id: fields_city,
                fields_category_id_edited: false,
               
                query_type: fields_type,
                fields_type_edited: false,
                query_sort: fields_sort,
                fields_sort_edited: false,
            })
          ">
          Найти
        </a>
      <!--/ Search Form -->
      <a class="travel-hero-discover block center mx-auto mt1 md-hide lg-hide" on="tap:travel-landing-content.scrollTo">
        Подробно <svg class="travel-icon" viewBox="0 0 66 100"><path fill="currentColor" d="M33.5 56.172l-18.96-18.1c-1.497-1.43-3.922-1.43-5.418 0a3.539 3.539 0 0 0 0 5.17l21.67 20.687a3.914 3.914 0 0 0 2.708 1.07c.98 0 1.96-.357 2.71-1.07l21.668-20.687a3.541 3.541 0 0 0 0-5.172c-1.496-1.427-3.92-1.427-5.417 0L33.5 56.173z"></path></svg>
      </a>
    </div>
  </div>
</div></section>
<!--/ Hero -->

<div id="travel-landing-content" class="travel-landing-content relative">

<!-- Angles -->
<div class="travel-angles max-width-3 mx-auto">
  <div class="travel-angle-left">
    <div class="travel-angle-1 absolute"></div>
  </div>
  <div class="travel-angle-left">
    <div class="travel-angle-2 absolute"></div>
  </div>
  <div class="travel-angle-right">
    <div class="travel-angle-3 absolute"></div>
  </div>
</div>
<!--/ Angles -->


<!-- Discover -->
<section class="travel-discover py4 mb3 relative xs-hide sm-hide">
  <div class="max-width-3 mx-auto px1 md-px2">
    <div class="flex justify-between items-center">
      <header>
        <h2 class="travel-discover-heading bold line-height-2 xs-hide sm-hide">Вы эксперт<br class="md-hide lg-hide"> в ИТ технологиях</h2>
        <div class="travel-discover-subheading h2 xs-hide sm-hide">Пройдите аккредитацию и работайте с нами! </div>
      </header>

      <div class="travel-discover-panel travel-shadow-hover px3 py2 ml1 mr3 myn3 xs-hide sm-hide">
        <div class="bold h2 line-height-2 my1">Наша База знаний - ваш надежный помошник</div>
        <p class="travel-discover-panel-subheading h3 my1 line-height-2">
          Используйте нашу базу знаний и решайте сложные задачи просто, а если не получается наши эксперты всегда придут на помощь! 
        </p>
        <p class="my1">
          <a class="travel-link" href="https://space-warriors.com/blog/">Искать решение</a>
        </p>
      </div>
    </div>
  </div>
</section>
<!--/ Discover -->

<!-- Activities -->
<section class="travel-activities pb4 pt3 relative">
  <div class="max-width-3 mx-auto px1 md-px2">
    <h3 class="bold h1 line-height-2 mb2 md-hide lg-hide" aria-hidden="true">Наши<br>главные компетенции</h3>
    <h3 class="bold h1 line-height-2 mb2 xs-hide sm-hide center">Главные компетенции</h3>
  </div>
  <div class="overflow-scroll">
    <div class="travel-overflow-container">
      <div class="flex justify-center p1 md-px1 mxn1">
     
      <?php foreach ($category as $cat_item) {?>
          
          <a href="/" class="travel-activities-activity travel-type-nature mx1" on="
              tap:AMP.setState({
                ui_viewIndex: 1,
                fields_type: ['active'],
                fields_category_id: ['active'],
                query_category_id: ['active'],
                query_type: ['active']
              })
            ">
            <div class="travel-shadow circle inline-block">
              <div class="travel-activities-activity-icon">

<svg class="travel-icon" viewBox="0 0 76 100"><path fill="currentColor" d="M71.57 71a16.245 16.245 0 0 1-12.498 5.385 38.102 38.102 0 0 1-9.7-1.494A23.872 23.872 0 0 1 38 78a23.847 23.847 0 0 1-11.37-3.11 38.088 38.088 0 0 1-9.702 1.495A16.25 16.25 0 0 1 4.428 71a1.625 1.625 0 0 1 .145-2.337 68.925 68.925 0 0 0 14.152-16.12c-1.54-.54-3-1.283-4.338-2.213a1.612 1.612 0 0 1-.71-1.186c-.045-.482.13-.958.476-1.297a86.822 86.822 0 0 0 13.264-17.103 18.438 18.438 0 0 1-3.132-1.24 1.616 1.616 0 0 1-.88-1.183 1.61 1.61 0 0 1 .455-1.4A51.206 51.206 0 0 0 36.49 7.984C36.752 7.386 37.344 7 38 7s1.248.386 1.51.983A51.206 51.206 0 0 0 52.14 26.92a1.604 1.604 0 0 1-.426 2.583c-1.002.51-2.05.924-3.13 1.24a86.87 86.87 0 0 0 13.263 17.104c.346.34.52.815.476 1.297a1.61 1.61 0 0 1-.71 1.186 18.16 18.16 0 0 1-4.338 2.214 68.96 68.96 0 0 0 14.15 16.12c.34.285.545.696.572 1.137.027.442-.127.875-.426 1.2zm-40.75 9.75a.825.825 0 0 1 .328-.594.758.758 0 0 1 .645-.13c3.75.988 7.675.987 11.424-.003.223-.056.458-.01.645.13s.307.356.33.594A40.69 40.69 0 0 0 46.92 92.3c.146.396.09.84-.15 1.184a1.177 1.177 0 0 1-1.032.514H29.264a1.179 1.179 0 0 1-1.035-.514 1.292 1.292 0 0 1-.15-1.184 40.73 40.73 0 0 0 2.74-11.55z"></path></svg>              
			</div>
            </div>
            <p class="bold center line-height-4">
              <?=$cat_item->title;?>
            </p>
          </a>


     <?php }?>

      
    </div>
  </div>
</div>
</section>
<!--/ Activities -->

<div class="travel-footer-wrapper">

<!-- Popular -->
<section class="travel-popular pb4 pt3 relative">
  <header class="max-width-3 mx-auto px1 md-px2">
    <h3 class="h1 bold line-height-2 md-hide lg-hide" aria-hidden="true">Самое популярное<br>за последний месяц</h3>
    <h3 class="h1 bold line-height-2 xs-hide sm-hide center">Самое популярное за последний месяц</h3>
  </header>
  <div class="overflow-scroll">
    <div class="travel-overflow-container">
      <div class="flex px1 md-px2 mxn1">
        <div class="m1 mt3 mb2">
          <div class="travel-popular-tilt-right mb1">
            <div class="relative travel-results-result">
              <a class="travel-results-result-link block relative" href="https://space-warriors.com/blog/47-skanirovanie-seti-poisk-i-proverka-na-uazvimost">
                <amp-img class="block rounded" width="346" height="200" noloading="" src="https://space-warriors.com/frontend/web/img/blog/blogPost/47.jpg" srcset="https://space-warriors.com/frontend/web/img/blog/blogPost/47.jpg 2x, https://space-warriors.com/frontend/web/img/blog/blogPost/47.jpg 1x"></amp-img>
              </a>
              <div class="travel-results-result-like absolute top-0 right-0">
                <div class="p1">

<!-- Like Button -->
<label class="travel-like">
  <input type="checkbox" class="absolute">
  <div class="travel-like-hearts circle inline-block relative">
    <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
    <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
    <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
    <div class="travel-like-heart travel-like-heart-white absolute mx-auto "></div>
    <div class="travel-like-heart travel-like-heart-solid absolute mx-auto "></div>
    <div class="travel-like-heart travel-like-heart-outline absolute mx-auto "></div>
  </div>
</label>
<!--/ Like Button -->
                </div>
              </div>
            </div>
          </div>

          <div class="h2 line-height-2 mb1">
            <span class="travel-results-result-text">СКАНИРОВАНИЕ СЕТИ, ПОИСК И ПРОВЕРКА НА УЯЗВИМОСТЬ</span>
            
          </div>

          <div class="h4 line-height-2">
            <div class="inline-block relative mr1 h3 line-height-2">
              <div class="travel-results-result-stars green">★★★</div>
            </div>
            <span class="travel-results-result-subtext mr1">24 Комментариев</span>
            <span class="travel-results-result-subtext"><svg class="travel-icon" viewBox="0 0 77 100"><g fill="none" fill-rule="evenodd"><path stroke="currentColor" stroke-width="7.5" d="M38.794 93.248C58.264 67.825 68 49.692 68 38.848 68 22.365 54.57 9 38 9S8 22.364 8 38.85c0 10.842 9.735 28.975 29.206 54.398a1 1 0 0 0 1.588 0z"></path><circle cx="38" cy="39" r="10" fill="currentColor"></circle></g></svg> Akhaladze</span>
          </div>
        </div>
        <div class="m1 mt3 mb2">
          <div class="travel-results-result relative mb1">
            <div class="relative travel-results-result">
              <a class="travel-results-result-link block relative" href="https://space-warriors.com/blog/83-cto-takoe-ibm-datapower">
                <amp-img class="block rounded" width="346" height="200" noloading="" src="https://space-warriors.com/frontend/web/img/blog/blogPost/83.jpg" srcset="https://space-warriors.com/frontend/web/img/blog/blogPost/83.jpg 2x, https://space-warriors.com/frontend/web/img/blog/blogPost/83.jpg 1x"></amp-img>
              </a>
              <div class="travel-results-result-flags absolute top-0 left-0">
                <div class="p1"><span class="travel-pill bold">NEW</span></div>
              </div>
              <div class="travel-results-result-like absolute top-0 right-0">
                <div class="p1">

<!-- Like Button -->
<label class="travel-like">
  <input type="checkbox" class="absolute">
  <div class="travel-like-hearts circle inline-block relative">
    <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
    <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
    <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
    <div class="travel-like-heart travel-like-heart-white absolute mx-auto "></div>
    <div class="travel-like-heart travel-like-heart-solid absolute mx-auto "></div>
    <div class="travel-like-heart travel-like-heart-outline absolute mx-auto "></div>
  </div>
</label>
<!--/ Like Button -->
                </div>
              </div>
            </div>
          </div>

          <div class="h2 line-height-2 mb1">
            <span class="travel-results-result-text">ЧТО ТАКОЕ IBM DATAPOWER</span>
         
          </div>

          <div class="h4 line-height-2">
            <div class="inline-block relative mr1 h3 line-height-2">
              <div class="travel-results-result-stars green">★★★★</div>
            </div>
            <span class="travel-results-result-subtext mr1">42 Комментариев</span>
            <span class="travel-results-result-subtext"><svg class="travel-icon" viewBox="0 0 77 100"><g fill="none" fill-rule="evenodd"><path stroke="currentColor" stroke-width="7.5" d="M38.794 93.248C58.264 67.825 68 49.692 68 38.848 68 22.365 54.57 9 38 9S8 22.364 8 38.85c0 10.842 9.735 28.975 29.206 54.398a1 1 0 0 0 1.588 0z"></path><circle cx="38" cy="39" r="10" fill="currentColor"></circle></g></svg> Akhaladze</span>
          </div>
        </div>
        <div class="m1 mt3 mb2">
          <div class="travel-popular-tilt-left mb1">
            <div class="relative travel-results-result">
              <a class="travel-results-result-link block relative" href="https://space-warriors.com/blog/82-cto-takoe-ibm-integration-bus">
                <amp-img class="block rounded" width="346" height="200" noloading="" src="https://space-warriors.com/frontend/web/img/blog/blogPost/82.jpg" srcset="https://space-warriors.com/frontend/web/img/blog/blogPost/82.jpg 2x, https://space-warriors.com/frontend/web/img/blog/blogPost/82.jpg 1x"></amp-img>
              </a>
              <div class="travel-results-result-like absolute top-0 right-0">
                <div class="p1">

<!-- Like Button -->
<label class="travel-like">
  <input type="checkbox" class="absolute">
  <div class="travel-like-hearts circle inline-block relative">
    <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
    <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
    <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
    <div class="travel-like-heart travel-like-heart-white absolute mx-auto "></div>
    <div class="travel-like-heart travel-like-heart-solid absolute mx-auto "></div>
    <div class="travel-like-heart travel-like-heart-outline absolute mx-auto "></div>
  </div>
</label>
<!--/ Like Button -->
                </div>
              </div>
            </div>
          </div>

          <div class="h2 line-height-2 mb1">
            <span class="travel-results-result-text">ЧТО ТАКОЕ IBM INTEGRATION BUS</span>
           
          </div>

          <div class="h4 line-height-2">
            <div class="inline-block relative mr1 h3 line-height-2">
              <div class="travel-results-result-stars green">★★★★★</div>
            </div>
            <span class="travel-results-result-subtext mr1">17 Комментариев</span>
            <span class="travel-results-result-subtext"><svg class="travel-icon" viewBox="0 0 77 100"><g fill="none" fill-rule="evenodd"><path stroke="currentColor" stroke-width="7.5" d="M38.794 93.248C58.264 67.825 68 49.692 68 38.848 68 22.365 54.57 9 38 9S8 22.364 8 38.85c0 10.842 9.735 28.975 29.206 54.398a1 1 0 0 0 1.588 0z"></path><circle cx="38" cy="39" r="10" fill="currentColor"></circle></g></svg> Akhaladze</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--/ Popular -->


<!-- Featured -->
<section class="travel-featured pt3 relative clearfix">
  <header class="max-width-2 mx-auto px1 md-px2 relative">
    <h3 class="travel-featured-heading h1 bold line-height-2 mb2 center">Выбор редактора</h3>
  </header>
  <div class="max-width-3 mx-auto relative">
    <div class="travel-featured-grid flex flex-wrap items-stretch">
      <div class="col-12 md-col-6 flex items-stretch flex-auto">
        <a href="/" class="travel-featured-tile flex flex-auto relative travel-featured-color-blue" on="tap:AMP.setState({fields_query: 'New York', query_query: 'New York'})">
          <amp-img class="travel-object-cover flex-auto" layout="responsive" width="336" height="507" src="../../img/travel/city/new-york.jpg"></amp-img>
          <div class="travel-featured-overlay absolute z1 center top-0 right-0 bottom-0 left-0 white p2">
            <div class="travel-featured-tile-heading caps bold line-height-2 h3">IBM Integration Bus</div>
            <div class="h5">5 статей</div>
          </div>
        </a>
        <div class="flex flex-column items-stretch flex-auto">
          <a href="/" class="travel-featured-tile flex flex-auto relative travel-featured-color-cyan" on="tap:AMP.setState({fields_query: 'Barcelona', query_query: 'Barcelona'})">
            <amp-img class="travel-object-cover flex-auto" layout="responsive" width="264" height="246" src="../../img/travel/city/barcelona.jpg"></amp-img>
            <div class="travel-featured-overlay absolute z1 center top-0 right-0 bottom-0 left-0 white p2">
              <div class="travel-featured-tile-heading bold caps line-height-2 h3">IBM DataPower</div>
              <div class="h5">2 статьи</div>
            </div>
          </a>
          <a href="/" class="travel-featured-tile flex flex-auto pointer relative travel-featured-color-orange" on="tap:AMP.setState({fields_query: 'Paris', query_query: 'Paris'})">
            <amp-img class="travel-object-cover flex-auto" layout="responsive" width="264" height="264" src="../../img/travel/city/paris.jpg"></amp-img>
            <div class="travel-featured-overlay absolute z1 center top-0 right-0 bottom-0 left-0 white p2">
              <div class="travel-featured-tile-heading bold caps line-height-2 h3">Google AMP</div>
              <div class="h5">21 статья</div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-12 md-col-6 flex items-stretch flex-auto">
        <div class="flex flex-column items-stretch flex-auto">
          <a href="/" class="travel-featured-tile flex flex-auto pointer relative travel-featured-color-purple" on="tap:AMP.setState({fields_query: 'Tokyo', query_query: 'Tokyo'})">
            <amp-img class="travel-object-cover flex-auto" layout="responsive" width="276" height="207" src="../../img/travel/city/tokyo.jpg"></amp-img>
            <div class="travel-featured-overlay absolute z1 center top-0 right-0 bottom-0 left-0 white p2">
              <div class="travel-featured-tile-heading caps bold line-height-2 h3">Безопасность</div>
              <div class="h5">20+ статей</div>
            </div>
          </a>
          <a href="/" class="travel-featured-tile flex flex-auto relative travel-featured-color-cornflower" on="tap:AMP.setState({fields_query: 'Chicago', query_query: 'Chicago'})">
            <amp-img class="travel-object-cover flex-auto" layout="responsive" width="264" height="286" src="../../img/travel/city/chicago.jpg"></amp-img>
            <div class="travel-featured-overlay absolute z1 center top-0 right-0 bottom-0 left-0 white p2">
              <div class="travel-featured-tile-heading caps bold line-height-2 h3">Yii2</div>
              <div class="h5">14 статей</div>
            </div>
          </a>
        </div>
        <a href="/" class="travel-featured-tile flex flex-auto relative travel-featured-color-teal" on="tap:AMP.setState({fields_query: 'Reykjavik', query_query: 'Reykjavik'})">
          <amp-img class="travel-object-cover flex-auto" layout="responsive" width="312" height="507" src="../../img/travel/city/reykjavik.jpg"></amp-img>
          <div class="travel-featured-overlay absolute z1 center top-0 right-0 bottom-0 left-0 white p2">
            <div class="travel-featured-tile-heading caps bold h3">1С Предприятие</div>
            <div class="h5">17 статей</div>
          </div>
        </a>
      </div>
    </div>
  </div>
</section>
<!--/ Featured -->

<?php /*
<!-- Search -->
<section class="travel-search py4 xs-hide sm-hide relative">
  <div class="px1 md-px2 pb1 relative">
    <h3 class="travel-search-heading travel-spacing-none h1 bold mb2 center">Have a specific destination in mind?</h3>

    <div class="flex justify-center pb2">
      <div class="travel-input-group flex items-center col-8">
          <input class="travel-input travel-input-big line-height-2 block col-12 flex-auto rounded-left" type="text" name="query" placeholder="Where would you like to go?" on="change:AMP.setState({fields_query: event.value})" value="" [value]="fields_query">
          <span class="travel-input-group-sep travel-border-gray relative z1 block"></span>
          <a href="/" class="travel-link travel-input travel-input-big line-height-2 link rounded-right nowrap text-decoration-none" on="
              tap:AMP.setState({
                  ui_reset: false,
                  ui_filterPane: false,
                  query_query: fields_query,
                  fields_query_edited: false,
                  query_departure: fields_departure,
                  fields_departure_edited: false,
                  query_return: fields_return,
                  fields_return_edited: false,
                  query_maxPrice: fields_maxPrice,
                  fields_maxPrice_edited: false,
                  query_city: fields_city,
                  fields_city_edited: false,
                  query_type: fields_type,
                  fields_type_edited: false,
                  query_sort: fields_sort,
                  fields_sort_edited: false,
              })
            ">
            Введите ключевое слово, например: обновление 1С
          </a>
      </div>
    </div>
  </div>
</section>
<!--/ Search -->
*/?>

<!-- Discover mobile-->
<section class="travel-discover-mobile max-width-3 mx-auto py3 px1 md-hide lg-hide">
  <header>
    <h2 class="h1 bold line-height-2">Получайте моментальное решение</h2>
    <div class="travel-discover-subheading h3">Оптимизируйте расходы на ИТ, привлекайте самых лучших технических экспертов.</div>
    
  </header>
  <div class="flex md-mx2 my3 py2 items-center travel-discover-panel travel-shadow-hover">
    <amp-img class="rounded relative flex-none mx1" width="100" height="100" src="../../img/travel/blogpost-thumbnail.jpg"></amp-img>
    <div class="flex-auto">
      <div class="h3 bold line-height-2 mb1">База знаний</div>
      <p class="travel-discover-panel-subheading my1">
        По статистике, опытные пользователи самостоятельно находят решения своих повседневных проблем в сфере ИТ. Уверен - вам повезет! <a class="travel-link" href="#">Подробнее...</a>
      </p>
    </div>
  </div>
</section>
<!--/ Discover mobile-->