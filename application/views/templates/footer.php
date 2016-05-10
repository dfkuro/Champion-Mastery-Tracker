  <div id="footer" class="row">
    <div class="col-xs-12">
      <p class="pull-left">
        The Champion Mastery Api Challenge website isn't endorsed by Riot Games and doesn't reflect the views or opinions of Riot Games or anyone officially involved in producing or managing League of Legends. League of Legends and Riot Games are trademarks or registered trademarks of Riot Games, Inc. League of Legends © Riot Games, Inc.
      </p>
      <p style="position: absolute; bottom:0px; right:0px;">
        By @dfkuro
      </p>
    </div>
  </div>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url('resources/js/bootstrap.min.js')?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js" charset="utf-8"></script>

<!----Calender -------->
<script src="<?=base_url('resources/js/underscore-min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('resources/js/moment-2.2.1.js')?>" type="text/javascript"></script>
<script src="<?=base_url('resources/js/clndr.js')?>" type="text/javascript"></script>
<script src="<?=base_url('resources/js/site.js')?>" type="text/javascript"></script>
<!----End Calender -------->

<!-- Metis Menu Plugin JavaScript -->
<script src="<?=base_url('resources/js/metisMenu.min.js')?>"></script>
<script src="<?=base_url('resources/js/custom.js')?>"></script>

<script src="<?=base_url('resources/js/angular/angular-animate.js')?>" type="text/javascript"></script>
<script src="<?=base_url('resources/js/angular/angular-loader.min.js')?>" type="text/javascript"></script>
<script src="<?=base_url('resources/js/angular/angular-route.min.js')?>" type="text/javascript"></script>

<!-- jQuery animate numbers -->
<script src="<?=base_url('resources/js/plugins/jquery.animateNumber.min.js')?>" type="text/javascript"></script>

<!-- d3js -->
<script src="https://d3js.org/d3.v3.min.js" charset="utf-8"></script>

<script src="<?=base_url('resources/js/factoryloldata.js')?>" charset="utf-8"></script>
<script src="<?=base_url('resources/js/main.js')?>" charset="utf-8"></script>

<script type="text/javascript">
  function DropDown(el) {
    this.dd = el;
    this.initEvents();
  }
  DropDown.prototype = {
    initEvents : function() {
      var obj = this;

      obj.dd.on('click', function(event){
        $(this).toggleClass('active');
        event.stopPropagation();
      });
    }
  }
  $(function() {

    var dd = new DropDown( $('#dd1') );

    $(document).click(function() {
      // all dropdowns
      $('.wrapper-dropdown-3').removeClass('active');
    });

  });
</script>
</body>
</html>
