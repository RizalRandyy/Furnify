<?php 

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function(BreadcrumbTrail $trail){
  $trail->push('Dashboard', route('dashboard'));
});

Breadcrumbs::for('customer.products.index', function (BreadcrumbTrail $trail) {
  $trail->parent('dashboard');
  $trail->push('Products', route('customer.products.index'));
});

Breadcrumbs::for('customer.products.show', function (BreadcrumbTrail $trail, $product) {
  $trail->parent('customer.products.index');
  $trail->push($product->name, route('customer.products.show', $product->id));
});

Breadcrumbs::for('customer.category.show', function(BreadcrumbTrail $trail, $category){
  $trail->parent('dashboard');
  $trail->push($category->name, route('customer.category.show', $category->id));
});

Breadcrumbs::for('checkout.index', function(BreadcrumbTrail $trail){
  $trail->parent('dashboard');
  $trail->push('My Orders');
});

Breadcrumbs::for('shoppingCart.index', function(BreadcrumbTrail $trail){
  $trail->parent('dashboard');
  $trail->push('Shopping Cart');
});

Breadcrumbs::for('favorite.index', function(BreadcrumbTrail $trail){
  $trail->parent('dashboard');
  $trail->push('Favorites');
});