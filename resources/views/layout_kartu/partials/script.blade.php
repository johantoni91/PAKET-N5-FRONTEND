<script>
    $(document).ready(function() {
        $("#tambah_kartu").on('click', function(e) {
            $("#layout_kartu").removeClass("hidden")
            $("#batal").removeClass("hidden")
            $(this).addClass("hidden")
        })
        $("#batal").on('click', function(e) {
            $("#layout_kartu").addClass("hidden")
            $("#tambah_kartu").removeClass("hidden")
            $(this).addClass("hidden")
        })
    })
</script>
