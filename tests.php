<?php
use Habeuk\MigrateSmf1xTo2x\Entity\Product;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnection;

function addProduct() {
  $entityManager = DbConnection::EntityManager();
  $product = new Product();
  $product->setName("product N: " . time());
  $entityManager->persist($product);
  $entityManager->flush();
}

function listAllProducts() {
  $productRepository = DbConnection::EntityManager()->getRepository(Product::class);
  $products = $productRepository->findAll();
  
  return $products;
}