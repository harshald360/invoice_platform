<script>
	$(document).ready(function() {
		$('.select2').select2();
		function fetchProducts(page = 1, search = '', category = '', subcategory = '', brand = '') {
			$.ajax({
				url: 'products/getProductList/' + page,
				type: 'GET',
				data: { search: search, category: category, subcategory: subcategory, brand: brand },
				dataType: 'json',
				success: function(response) {
					$('#fProductDetails').html(response.table);
					$('#fProductPagination').html(response.pagination);
					bindPaginationLinks();
				}
			});
		}

		function bindPaginationLinks() {
			$('#fProductPagination').find('a').on('click', function(e) {
				e.preventDefault();
				const page = $(this).attr('href').split('page=')[1];
				fetchProducts(page);
			});
		}

		$('#product_category').change(function() {
	        const category = $(this).val();
	        getSubCategoriesByCategory(category);
	        fetchProducts(1, $('#searchInput').val(), category, '', '');
	    });

	    $('#product_subcategory').change(function() {
	        const subcategory = $(this).val();
	        fetchProducts(1, $('#searchInput').val(), $('#product_category').val(), subcategory, '');
	    });

	    $('#product_brand').change(function() {
	        const brand = $(this).val();
	        fetchProducts(1, $('#searchInput').val(), $('#product_category').val(), $('#product_subcategory').val(), brand);
	    });

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