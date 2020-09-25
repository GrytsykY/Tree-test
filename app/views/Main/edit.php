<div class=' js-overlay-campaign'>
  <div class='popup js-popup-campaign'>
    <h2>Edit</h2>
    <div class='close-popup js-close-campaign'></div>
    <div class='row'>
      <div class='col'>
        <form action='<?= BLOG ?>/main/update' method='post'>
          <input name='id' type='hidden' value='<?= $oneCat[0]["id"]; ?>'>
          <input name='title' type='text' value='<?= $oneCat[0]["title"]; ?>'>
          <input type='hidden' name='pid' value='<?= $oneCat[0]["pid"]; ?>'><br>
      </div>
      <input style='margin-right: 3px' class='btn btn-success js-close-campaign' type='submit' value='OK'>
      <button id='btnR' class='js-close-campaign btn btn-danger'>No</button>
      </form>
    </div>
  </div>
</div>