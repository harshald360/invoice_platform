<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table = 'inv_products'; // Your table name

    protected $primaryKey = 'id'; // Primary key of your table

    protected $allowedFields = [
        'product_category',
        'product_subcategory',
        'product_brand',
        'product_name',
        'starting_price',
        'is_active',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true; // Enables automatic timestamps

    protected $createdField = 'created_at'; // Name of the created_at field

    protected $updatedField = 'updated_at'; // Name of the updated_at field

    protected $dateFormat = 'datetime'; // Format of timestamps

    // Optionally define validation rules for the fields
    protected $validationRules = [
        'product_category' => 'required|max_length[256]',
        'product_brand' => 'required|max_length[256]',
        'is_active' => 'required|in_list[0,1,2]',
    ];

    // Optionally define custom error messages for validation
    protected $validationMessages = [
        'product_category' => [
            'required' => 'Please select an category or enter category name.',
            'max_length' => 'Product category cannot exceed 256 characters.'
        ],
        'product_brand' => [
            'required' => 'Please select an brand or enter brand name.',
            'max_length' => 'Product brand cannot exceed 256 characters.'
        ],
        'product_name' => [
            'required' => 'Product name is required.',
            'max_length' => 'Product name cannot exceed 256 characters.'
        ],
        'starting_price' => [
            'required' => 'Starting price is required.',
            'numeric' => 'Starting price must be numeric.'
        ],
        'is_active' => [
            'required' => 'Active status is required.',
            'in_list' => 'Active status must be either 0 or 1.'
        ],
    ];

    // Method to fetch unique product categories
    public function getUniqueCategories()
    {
        return $this->select('product_category')
                    ->distinct()
                    ->where('is_active', 0)
                    ->findAll();
    }

    // Method to fetch unique product subcategories based on category
    public function getUniqueSubCategoriesByCategory($category = null)
    {
        $builder = $this->select('product_subcategory')
                        ->distinct();

        if ($category !== null) {
            $builder->where('product_category', $category);
        }
        $builder->where('is_active', 0);
        return $builder->findAll();
    }

    // Method to fetch unique brands based on subcategory
    public function getUniqueBrandsBySubCategory($subCategory = null)
    {
        $builder = $this->select('product_brand')
                        ->distinct();

        if ($subCategory !== null) {
            $builder->where('product_subcategory', $subCategory);
        }
        $builder->where('is_active', 0);
        return $builder->findAll();
    }

    // Method to fetch unique brands based on category
    public function getUniqueBrandsByCategory($category = null)
    {
        $builder = $this->select('product_brand')
                        ->distinct();

        if ($category !== null) {
            $builder->where('product_category', $category);
        }

        $builder->where('is_active', 0);

        return $builder->findAll();
    }

    public function insertBatchData($data)
    {
        return $this->insertBatch($data);
    }
}
