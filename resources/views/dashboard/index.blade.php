@extends('dashboard.admin.master')

@section('body')
<div class="sl-pagebody">

    <div class="row row-sm">
      <div class="col-sm-6 col-xl-3">
        <div class="card pd-20 bg-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">Today's Sales</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$850</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Gross Sales</span>
              <h6 class="tx-white mg-b-0">$2,210</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Tax Return</span>
              <h6 class="tx-white mg-b-0">$320</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
        <div class="card pd-20 bg-info">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Week's Sales</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$4,625</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Gross Sales</span>
              <h6 class="tx-white mg-b-0">$2,210</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Tax Return</span>
              <h6 class="tx-white mg-b-0">$320</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="card pd-20 bg-purple">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Month's Sales</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$11,908</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Gross Sales</span>
              <h6 class="tx-white mg-b-0">$2,210</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Tax Return</span>
              <h6 class="tx-white mg-b-0">$320</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
      <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
        <div class="card pd-20 bg-sl-primary">
          <div class="d-flex justify-content-between align-items-center mg-b-10">
            <h6 class="tx-11 tx-uppercase mg-b-0 tx-spacing-1 tx-white">This Year's Sales</h6>
            <a href="" class="tx-white-8 hover-white"><i class="icon ion-android-more-horizontal"></i></a>
          </div><!-- card-header -->
          <div class="d-flex align-items-center justify-content-between">
            <span class="sparkline2"><canvas width="59" height="50" style="display: inline-block; width: 59px; height: 50px; vertical-align: top;"></canvas></span>
            <h3 class="mg-b-0 tx-white tx-lato tx-bold">$91,239</h3>
          </div><!-- card-body -->
          <div class="d-flex align-items-center justify-content-between mg-t-15 bd-t bd-white-2 pd-t-10">
            <div>
              <span class="tx-11 tx-white-6">Gross Sales</span>
              <h6 class="tx-white mg-b-0">$2,210</h6>
            </div>
            <div>
              <span class="tx-11 tx-white-6">Tax Return</span>
              <h6 class="tx-white mg-b-0">$320</h6>
            </div>
          </div><!-- -->
        </div><!-- card -->
      </div><!-- col-3 -->
    </div><!-- row -->

    <div class="row row-sm mg-t-20">
      <div class="col-xl-8">
        <div class="card overflow-hidden">
          <div class="card-header bg-transparent pd-y-20 d-sm-flex align-items-center justify-content-between">
            <div class="mg-b-20 mg-sm-b-0">
              <h6 class="card-title mg-b-5 tx-13 tx-uppercase tx-bold tx-spacing-1">Profile Statistics</h6>
              <span class="d-block tx-12">October 23, 2017</span>
            </div>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a href="#" class="btn btn-secondary tx-12 active">Today</a>
              <a href="#" class="btn btn-secondary tx-12">This Week</a>
              <a href="#" class="btn btn-secondary tx-12">This Month</a>
            </div>
          </div><!-- card-header -->
          <div class="card-body pd-0 bd-color-gray-lighter">
            <div class="row no-gutters tx-center">
              <div class="col-12 col-sm-4 pd-y-20 tx-left">
                <p class="pd-l-20 tx-12 lh-8 mg-b-0">Note: Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula...</p>
              </div><!-- col-4 -->
              <div class="col-6 col-sm-2 pd-y-20">
                <h4 class="tx-inverse tx-lato tx-bold mg-b-5">6,112</h4>
                <p class="tx-11 mg-b-0 tx-uppercase">Views</p>
              </div><!-- col-2 -->
              <div class="col-6 col-sm-2 pd-y-20 bd-l">
                <h4 class="tx-inverse tx-lato tx-bold mg-b-5">102</h4>
                <p class="tx-11 mg-b-0 tx-uppercase">Likes</p>
              </div><!-- col-2 -->
              <div class="col-6 col-sm-2 pd-y-20 bd-l">
                <h4 class="tx-inverse tx-lato tx-bold mg-b-5">343</h4>
                <p class="tx-11 mg-b-0 tx-uppercase">Comments</p>
              </div><!-- col-2 -->
              <div class="col-6 col-sm-2 pd-y-20 bd-l">
                <h4 class="tx-inverse tx-lato tx-bold mg-b-5">960</h4>
                <p class="tx-11 mg-b-0 tx-uppercase">Shares</p>
              </div><!-- col-2 -->
            </div><!-- row -->
          </div><!-- card-body -->
          <div class="card-body pd-0">
            <div id="rickshaw2" class="wd-100p ht-200 rickshaw_graph"><svg width="1075" height="200"><g><path d="M0,39.99999999999999Q71.66666666666667,3.46666666666667,82.6923076923077,4.0000000000000036C99.23076923076923,4.800000000000004,148.84615384615384,40.400000000000006,165.3846153846154,48S231.53846153846155,77.6,248.0769230769231,80S314.2307692307692,76,330.7692307692308,72S396.92307692307696,35.199999999999996,413.4615384615385,39.99999999999999S479.61538461538464,108,496.1538461538462,120S562.3076923076923,160,578.8461538461538,160S645,126,661.5384615384615,120S727.6923076923076,106,744.2307692307692,100S810.3846153846155,58.00000000000001,826.923076923077,60.00000000000001S893.0769230769231,122,909.6153846153846,120S975.7692307692308,41.99999999999999,992.3076923076924,39.99999999999999Q1003.3333333333334,38.66666666666666,1075,100L1075,150Q1003.3333333333334,119.33333333333333,992.3076923076924,120C975.7692307692308,121,926.1538461538462,159,909.6153846153846,160S843.4615384615386,131,826.923076923077,130S760.7692307692307,147,744.2307692307692,150S678.0769230769231,157,661.5384615384615,160S595.3846153846154,180,578.8461538461538,180S512.6923076923077,166,496.1538461538462,160S430.00000000000006,122.4,413.4615384615385,120S347.3076923076923,134,330.7692307692308,136S264.61538461538464,141.2,248.0769230769231,140S181.92307692307693,127.8,165.3846153846154,124S99.23076923076923,102.4,82.6923076923077,102Q71.66666666666667,101.73333333333333,0,120Z" class="area" fill="#73a9e7"></path></g><g><path d="M0,120Q71.66666666666667,101.73333333333333,82.6923076923077,102C99.23076923076923,102.4,148.84615384615384,120.2,165.3846153846154,124S231.53846153846155,138.8,248.0769230769231,140S314.2307692307692,138,330.7692307692308,136S396.92307692307696,117.6,413.4615384615385,120S479.61538461538464,154,496.1538461538462,160S562.3076923076923,180,578.8461538461538,180S645,163,661.5384615384615,160S727.6923076923076,153,744.2307692307692,150S810.3846153846155,129,826.923076923077,130S893.0769230769231,161,909.6153846153846,160S975.7692307692308,121,992.3076923076924,120Q1003.3333333333334,119.33333333333333,1075,150L1075,200Q1003.3333333333334,200,992.3076923076924,200C975.7692307692308,200,926.1538461538462,200,909.6153846153846,200S843.4615384615386,200,826.923076923077,200S760.7692307692307,200,744.2307692307692,200S678.0769230769231,200,661.5384615384615,200S595.3846153846154,200,578.8461538461538,200S512.6923076923077,200,496.1538461538462,200S430.00000000000006,200,413.4615384615385,200S347.3076923076923,200,330.7692307692308,200S264.61538461538464,200,248.0769230769231,200S181.92307692307693,200,165.3846153846154,200S99.23076923076923,200,82.6923076923077,200Q71.66666666666667,200,0,200Z" class="area" fill="#2B333E"></path></g></svg></div>
          </div><!-- card-body -->
        </div><!-- card -->

        <div class="card pd-20 pd-sm-25 mg-t-20"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
          <h6 class="card-body-title tx-13">Horizontal Bar Chart</h6>
          <p class="mg-b-20 mg-sm-b-30">A bar chart or bar graph is a chart with rectangular bars with lengths proportional to the values that they represent.</p>
          <canvas id="chartBar4" height="720" width="2462" style="display: block; width: 1231px; height: 360px;" class="chartjs-render-monitor"></canvas>
        </div><!-- card -->

      </div><!-- col-8 -->
      <div class="col-xl-4 mg-t-20 mg-xl-t-0">

        <div class="card pd-20 pd-sm-25">
          <h6 class="card-body-title">Pie Chart</h6>
          <p class="mg-b-20 mg-sm-b-30">Labels can be hidden if the slice is less than a given percentage of the pie.</p>
          <div id="flotPie2" class="ht-200 ht-sm-250" style="padding: 0px; position: relative;"><canvas class="flot-base" width="580" height="250" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 580px; height: 250px;"></canvas><canvas class="flot-overlay" width="580" height="250" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 580px; height: 250px;"></canvas><span class="pieLabel" id="pieLabel1" style="position: absolute; top: 36px; left: 313px;"><div style="font-size:8pt; text-align:center; padding:2px; color:white;">Series 2<br>11%</div></span><span class="pieLabel" id="pieLabel2" style="position: absolute; top: 135px; left: 348px;"><div style="font-size:8pt; text-align:center; padding:2px; color:white;">Series 3<br>32%</div></span><span class="pieLabel" id="pieLabel3" style="position: absolute; top: 178px; left: 225px;"><div style="font-size:8pt; text-align:center; padding:2px; color:white;">Series 4<br>25%</div></span><span class="pieLabel" id="pieLabel4" style="position: absolute; top: 55px; left: 204px;"><div style="font-size:8pt; text-align:center; padding:2px; color:white;">Series 5<br>29%</div></span></div>
        </div><!-- card -->

        <div class="card widget-messages mg-t-20">
          <div class="card-header">
            <span>Messages</span>
            <a href=""><i class="icon ion-more"></i></a>
          </div><!-- card-header -->
          <div class="list-group list-group-flush">
            <a href="" class="list-group-item list-group-item-action media">
              <img src="../img/img10.jpg" alt="">
              <div class="media-body">
                <div class="msg-top">
                  <span>Mienard B. Lumaad</span>
                  <span>4:09am</span>
                </div>
                <p class="msg-summary">Many desktop publishing packages and web page editors now use...</p>
              </div><!-- media-body -->
            </a><!-- list-group-item -->
            <a href="" class="list-group-item list-group-item-action media">
              <img src="../img/img9.jpg" alt="">
              <div class="media-body">
                <div class="msg-top">
                  <span>Isidore Dilao</span>
                  <span>Yesterday 3:00am</span>
                </div>
                <p class="msg-summary">On the other hand, we denounce with righteous indignation and dislike...</p>
              </div><!-- media-body -->
            </a><!-- list-group-item -->
            <a href="" class="list-group-item list-group-item-action media">
              <img src="../img/img8.jpg" alt="">
              <div class="media-body">
                <div class="msg-top">
                  <span>Kirby Avendula</span>
                  <span>Yesterday 3:00am</span>
                </div>
                <p class="msg-summary">It is a long established fact that a reader will be distracted by the readable...</p>
              </div><!-- media-body -->
            </a><!-- list-group-item -->
            <a href="" class="list-group-item list-group-item-action media">
              <img src="../img/img7.jpg" alt="">
              <div class="media-body">
                <div class="msg-top">
                  <span>Roven Galeon</span>
                  <span>Yesterday 3:00am</span>
                </div>
                <p class="msg-summary">Than the fact that climate change may be causing it to rapidly disappear... </p>
              </div><!-- media-body -->
            </a><!-- list-group-item -->
          </div><!-- list-group -->
          <div class="card-footer">
            <a href="" class="tx-12"><i class="fa fa-angle-down mg-r-3"></i> Load more messages</a>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- col-3 -->
    </div><!-- row -->

  </div>
@endsection
