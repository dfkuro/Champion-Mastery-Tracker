<!-- <h2>Todo</h2>
<div ng-controller="TodoListController as todoList">
  <span>{{todoList.remaining()}} of {{todoList.todos.length}} remaining</span>
  [ <a href="" ng-click="todoList.archive()">archive</a> ]
  <ul class="unstyled">
    <li ng-repeat="todo in todoList.todos">
      <label class="checkbox">
        <input type="checkbox" ng-model="todo.done">
        <span class="done-{{todo.done}}">{{todo.text}}</span>
      </label>
    </li>
  </ul>
  <form ng-submit="todoList.addTodo()">
    <input type="text" ng-model="todoList.todoText"  size="30"
           placeholder="add new todo here">
    <input class="btn-primary" type="submit" value="add">
  </form>
</div> -->

<div class="app_content" ng-controller="SummonermasteryCtrl" >
  <div class="row" >
      <div class="col-xs-12">
        <p class="text-center"><h1>Champions.</h1></p>
      </div>
  </div>

    <div class="row">
      <div class="col-xs-11 col-xs-offset-1">
        <form class="form-inline">
          <div class="form-group">
            <label for="summonerInput">Summoner</label>
            <input id="summonerInput" class="form-control" style="background-color: white;" type="text" ng-model="summonerName" name="name" value="" placeholder="Summoner">
          </div>

          <div class="form-group">
            <select ng-model="region" class="form-control" placeholder="region">
              <option value="euw">Europe West</option>
              <option value="na">North America</option>
              <option value="eune">Europe Nordic &amp; East</option>
              <option value="jp">Japan</option>
              <option value="kr">Republic of Korea</option>
              <option value="oc">Oceania</option>
              <option value="br">Brazil</option>
              <option value="lan">Latin America North</option>
              <option value="las">Latin America South</option>
              <option value="ru">Russia</option>
              <option value="tr">Turkey</option>
            </select>
          </div>


          <div class="form-group">

              <label for="sel1">Select list:</label>
              <select class="form-control" id="championSelect" ng-model="champSelect">
                <option ng-repeat="(key, value) in champs" value="{{value.id}}" >{{value.name}}</option>
              </select>

          </div>



          <button ng-click="getSummonerChampionData(summonerName,'single')" class="btn btn-primary btn-lg outline">Search</button>
          <!-- <button ng-click="getSummonerChampionData(summonerName, 'all')" class="btn btn-primary btn-lg outline">All</button> -->
        </form>
        <!-- {{champs}} -->
      </div>
    </div>


    <div class="row" style="padding: 10px;">

      <div class="col-xs-4" ng-show="showSingleCard">
        <div class="card-lol">
          <div class="row">
            <div class="col-xs-12">
              <h3 class="pull-left" id="championName">{{championName}} <small class="textlolstyle">{{champs[championName].title}}</small></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <img style="margin: 0 auto;" class="img-responsive center-block" src="{{championImageFullUrl}}" alt="" />
            </div>

            <div class="col-xs-8">
              <br>
              <div ng-switch on="championLevelShow">

                <div ng-switch-when="true">
                  <h5><small class="textlolstyle">Mastery level:</small>  <span id="championLevel"></span></h5>
                  <div id="barChampionMasteryLevel"></div>
                </div>

                <div ng-switch-when="false">
                  No mastery level.
                </div>
                <!-- <p ng-switch-default>
                  No mastery level.
                </p> -->
              </div>
              <br>
              <div ng-switch on="championPointsShow">
                <div ng-switch-when="true">
                  <h5><small class="textlolstyle">Champion points:</small>  <span id="championPoints"></span></h5>
                </div>
                <div ng-switch-when="false">
                  No champion points.
                </div>
              </div>

              <br>

              <div ng-switch on="championPointsShow">
                <div ng-switch-when="true">
                  <img class="img-responsive col-xs-4 pull-left" src="<?=base_url('resources/images/{{chestImage}}')?>" alt="" />
                </div>
                <div ng-switch-when="false">

                </div>
              </div>


            </div>
          </div>
        </div>
      </div>


      <div class="col-xs-4" ng-show="showMultipleCards" ng-repeat="championStat in championsStats(6)">
        <div class="card-lol">
          <div class="row">
            <div class="col-xs-12">
              <h3 class="pull-left" id="championName">{{championName}} <small class="textlolstyle">{{champs[championName].title}}</small></h3>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <img style="margin: 0 auto;" class="img-responsive center-block" src="{{championImageFullUrl}}" alt="" />
            </div>

            <div class="col-xs-8">
              <br>
              <div ng-switch on="championLevelShow">

                <div ng-switch-when="true">
                  <h5><small class="textlolstyle">Mastery level:</small>  <span id="championLevel"></span></h5>
                  <div id="barChampionMasteryLevel"></div>
                </div>

                <div ng-switch-when="false">
                  No mastery level.
                </div>
                <!-- <p ng-switch-default>
                  No mastery level.
                </p> -->
              </div>
              <br>
              <div ng-switch on="championPointsShow">
                <div ng-switch-when="true">
                  <h5><small class="textlolstyle">Champion points:</small>  <span id="championPoints"></span></h5>
                </div>
                <div ng-switch-when="false">
                  No champion points.
                </div>
              </div>

              <br>

              <div ng-switch on="championPointsShow">
                <div ng-switch-when="true">
                  <img class="img-responsive col-xs-4 pull-left" src="<?=base_url('resources/images/{{chestImage}}')?>" alt="" />
                </div>
                <div ng-switch-when="false">

                </div>
              </div>


            </div>
          </div>
        </div>
      </div>


    </div>




    <div class="row">
      <!-- <div class="col-xs-12"><img class="img-responsive" src="{{championImageSplashUrl}}" alt=""></div> -->
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="chart-wrapper">

        </div>
      </div>
    </div>

</div>
