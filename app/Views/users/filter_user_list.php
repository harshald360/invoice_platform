<script>
	$(document).ready(function() {
		$('.select2').select2();
		function fetchProducts(page = 1, search = '') {
			$.ajax({
				url: 'users/getUsersList/' + page,
				type: 'GET',
				data: { search: search },
				dataType: 'json',
				success: function(response) {
					$('#fUserDetails').html(response.table);
					$('#fUserPagination').html(response.pagination);
					bindPaginationLinks();
				}
			});
		}

		function bindPaginationLinks() {
			$('#fUserPagination').find('a').on('click', function(e) {
				e.preventDefault();
				const page = $(this).attr('href').split('page=')[1];
				fetchProducts(page);
			});
		}


	    // Fetch initial products
		fetchProducts();

		$('#searchButton').on('click', function() {
			const search = $('#searchInput').val();
			fetchProducts(1, search);
		});

		$('#searchInput').on('keyup', function() {
			const search = $(this).val().toLowerCase();
			fetchProducts(1, search);
		});
	});
</script>