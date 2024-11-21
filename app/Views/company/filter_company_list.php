<script>
    $(document).ready(function() {
        $('.select2').select2();

        function fetchCompanies(page = 1, search = '') {
            $.ajax({
                url: 'companies/getCompanyList/' + page,
                type: 'GET',
                data: {
                    search: search
                },
                dataType: 'json',
                success: function(response) {
                    $('#fCompanyDetails').html(response.table);
                    $('#fCompanyPagination').html(response.pagination);
                    bindPaginationLinks();
                }
            });
        }

        function bindPaginationLinks() {
            $('#fCompanyPagination').find('a').on('click', function(e) {
                e.preventDefault();
                const page = $(this).attr('href').split('page=')[1];
                fetchProducts(page);
            });
        }

        fetchCompanies();

        $('#searchButton').on('click', function() {
            const search = $('#searchInput').val();
            fetchCompanies(1, search);
        });

        $('#searchInput').on('keyup', function() {
            const search = $(this).val().toLowerCase();
            fetchCompanies(1, search);
        });
    });
</script>