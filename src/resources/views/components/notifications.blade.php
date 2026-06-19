<div id="toast" style="
    position: fixed;
    top: 20px;
    right: 20px;
    background: #16a34a;
    color: #fff;
    padding: 10px 14px;
    border-radius: 6px;
    display: none;
    z-index: 9999;
"></div>

<script>
    function toast(message, type = 'success') {
        const el = $('#toast');

        el.text(message);

        if (type === 'error') {
            el.css('background', '#dc2626');
        } else {
            el.css('background', '#16a34a');
        }

        el.fadeIn(200);

        setTimeout(function () {
            el.fadeOut(300);
        }, 2000);
    }
</script>