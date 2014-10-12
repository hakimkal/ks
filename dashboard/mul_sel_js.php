<script src="<?php echo BASE_URL;?>/dashboard/assets/assets/jquery.min.js"></script>
<script src="<?php echo BASE_URL;?>/dashboard/assets/jquery.multiple.select.js"></script>
<script>
    $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>