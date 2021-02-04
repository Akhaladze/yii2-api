<?php
use yii\helpers\Html;?>
<div class="travel-overlay-fx-scale" [class]="'travel-overlay-fx-scale' + (ui_filterPane ? ' travel-overlay-fx-scale-active' : '')">
<div class="travel-no-focus" role="button" tabindex="-1" on="tap:AMP.setState({ui_filterPane: false, ui_reset: false, ui_sortPane: false})">

<!-- Results Navbar -->
<header class="travel-results-navbar pt4 pr4 pl4">
  <div class="px1 md-px2 flex justify-between items-stretch">
    <div class="flex items-stretch">
      <a href="https://space-warriors.com" class="travel-results-navbar-icon h2 circle my1 md-my2">
<?php /* ДОМОЙ  */?>
<svg class="travel-icon travel-icon-logo h2" viewBox="0 0 100 100"><g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-width="7.5"><circle cx="50" cy="50" r="45"></circle><path d="M20.395 83.158c-2.37-10.263-.79-18.553 4.737-24.87 8.29-9.472 17.763-1.183 26.052-9.472 8.29-8.29 2.37-18.948 10.658-26.053 5.526-4.737 12.237-6.316 20.132-4.737M39.084 95c-2.788-10.2-1.912-17.304 2.627-21.316 6.808-6.017 14.956-.68 24.088-9.623 9.13-8.94 3.062-17.133 10.255-23.534 4.795-4.267 10.282-5.668 16.46-4.203"></path></g></svg>      </a>
      <div class="ml3 flex items-center xs-hide sm-hide">
        <amp-list class="travel-block-list flex items-center" layout="flex-item" noloading="" src="/v1/post/search" [src]="
  '/v1/post/search?' + (query_category_id.length ? '&category_id[]=' + query_category_id.join('&category_id[]=') : '')
">
          <template type="amp-mustache">
              <div class="flex items-center">
                <label class="travel-input-icon relative">
                  <input class="travel-input travel-input-dark rounded" type="text" name="query" placeholder="Поиск по сайту" on="
                      change:
                        AMP.setState({fields_query: event.value}),
                        AMP.setState({query_query: event.value})
                    " value="{{stats.tags.tag}}">
                  <span class="travel-icon travel-img-icon-map-pin-transparent"></span>
                </label> 
 
              </div>
          </template>
        </amp-list>
      </div>
    </div>

  </div>
</header>
<!--/ Results Navbar -->
        </div>


  <!-- Filter Bar -->
<section class="travel-filter-bar sm-hide xs-hide relative z2">
  <div class="flex mxn2 px1 md-px2">
    <div class="travel-no-focus flex flex-auto overflow-hidden" role="button" tabindex="0" on="tap:AMP.setState({ui_filterPane: !ui_filterPane, ui_sortPane: false})">
      <div class="pl2 pr1 py2 nowrap border-bottom travel-border-gray flex-none">
        <span class="bold">Фильтр</span>
        <span class="travel-flip travel-filters-text inline-block" [class]="'travel-flip travel-filters-text inline-block' + (ui_filterPane ? ' travel-flip-flipped' : '')">
<svg class="travel-icon" viewBox="0 0 66 100"><path fill="currentColor" d="M33.5 56.172l-18.96-18.1c-1.497-1.43-3.922-1.43-5.418 0a3.539 3.539 0 0 0 0 5.17l21.67 20.687a3.914 3.914 0 0 0 2.708 1.07c.98 0 1.96-.357 2.71-1.07l21.668-20.687a3.541 3.541 0 0 0 0-5.172c-1.496-1.427-3.92-1.427-5.417 0L33.5 56.173z"></path></svg>        </span>
      </div>

      <div class="pl1 py2 nowrap border-bottom travel-border-gray flex-none">
        <span class="travel-filters-text">Категория333</span>
      </div>

      <div class="border-bottom travel-border-gray">
        <div class="travel-fade-right pr1 py2">
          <span class="travel-badge" [class]="'travel-badge' + (query_category_id.length > 0 && query_category_id.length < 10 ? ' hide' : '')">Все категории</span>

 <?php foreach($category as $cat_item) { ?>
    
    <span class="travel-badge green hide" [class]="'travel-badge green' + (query_category_id.includes('<?=$cat_item->id;?>') ? '' : ' hide')"><?=$cat_item->title;?></span>
          
<?php } ?>
      
                  
          </div>
      </div>
        
 
        
        
