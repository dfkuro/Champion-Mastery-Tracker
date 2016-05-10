

angular.module('loltracker', [])
.controller('SummonermasteryCtrl', function ($scope, FactoryLolData, $timeout) {

  // Getting the factory with the lol data.
  var dataRetrived = FactoryLolData;
  $scope.showSingleCard    = false;
  $scope.showMultipleCards = false;

  dataRetrived.championList().then(function (response){
    $scope.champs = response.data.data;
  });

  $scope.getMyLastName = function() {
    facebookService.getMyLastName()
      .then(function(response) {
         $scope.last_name = response.last_name;
      }
    );
  };
  // Get the dhampion's data
  $scope.getChampionData = function(champioId){

    dataRetrived.championList().then(function (response){
      //$scope.champs = response.data.data;
      for (var i = 0; i < response.data.data.length; i++) {

        if(response.data.data[i].key == championId){
          return response.data.data[i];
          break;
        }

      }
    });

  };

  //
  $scope.getSummonerChampionData = function(summonerName, type){
    if(summonerName == '' || $scope.region == ''){

    }else{
      $scope.summonerData = dataRetrived.getSummonerData(summonerName).then(function(response){
        var server;
        if($scope.region == 'lan'){
          server = 'LA1';
        } else if($scope.region == 'las'){
          server = 'LA2';
        } else if($scope.region == 'KR' || $scope.region == 'RU') {
          server = $scope.region.toUpperCase();
        } else {
          server = $scope.region.toUpperCase()+'1';
        }
        if(type == 'single'){
          $scope.getSummonerMasteryChampion(response.data[summonerName].id, $scope.champs[$scope.champSelect].key, $scope.region, server );
        } else {
          $scope.getSummonerMasteryChampions(response.data[summonerName].id, $scope.region, server );
        }
      });
    }
  };

  $scope.getSummonerMasteryChampions = function(summonerId, region, server){
    $scope.showSingleCard = false;
    $scope.showMultipleCard = true;

    dataRetrived.getMasteryData(summonerId, region, server).then(function (response){
      var data = {};
      for (var i = 0; i < 5; i++) {
        if(response.data[i].chestGranted){
          $scope.chestImage = "1_chest.png";
        } else if(!$scope.chestGranted) {
          $scope.chestImage = "0_chest.png";
        }
        data[i] = {
          'championName':   $scope.getChampionData(response.data[i]).name,
          'championLevel':  response.data[i].championLevel,
          'championPoints': response.data[i].championPoints,
          'chestGranted':   response.data[i].chestGranted,
          'chestImage':     $scope.chestImage
        };
      }
    });
  };

  $scope.getSummonerMasteryChampion = function(summonerId, championId, region, server){
    console.log('Id summoner: ' + summonerId + ' Id champion: ' + championId);
    $scope.showSingleCard = true;
    $scope.showMultipleCard = false;
    dataRetrived.getMasteryData(summonerId, region, server).then(function (response){

      // angular.forEach(response.data, function(value, key) {
      //
      //       if (value.championId == championId) {
      //
      //         $scope.championName                   = $scope.champs[$scope.champSelect].name;
      //         $scope.championLevel                  = value.championLevel;
      //         $scope.championPoints                 = value.championPoints;
      //         $scope.chestGranted                   = value.chestGranted;
      //         $scope.championPointsSinceLastLevel   = value.championPointsSinceLastLevel;
      //         console.log(value);
      //         return false;
      //       }
      //   });

      for (var i = 0; i < response.data.length; i++) {
        if(response.data[i].championId == championId){
          $scope.championName                   = $scope.champs[$scope.champSelect].name;
          $scope.championLevel                  = response.data[i].championLevel;
          $scope.championPoints                 = response.data[i].championPoints;
          $scope.chestGranted                   = response.data[i].chestGranted;
          $scope.championPointsSinceLastLevel   = response.data[i].championPointsSinceLastLevel;
          console.log(response.data[i]);
          i = response.data.length;
          break;
        } else {
          $scope.championName                   = $scope.champs[$scope.champSelect].name;
          $scope.championLevel                  = 0;
          $scope.championPoints                 = 0;
          $scope.chestGranted                   = 0;
          $scope.championPointsSinceLastLevel   = 0;
          break;
        }
      }


      if($scope.chestGranted){
        $scope.chestImage = "1_chest.png";
      } else if(!$scope.chestGranted) {
        $scope.chestImage = "0_chest.png";
      }

      var lastPlayTime = new Date(response.data.lastPlayTime);

      if($scope.championLevel > 0){

        $timeout(function() {
          d3.select("#barChampionMasteryLevel").transition().delay(100).style({"width": "0px", "background-color":"red"}).each(function(){
              d3.select("#barChampionMasteryLevel").style({"width": "0px", "background-color":"red"}).transition().duration(1500).delay(100).style({"width": ($scope.championLevel * 40)+"px", "background-color":'#3333ff'});

              $("#championLevel").animateNumber(
                {
                  number: $scope.championLevel,
                  // color: 'green', // require jquery.color
                  // easing: 'easeInQuad', // require jquery.easing
                  numberStep: function(now, tween) {
                    var floored_number = Math.floor(now),
                        target = $(tween.elem);

                    target.text(floored_number);
                  }
                },1200
              );

              $("#championPoints").animateNumber(
                {
                  number: $scope.championPoints,
                  // color: 'green', // require jquery.color
                  // easing: 'easeInQuad', // require jquery.easing
                  numberStep: function(now, tween) {
                    var floored_number = Math.floor(now),
                        target = $(tween.elem);

                    target.text(floored_number);
                  }
                },1800
              );


          });
        }, 250); // delay 250 ms
      }

      // console.log("masterDataChampion");
      // console.log(response.data);

      if($scope.championLevel === undefined || $scope.championLevel == 0){
        $scope.championLevelShow = false;
      } else {
        $scope.championLevelShow = true;
      }


      if($scope.championPoints === undefined || $scope.championPoints == 0){
        $scope.championPointsShow = false;
      } else {
        $scope.championPointsShow = true;
      }

      // $scope.championImageFullUrl    = 'http://ddragon.leagueoflegends.com/cdn/6.9.1/img/champion/'+$scope.champs[$scope.champSelect].image.full;
      $scope.championImageFullUrl    = 'http://ddragon.leagueoflegends.com/cdn/img/champion/loading/'+$scope.champs[$scope.champSelect].id+'_0.jpg';
      // $scope.championImageSplashUrl  = 'http://ddragon.leagueoflegends.com/cdn/img/champion/splash/'+$scope.champSelect+'_0.jpg';

      // FB.api('/me', {fields: 'last_name'}, function(response) {
      //   console.log(response);
      // });

    });
  };



})

