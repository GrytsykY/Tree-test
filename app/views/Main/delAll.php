<div class='overlay js-overlay-campaign'>
    <div class='popup js-popup-campaign'>
        <h2>Delete confirmation</h2>
        <p>This is very dangerous,you shouldn't
            do it! Are really sure?</p>
        <div class='close-popup js-close-campaign'></div>

        <div class='row'>
            <div class='col'>
                <span id='seconds' style='color: red; font-weight: bold'>20</span>
            </div>
            <form action='<?= BLOG ?>/main/delAll' method='POST'>
                <input type='hidden' name='name' value='5'>
                <button type='submit' class='btn btn-success js-del-campaign'>Yes I am</button>
            </form>
            <form action="<?= BLOG ?>/main/index">
                <button id='btn' class='js-close-campaign btn btn-danger'>No</button>
            </form>
        </div>
    </div>
</div>
<script>
    function timeOn() {
        var seconds = 20;
        setInterval(
            function() {
                if (seconds <= 1) {
                    var url = "<?= BLOG ?>";
                    $(location).attr('href', url);
                    $('.js-overlay-campaign').fadeOut();
                } else {
                    document.getElementById('seconds').innerHTML = --seconds;
                }
            }, 1000);
    }
    timeOn();
</script>