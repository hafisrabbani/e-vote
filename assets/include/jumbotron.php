<div class="jumbotron jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h3 class="display-4 mb-1">E-Voting</h3>
    <p class="lead"><span><?= date("d-m-Y"); ?></span></p>
    <p class="lead" onload="startTime();"><span id="x"></span></p>
  </div>
</div>
<script>
  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('x').innerHTML =
      h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
  }

  function checkTime(i) {
    if (i < 10) {
      i = "0" + i
    };
    return i;
  }
</script>