// .controller('NavBarCtrl', function ($scope, facebookService) {
//
//   $scope.FBLogin = function(){
//     FB.login(function(){}, {scope: 'publish_actions'});
//     // FB.getLoginStatus(function(response) {
//     //   if (response.status === 'connected') {
//     //     console.log('Logged in.');
//     //   }
//     //   else {
//     //     FB.login();
//     //   }
//     // });
//   }
//
// })



.factory('FactoryLolData', function ($http) {
  // Service logic
  // ...
  ApiKey = '';

  return {
    /**
     * [getSummonerData Getting al info from summoner using the name to retrieve the data]
     * @param  {[string]} summonerName [Summoner's name]
     * @return {[json]}                [Summoner's data]
     */
    getSummonerData: function(summonerName){
      return $http({
        method: 'GET',
        url: 'https://lan.api.pvp.net/api/lol/lan/v1.4/summoner/by-name/'+summonerName+'?api_key='+ApiKey,
      });
    },
    /**
     * [getMasteryData Retrieve mastery data from API]
     * @param  {[int]} summonerId [Summoner's id]
     * @param  {[int]} championId [Champion's id]
     * @return {[json]}            [data mastery]
     */
    getMasteryData: function (summonerId, region, server) {
      return $http({
        method: 'GET',
        //url: 'https://lan.api.pvp.net/championmastery/location/la1/player/'+summonerId+'/champion/'+championId+'?api_key='+ApiKey
        url: 'https://'+region+'.api.pvp.net/championmastery/location/'+server+'/player/'+summonerId+'/champions?api_key='+ApiKey
      });
    },
    /**
     * [championList Retrieve all champions info from league of legends]
     * @return {[type]} [description]
     */
    championList: function(){
      return $http({
        method: 'GET',
        url: "http://ddragon.leagueoflegends.com/cdn/6.9.1/data/en_US/champion.json"
      });
    },
    currentGameInfo: function() {
      return $http({
        method: 'GET',
        url: 'https://lan.api.pvp.net/observer-mode/rest/consumer/getSpectatorGameInfo/LA1/3462568?api_key='+ApiKey
      })
    },
    recentGame: function(){
      return $http({
        method: 'GET',
        url: 'https://lan.api.pvp.net/api/lol/lan/v1.3/game/by-summoner/3462568/recent?api_key='+ApiKey
      })
    }
  };

})

// Factory for facebook.
.factory('facebookService', function($q) {
    return {
        getMyLastName: function() {
            var deferred = $q.defer();
            FB.api('/me', {
                fields: 'last_name'
            }, function(response) {
                if (!response || response.error) {
                    deferred.reject('Error occured');
                } else {
                    deferred.resolve(response);
                }
            });
            return deferred.promise;
        }
    }
});
