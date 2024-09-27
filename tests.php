<?php
use Habeuk\MigrateSmf1xTo2x\Entity\Product;
use Habeuk\MigrateSmf1xTo2x\Configs\DbConnetion;

function addProduct() {
  $entityManager = DbConnetion::EntityManager();
  $product = new Product();
  $product->setName("product N: " . time());
  $entityManager->persist($product);
  $entityManager->flush();
}

function listAllProducts() {
  $productRepository = DbConnetion::EntityManager()->getRepository(Product::class);
  $products = $productRepository->findAll();
  
  return $products;
}