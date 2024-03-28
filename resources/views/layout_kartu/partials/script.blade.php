<script>
    $(document).ready(function() {
        $("#check_foto").change(function() {
            if (this.checked) {
                $("#form_foto").removeClass("hidden")
            } else {
                $("#form_foto").addClass("hidden")
            }
        })
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
