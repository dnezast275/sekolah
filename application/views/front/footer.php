    <script src="<?= base_url('asset/js/'); ?>jquery.min.js"></script>
    <script src="<?= base_url('asset/bootstrap/js/'); ?>bootstrap.min.js"></script>
    <script src="<?= base_url('asset/fontawesome/js/'); ?>fontawesome.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-submenu a.dropdown-item').on("click", function(e) {
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>
    </body>

    </html>