<?php /* НАЧАЛО ФИЛЬТР City заменить на Автор  */?>
        
      <div class="pl1 py2 nowrap border-bottom travel-border-gray flex-none">
        <span class="travel-filters-text"></span>
      </div>
      <div class="flex-auto border-bottom travel-border-gray">
        <div class="travel-fade-right pr1 py2">
          <amp-list class="travel-inline-list" layout="flex-item" src="/v1/post/search?" [src]="
  '/v1/post/search?' + (query_category_id.length ? '&category_id[]=' + query_category_id.join('&category_id[]=') : '')
">
            <template type="amp-mustache">
              {{#stats.allCities}}<span class="travel-badge">Все авторы</span>{{/stats.allCities}}
              {{^stats.allCities}}
              {{#stats.cities}}{{#isSelected}}<span class="travel-badge green">{{name}}</span>{{/isSelected}}{{/stats.cities}}
              {{/stats.allCities}}
            </template>
          </amp-list>
        </div>
      </div>
<?php /* КОНЕЦ ФИЛЬТР City заменить на Автор  */?>
        
        
      <div class="travel-border-gray px1 md-pr2 py2 nowrap border-bottom flex-none">
        <amp-list class="travel-inline-list" layout="flex-item" src="/v1/post/search?" [src]="
 '/v1/post/search?category_id' + (query_category_id.length ? '&category_id[]=' + query_category_id.join('&category_id[]=') : '')
">
          <template type="amp-mustache">
            <span class="travel-filters-results-text">
              {{stats.resultCount}}
              <span class="sm-hide xs-hide md-hide">Найдены подходящие материалы</span>
              <span class="lg-hide">Результаты</span>
            </span>
          </template>
        </amp-list>
      </div>
    </div>

    <div class="flex-none">
      <div class="travel-no-focus travel-border-gray pl1 pr2 py2 md-pl2 nowrap border-left border-bottom relative z2" role="button" tabindex="0" on="tap:AMP.setState({ui_filterPane: false, ui_reset: false, ui_sortPane: !ui_sortPane})">
        <span class="travel-filters-text">Сотрировка</span>
        <div class="inline-block">
          <!--
            Render an invisible set of labels to force the element to always be
            the width of the widest label.
          -->
            <div aria-hidden="" class="travel-filter-bar-collapse bold">Популярные</div>
           
            <div aria-hidden="" class="travel-filter-bar-collapse bold">Новые</div>
           

          <span class="bold">
             
              <span class="hide" [class]="fields_sort == 'desc' ? '' : 'hide'">
                Популярные
              </span>
              <span class="hide" [class]="fields_sort == 'asc' ? '' : 'hide'">
                Новые
              </span>
             
          </span>
        </div>
        <span class="travel-flip travel-filters-text inline-block" [class]="'travel-flip travel-filters-text inline-block ' + (ui_sortPane ? ' travel-flip-flipped' : '')">
<svg class="travel-icon" viewBox="0 0 66 100"><path fill="currentColor" d="M33.5 56.172l-18.96-18.1c-1.497-1.43-3.922-1.43-5.418 0a3.539 3.539 0 0 0 0 5.17l21.67 20.687a3.914 3.914 0 0 0 2.708 1.07c.98 0 1.96-.357 2.71-1.07l21.668-20.687a3.541 3.541 0 0 0 0-5.172c-1.496-1.427-3.92-1.427-5.417 0L33.5 56.173z"></path></svg>        </span>
      </div>
<!-- Sort pane -->
<div class="travel-pane" [class]="'travel-pane' + (ui_sortPane ? ' travel-pane-visible' : '')">
  <div class="travel-pane-overflow absolute overflow-hidden left-0 right-0 pb2 px2 mxn2">
    <div class="travel-pane-content travel-shadow travel-border-gray border-bottom border-left z1">
      <div class="p1 pr2 mdp2">
        <amp-selector class="travel-list-selector" layout="container" name="sort" on="
            select:AMP.setState({
              query_sort: event.targetOption,
              fields_sort: event.targetOption
            })
          " [selected]="fields_sort">
            <div class="bold" option="popularity-desc" selected="">Популярные</div>
            <div class="bold" option="age-asc">Новые</div>
  
        </amp-selector>
      </div>
    </div>
  </div>
</div>
<!--/ Sort pane -->
    </div>
  </div>
</section>
<!--/ Filter Bar -->


<!-- Filter Pane -->
<div class="travel-pane" [class]="'travel-pane' + (ui_filterPane ? ' travel-pane-visible' : '')">
  <div class="travel-pane-overflow absolute overflow-hidden left-0 right-0 pb2">
    <div class="travel-pane-content travel-shadow travel-border-gray border-bottom">
      <div class="max-width-3 mx-auto px1 md-px2 py1">

<!-- Filters -->
<div class="travel-filters clearfix mxn2" [class]="'travel-filters clearfix mxn2' + (ui_reset ? ' travel-filters-reset' : '')">

  <div class="col col-12 md-col-5 px2 py1">
    <div class="travel-filters-text h5 mb2 caps">Категория</div>

<!-- Category Selector -->
<amp-selector class="travel-type-selector clearfix" layout="container" name="category_id" multiple="" on="
    select:AMP.setState({
      ui_reset: false,
      fields_category_id: fields_category_id.includes(event.targetOption)
        ? copyAndSplice(fields_category_id, fields_category_id.indexOf(event.targetOption), 1)
        : fields_category_id.concat([event.targetOption]),
      fields_category_id_edited: true
    })
  " [selected]="fields_category_id">
  <ul class="list-reset">
     
      <?php foreach ($category as $cat_item) {?>
      
      <!-- <div class=""> -->
        <li option="<?=$cat_item->id;?>" class="col col-6 travel-type-nature">
          <div class="travel-type-selector-inactive flex relative items-center justify-between nowrap">
            <span class="travel-type-selector-content nowrap">
<svg class="travel-icon" viewBox="0 0 100 100"><path fill="currentColor" d="M91 9c2.01.413 3.58 1.957 4 3.933 0 3.28-29.278 38.624-37 46.217C52.995 64.072 46.184 68 42.5 68c-1.634 0-7.5-5.896-7.5-7.375 0-3.623 3.995-10.32 9-15.242C51.722 37.79 87.665 9 91 9zM5 86c0-1.75 2.114-.465 5.345-3.686 2.71-2.702 1.692-9.02 7.354-14.665 4.87-4.864 12.77-4.867 17.643-.007 4.874 4.86 4.876 12.74.006 17.605a22.75 22.75 0 0 1-16.32 6.752C11.857 92 5 87.75 5 86z"></path></svg>              <?=$cat_item->title;?>
            </span>
          </div>
          <div class="travel-type-selector-active flex items-center justify-between nowrap absolute top-0 bottom-0 left-0 right-0">
            <span class="travel-type-selector-content nowrap">
<svg class="travel-icon" viewBox="0 0 100 100"><path fill="currentColor" d="M91 9c2.01.413 3.58 1.957 4 3.933 0 3.28-29.278 38.624-37 46.217C52.995 64.072 46.184 68 42.5 68c-1.634 0-7.5-5.896-7.5-7.375 0-3.623 3.995-10.32 9-15.242C51.722 37.79 87.665 9 91 9zM5 86c0-1.75 2.114-.465 5.345-3.686 2.71-2.702 1.692-9.02 7.354-14.665 4.87-4.864 12.77-4.867 17.643-.007 4.874 4.86 4.876 12.74.006 17.605a22.75 22.75 0 0 1-16.32 6.752C11.857 92 5 87.75 5 86z"></path></svg>             <?=$cat_item->title;?>
            </span>
          </div>
        </li>
      <!-- </div> -->
      
      <?php }?>

   
  </ul>
</amp-selector>
<!--/ Type Selector -->
  </div>
  <div class="col col-12 md-col-3 px2 py1">
    <div class="travel-filters-text h5 mb2 caps">Автор</div>

<!-- User_id Selector -->
<amp-list class="travel-block-list travel-city-selector" layout="flex-item" src="/v1/post/search" [src]="
 '/v1/post/search?' + (query_category_id.length ? '&category_id[]=' + query_category_id.join('&category_id[]=') : '')
">


  <template type="amp-mustache">
      <amp-selector layout="container" name="user_id" multiple="" on="
          select:
            AMP.setState({
              ui_reset: false,
              fields_user_id: fields_user_id.includes(event.targetOption)
                ? copyAndSplice(fields_user_id, fields_user_id.indexOf(event.targetOption), 1)
                : fields_user_id.concat([event.targetOption]),
              fields_user_id_edited: true
            })
        " [selected]="fields_user_id">
      <ul class="list-reset">
          {{#stats.cities}}
            <!--
              "The attribute 'option' may not appear in tag 'div'."
              see: https://github.com/ampproject/amphtml/pull/9585
            -->
            {{#isSelected}}<li option="{{name}}" selected="">{{/isSelected}}
            {{^isSelected}}</li><li option="{{name}}">{{/isSelected}}
              <span>
                <div class="travel-city-selector-img">
                  <amp-img class="circle" layout="flex-item" src="/img/{{img}}.jpg"></amp-img>
                </div>
                {{name}}
              </span>
            </li>
          {{/stats.cities}}
        </ul>
      </amp-selector>
  </template>
</amp-list>
<!--/ City Selector -->
  </div>
</div>
<!--/ Filters -->
      </div>
      <div class="travel-border-gray mx1 md-mx2 border-top"></div>
      <div class="max-width-3 mx-auto px1 md-px2 py1 center">
        <button class="travel-filters-reset-btn ampstart-btn rounded bold" on="
          tap:AMP.setState({
              ui_reset: true,
            
              query_user_id: fields_user_id_initial,
              fields_user_id: fields_user_id_initial,
              fields_user_id_edited: false,
              query_category_id: fields_category_id_initial,
              fields_category_id: fields_category_id_initial,
              fields_category_id_edited: false,
          })
        ">
          Сбросить фильтры
        </button>
        <button class="travel-filters-apply-btn ampstart-btn rounded bold" disabled="" [disabled]="!fields_user_id_edited && !fields_category_id_edited && !ui_reset" on="
            tap:AMP.setState({
                ui_reset: false,
                ui_filterPane: false,
                query_user_id: fields_user_id,
                fields_user_id_edited: false,
                query_category_id: fields_category_id,
                fields_category_id_edited: false,
               
            })
          ">
          Искать
        </button>
      </div>
    </div>
  </div>
</div>
<!--/ Filter Pane -->


<!-- Sort bar -->
<section class="travel-filter-bar md-hide lg-hide">
  <div class="px1 md-px2">
    <amp-selector class="travel-row-selector px1 mxn1 md-px2 md-mxn2" layout="container" name="sort" on="
        select:AMP.setState({
          query_sort: event.targetOption,
          fields_sort: event.targetOption
        })
      " [selected]="fields_sort">
    <ul class="list-reset">
        <li class="bold" option="popularity-desc" selected="">Popular</li>
        <li class="bold" option="rating-desc">Best Rated</li>
        <li class="bold" option="age-asc">New</li>
        <li class="bold" option="price-asc">Lowest Price</li>
    </ul>
    </amp-selector>
  </div>
</section>
<!--/ Sort bar -->

        <div class="travel-no-focus flex-auto overflow-auto" role="button" tabindex="-1" on="tap:AMP.setState({ui_filterPane: false, ui_reset: false, ui_sortPane: false})">

<!-- Results -->
<section class="travel-results pb1 md-pt1">
  <div class="max-width-3 mx-auto px1 md-px2 flex">
    <amp-list class="travel-inline-list travel-results-list" layout="flex-item" noloading="" src="/v1/post/search?" [src]="
'/v1/post/search?' + (query_category_id.length ? '&category_id[]=' + query_category_id.join('&category_id[]=') : '')
">
      <template type="amp-mustache">
        <div>
          <div class="flex flex-wrap mxn1 flex-auto">
            {{#results.length}}
              {{#results}}
              <div class="col-12 sm-col-6 lg-col-4 p1 travel-results-result">
                <div class="relative travel-results-result">
                  <a class="travel-results-result-link" href="{{url}}">
                  

                    <amp-img class="rounded bg-silver mb1" width="2" height="1.4" noloading="" layout="responsive" src="{{img}}" srcset="{{img}}"></amp-img>
                    
                          <?php // <amp-img class="rounded bg-silver mb1" width="2" height="2" noloading="" layout="responsive" src="{{img}}" srcset="{{img}}></amp-img>?>   
                             
                    
                    
                  {{#flags.new}}
                  <div class="travel-results-result-flags absolute top-0 left-0">
                    <div class="p1"><span class="travel-pill bold">NEW</span></div>
                  </div>
                  {{/flags.new}}
                  
                  
                  <div class="travel-results-result-like absolute top-0 right-0">
                    <div class="p1">
                      <label class="travel-like">
                        {{#liked}}<input type="checkbox" checked="" class="absolute">{{/liked}}
                        {{^liked}}<input type="checkbox" class="absolute">{{/liked}}
                        <div class="travel-like-hearts circle inline-block relative">
                          <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
                          <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
                          <div class="travel-like-heart-tiny travel-like-heart-solid absolute"></div>
                          <div class="travel-like-heart travel-like-heart-white absolute mx-auto"></div>
                          <div class="travel-like-heart travel-like-heart-solid absolute mx-auto"></div>
                          <div class="travel-like-heart travel-like-heart-outline absolute mx-auto"></div>
                        </div>
                      </label>
                    </div>
                  </div>
                  </a>
                </div>
                <div class="h2 line-height-2 mb1">
                  <span class="travel-results-result-text">{{name}}</span>
                  <span class="travel-results-result-subtext h3">&bull;</span>
                  <span class="travel-results-result-subtext h3">&#128065; &nbsp;</span><span class="bold">{{click}}</span>
                </div>
                <div class="h4 line-height-2">
                  <!--
                    Outputting SVG with amp-mustache is currently blocked. Plain
                    glyphs are used here instead for the map icon and rating.
                    see: https://github.com/ampproject/amphtml/issues/8214
                  -->
                  {{#reviews.count}}
                    <div class="inline-block relative mr1 h3 line-height-2">
                      <div>
                        <span class="travel-icon travel-img-icon-star-silver">
                        </span><span class="travel-icon travel-img-icon-star-silver">
                        </span><span class="travel-icon travel-img-icon-star-silver">
                        </span><span class="travel-icon travel-img-icon-star-silver">
                        </span><span class="travel-icon travel-img-icon-star-silver"></span>
                      </div>
                      <div class="absolute top-0">
                        {{#reviews.averageRating.range}}<span class="travel-icon travel-img-icon-star-green"></span>{{/reviews.averageRating.range}}
                      </div>
                    </div>
                    <span class="travel-results-result-subtext mr1">{{reviews.count}} Reviews</span>
                  {{/reviews.count}}
                  {{^reviews.count}}
                    <span class="travel-results-result-subtext mr1">Нет отзывов</span>
                  {{/reviews.count}}
                    <span class="nowrap">
                     <span class="travel-results-result-subtext h4"> &#10001; </span>{{author}}
                    </span>
                  
                </div>
                    
              </div>
              {{/results}}
            {{/results.length}}
            {{^results.length}}
              <div class="travel-results-empty">
                <div>
                  <div class="h1 center mb1">
                    <span class="travel-icon travel-img-icon-sad-face-gray"></span>
                  </div>
                  <div class="h1 gray center">К сожалению ничего не нашлось</div>
                  <div class="gray center">
                    Вы можете
                    <span class="underline pointer" role="button" tabindex="0" on="
                        tap:
                          AMP.setState({ui_reset: false}),
                          AMP.setState({
                            ui_filterPane: true,
                            ui_reset: true,
                            query_user_id: fields_user_id_initial,
                            fields_user_id: fields_user_id_initial,
                            fields_user_id_edited: false,
                            query_category_id: fields_category_id_initial,
                            fields_category_id: fields_category_id_initial,
                            fields_category_id_edited: false
                          })
                      ">сбросить фильты</span>
                   и попробовать снова
                  </div>
                </div>
              </div>
            {{/results.length}}
          </div>
        </div>
      </template>
    </amp-list>
  </div>
</section>
<!--/ Results --> 