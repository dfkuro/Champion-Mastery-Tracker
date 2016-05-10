<div class="row" ng-controller="NavBarCtrl" >
  <div class="col-xs-12">
    <!--betulsenger.com @betdream-->
    <!--http://getbootstrap.com/components/#navbar-->
    <div class="body-wrap" >
      <div class="container" style="padding: 0; margin: 0px; position:relative; left: -15px;">
        <nav class="navbar navbar-inverse" role="navigation" >
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
              <button type="button" class="navbar-toggle  " data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">CM TRACKER</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="<?php echo ($this->uri->uri_string() == '' ? ' active' : '');?>"><a href="<?=base_url('')?>">Champion mastery</a></li>

                <!-- <li class="<?php echo ($this->uri->uri_string() == 'about' ? ' active' : '');?>"><a href="<?=base_url('about')?>">About</a></li> -->
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                    <li class="divider"></li>
                    <li><a href="#">One more separated link</a></li>
                  </ul>
                </li> -->
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li><a href="#" ng-click=""><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i> Add you summoner account. </a></li>
                <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </li> -->
              </ul>
            </div>
            <!-- /.navbar-collapse -->
          </div>
          <!-- /.container-fluid -->
        </nav>
      </div>
    </div>
  </div>
</div>
