<script type="text/javascript">
    function getSubCategoriesByCategory(category) {
        $('#product_subcategory,.product_subcategory').html('<option value="">Loading...</option>'); // Placeholder until loaded

        // Make AJAX request to fetch sub-categories
        $.ajax({
            url: '<?= base_url($panel.'/products/getSubCategoriesByCategory') ?>/' + category,
            type: 'GET',
            success: function(response) {
                $('#product_subcategory,.product_subcategory').empty().append('<option value=""> -- Select a sub-category -- </option>');
                $.each(response, function(key, value) {
                    $('#product_subcategory,.product_subcategory').append('<option value="' + value.product_subcategory + '">' + value.product_subcategory + '</option>');
                });
            },
            error: function() {
                $('#product_subcategory,.product_subcategory').html('<option value=""> -- Select a sub-category -- </option>');
            }
        });

        // Make AJAX request to fetch brands based on category
        $.ajax({
            url: '<?= base_url($panel.'/products/getBrandsByCategory') ?>/' + category,
            type: 'GET',
            success: function(response) {
                $('#product_brand, .product_brand').empty().append('<option value=""> -- Select a brand -- </option>');
                $.each(response, function(key, value) {
                    $('#product_brand, .product_brand').append('<option value="' + value.product_brand + '">' + value.product_brand + '</option>');
                });
            },
            error: function() {
                $('#product_brand, .product_brand').html('<option value=""> -- Select a brand -- </option>');
            }
        });
    };

    function getBrandsBySubCategory(subCategory) {
        $('#product_brand').html('<option value="">Loading...</option>'); // Placeholder until loaded

        // Make AJAX request to fetch brands
        $.ajax({
            url: '<?= base_url($panel.'/products/getBrandsBySubCategory') ?>/' + subCategory,
            type: 'GET',
            success: function(response) {
                $('#product_brand').empty().append('<option value=""> -- Select a brand -- </option>');
                $.each(response, function(key, value) {
                    $('#product_brand').append('<option value="' + value.product_brand + '">' + value.product_brand + '</option>');
                });
            },
            error: function() {
                $('#product_brand').html('<option value="">Failed to load brands</option>');
            }
        });
    };
</script>